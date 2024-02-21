<?php


namespace App\Http\Controllers;

use App\Models\Disposition;
use Illuminate\Http\Request;

class DispositionController extends Controller
{
    public function index()
    {
        $dispositions = Disposition::all();
        return view('dispositions.index', compact('dispositions'));
    }

    public function create()
    {
        return view('dispositions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_disposition' => 'required|string',
        ]);

        Disposition::create($request->all());

        return redirect()->route('dispositions.index')
            ->with('success', 'Disposition créée avec succès.');
    }

    public function edit(Disposition $disposition)
    {
        return view('dispositions.edit', compact('disposition'));
    }

    public function update(Request $request, Disposition $disposition)
    {
        $request->validate([
            'nom_disposition' => 'required|string',
        ]);

        $disposition->update($request->all());

        return redirect()->route('dispositions.index')
            ->with('success', 'Disposition mise à jour avec succès');
    }

    public function destroy(Disposition $disposition)
    {
        $disposition->delete();

        return redirect()->route('dispositions.index')
            ->with('success', 'Disposition supprimée avec succès');
    }
}
