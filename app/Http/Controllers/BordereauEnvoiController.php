<?php

namespace App\Http\Controllers;

use App\Models\BordereauEnvoi;
use Illuminate\Http\Request;
use App\Models\Courrier;
use App\Models\Destinataire;
use App\Models\Disposition;
use App\Models\Signataire;
use Dompdf\Dompdf;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use HepplerDotNet\FlashToastr\Flash;
use Illuminate\Support\Carbon;


class BordereauEnvoiController extends Controller
{
    public function index(Request $request)
    {
        $query = BordereauEnvoi::query();
        
    // Filtrer par référence si le champ est renseigné
    if ($request->filled('reference_bordereau')) {
        $query->where('reference_bordereau', 'like', '%' . $request->input('reference_bordereau') . '%');
    }

    // Filtrer par expéditeur si le champ est renseigné
    if ($request->filled('destinateur')) {
        $query->where('destinateur', 'like', '%' . $request->input('destinateur') . '%');
    }

    // Filtrer par date d'arrivée si le champ est renseigné
    if ($request->filled('designation')) {
        $query->where('designation', $request->input('designation'));
    }

    // Filtrer par date du courrier si le champ est renseigné
    if ($request->filled('date_bordereau')) {
        $query->whereDate('date_bordereau', $request->input('date_bordereau'));
    }

    // Filtrer par nature du courrier si le champ est renseigné
    if ($request->filled('type_courrier')) {
        $query->where('type_courrier', 'like', '%' . $request->input('type_courrier') . '%');
    }

    // Filtrer par statut si le champ est renseigné
    if ($request->filled('statut')) {
        $query->where('statut', 'like', '%' . $request->input('statut') . '%');
    }
    $query->orderByDesc('date_bordereau');
    $bordereauEnvois = $query->paginate(8);
        /* $bordereauEnvois = BordereauEnvoi::all(); */
        $destinataires = Destinataire::all();
        $courriers = Courrier::all();
        $dispositions = Disposition::all();
        $signataires = Signataire::all();
        return view('pages.bordereau_envois.index' ,compact( 'bordereauEnvois','destinataires', 'courriers','dispositions','signataires'));
    }

