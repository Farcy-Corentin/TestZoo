<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\Food;
use App\Models\Habitat;
use App\Requests\AnimalsFormRequest;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AnimalsAdminController extends Controller
{
    public function index(): View|RedirectResponse
    {
        if (Gate::denies('view', Animal::class)) {
            return redirect()->route('dashboard');
        }

        $animals = Animal::all();
        $animalData = [];

        foreach ($animals as $animal) {
            $animalData[] = $this->transformAnimal($animal);
        }

        $animals = $animalData;

        return view('admin.zoo.animals.index', compact('animals'));
    }

    /**
     * @throws Exception
     */
    public function show(string $name): View|RedirectResponse
    {
        if (Gate::denies('view', Animal::class)) {
            return redirect()->route('dashboard');
        }
       $animal = Animal::query()->where('name', '=', $name)->first();
       if (!$animal) {
           throw new Exception("Il n'y a pas d'animal", 404);
       }
       return view('page.animal', compact('animal'));
    }

    public function create(AnimalsFormRequest $request): RedirectResponse
    {
        if (Gate::denies('create', Animal::class)) {
            return redirect()->route('dashboard');
        }

        $path = $request->file('image')->getClientOriginalName();

        $animal = new Animal();
        $animal->habitat_id = $request->habitat_id;
        $animal->name = $request->name;
        $animal->breed = $request->breed;
        $animal->description = $request->description;

        $animal->image = $path;

        if (!Storage::disk('public')->exists('asset/images')) {
            Storage::disk('public')->makeDirectory("assets/images");
        }
        Storage::disk('public')->putFileAs("asset/images",$request->file('image'), $path);

        $animal->save();
        return redirect()->route('home');
    }

    public function createForm(): View|RedirectResponse
    {
        if (Gate::denies('create', Animal::class)) {
            return redirect()->route('dashboard');
        }

        $habitats = Habitat::all();
        return view ('admin.zoo.animals.create', compact('habitats'));
    }

    /**
     * @throws Exception
     */
    public function edit(string $name): View|RedirectResponse
    {
        if (Gate::denies('update', Animal::class)) {
            return redirect()->route('dashboard');
        }

        $animal = Animal::query()->where('name', '=', $name)->first();
        $habitats = Habitat::all();

        return view('admin.zoo.animals.edit', compact('animal', 'habitats'));
    }

    public function update(AnimalsFormRequest $request, string $name): RedirectResponse
    {
        if (Gate::denies('update', Animal::class)) {
            return redirect()->route('dashboard');
        }

        $path = $request->file('image')->getClientOriginalName();
        $animal = Animal::query()->where('name', '=', $name)->first();

        $animal->habitat_id = $request->habitat_id;
        $animal->name = $request->name;
        $animal->breed = $request->breed;
        $animal->image = $path;
        $animal->description = $request->description;
        if (!Storage::disk('public')->exists('asset/images')) {
            Storage::disk('public')->makeDirectory('asset/images');
        }
        Storage::disk('public')->putFileAs("asset/images",$request->file('image'), $path);

        $animal->save();
        return redirect()->route('home');
    }

    public function delete(string $name): RedirectResponse
    {
        if (Gate::denies('delete', Animal::class)) {
            return redirect()->route('dashboard');
        }
        $animal = Animal::query()->where('name', '=', $name)->first();
        Storage::disk('public')->delete('asset/images/' .$animal->image);
        $animal->delete();

        return redirect()->route('home');
    }

    private function transformAnimal(Animal $animal): array
    {
        $foods = Food::all();
        // Get the last foodsConsum and last veterinarianReport to add property of animal.
        $lastFoodConsum = $animal->foodsConsum->sortByDesc('created_at')->first();
        $lastVeterinarianReport = $animal->veterinarianReports->sortByDesc('created_at')->first();
        if ($lastFoodConsum) {
            $food = $foods->where('id', '=', $lastFoodConsum->food_id)->first();
            $lastFoodConsum->food = $food;
        }

        return [
            'id' => $animal->id,
            'habitat' => $animal->habitat,
            'name' => $animal->name,
            'breed' => $animal->breed,
            'image' => $animal->image,
            'description' => $animal->description,
            'lastFoodConsum' => $lastFoodConsum,
            'lastVeterinarianReport' => [
                'animal_state' => $lastVeterinarianReport->animal_state,
                'created_at' => Carbon::parse($lastVeterinarianReport->created_at)->format('d-m-Y'),
                'veterinarian_name' => $lastVeterinarianReport->user->name,
            ],
        ];
    }

}
