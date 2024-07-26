<?php

namespace App\Http\Controllers;

use App\Models\BordereauEnvoi;
use Illuminate\Http\Request;
use App\Models\Courrier;
use App\Models\Destinataire;
use App\Models\Disposition;
use App\Models\Signataire;
use App\Models\Piece;
use Dompdf\Dompdf;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use HepplerDotNet\FlashToastr\Flash;
use Illuminate\Support\Carbon;

class BordereauEnvoiController extends Controller
{
    public function index(Request $request)
    {
        $query = BordereauEnvoi::query();

        if ($request->filled('reference_bordereau')) {
            $query->where('reference_bordereau', 'like', '%' . $request->input('reference_bordereau') . '%');
        }

        if ($request->filled('destinateur')) {
            $query->where('destinateur', 'like', '%' . $request->input('destinateur') . '%');
        }

        if ($request->filled('designation')) {
            $query->where('designation', $request->input('designation'));
        }

        if ($request->filled('date_bordereau')) {
            $query->whereDate('date_bordereau', $request->input('date_bordereau'));
        }

        if ($request->filled('type_courrier')) {
            $query->where('type_courrier', 'like', '%' . $request->input('type_courrier') . '%');
        }

        if ($request->filled('statut')) {
            $query->where('statut', 'like', '%' . $request->input('statut') . '%');
        }

        $query->orderByDesc('date_bordereau');
        $bordereauEnvois = $query->paginate(8);

        $destinataires = Destinataire::all();
        $courriers = Courrier::all();
        $dispositions = Disposition::all();
        $signataires = Signataire::all();

        return view('pages.bordereau_envois.index', compact('bordereauEnvois', 'destinataires', 'courriers', 'dispositions', 'signataires'));
    }

    public function create()
    {
        $destinataires = Destinataire::all();
        $courriers = Courrier::all();
        $dispositions = Disposition::all();
        $signataires = Signataire::all();

        return view('pages.bordereau_envois.create', compact('destinataires', 'courriers', 'dispositions', 'signataires'));
    }

    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'reference_bordereau' => 'required|string|max:255',
            'date_bordereau' => 'required|date',
            'priorite' => 'required|string',
            'confidentialite' => 'required|string',
            'id_courrier' => 'required|integer',
            'id_disposition' => 'required|integer',
            'id_signataire' => 'required|integer',
            'statut' => 'required|string',
            'destinateur' => 'required|string',
            'designation' => 'required|array',
            'designation.*' => 'required|string|max:255',
            'nbre_piece' => 'required|array',
            'nbre_piece.*' => 'required|integer|min:1',
            'total_pieces' => 'integer',
            'charger_courrier' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        // Créer le bordereau d'envoi
        $bordereauEnvoi = BordereauEnvoi::create([
            'reference_bordereau' => $request->reference_bordereau,
            'date_bordereau' => $request->date_bordereau,
            'priorite' => $request->priorite,
            'confidentialite' => $request->confidentialite,
            'id_courrier' => $request->id_courrier,
            'id_disposition' => $request->id_disposition,
            'id_signataire' => $request->id_signataire,
            'statut' => $request->statut,
            'destinateur' => $request->destinateur,
            'total_pieces' => $request->total_pieces,
        ]);

        // Ajouter les désignations et les nombres de pièces
        foreach ($request->designation as $index => $designation) {
            Piece::create([
                'id_bordereau' => $bordereauEnvoi->id_bordereau,
                'designation' => $designation,
                'nbre_piece' => $request->nbre_piece[$index],
            ]);
        }

        // Traitement du fichier chargé
        if ($request->hasFile('charger_courrier')) {
            $file = $request->file('charger_courrier');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/fichier/courrier', $fileName);
            $bordereauEnvoi->charger_courrier = $filePath;
            $bordereauEnvoi->save();
        }

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

        return view('pages.bordereau_envois.show', compact('bordereauEnvoi', 'destinataires', 'courriers', 'dispositions', 'signataires', 'dateFormatted'));
    }

    public function voir(BordereauEnvoi $bordereauEnvoi)
    {
        $destinataires = Destinataire::all();
        $courriers = Courrier::all();
        $dispositions = Disposition::all();
        $signataires = Signataire::all();
        return view('pages.bordereau_envois.voir', compact('bordereauEnvoi', 'destinataires', 'courriers', 'dispositions', 'signataires'));
    }
    public function edit(BordereauEnvoi $bordereauEnvoi)
    {
        $destinataires = Destinataire::all();
        $courriers = Courrier::all();
        $dispositions = Disposition::all();
        $signataires = Signataire::all();

        return view('pages.bordereau_envois.edit', compact('bordereauEnvoi', 'destinataires', 'courriers', 'dispositions', 'signataires'));
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
            'charger_courrier' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        // Traitement du fichier chargé
        if ($request->hasFile('charger_courrier')) {
            if ($bordereauEnvoi->charger_courrier) {
                Storage::delete('public/fichier/courrier/' . basename($bordereauEnvoi->charger_courrier));
            }

            $file = $request->file('charger_courrier');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('public/fichier/courrier', $fileName);
            $bordereauEnvoi->charger_courrier = $filePath;
        }

        $bordereauEnvoi->update($request->except('charger_courrier'));

        Flash::info('success', 'Bordereau mis à jour avec succès.');
        return redirect()->route('bordereau_envois.index')->with('success', 'Bordereau d\'envoi mis à jour avec succès.');
    }

    public function destroy($id_bordereau)
    {
        $bordereauEnvoi = BordereauEnvoi::findOrFail($id_bordereau);

        if ($bordereauEnvoi->charger_courrier) {
            Storage::delete('public/fichier/courrier/' . basename($bordereauEnvoi->charger_courrier));
        }

        $bordereauEnvoi->delete();

        Flash::info('success', 'Bordereau supprimé avec succès.');
        return redirect()->route('bordereau_envois.index')->with('success', 'Bordereau d\'envoi supprimé avec succès.');
    }

    public function downloadFile($id_bordereau)
    {
        $bordereauEnvoi = BordereauEnvoi::findOrFail($id_bordereau);
        $filePath = $bordereauEnvoi->charger_courrier;

        if (!$filePath || !Storage::exists($filePath)) {
            return redirect()->route('bordereau_envois.show', $id_bordereau)
                ->with('error', 'Fichier non trouvé.');
        }

        return Storage::download($filePath);
    }

    public function deleteFile($id_bordereau)
    {
        $bordereauEnvoi = BordereauEnvoi::findOrFail($id_bordereau);

        if ($bordereauEnvoi->charger_courrier) {
            Storage::delete($bordereauEnvoi->charger_courrier);
            $bordereauEnvoi->charger_courrier = null;
            $bordereauEnvoi->save();
        }

        Flash::info('success', 'Fichier supprimé avec succès.');
        return redirect()->route('bordereau_envois.show', $id_bordereau)
            ->with('success', 'Fichier supprimé avec succès.');
    }
    public function generatePdf($id_bordereau)
    {
        $bordereauEnvoi = BordereauEnvoi::findOrFail($id_bordereau);
        $pdf = new Dompdf();
        $pdf->loadHtml(view('pages.bordereau_envois.show', compact('bordereauEnvoi'))->render());
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream('courrierdepart.pdf');
    }
}
