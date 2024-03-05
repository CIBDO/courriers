<?php

namespace App\Http\Controllers;

use App\Models\Expeditaire;
use Illuminate\Http\Request;
use HepplerDotNet\FlashToastr\Flash;


class ExpeditaireController extends Controller
{
    public function index()
    {
        $expeditaires = Expeditaire::all();
        return view('pages.expeditaires.index', compact('expeditaires'));
    }

    public function create()
    {
        return view('expeditaires.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_expeditaire' => 'required|string|max:255',
        ]);

        Expeditaire::create($request->all());
        Flash::info('success', 'Expéditeur créé avec succès.');    
        return redirect()->route('expeditaires.index')
            ->with('success', 'Expéditaire créé avec succès.');
    }

    public function show(Expeditaire $expeditaire)
    {
        return view('expeditaires.show', compact('expeditaire'));
    }

    public function edit(Expeditaire $expeditaire)
    {
        return view('pages.expeditaires.edit', compact('expeditaire'));
    }

    public function update(Request $request, Expeditaire $expeditaire)
    {
        $request->validate([
            'nom_expeditaire' => 'required|string|max:255',
        ]);

        $expeditaire->update($request->all());
        Flash::info('success', 'Expéditeur mis à jour avec succès.');
        return redirect()->route('expeditaires.index')
            ->with('success', 'Expéditaire mis à jour avec succès.');
    }

    public function destroy(Expeditaire $expeditaire)
    {
        $expeditaire->delete();
        Flash::info('success', 'Expéditeur supprimé avec succès.');
        return redirect()->route('expeditaires.index')
            ->with('success', 'Expéditaire supprimé avec succès.');
    }
}
