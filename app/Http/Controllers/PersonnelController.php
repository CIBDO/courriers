<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\Service;
use App\Models\Profil;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    public function index()
    {
        $personnels = Personnel::all();
        return view('personnels.index', compact('personnels'));
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
            'mot_de_passe' => 'required|string',
            'id_profil' => 'required|exists:profils,id',
            'id_service' => 'required|exists:services,id',
        ]);

        Personnel::create($request->all());

        return redirect()->route('personnels.index')
            ->with('success', 'Personnel créé avec succès.');
    }

    public function edit(Personnel $personnel)
    {
        return view('personnels.edit', compact('personnel'));
    }

    public function update(Request $request, Personnel $personnel)
    {
        $request->validate([
            'nom_personnel' => 'required|string',
            'prenom_personnel' => 'required|string',
            'Matricule' => 'required|string',
            'grade' => 'required|string',
            'corps' => 'required|string',
            'mot_de_passe' => 'required|string',
            'id_profil' => 'required|exists:profils,id',
            'id_service' => 'required|exists:services,id',
        ]);

        $personnel->update($request->all());

        return redirect()->route('personnels.index')
            ->with('success', 'Personnel mis à jour avec succès');
    }

    public function destroy(Personnel $personnel)
    {
        $personnel->delete();

        return redirect()->route('personnels.index')
            ->with('success', 'Personnel supprimé avec succès');
    }
}
