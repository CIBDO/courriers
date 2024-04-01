<?php

namespace App\Http\Controllers;

use App\Models\ReceptionCourrier;
use App\Models\Courrier;
use App\Models\Service;
use App\Models\Personnel;
use Illuminate\Http\Request;
use HepplerDotNet\FlashToastr\Flash;
use Dompdf\Dompdf;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;

class ReceptionCourrierController extends Controller
{
    public function index(Request $request)
{
    $query = ReceptionCourrier::query();

    // Filtrer par référence si le champ est renseigné
    if ($request->filled('reference')) {
        $query->where('reference', 'like', '%' . $request->input('reference') . '%');
    }

    // Filtrer par expéditeur si le champ est renseigné
    if ($request->filled('expeditaire')) {
        $query->where('expeditaire', 'like', '%' . $request->input('expeditaire') . '%');
    }

    // Filtrer par date d'arrivée si le champ est renseigné
    if ($request->filled('date_arrivee')) {
        $query->whereDate('date_arrivee', $request->input('date_arrivee'));
    }

    // Filtrer par date du courrier si le champ est renseigné
    if ($request->filled('date_courrier')) {
        $query->whereDate('date_courrier', $request->input('date_courrier'));
    }

    // Filtrer par nature du courrier si le champ est renseigné
    if ($request->filled('type_courrier')) {
        $query->where('type_courrier', 'like', '%' . $request->input('type_courrier') . '%');
    }

    // Filtrer par statut si le champ est renseigné
    if ($request->filled('statut')) {
        $query->where('statut', 'like', '%' . $request->input('statut') . '%');
    }
    $query->orderByDesc('date_arrivee');

    $receptionCourriers = $query->paginate(8); 
    // Exécuter la requête et obtenir les résultats
    /* $receptionCourriers = $query->get(); */
    $services = Service::all();
    $courriers = Courrier::all();
    $personnels = Personnel::all();
    $receptionCourriersWithImputations = ReceptionCourrier::with('imputations')->get();
    return view('pages.reception_courriers.index', compact('receptionCourriers', 'services', 'courriers', 'personnels','receptionCourriersWithImputations'));
}


