<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Habitat;
use App\Models\Zoo;
use App\Requests\HabitatsFormRequest;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class HabitatsAdminController extends Controller
{
    public function index(): View|RedirectResponse
    {
        if (Gate::denies('view', Habitat::class))
        {
            return redirect()->route('dashboard');
        }

        $habitats = Habitat::all();
        return view('admin.zoo.habitats.index', compact('habitats'));
    }

    /**
     * @throws Exception
     */
    public function show(string $name): View|RedirectResponse
    {
        if (Gate::denies('view', Habitat::class))
        {
            return redirect()->route('dashboard');
        }
        $habitat = Habitat::query()->where('name','=', $name)->with('animals')->first();
        if (!$habitat){
            throw new Exception("Tu n'as pas d'habitat", 404);
        }
        return view('admin.zoo.habitats.show', compact('habitat'));
    }

    public function create(HabitatsFormRequest $request): RedirectResponse
    {
        if (Gate::denies('create', Habitat::class))
        {
            return redirect()->route('dashboard');
        }

        $zoo = Zoo::query()->where('name', '=', 'Arcadia')->first();
        $path = $request->file('image')->getClientOriginalName();

        $habitat = new Habitat();
        $habitat->zoo_id = $zoo->id;
        $habitat->name = $request->name;
        $habitat->description = $request->description;

        $habitat->image = $path;

        if (!Storage::disk('public')->exists('asset/images')) {
            Storage::disk('public')->makeDirectory('asset/images');
        }
        Storage::disk('public')->putFileAs("asset/images",$request->file('image'), $path);

        $habitat->save();

        return redirect()->route('home');
    }

    public function createForm(): View|RedirectResponse
    {
        if (Gate::denies('create', Habitat::class))
        {
            return redirect()->route('dashboard');
        }
        return view('admin.zoo.habitats.create');
    }

    public function edit(string $name): View|RedirectResponse
    {
        if (Gate::denies('update', Habitat::class))
        {
            return redirect()->route('dashboard');
        }
        $zoo = Zoo::query()->where('name', '=', 'Arcadia')->first();
        $habitat = Habitat::query()->where('name','=', $name)->first();

        return view('admin.zoo.habitats.edit', compact('habitat', 'zoo'));
    }

    public function update(HabitatsFormRequest $request, string $name): RedirectResponse
    {
        if (Gate::denies('update', Habitat::class))
        {
            return redirect()->route('dashboard');
        }

        $zoo = Zoo::query()->where('name', '=', 'Arcadia')->first();
        $habitat = Habitat::query()->where('name', '=', $name)->first();
        $path = $request->file('image')->getClientOriginalName();

        $habitat->zoo_id = $zoo->id;
        $habitat->name = $request->name;
        $habitat->description = $request->description;

        $habitat->image = $path;
        if (!Storage::disk('public')->exists('asset/images')) {
            Storage::disk('public')->makeDirectory('asset/images');
        }
        Storage::disk('public')->putFileAs("asset/images",$request->file('image'), $path);

        $habitat->save();
        return redirect()->route('habitat', ['name' => $habitat->name]);
    }

    public function delete(string $name): RedirectResponse
    {
        if (Gate::denies('delete', Habitat::class))
        {
            return redirect()->route('dashboard');
        }
        $habitat = Habitat::query()->where('name', '=', $name)->first();
        Storage::disk('public')->delete('asset/images/'.$habitat->image);
        $habitat->delete();

        return redirect()->route('home');
    }
}
