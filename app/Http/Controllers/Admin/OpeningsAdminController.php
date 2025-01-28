<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Opening;
use App\Models\Zoo;
use App\Requests\OpeningsFormRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class OpeningsAdminController extends Controller
{
    public function index(): View|RedirectResponse
    {
        if (Gate::denies('view', Opening::class)) {
            return redirect()->route('dashboard');
        }
        return view('home');
    }

    /**
     * @throws Exception
     */
    public function show(string $day_open): View|RedirectResponse
    {
        if (Gate::denies('view', Opening::class)) {
            return redirect()->route('dashboard');
        }

        $openings = Opening::query()->where('day_open', $day_open)->first();
        if (!$openings) {
            throw new Exception("Il n'y a pas d'horaires", 404);
        }
        return view('admin.zoo.openings.create', compact('openings'));
    }

    public function create(OpeningsFormRequest $request): RedirectResponse
    {
        if (Gate::denies('create', Opening::class)) {
            return redirect()->route('dashboard');
        }

        $zoo = Zoo::query()->where('name', '=', 'Arcadia')->first();

        $opening = new Opening();
        $opening->zoo_id = $zoo->id;
        $opening->day_open = $request->day_open;
        $opening->hour_open = $request->hour_open;
        $opening->hour_close = $request->hour_close;

        $opening->save();

        return redirect()->route('home');
    }

    public function createForm(): View|RedirectResponse
    {
        if (Gate::denies('create', Opening::class)) {
            return redirect()->route('dashboard');
        }

        return view('admin.zoo.openings.create');
    }

    public function edit(string $day_open): View|RedirectResponse
    {
        if (Gate::denies('update', Opening::class)) {
            return redirect()->route('dashboard');
        }

        $zoo = Zoo::query()->where('name', '=', 'Arcadia')->first();
        $opening = Opening::query()->where('day_open', '=', $day_open)->first();

        return view('admin.zoo.openings.edit', compact('opening', 'zoo'));
    }

    public function update(OpeningsFormRequest $request, string $day_open): RedirectResponse
    {
        if (Gate::denies('update', Opening::class)) {
            return redirect()->route('dashboard');
        }

        $zoo = Zoo::query()->where('name', '=', 'Arcadia')->first();
        $opening = Opening::query()->where('day_open', '=', $day_open)->first();

        $opening->zoo_id = $zoo->id;
        $opening->day_open = $request->day_open;
        $opening->hour_open = $request->hour_open;
        $opening->hour_close = $request->hour_close;

        $opening->save();

        return redirect()->route('home');
    }

    public function delete(string $day_open): RedirectResponse
    {
        if (Gate::denies('delete', Opening::class)) {
            return redirect()->route('dashboard');
        }

        $opening = Opening::query()->where('day_open', '=', $day_open)->first();
        $opening->delete();
        return redirect()->route('home');
    }
}
