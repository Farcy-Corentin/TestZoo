<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Requests\UpdateReviewsFormRequest;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class ReviewsAdminController extends Controller
{
    /**
     *
     * @throws Exception
     */
    public function index(): View|RedirectResponse
    {
        if (Gate::denies('update', Review::class)) {
            return redirect()->route('reviews.list');
        }

        $reviews = Review::all()->sortByDesc('created_at');

        if (!$reviews) {
            throw new Exception("Aucun avis trouvé.", 404);
        }
        $reviewsData = [];
        foreach ($reviews as $review) {
            $reviewsData[] = $this->transformReview($review);
        }

        return view('admin.zoo.reviews.reviews-list', compact('reviewsData'));
    }


    /**
     *
     * @throws Exception
     */
    public function getPendingReviews(Request $request): View|RedirectResponse
    {
        if (Gate::denies('view', Review::class)) {
            return redirect()->route('dashboard');
        }

        $reviews = Review::query()->where('status', 'pending')->paginate(
            $perPage = 1,
            $columns = ['*'],
            $pageName = 'page',
            $page = $request->query('page', 1)
        );

        if ($reviews->isEmpty() && $reviews->total() > 0) {
            return redirect()->route('reviews.pending', ['page' => 1]);
        }

        if ($reviews->isEmpty()) {
            return view('admin.zoo.reviews.pending', ['reviewsWithPagination' => [
                'items' => [],
                'currentPage' => $reviews->currentPage(),
                'next_page' => $reviews->nextPageUrl(),
                'prev_page' => $reviews->previousPageUrl(),
                'per_page' => $reviews->perPage(),
                'total_items' => $reviews->total(),
                'total_pages' => $reviews->lastPage(),
            ]]);
        }

        $reviewsData = [];
        foreach ($reviews as $review) {
            $reviewsData[] = $this->transformReview($review);
        }

        $reviewsWithPagination = [
            'items' => $reviewsData,
            'currentPage' => $reviews->currentPage(),
            'next_page' => $reviews->nextPageUrl(),
            'prev_page' => $reviews->previousPageUrl(),
            'per_page' => $reviews->perPage(),
            'total_items' => $reviews->total(),
            'total_pages' => $reviews->lastPage(),
        ];

        return view('admin.zoo.reviews.pending', compact('reviewsWithPagination'));
    }


    public function update(UpdateReviewsFormRequest $request, int $id): null|JsonResponse
    {
        if (Gate::denies('update', Review::class)) {
            return response()->json(["Vous n'êtes pas autorisé à modifier l'avis."], 403);
        }

        $review = Review::query()->find($id);

        $review->status = $request->status;
        $review->save();
        return response()->json(['success' => "Le status de l'avis à bien été mis à jour."]);
    }

    public function delete(int $id): JsonResponse
    {
        $review = Review::query()->where('id','=', $id)->first();
        $review->delete();

        return response()->json(['status' => 'success']);
    }

    private function transformReview(Review $review): array
    {
        return [
            'id' => $review->id,
            'author' => $review->author,
            'content' => $review->content,
            'rating' => $review->rating,
            'created_at' => Carbon::parse($review->created_at)->format('d-m-Y'),
            'status' => $review->status,
        ];
    }

}
