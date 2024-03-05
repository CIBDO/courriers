<?php

namespace App\Http\Controllers;

use App\Models\ReceptionCourrier;
use Illuminate\Http\Request;

class ReceptionCourrierController extends Controller
{
    public function index()
    {
        $receptionCourriers = ReceptionCourrier::all();
        return view('reception-courriers.index', compact('receptionCourriers'));
    }

    public function create()
    {
        return view('reception-courriers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'reference' => 'required|unique:reception_courriers',
            'priorite' => 'required|in:Simple,Urgente,Autre',
            'confidentialite' => 'required|in:Oui,Non',
            'date_courrier' => 'required|date',
            'date_arrivee' => 'required|date',
            'expeditaire' => 'required|string',
            'id_courrier' => 'required|exists:courriers,id_courrier',
            'id_service' => 'required|exists:services,id_service',
            'id_personnel' => 'required|exists:personnels,id_personnel',
            'objet_courrier' => 'required|string',
            'nbre_piece' => 'required|integer|min:1',
            'charger_courrier' => 'required|string',
            'statut' => 'required|in:Traité,Reçu,en cours de traitement,Rejeté',
        ]);

        ReceptionCourrier::create($request->all());

        return redirect()->route('reception-courriers.index')
            ->with('success', 'Courrier réceptionné avec succès.');
    }

    public function show(ReceptionCourrier $receptionCourrier)
    {
        return view('reception-courriers.show', compact('receptionCourrier'));
    }

    public function edit(ReceptionCourrier $receptionCourrier)
    {
        return view('reception-courriers.edit', compact('receptionCourrier'));
    }

    public function update(Request $request, ReceptionCourrier $receptionCourrier)
    {
        $request->validate([
            'reference' => 'required|unique:reception_courriers,reference,' . $receptionCourrier->id_courrier_reception . ',id_courrier_reception',
            'priorite' => 'required|in:Simple,Urgente,Autre',
            'confidentialite' => 'required|in:Oui,Non',
            'date_courrier' => 'required|date',
            'date_arrivee' => 'required|date',
            'expeditaire' => 'required|string',
            'id_courrier' => 'required|exists:courriers,id_courrier',
            'id_service' => 'required|exists:services,id_service',
            'id_personnel' => 'required|exists:personnels,id_personnel',
            'objet_courrier' => 'required|string',
            'nbre_piece' => 'required|integer|min:1',
            'charger_courrier' => 'required|string',
            'statut' => 'required|in:Traité,Reçu,en cours de traitement,Rejeté',
        ]);

        $receptionCourrier->update($request->all());

        return redirect()->route('reception-courriers.index')
            ->with('success', 'Courrier réceptionné mis à jour avec succès.');
    }

    public function destroy(ReceptionCourrier $receptionCourrier)
    {
        $receptionCourrier->delete();

        return redirect()->route('reception-courriers.index')
            ->with('success', 'Courrier réceptionné supprimé avec succès.');
    }
}
