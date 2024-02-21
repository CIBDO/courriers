<?php

namespace App\Http\Controllers;

use App\Models\Courrier;
use Illuminate\Http\Request;

class CourrierController extends Controller
{
    public function index()
    {
        $courriers = Courrier::all();
        return view('courriers.index', compact('courriers'));
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

        return redirect()->route('courriers.index')
            ->with('success', 'Courrier créé avec succès.');
    }

    public function edit(Courrier $courrier)
    {
        return view('courriers.edit', compact('courrier'));
    }

    public function update(Request $request, Courrier $courrier)
    {
        $request->validate([
            'type_courrier' => 'required|string',
        ]);

        $courrier->update($request->all());

        return redirect()->route('courriers.index')
            ->with('success', 'Courrier mis à jour avec succès');
    }

    public function destroy(Courrier $courrier)
    {
        $courrier->delete();

        return redirect()->route('courriers.index')
            ->with('success', 'Courrier supprimé avec succès');
    }
}
