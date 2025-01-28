<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class LegalNoticesController extends Controller
{
    public function show(): View
    {
        return view('page.legal-notices');
    }
}
