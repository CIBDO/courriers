<?php

namespace App\Http\Controllers;

use App\Models\CourrierInterne;
use Illuminate\Http\Request;

class CourrierInterneController extends Controller
{
    public function index()
    {
        $courriersInternes = CourrierInterne::all();
        return view('courriers-internes.index', compact('courriersInternes'));
    }

    public function create()
    {
        return view('courriers-internes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'reference' => 'required|unique:courrier_internes',
            'date_creation' => 'required|date',
            'objet' => 'required|string',
            'id_expeditaire' => 'required|exists:expeditaires,id_expeditaire',
            'id_courrier' => 'required|exists:courriers,id_courrier',
            'id_destinataire' => 'required|exists:destinataires,id_destinataire',
            'id_personnel' => 'required|exists:personnels,id_personnel',
            'nbre_piece' => 'required|integer|min:1',
            'statut' => 'required|in:Envoyé,Rejeté,Traité',
            'charger_courrier' => 'required|string',
            'observation' => 'nullable|string',
        ]);

        CourrierInterne::create($request->all());

        return redirect()->route('courriers-internes.index')
            ->with('success', 'Courrier interne créé avec succès.');
    }

    public function show(CourrierInterne $courrierInterne)
    {
        return view('courriers-internes.show', compact('courrierInterne'));
    }

    public function edit(CourrierInterne $courrierInterne)
    {
        return view('courriers-internes.edit', compact('courrierInterne'));
    }

    public function update(Request $request, CourrierInterne $courrierInterne)
    {
        $request->validate([
            'reference' => 'required|unique:courrier_internes,reference,' . $courrierInterne->id_courrierinterne . ',id_courrierinterne',
            'date_creation' => 'required|date',
            'objet' => 'required|string',
            'id_expeditaire' => 'required|exists:expeditaires,id_expeditaire',
            'id_courrier' => 'required|exists:courriers,id_courrier',
            'id_destinataire' => 'required|exists:destinataires,id_destinataire',
            'id_personnel' => 'required|exists:personnels,id_personnel',
            'nbre_piece' => 'required|integer|min:1',
            'statut' => 'required|in:Envoyé,Rejeté,Traité',
            'charger_courrier' => 'required|string',
            'observation' => 'nullable|string',
        ]);

        $courrierInterne->update($request->all());

        return redirect()->route('courriers-internes.index')
            ->with('success', 'Courrier interne mis à jour avec succès.');
    }

    public function destroy(CourrierInterne $courrierInterne)
    {
        $courrierInterne->delete();

        return redirect()->route('courriers-internes.index')
            ->with('success', 'Courrier interne supprimé avec succès.');
    }
}
