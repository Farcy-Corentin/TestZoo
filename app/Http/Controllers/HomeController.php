<?php

namespace App\Http\Controllers;

use App\Models\Habitat;
use App\Models\Opening;
use App\Models\Service;
use App\Models\Zoo;
use Exception;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * @throws Exception
     */
    public function index(): View
    {
        $zoo = Zoo::query()->where('name','=','Arcadia')->first();
        if (!$zoo){
            throw new Exception("Tu n'as pas de zoo", 404);
        }

        $habitats = Habitat::query()->where('zoo_id', '=', $zoo->id)->get();
        $services = Service::query()->where('zoo_id', '=', $zoo->id)->get();
        $openings = Opening::query()->where('zoo_id', '=', $zoo->id)->get();

        return view('home', compact('zoo', 'habitats', 'services', 'openings'));
    }
}
