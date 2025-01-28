<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Zoo;
use App\Requests\ServicesFormRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ServicesAdminController extends Controller
{
    public function index(): View
    {
        return view('page.services');
    }

    /**
     * @throws Exception
     */
    public function show(string $name): View|RedirectResponse
    {
        if (Gate::denies('view', Service::class)) {
            return redirect()->route('dashboard');
        }

        $service = Service::query()->where('name', '=', $name)->first();
        if (!$service) {
            throw new Exception("Il n'y a pas de service", 404);
        }
        return view('page.service', compact('service'));
    }

    public function createForm(): View|RedirectResponse
    {
        if (Gate::denies('create', Service::class)) {
            return redirect()->route('dashboard');
        }

        return view('admin.zoo.services.create');
    }

    public function create(ServicesFormRequest $request): RedirectResponse
    {
        if(Gate::denies('create', Service::class)) {
            return redirect()->route('dashboard');
        }

        $zoo = Zoo::query()->where('name', '=', 'Arcadia')->first();
        $path = $request->file('image')->getClientOriginalName();

        $service = new Service();
        $service->zoo_id = $zoo->id;
        $service->name = $request->name;
        $service->description = $request->description;
        $service->image = $path;
        if (!Storage::disk('public')->exists('asset/images')) {
            Storage::disk('public')->makeDirectory("asset/images");
        }
        Storage::disk('public')->putFileAs("asset/images",$request->file('image'), $path);

        $service->save();
        return redirect()->route('dashboard');
    }

    public function edit(string $name): View|RedirectResponse
    {
        if (Gate::denies('update', Service::class)) {
            return redirect()->route('dashboard');
        }
        $service = Service::query()->where('name', '=', $name)->first();
        return view('admin.zoo.services.edit', compact('service'));
    }

    public function update(ServicesFormRequest $request, string $name): RedirectResponse
    {
        if(Gate::denies('update', Service::class)) {
            return redirect()->route('dashboard');
        }

        $zoo = Zoo::query()->where('name', '=', 'Arcadia')->first();
        $service = Service::query()->where('name', '=', $name)->first();
        $path = $request->file('image')->getClientOriginalName();

        $service->zoo_id = $zoo->id;
        $service->name = $request->name;
        $service->description = $request->description;
        $service->image = $path;
        if (!Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->makeDirectory("assets/images");
        }
        Storage::disk('public')->putFileAs("asset/images",$request->file('image'), $path);

        $service->save();
        return redirect()->route('services.create');
    }

    public function delete(string $name): RedirectResponse
    {
        if(Gate::denies('delete', Service::class)) {
            return redirect()->route('dashboard');
        }

        $service = Service::query()->where('name', '=', $name)->first();
        Storage::disk('public')->delete("asset/images/" . $service->image);
        $service->delete();

        return redirect()->route('dashboard');
    }

}
