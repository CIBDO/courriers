<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        $profils = Profil::all();
        return view('profils.index', compact('profils'));
    }

    public function create()
    {
        return view('profils.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_profil' => 'required|string',
        ]);

        Profil::create($request->all());

        return redirect()->route('profils.index')
            ->with('success', 'Profil créé avec succès.');
    }

    public function edit(Profil $profil)
    {
        return view('profils.edit', compact('profil'));
    }

    public function update(Request $request, Profil $profil)
    {
        $request->validate([
            'nom_profil' => 'required|string',
        ]);

        $profil->update($request->all());

        return redirect()->route('profils.index')
            ->with('success', 'Profil mis à jour avec succès.');
    }

    public function destroy(Profil $profil)
    {
        $profil->delete();

        return redirect()->route('profils.index')
            ->with('success', 'Profil supprimé avec succès.');
    }
}