    public function create()
    {
        $destinataires = Destinataire::all();
        $courriers = Courrier::all();
        $dispositions = Disposition::all();
        $signataires = Signataire::all();
        return view('pages.bordereau_envois.create',compact('destinataires', 'courriers','dispositions','signataires'));
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
            'charger_courrier' => 'file|mimes:pdf|max:2048',
        ]);
        if ($request->hasFile('charger_courrier')) {
            $file = $request->file('charger_courrier');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/fichier/courrier', $fileName);
        }
    
        // Créer le courrier et lier le fichier
        $bordereauEnvoi = new BordereauEnvoi();
        $bordereauEnvoi->reference_bordereau = $request->reference_bordereau;
        $bordereauEnvoi->priorite = $request->priorite;
        $bordereauEnvoi->confidentialite = $request->confidentialite;
        $bordereauEnvoi->date_bordereau = $request->date_bordereau;
        $bordereauEnvoi->destinateur = $request->destinateur;
        $bordereauEnvoi->id_courrier = $request->id_courrier;
        $bordereauEnvoi->id_disposition = $request->id_disposition;
        $bordereauEnvoi->id_signataire = $request->id_signataire;
        $bordereauEnvoi->designation = $request->designation;
        $bordereauEnvoi->nbre_piece = $request->nbre_piece;
        $bordereauEnvoi->statut = $request->statut;
        $bordereauEnvoi->charger_courrier = $filePath ?? null; 
        BordereauEnvoi::create($request->all());
        Flash::info('success', 'Bordereau envoyé avec succès.');
        return redirect()->route('bordereau_envois.create')
            ->with('success', 'Bordereau d\'envoi créé avec succès.');
    }

    public function show(BordereauEnvoi $bordereauEnvoi)
    {
        $dateFormatted = Carbon::parse($bordereauEnvoi->date_bordereau)->format('d m Y');
        $destinataires = Destinataire::all();
        $courriers = Courrier::all();
        $dispositions = Disposition::all();
        $signataires = Signataire::all();
        return view('pages.bordereau_envois.show', compact('bordereauEnvoi','destinataires', 'courriers','dispositions','signataires','dateFormatted'));
    }

    public function edit(BordereauEnvoi $bordereauEnvoi)
    {
        $destinataires = Destinataire::all();
        $courriers = Courrier::all();
        $dispositions = Disposition::all();
        $signataires = Signataire::all();
        return view('pages.bordereau_envois.edit', compact('bordereauEnvoi','destinataires', 'courriers','dispositions','signataires'));
    
    }

    public function update(Request $request, BordereauEnvoi $bordereauEnvoi)
    {
       /*  dd($request->all()); */
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
            'charger_courrier' => 'file|mimes:pdf|max:2048',
        ]);
        // Traitement du fichier chargé
        if ($request->hasFile('charger_courrier')) {
            if ($bordereauEnvoi->charger_courrier) {
                Storage::delete('public/fichier/courrier/' . basename($bordereauEnvoi->charger_courrier));
            }

            $file = $request->file('charger_courrier');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/fichier/courrier', $fileName);
        }

        $bordereauEnvoi->update($request->all());
        Flash::info('success', 'Bordereau  mis à jour avec succès.');
        return redirect()->route('bordereau_envois.index') ->with('success', 'Bordereau d\'envoi mis à jour avec succès.');
    }

    public function destroy($id_bordereau)
    {
        $bordereauEnvoi = BordereauEnvoi::findOrFail($id_bordereau);

    // Supprimer le fichier si nécessaire
    if ($bordereauEnvoi->charger_courrier) {
        Storage::delete('public/fichier/courrier/' . basename($bordereauEnvoi->charger_courrier));
    }

    $bordereauEnvoi->delete();

    Flash::info('success', 'Bordereau supprimé avec succès.');
    return redirect()->route('bordereau_envois.index')->with('success', 'Courrier réceptionné supprimé avec succès.');
}
   

public function generatePdf($id_bordereau)
{
    $bordereauEnvoi = BordereauEnvoi::findOrFail($id_bordereau);
    $pdf = new Dompdf();
    $pdf->loadHtml(view('pages.bordereau_envois.show', compact('bordereauEnvoi'))->render());
    $pdf->setPaper('A4', 'portrait');
    $pdf->render();
    return $pdf->stream('courrier.pdf');
}

public function downloadFile($id_bordereau)
    {
        $bordereauEnvoi = BordereauEnvoi::findOrFail($id_bordereau);

        if ($bordereauEnvoi->charger_courrier) {
            $filePath = storage_path('app/public/fichier/courrier/' . basename($bordereauEnvoi->charger_courrier));
            if (file_exists($filePath)) {
                return response()->download($filePath, basename($bordereauEnvoi->charger_courrier));
            } else {
                return redirect()->back()->with('error', 'Le fichier n\'existe pas.');
            }
        } else {
            return redirect()->back()->with('error', 'Aucun fichier attaché.');
        }
    }

    // Méthode pour supprimer le fichier attaché à un courrier reçu
    public function deleteFile($id_bordereau)
    {
        $bordereauEnvoi = BordereauEnvoi::findOrFail($id_bordereau);

        if ($bordereauEnvoi->charger_courrier) {
            Storage::delete('public/fichier/courrier/' . basename($bordereauEnvoi->charger_courrier));
            $bordereauEnvoi->charger_courrier = null;
            $bordereauEnvoi->save();
        }

        return redirect()->back()->with('success', 'Le fichier a été supprimé avec succès.');
    }
    public function viewPdf($id_bordereau)
{
    $bordereauEnvoi = BordereauEnvoi::findOrFail($id_bordereau);
    return view('pages.bordereau_envois.view_pdf', compact('bordereauEnvoi'));
}
}