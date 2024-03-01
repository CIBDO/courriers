<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use HepplerDotNet\FlashToastr\Flash;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('pages.services.index', compact('services'));
    }

    public function create()
    {
        return view('pages.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_service' => 'required|string',
        ]);

        Service::create($request->all());
        Flash::info('success', 'Service crée avec success.');
        return redirect()->route('services.index')
            ->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('pages.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'nom_service' => 'required|string',
        ]);

        $service->update($request->all());
        Flash::info('success', 'Service mis à jour avec success.');
        return redirect()->route('services.index')
            ->with('success', 'Service updated successfully');
    }

    public function destroy(Service $service )
    {
        $service->delete();
        Flash::info('success', 'Service supprimé avec success.');
        return redirect()->route('services.index')
            ->with('success', 'Service deleted successfully');
    }
}