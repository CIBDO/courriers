<?php

namespace App\Http\Controllers;

use App\Models\BordereauEnvoi;
use Illuminate\Http\Request;

class BordereauEnvoiController extends Controller
{
    public function index()
    {
        $bordereauEnvois = BordereauEnvoi::all();
        return view('bordereau_envois.index', compact('bordereauEnvois'));
    }

    public function create()
    {
        return view('bordereau_envois.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'reference_bordereau' => 'required|string',
            'date_bordereau' => 'required|date',
            'id_courrier' => 'required|exists:courriers,id',
            'designation' => 'required|string',
            'destinateur' => 'required|string',
            'id_disposition' => 'required|exists:dispositions,id',
            'id_signataire' => 'required|exists:signataires,id',
            'nbre_piece' => 'required|integer',
            'charger_courrier' => 'string',
        ]);

        BordereauEnvoi::create($request->all());

        return redirect()->route('bordereau_envois.index')
            ->with('success', 'Bordereau d\'envoi créé avec succès.');
    }

    public function edit(BordereauEnvoi $bordereauEnvoi)
    {
        return view('bordereau_envois.edit', compact('bordereauEnvoi'));
    }

    public function update(Request $request, BordereauEnvoi $bordereauEnvoi)
    {
        $request->validate([
            'reference_bordereau' => 'required|string',
            'date_bordereau' => 'required|date',
            'id_courrier' => 'required|exists:courriers,id',
            'designation' => 'required|string',
            'destinateur' => 'required|string',
            'id_disposition' => 'required|exists:dispositions,id',
            'id_signataire' => 'required|exists:signataires,id',
            'nbre_piece' => 'required|integer',
            'charger_courrier' => 'string',
        ]);

        $bordereauEnvoi->update($request->all());

        return redirect()->route('bordereau_envois.index')
            ->with('success', 'Bordereau d\'envoi mis à jour avec succès');
    }

    public function destroy(BordereauEnvoi $bordereauEnvoi)
    {
        $bordereauEnvoi->delete();

        return redirect()->route('bordereau_envois.index')
            ->with('success', 'Bordereau d\'envoi supprimé avec succès');
    }
}
