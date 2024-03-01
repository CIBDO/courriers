<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\Service;
use App\Models\Profil;
use Illuminate\Http\Request;
use HepplerDotNet\FlashToastr\Flash;

class PersonnelController extends Controller
{
    public function index()
    {
        $personnels = Personnel::all();
        $services = Service::all();
        return view('pages.personnels.index', compact('personnels','services'));
    }

    public function create()
    {
        return view('personnels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_personnel' => 'required|string',
            'prenom_personnel' => 'required|string',
            'Matricule' => 'required|string',
            'grade' => 'required|string',
            'corps' => 'required|string',
            'id_service' => 'required|exists:services,id_service',
        ]);

        Personnel::create($request->all());
        Flash::info('success', 'Personnel créé avec succès.');
        return redirect()->route('personnels.index')
            ->with('success', 'Personnel créé avec succès.');
    }

    public function edit(Personnel $personnel)
    {
        $services = Service::all();
        return view('pages.personnels.edit', compact('personnel','services'));
    }

    public function update(Request $request, Personnel $personnel)
    {
        $request->validate([
            'nom_personnel' => 'required|string',
            'prenom_personnel' => 'required|string',
            'Matricule' => 'required|string',
            'grade' => 'required|string',
            'corps' => 'required|string',
            'id_service' => 'required|exists:services,id_service',
        ]);

        $personnel->update($request->all());
        Flash::info('success', 'Personnel mis à jour avec succès');
        return redirect()->route('personnels.index')
            ->with('success', 'Personnel mis à jour avec succès');
    }

    public function destroy(Personnel $personnel)
    {
        $personnel->delete();
        Flash::info('success', 'Personnel supprimé avec succès');
        return redirect()->route('personnels.index')
            ->with('success', 'Personnel supprimé avec succès');
    }
}
