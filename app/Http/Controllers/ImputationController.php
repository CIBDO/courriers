<?php
namespace App\Http\Controllers;

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
    public function index(Request $request)
    {
        $query = Imputation::query();

        // Filtrer par référence si le champ est renseigné
        if ($request->filled('reference')) {
            $query->where('reference', 'like', '%' . $request->input('reference') . '%');
        }

        // Filtrer par service si le champ est renseigné
        if ($request->filled('nom_service')) {
            $query->where('nom_service', 'like', '%' . $request->input('nom_service') . '%');
        }

        // Filtrer par date d'arrivée si le champ est renseigné
        if ($request->filled('date_imputation')) {
            $query->whereDate('date_imputation', $request->input('date_imputation'));
        }

        // Filtrer par personne si le champ est renseigné
        if ($request->filled('nom_personnel')) {
            $query->where('nom_personnel', 'like', '%' . $request->input('nom_personnel') . '%');
        }

        // Filtrer par nature du courrier si le champ est renseigné
        if ($request->filled('nom_disposition')) {
            $query->where('nom_disposition', 'like', '%' . $request->input('nom_disposition') . '%');
        }

        $query->orderByDesc('date_imputation');

        $imputations = $query->paginate(8);

        $receptionCourrier = ReceptionCourrier::all();
        $courriers = Courrier::all();
        $services = Service::all();
        $personnels = Personnel::all();
        $dispositions = Disposition::all();
        
        return view('pages.imputations.index', compact('imputations', 'receptionCourrier', 'courriers', 'services', 'personnels', 'dispositions'));
    }

    public function create(Request $request)
    {
        $receptionCourrier = ReceptionCourrier::with('imputations')->get();
        $id_courrier_reception = $request->input('id_courrier_reception');
        $receptionCourrier = ReceptionCourrier::find($id_courrier_reception);

        if (!$receptionCourrier) {
            return redirect()->route('imputations.index')->with('error', 'Référence de courrier réceptionné invalide.');
        }

        $services = Service::all();
        $personnels = Personnel::all();
        $dispositions = Disposition::all();
        $courriers = Courrier::all();
        $imputation = new Imputation();
        
        return view('pages.imputations.create', compact('imputations', 'services', 'personnels', 'dispositions', 'courriers', 'receptionCourrier'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_courrier_reception' => 'required|exists:reception_courriers,id_courrier_reception',
            'date_imputation' => 'required|date',
            'id_service' => 'required|exists:services,id_service',
            'id_personnel' => 'required|exists:personnels,id_personnel',
            'id_disposition' => 'required|exists:dispositions,id_disposition',
            'observation' => 'nullable|string',
        ]);

        $imputationData = $request->only([
            'id_courrier_reception',
            'date_imputation',
            'id_courrier',
            'id_service',
            'id_personnel',
            'id_disposition',
            'observation',
        ]);

        $imputationData['id_courrier_reception'] = (int)$imputationData['id_courrier_reception'];
        $imputationData['id_service'] = (int)$imputationData['id_service'];
        $imputationData['id_personnel'] = (int)$imputationData['id_personnel'];
        $imputationData['id_disposition'] = (int)$imputationData['id_disposition'];

        try {
            Imputation::create($imputationData);
            Flash::info('success', 'Imputation créée avec succès.');
            return redirect()->route('imputations.index')->with('success', 'Imputation créée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(Imputation $imputation)
    {
        $services = Service::all();
        $personnels = Personnel::all();
        $dispositions = Disposition::all();
        $courriers = Courrier::all();
        $receptionCourriers = ReceptionCourrier::all();
        
        return view('pages.imputations.show', compact('imputation', 'personnels', 'dispositions', 'courriers', 'receptionCourriers'));
    }

    public function edit(Imputation $imputation)
    {
        $services = Service::all();
        $personnels = Personnel::all();
        $dispositions = Disposition::all();
        $courriers = Courrier::all();
        $receptionCourriers = ReceptionCourrier::all();
        
        return view('pages.imputations.edit', compact('imputation', 'personnels', 'dispositions', 'services', 'receptionCourriers'));
    }

    public function update(Request $request, Imputation $imputation)
    {
        $request->validate([
            'id_courrier_reception' => 'required|exists:reception_courriers,id_courrier_reception',
            'date_imputation' => 'required|date',
            'id_service' => 'required|exists:services,id_service',
            'id_personnel' => 'required|exists:personnels,id_personnel',
            'id_disposition' => 'required|exists:dispositions,id_disposition',
            'observation' => 'nullable|string',
        ]);

        $imputation->update($request->all());
        Flash::info('success', 'Imputation mise à jour avec succès.');
        return redirect()->route('imputations.index')->with('success', 'Imputation mise à jour avec succès.');
    }

    public function destroy(Imputation $imputation)
    {
        $imputation->delete();
        Flash::info('success', 'Imputation supprimée avec succès.');
        return redirect()->route('imputations.index')->with('success', 'Imputation supprimée avec succès.');
    }

    public function fetchCourrierDetails(Request $request)
    {
        $id_courrier_reception = $request->input('id');
        $receptionCourrier = ReceptionCourrier::findOrFail($id_courrier_reception);
        $type_courrier = $receptionCourrier->courrier ? $receptionCourrier->courrier->type_courrier : null;
        return response()->json([
            'expeditaire' => $receptionCourrier->expeditaire,
            'objet_courrier' => $receptionCourrier->objet_courrier,
            'type_courrier' => $type_courrier,
        ]);
    }
}
