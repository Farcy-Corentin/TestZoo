<?php

namespace App\Http\Controllers;

use App\Models\Habitat;
use Exception;
use Illuminate\Contracts\View\View;

class HabitatsController extends Controller
{
    public function index(): View
    {
        $habitats = Habitat::all();
        return view('page.habitats', compact('habitats'));
    }

    /**
     * @throws Exception
     */
    public function show(string $name): View
    {
        $habitat = Habitat::query()->where('name','=', $name)->with('animals')->first();
        if (!$habitat){
            throw new Exception("Tu n'as pas d'habitat", 404);
        }
        return view('page.habitat', compact('habitat'));
    }
}
