<?php

namespace App\Http\Controllers;

/* use App\Models\ImputationHistory; */
use App\Models\Imputation;
use App\Models\ReceptionCourrier;
use App\Models\Courrier;
use App\Models\Service;
use App\Models\Personnel;
use App\Models\Disposition;
use Illuminate\Http\Request;
use HepplerDotNet\FlashToastr\Flash;


class ImputationController extends Controller
{
    public function index()
    {
        /*  $receptionCourriers = ReceptionCourrier::with('imputations')->get(); */
        $imputations = Imputation::all();
        $receptionCourrier = ReceptionCourrier::all();
        $courriers = Courrier::all();
        $services = Service::all();
        $personnels = Personnel::all();
        $dispositions = Disposition::all(); // Assurez-vous que cette variable est définie et récupérée depuis la source appropriée
        return view('pages.imputations.index', compact('imputations','receptionCourrier', 'courriers', 'services', 'personnels', 'dispositions'));
    }


    public function create(Request $request)
    {
        $receptionCourrier = ReceptionCourrier::with('imputations')->get();

        // Récupérer la référence du courrier réceptionné depuis la requête
        $id_courrier_reception = $request->input('id_courrier_reception');

        // Vérifier si la référence du courrier réceptionné est valide
        $receptionCourrier = ReceptionCourrier::find($id_courrier_reception);

        if (!$receptionCourrier) {
            // Si la référence du courrier réceptionné n'est pas valide, rediriger avec un message d'erreur
            return redirect()->route('imputations.index')->with('error', 'Référence de courrier réceptionné invalide.');
        }

        // Passer les détails du courrier réceptionné à la vue de création
        $services = Service::all();
        $personnels = Personnel::all();
        $dispositons = Disposition::all();
        $courriers = Courrier::all();
        $imputation = new Imputation(); // Définir $imputation comme une nouvelle instance vide
        return view('pages.imputations.create', compact('imputations','services', 'personnels', 'dispositions', 'courriers', 'receptionCourrier'));
    }
     
    public function store(Request $request)
    {
         dd($request->all()); 
        $request->validate([
            'id_courrier_reception' => 'required|exists:reception_courriers,id_courrier_reception',
            'date_imputation' => 'required|date',
            'id_courrier' => 'required|exists:courriers,id_courrier',
            'id_service' => 'required|exists:services,id_service',
            'id_personnel' => 'required|exists:personnels,id_personnel',
            'id_disposition' => 'required|exists:dispositions,id_disposition',
            'observation' => 'nullable|string',
        ]);
        
        // Créer une nouvelle instance d'imputation en utilisant les champs nécessaires
        $imputationData = $request->only([
            'id_courrier_reception',
            'date_imputation',
            'id_courrier',
            'observation',
        ]);
    
        // Ajouter les clés étrangères pour les champs "service", "personnel" et "disposition"
        $imputationData['id_service'] = $request->input('id_service');
        $imputationData['id_personnel'] = $request->input('id_personnel');
        $imputationData['id_disposition'] = $request->input('id_disposition');
    
        // Enregistrer l'imputation avec les données récupérées
        Imputation::create($imputationData);
    
        // Redirection avec un message de succès
        Flash::info('success', 'Imputation créée avec succès.');
        return redirect()->route('imputations.index')->with('success', 'Imputation créée avec succès.');
    }
    
    public function show(Imputation $imputation)
    {
        $imputations = Imputation::all();
        $services = Service::all();
        $personnels = Personnel::all();
        $dispositons = Disposition::all();
        $courriers = Courrier::all();
        $receptionCourriers = ReceptionCourrier::all();
        return view('pages.imputations.show', compact(
            'imputation',
            'personnels',
            'dispositions',
            'courriers',
            'receptionCourriers'
        ));
    }

    public function edit(Imputation $imputation)
    {
        $imputations = Imputation::all();
        $services = Service::all();
        $personnels = Personnel::all();
        $dispositons = Disposition::all();
        $courriers = Courrier::all();
        $receptionCourriers = ReceptionCourrier::all();
        return view('pages.imputations.edit', compact(
            'imputation',
            'personnels',
            'dispositions',
            'courriers',
            'receptionCourriers'
        ));
    }

    public function update(Request $request, Imputation $imputation)
    {
        $request->validate([
            'id_courrier_reception' => 'required|exists:reception_courriers,id_courrier_reception',
            'date_imputation' => 'required|date',
            /* 'origine' => 'required|string',
            'objet' => 'required|string', */
            'id_courrier' => 'required|exists:courriers,id_courrier',
            'id_service' => 'required|exists:services,id_service',
            'id_personnel' => 'required|exists:personnels,id_personnel',
            'id_disposition' => 'required|exists:dispositions,id_disposition',
            'observation' => 'nullable|string',
        ]);

        $imputation->update($request->all());
        Flash::info('success', 'Imputation mise à jour avec succès.');
        return redirect()->route('pages.imputations.index')
            ->with('success', 'Imputation mise à jour avec succès.');
    }

    public function destroy(Imputation $imputation)
    {
        $imputation->delete();
        Flash::info('success', 'Imputation supprimée avec succès.');
        return redirect()->route('pages.imputations.index')
            ->with('success', 'Imputation supprimée avec succès.');
    }
    /* public function history(Request $request)
    {
        $id_courrier_reception = $request->input('id_courrier_reception');
        $imputationHistory = ImputationHistory::where('id_courrier_reception', $id_courrier_reception)->get();
        return view('imputations.history', compact('imputationHistory'));
    } */
    public function fetchCourrierDetails(Request $request)
    {
        $id_courrier_reception = $request->input('id');
        $receptionCourrier = ReceptionCourrier::findOrFail($id_courrier_reception);
        $type_courrier = null;
        if ($receptionCourrier->courrier && $receptionCourrier->courrier->type_courrier) {
            $type_courrier = $receptionCourrier->courrier->type_courrier;
        }
        return response()->json([
            'expeditaire' => $receptionCourrier->expeditaire,
            'objet_courrier' => $receptionCourrier->objet_courrier,
            'type_courrier' => $type_courrier,
            // Ajoutez d'autres détails du courrier ici
        ]);
    }
}
