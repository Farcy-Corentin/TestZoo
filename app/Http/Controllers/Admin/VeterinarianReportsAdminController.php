<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\FoodConsum;
use App\Models\VeterinarianReport;
use App\Requests\VeterinarianReportsFormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class VeterinarianReportsAdminController extends Controller
{
    public function index(): View|RedirectResponse
    {
        if (Gate::denies('view', VeterinarianReport::class)) {
            return redirect()->route('dashboard');
        }
        // Get all reports
        $veterinarianReports = VeterinarianReport::with(['animal', 'user'])->get();

        return view('admin.zoo.veterinarian-reports.index', compact('veterinarianReports'));
    }

    public function create(VeterinarianReportsFormRequest $request): View|RedirectResponse
    {
        if (Gate::denies('create', VeterinarianReport::class)) {
            return redirect()->route('dashboard');
        }

        $foodConsumId = FoodConsum::query()->where('animal_id', $request->animal_id)->first()->id;
        $veterinarianReport = new VeterinarianReport();
        $veterinarianReport->animal_id = $request->animal_id;
        $veterinarianReport->animal_state = $request->animal_state;
        $veterinarianReport->food_consum_id = $foodConsumId;
        $veterinarianReport->content = $request->get('content');
        $veterinarianReport->user_id = Auth::user()->id;
        $veterinarianReport->save();

        return redirect()->route('admin.animals')->with(["success" => "Le rapport à bien été ajouté."]);
    }

    public function createForm(): View|RedirectResponse
    {
        if (Gate::denies('view', VeterinarianReport::class)) {
            return redirect()->route('dashboard');
        }
        $animals = Animal::all();
        $foods_consum = FoodConsum::all();
        return view('admin.zoo.veterinarian-reports.create', compact('animals', 'foods_consum'));
    }

}
