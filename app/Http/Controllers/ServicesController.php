<?php

namespace App\Http\Controllers;

use App\Models\Service;

use Illuminate\View\View;

class ServicesController extends Controller
{
    public function index(): View
    {
        $services = Service::all();
        $cover = $services->random()->image;
        return view('page.services', compact('services', 'cover'));
    }
}
