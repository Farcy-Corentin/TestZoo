<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Zoo;
use App\Requests\ZooFormRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

class ZooAdminController extends Controller
{
    public function create(ZooFormRequest $request): RedirectResponse
    {
        if (Gate::denies('create', Zoo::class)) {
            return redirect()->route('dashboard');
        }

        $zoo = new Zoo();
        $zoo->name = $request->name;
        $zoo->description = $request->description;

        $zoo->save();

        return redirect()->route('home');
    }

    public function createForm(): View|RedirectResponse
    {
        if (Gate::denies('create', Zoo::class)) {
            return redirect()->route('dashboard');
        }
        return view('admin.zoo.create');
    }

    public function delete(string $name): RedirectResponse
    {
        if (Gate::denies('delete', Zoo::class)) {
            return redirect()->route('dashboard');
        }

        $zoo = Zoo::query()->where('name', $name)->first();
        $zoo->delete();

        return redirect()->route('dashboard');
    }
}
