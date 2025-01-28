<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Exception;
use Illuminate\View\View;

class AnimalsController extends Controller
{
    public function index(): View
    {
        $animals = Animal::all()->sortBy('name');
        return view('page.animals', compact('animals'));
    }

    /**
     * @throws Exception
     */
    public function show(string $name): View
    {
        $animal = Animal::query()->where('name', '=', $name)->with('habitat')->first();
        if (!$animal) {
            throw new Exception("Il n'y a pas d'animal avec le nom $name", 404);
        }
        return view('page.animal-sheet', compact('animal'));
    }
}
