<?php

namespace App\Http\Controllers;

use App\Models\ReceptionCourrier;
use App\Models\Courrier;
use Illuminate\Http\Request;

class ReceptionCourrierController extends Controller
{
    public function index()
    {
        $receptionCourriers = ReceptionCourrier::all();
        return view('reception_courriers.index', compact('receptionCourriers'));
    }

    public function create()
    {
        return view('reception_courriers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'reference' => 'required|string',
            'priorite' => 'required|in:Simple,Urgente,Autre',
            'confidentialite' => 'required|in:Oui,Non',
            'date_courrier' => 'required|date',
            'date_arrivee' => 'required|date',
            'expeditaire' => 'required|string',
            'id_courrier' => 'required|exists:courriers,id',
            'objet_courrier' => 'required|string',
            'nbre_piece' => 'required|integer',
            'charger_courrier' => 'string',
            'statut' => 'required|in:À traiter,Rejeter',
        ]);

        ReceptionCourrier::create($request->all());

        return redirect()->route('reception_courriers.index')
            ->with('success', 'Courrier de réception créé avec succès.');
    }

    public function edit(ReceptionCourrier $receptionCourrier)
    {
        return view('reception_courriers.edit', compact('receptionCourrier'));
    }

    public function update(Request $request, ReceptionCourrier $receptionCourrier)
    {
        $request->validate([
            'reference' => 'required|string',
            'priorite' => 'required|in:Simple,Urgente,Autre',
            'confidentialite' => 'required|in:Oui,Non',
            'date_courrier' => 'required|date',
            'date_arrivee' => 'required|date',
            'expeditaire' => 'required|string',
            'id_courrier' => 'required|exists:courriers,id',
            'objet_courrier' => 'string',
            'nbre_piece' => 'required|integer',
            'charger_courrier' => 'required|string',
            'statut' => 'required|in:À traiter,Rejeter',
        ]);

        $receptionCourrier->update($request->all());

        return redirect()->route('reception_courriers.index')
            ->with('success', 'Courrier de réception mis à jour avec succès');
    }

    public function destroy(ReceptionCourrier $receptionCourrier)
    {
        $receptionCourrier->delete();

        return redirect()->route('reception_courriers.index')
            ->with('success', 'Courrier de réception supprimé avec succès');
    }
}
