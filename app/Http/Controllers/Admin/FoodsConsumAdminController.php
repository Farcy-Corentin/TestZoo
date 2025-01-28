<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Food;
use App\Models\FoodConsum;
use App\Requests\FoodsConsumFormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;


class FoodsConsumAdminController extends Controller
{
    public function index(): View
    {
        return view('admin.zoo.foods-consum.index');
    }

    public function create(FoodsConsumFormRequest $request): RedirectResponse
    {
        if (Gate::denies('create', FoodConsum::class)) {
            return redirect()->route('dashboard');
        }

        $foodConsum = new FoodConsum();
        $foodConsum->animal_id = $request->animal_id;
        $foodConsum->food_id = $request->food_id;
        $foodConsum->quantity = $request->quantity;
        $foodConsum->unit = $request->unit;
        $foodConsum->user_id = Auth::user()->id;
        $foodConsum->save();

        return redirect()->route('admin.animals')->with(["success" => "La consommation de nourriture a bien été ajoutée."]);
    }

    public function createForm(): View|RedirectResponse
    {
        if (Gate::denies('view', FoodConsum::class)) {
            return redirect()->route('dashboard');
        }
        $animals = Animal::all();
        $foods = Food::all();
        return view('admin.zoo.foods-consum.create', compact('animals', 'foods'));
    }

    public function getFoodConsumedByAnimal($animalId)
    {
        $lastFoodConsumed = FoodConsum::query()
            ->where('animal_id', $animalId)
            ->with('food')
            ->orderByDesc('created_at')
            ->first();
        return response()->json($lastFoodConsumed);
    }


}
