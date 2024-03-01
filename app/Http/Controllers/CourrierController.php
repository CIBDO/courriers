<?php

namespace App\Http\Controllers;

use App\Models\Courrier;
use Illuminate\Http\Request;
use HepplerDotNet\FlashToastr\Flash;

class CourrierController extends Controller
{
    public function index()
    {
        $courriers = Courrier::all();
        return view('pages.courriers.index', compact('courriers'));
    }

    public function create()
    {
        return view('courriers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_courrier' => 'required|string',
        ]);

        Courrier::create($request->all());
        Flash::info('success', 'Courrier créé avec succès.');
        return redirect()->route('courriers.index')
            ->with('success', 'Courrier créé avec succès.');
    }

    public function edit(Courrier $courrier)
    {
        return view('pages.courriers.edit', compact('courrier'));
    }

    public function update(Request $request, Courrier $courrier)
    {
        $request->validate([
            'type_courrier' => 'required|string',
        ]);

        $courrier->update($request->all());
        Flash::info('success', 'Courrier mis à jour avec succès');
        return redirect()->route('courriers.index')
            ->with('success', 'Courrier mis à jour avec succès');
    }

    public function destroy(Courrier $courrier)
    {
        $courrier->delete();
        Flash::info('success', 'Courrier mis à jour avec succès');
        return redirect()->route('courriers.index')
            ->with('success', 'Courrier supprimé avec succès');
    }
}
