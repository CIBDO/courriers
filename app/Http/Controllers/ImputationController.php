<?php


namespace App\Http\Controllers;

use App\Models\Imputation;
use Illuminate\Http\Request;

class ImputationController extends Controller
{
    public function index()
    {
        $imputations = Imputation::all();
        return view('imputations.index', compact('imputations'));
    }

    public function create()
    {
        return view('imputations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_reception_courrier' => 'required|exists:reception_courriers,id',
            'date_imputation' => 'required|date',
            'id_service' => 'required|exists:services,id',
            'id_personnel' => 'required|exists:personnels,id',
            'id_disposition' => 'required|exists:dispositions,id',
            'observation' => 'nullable|string',
        ]);

        Imputation::create($request->all());

        return redirect()->route('imputations.index')
            ->with('success', 'Imputation créée avec succès.');
    }

    public function edit(Imputation $imputation)
    {
        return view('imputations.edit', compact('imputation'));
    }

    public function update(Request $request, Imputation $imputation)
    {
        $request->validate([
            'id_reception_courrier' => 'required|exists:reception_courriers,id',
            'date_imputation' => 'required|date',
            'id_service' => 'required|exists:services,id',
            'id_personnel' => 'required|exists:personnels,id',
            'id_disposition' => 'required|exists:dispositions,id',
            'observation' => 'nullable|string',
        ]);

        $imputation->update($request->all());

        return redirect()->route('imputations.index')
            ->with('success', 'Imputation mise à jour avec succès');
    }

    public function destroy(Imputation $imputation)
    {
        $imputation->delete();

        return redirect()->route('imputations.index')
            ->with('success', 'Imputation supprimée avec succès');
    }
}