    public function create()
    {
        $services = Service::all();
        $courriers = Courrier::all();
        $personnels = Personnel::all();
        return view('pages.reception_courriers.create' ,compact( 'services', 'courriers','personnels'));
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
            'charger_courrier' => 'file|mimes:pdf|max:2048',
            'statut' => 'required|in:Traité,Reçu,en cours de traitement,Rejeté',
        ]);
        if ($request->hasFile('charger_courrier')) {
            $file = $request->file('charger_courrier');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/fichier/courrier', $fileName);
        }
    
        // Créer le courrier et lier le fichier
        $receptionCourrier = new ReceptionCourrier();
        $receptionCourrier->reference = $request->reference;
        $receptionCourrier->priorite = $request->priorite;
        $receptionCourrier->confidentialite = $request->confidentialite;
        $receptionCourrier->date_courrier = $request->date_courrier;
        $receptionCourrier->date_arrivee = $request->date_arrivee;
        $receptionCourrier->expeditaire = $request->expeditaire;
        $receptionCourrier->id_courrier = $request->id_courrier;
        $receptionCourrier->id_service = $request->id_service;
        $receptionCourrier->id_personnel = $request->id_personnel;
        $receptionCourrier->objet_courrier = $request->objet_courrier;
        $receptionCourrier->nbre_piece = $request->nbre_piece;
        $receptionCourrier->statut = $request->statut;
        $receptionCourrier->charger_courrier = $filePath ?? null; 
        ReceptionCourrier::create($request->all()); 
        Flash::info('success', 'Courrier réceptionné avec succès.');
        return redirect()->route('reception_courriers.create')
            ->with('success', 'Courrier réceptionné avec succès.'); 
       /*  return redirect()->route('reception_courriers.show', $receptionCourrier->id_courrier_reception); */
    }

    public function show(ReceptionCourrier $receptionCourrier)
    {
        $services = Service::all();
        $courriers = Courrier::all();
        $personnels = Personnel::all();
        return view('pages.reception_courriers.show', compact('receptionCourrier','services','courriers','personnels'));
    }
    public function voir(ReceptionCourrier $receptionCourrier)
    {
        $services = Service::all();
        $courriers = Courrier::all();
        $personnels = Personnel::all();
        return view('pages.reception_courriers.voir', compact('receptionCourrier','services','courriers','personnels'));
    }
 

    public function edit(ReceptionCourrier $receptionCourrier)
    {
        $services = Service::all();
        $courriers = Courrier::all();
        $personnels = Personnel::all();
        return view('pages.reception_courriers.edit', compact('receptionCourrier','services','courriers','personnels'));
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
            'charger_courrier' => 'file|mimes:pdf|max:2048',
            'statut' => 'required|in:Traité,Reçu,en cours de traitement,Rejeté',
        ]);
        // Traitement du fichier chargé
        if ($request->hasFile('charger_courrier')) {
            if ($receptionCourrier->charger_courrier) {
                Storage::delete('public/fichier/courrier/' . basename($receptionCourrier->charger_courrier));
            }

            $file = $request->file('charger_courrier');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/fichier/courrier', $fileName);
        }

        $receptionCourrier->update($request->all());
        Flash::info('success', 'Courrier réceptionné mis à jour avec succès.');
        return redirect()->route('reception_courriers.index')
            ->with('success', 'Courrier réceptionné mis à jour avec succès.');
    }

    public function destroy($id_courrier_reception)
{
    $receptionCourrier = ReceptionCourrier::findOrFail($id_courrier_reception);

    // Supprimer le fichier si nécessaire
    if ($receptionCourrier->charger_courrier) {
        Storage::delete('public/fichier/courrier/' . basename($receptionCourrier->charger_courrier));
    }

    $receptionCourrier->delete();

    Flash::info('success', 'Courrier réceptionné supprimé avec succès.');
    return redirect()->route('reception_courriers.index')->with('success', 'Courrier réceptionné supprimé avec succès.');
}
   

public function generatePdf($id_courrier_reception)
{
    $receptionCourrier = ReceptionCourrier::findOrFail($id_courrier_reception);
    $pdf = new Dompdf();
    $pdf->loadHtml(view('pages.reception_courriers.show', compact('receptionCourrier'))->render());
    $pdf->setPaper('A4', 'portrait');
    $pdf->render();
    return $pdf->stream('courrier.pdf');
}

public function downloadFile($id_courrier_reception)
    {
        $receptionCourrier = ReceptionCourrier::findOrFail($id_courrier_reception);

        if ($receptionCourrier->charger_courrier) {
            $filePath = storage_path('app/public/fichier/courrier/' . basename($receptionCourrier->charger_courrier));
            if (file_exists($filePath)) {
                return response()->download($filePath, basename($receptionCourrier->charger_courrier));
            } else {
                return redirect()->back()->with('error', 'Le fichier n\'existe pas.');
            }
        } else {
            return redirect()->back()->with('error', 'Aucun fichier attaché.');
        }
    }

    // Méthode pour supprimer le fichier attaché à un courrier reçu
    public function deleteFile($id_courrier_reception)
    {
        $receptionCourrier = ReceptionCourrier::findOrFail($id_courrier_reception);

        if ($receptionCourrier->charger_courrier) {
            Storage::delete('public/fichier/courrier/' . basename($receptionCourrier->charger_courrier));
            $receptionCourrier->charger_courrier = null;
            $receptionCourrier->save();
        }

        return redirect()->back()->with('success', 'Le fichier a été supprimé avec succès.');
    }
    public function viewPdf($id_courrier_reception)
{
    $receptionCourrier = ReceptionCourrier::findOrFail($id_courrier_reception);
    return view('pages.reception_courriers.view_pdf', compact('receptionCourrier'));
}
}