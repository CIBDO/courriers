<?php

namespace App\Http\Controllers;

use App\Models\BordereauEnvoi;
use Illuminate\Http\Request;

class BordereauEnvoiController extends Controller
{
    public function index()
    {
        $bordereauEnvois = BordereauEnvoi::all();
        return view('bordereau-envois.index', compact('bordereauEnvois'));
    }

    public function create()
    {
        return view('bordereau-envois.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'reference_bordereau' => 'required|unique:bordereau_envois',
            'date_bordereau' => 'required|date',
            'priorite' => 'required|in:Simple,Urgente,Autre',
            'confidentialite' => 'required|in:Oui,Non',
            'id_courrier' => 'required|exists:courriers,id_courrier',
            'designation' => 'required|string',
            'destinateur' => 'required|string',
            'id_disposition' => 'required|exists:dispositions,id_disposition',
            'id_signataire' => 'required|exists:signataires,id_signataire',
            'nbre_piece' => 'required|integer|min:1',
            'statut' => 'required|in:Envoyé,Rejeté',
            'charger_courrier' => 'required|string',
        ]);

        BordereauEnvoi::create($request->all());

        return redirect()->route('bordereau-envois.index')
            ->with('success', 'Bordereau d\'envoi créé avec succès.');
    }

    public function show(BordereauEnvoi $bordereauEnvoi)
    {
        return view('bordereau-envois.show', compact('bordereauEnvoi'));
    }

    public function edit(BordereauEnvoi $bordereauEnvoi)
    {
        return view('bordereau-envois.edit', compact('bordereauEnvoi'));
    }

    public function update(Request $request, BordereauEnvoi $bordereauEnvoi)
    {
        $request->validate([
            'reference_bordereau' => 'required|unique:bordereau_envois,reference_bordereau,' . $bordereauEnvoi->id_bordereau . ',id_bordereau',
            'date_bordereau' => 'required|date',
            'priorite' => 'required|in:Simple,Urgente,Autre',
            'confidentialite' => 'required|in:Oui,Non',
            'id_courrier' => 'required|exists:courriers,id_courrier',
            'designation' => 'required|string',
            'destinateur' => 'required|string',
            'id_disposition' => 'required|exists:dispositions,id_disposition',
            'id_signataire' => 'required|exists:signataires,id_signataire',
            'nbre_piece' => 'required|integer|min:1',
            'statut' => 'required|in:Envoyé,Rejeté',
            'charger_courrier' => 'required|string',
        ]);

        $bordereauEnvoi->update($request->all());

        return redirect()->route('bordereau-envois.index')
            ->with('success', 'Bordereau d\'envoi mis à jour avec succès.');
    }

    public function destroy(BordereauEnvoi $bordereauEnvoi)
    {
        $bordereauEnvoi->delete();

        return redirect()->route('bordereau-envois.index')
            ->with('success', 'Bordereau d\'envoi supprimé avec succès.');
    }
}
