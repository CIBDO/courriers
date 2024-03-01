<?php

namespace App\Http\Controllers;

use App\Models\Destinataire;
use Illuminate\Http\Request;
use HepplerDotNet\FlashToastr\Flash;

class DestinataireController extends Controller
{
    public function index()
    {
        $destinataires = Destinataire::all();
        return view('pages.destinataires.index', compact('destinataires'));
    }

    public function create()
    {
        return view('destinataires.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_destinataire' => 'required|string|max:255',
        ]);

        Destinataire::create($request->all());
        Flash::info('success', 'Destinataire créé avec succès.');
        return redirect()->route('destinataires.index')
            ->with('success', 'Destinataire créé avec succès.');
    }

    public function show(Destinataire $destinataire)
    {
        return view('destinataires.show', compact('destinataire'));
    }

    public function edit(Destinataire $destinataire)
    {
        return view('pages.destinataires.edit', compact('destinataire'));
    }

    public function update(Request $request, Destinataire $destinataire)
    {
        $request->validate([
            'nom_destinataire' => 'required|string|max:255',
        ]);

        $destinataire->update($request->all());
        Flash::info('success', 'Destinataire mis à jour avec succès.');
        return redirect()->route('destinataires.index')
            ->with('success', 'Destinataire mis à jour avec succès.');
    }

    public function destroy(Destinataire $destinataire)
    {
        $destinataire->delete();
        Flash::info('success', 'Destinataire supprimé avec succès.');
        return redirect()->route('destinataires.index')
            ->with('success', 'Destinataire supprimé avec succès.');
    }
}
