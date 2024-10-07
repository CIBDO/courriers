<?php

namespace App\Http\Controllers;

use App\Models\Structure;
use Illuminate\Http\Request;
use HepplerDotNet\FlashToastr\Flash;

class StructureController extends Controller
{
    // Affiche la liste des structures
    public function index()
    {
        $structures = Structure::all();
        return view('pages.structures.index', compact('structures'));
    }

    // Affiche le formulaire pour créer une nouvelle structure
    public function create()
    {
        return view('pages.structures.create');
    }

    // Stocke une nouvelle structure dans la base de données
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_structure' => 'required|string|max:255',
            'ministere_tutelle' => 'nullable|string|max:255',
            'direction_tutelle' => 'nullable|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'logo' => 'nullable|string|max:255',
        ]);

        Structure::create($validated);
        Flash::info('success', 'Structure créée avec succès.'); 
        return redirect()->route('structures.index')
            ->with('success', 'Structure créée avec succès.');
    }

    // Affiche une structure particulière
    public function show($id)
    {
        $structure = Structure::findOrFail($id);
        return view('pages.structures.show', compact('structure'));
    }

    // Affiche le formulaire pour éditer une structure
    public function edit($id)
    {
        $structure = Structure::findOrFail($id);
        
        return view('pages.structures.edit', compact('structure'));
    }

    // Met à jour une structure existante dans la base de données
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom_structure' => 'required|string|max:255',
            'ministere_tutelle' => 'nullable|string|max:255',
            'direction_tutelle' => 'nullable|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'logo' => 'nullable|string|max:255',
        ]);

        $structure = Structure::findOrFail($id);
        $structure->update($validated);
        Flash::info('success', 'Structure mise à jour avec succès.');
        return redirect()->route('structures.index')
            ->with('success', 'Structure mise à jour avec succès.');
    }

    // Supprime une structure de la base de données
    public function destroy($id)
    {
        $structure = Structure::findOrFail($id);
        $structure->delete();
        Flash::info('success', 'Structure supprimée avec succès.');
        return redirect()->route('structures.index')
            ->with('success', 'Structure supprimée avec succès.');
    }
}
