<?php

namespace App\Http\Controllers;

use App\Models\CourrierInterne;
use App\Models\Courrier;
use App\Models\Service;
use App\Models\Personnel;
use App\Models\Signataire;
use App\Models\Disposition;
use Illuminate\Http\Request;
use HepplerDotNet\FlashToastr\Flash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
class CourrierInterneController extends Controller
{
    public function index(Request $request)
    {
        $query = CourrierInterne::query();
        // Filtrer par référence si le champ est renseigné
    if ($request->filled('reference')) {
        $query->where('reference', 'like', '%' . $request->input('reference') . '%');
    }

    // Filtrer par expéditeur si le champ est renseigné
    if ($request->filled('nom_service')) {
        $query->where('nom_service', 'like', '%' . $request->input('nom_service') . '%');
    }

    // Filtrer par date d'arrivée si le champ est renseigné
    if ($request->filled('date_creation')) {
        $query->whereDate('date_creation', $request->input('date_creation'));
    }

    // Filtrer par nature du courrier si le champ est renseigné
    if ($request->filled('type_courrier')) {
        $query->where('type_courrier', 'like', '%' . $request->input('type_courrier') . '%');
    }

    // Filtrer par statut si le champ est renseigné
    /* if ($request->filled('statut')) {
        $query->where('statut', 'like', '%' . $request->input('statut') . '%');
    } */
    $query->orderByDesc('date_creation');

    $courriersInternes = $query->paginate(8); 

    $services = Service::all();
    $courriers = Courrier::all();
    $personnels = Personnel::all();
    $dispositions = Disposition::all();
    $signataires = Signataire::all();
    $courriersInternes = CourrierInterne::all();
    $courriersInternes = CourrierInterne::paginate(8);
    return view('pages.courriers-internes.index', compact('courriersInternes','services','personnels','courriers','signataires','dispositions'));
    }

    public function create()
    {

    $services = Service::all();
    $courriers = Courrier::all();
    $personnels = Personnel::all();
    $dispositions = Disposition::all();
    $signataires = Signataire::all();
    return view('pages.courriers-internes.create', compact('services','personnels','courriers','signataires','dispositions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reference' => 'required|unique:courrier_internes',
            'date_creation' => 'required|date',
            'objet' => 'required|string',
            'id_signataire' => 'required|exists:signataires,id_signataire',
            'id_courrier' => 'required|exists:courriers,id_courrier',
            'id_service' => 'required|exists:services,id_service',
            'id_personnel' => 'required|exists:personnels,id_personnel',
            'id_disposition' => 'required|exists:dispositions,id_disposition',
            'nbre_piece' => 'required|integer|min:1',
            'statut' => 'required|in:Envoyé,Rejeté,Traité',
            'charger_courrier' => 'file|mimes:pdf|max:2048',
            'observation' => 'nullable|string',
        ]);
    
        if ($request->hasFile('charger_courrier')) {
            $file = $request->file('charger_courrier');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/fichier/courrier', $fileName);
        }
    
        $courrierInterne = new CourrierInterne();
        $courrierInterne->reference = $request->reference;
        $courrierInterne->date_creation = $request->date_creation;
        $courrierInterne->objet = $request->objet;
        $courrierInterne->id_signataire = $request->id_signataire;
        $courrierInterne->id_courrier = $request->id_courrier;
        $courrierInterne->id_service = $request->id_service;
        $courrierInterne->id_personnel = $request->id_personnel;
        $courrierInterne->id_disposition = $request->id_disposition;
        $courrierInterne->nbre_piece = $request->nbre_piece;
        $courrierInterne->statut = $request->statut;
        $courrierInterne->charger_courrier = $filePath ?? null; 
        $courrierInterne->observation = $request->observation;
    
        $courrierInterne->save(); 
    
        Flash::info('success', 'Courrier réceptionné avec succès.');
        return redirect()->route('reception_courriers.create')
            ->with('success', 'Courrier réceptionné avec succès.'); 
    }
    

    public function show($id_courrierinterne)
    {

    $services = Service::all();
    $courriers = Courrier::all();
    $personnels = Personnel::all();
    $dispositions = Disposition::all();
    $signataires = Signataire::all();
    $courrierInterne = CourrierInterne::findOrFail($id_courrierinterne);
    return view('pages.courriers-internes.show', compact('courrierInterne','services','personnels','courriers','signataires','dispositions'));
    }

    public function edit($id_courrierinterne)
    {
    $services = Service::all();
    $courriers = Courrier::all();
    $personnels = Personnel::all();
    $dispositions = Disposition::all();
    $signataires = Signataire::all();
    $courrierInterne = CourrierInterne::findOrFail($id_courrierinterne);
    return view('pages.courriers-internes.edit', compact('courrierInterne','services','personnels','courriers','signataires','dispositions'));
    }

    public function update(Request $request, CourrierInterne $courrierInterne)
    {
        $request->validate([
            'reference' => 'required|unique:courrier_internes,reference,' . $courrierInterne->id_courrierinterne . ',id_courrierinterne',
            'date_creation' => 'required|date',
            'objet' => 'required|string',
            'id_signataire' => 'required|exists:signataires,id_signataire',
            'id_courrier' => 'required|exists:courriers,id_courrier',
            'id_service' => 'required|exists:services,id_service',
            'id_personnel' => 'required|exists:personnels,id_personnel',
            'id_disposition' => 'required|exists:dispositions,id_disposition',
            'nbre_piece' => 'required|integer|min:1',
            'statut' => 'required|in:Envoyé,Rejeté,Traité',
            'charger_courrier' => 'file|mimes:pdf|max:2048',
            'observation' => 'nullable|string',
        ]);

         // Traitement du fichier chargé
         if ($request->hasFile('charger_courrier')) {
            if ($courrierInterne->charger_courrier) {
                Storage::delete('public/fichier/courrier/' . basename($courrierInterne->charger_courrier));
            }

            $file = $request->file('charger_courrier');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/fichier/courrier', $fileName);
        }

        $courrierInterne->update($request->all());
        Flash::info('success', 'Courrier réceptionné mis à jour avec succès.');
        return redirect()->route('courrier-internes.index')
            ->with('success', 'Courrier réceptionné mis à jour avec succès.');
    
           }

    public function destroy( $id_courrierinterne)
    {
        $courrierInterne = CourrierInterne::findOrFail($id_courrierinterne);

    // Supprimer le fichier si nécessaire
    if ($courrierInterne->charger_courrier) {
        Storage::delete('public/fichier/courrier/' . basename($courrierInterne->charger_courrier));
    }

    $courrierInterne->delete();

    Flash::info('success', 'Courrier réceptionné supprimé avec succès.');
    return redirect()->route('reception_courriers.index')->with('success', 'Courrier réceptionné supprimé avec succès.');
    }
}
