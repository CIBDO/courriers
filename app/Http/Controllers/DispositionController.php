<?php


namespace App\Http\Controllers;

use App\Models\Disposition;
use Illuminate\Http\Request;
use HepplerDotNet\FlashToastr\Flash;

class DispositionController extends Controller
{
    public function index()
    {
        $dispositions = Disposition::all();
        return view('pages.dispositions.index', compact('dispositions'));
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
        Flash::info('success', 'Disposition créée avec succès.');
        return redirect()->route('dispositions.index')
            ->with('success', 'Disposition créée avec succès.');
    }

    public function edit(Disposition $disposition)
    {
        return view('pages.dispositions.edit', compact('disposition'));
    }

    public function update(Request $request, Disposition $disposition)
    {
        $request->validate([
            'nom_disposition' => 'required|string',
        ]);

        $disposition->update($request->all());
        Flash::info('success', 'Disposition mise à jour avec succès');
        return redirect()->route('dispositions.index')
            ->with('success', 'Disposition mise à jour avec succès');
    }

    public function destroy(Disposition $disposition)
    {
        $disposition->delete();
        Flash::info('success', 'Disposition supprimée avec succès');
        return redirect()->route('dispositions.index')
            ->with('success', 'Disposition supprimée avec succès');
    }
}
