<?php

// app/Http/Controllers/SignataireController.php

namespace App\Http\Controllers;

use App\Models\Signataire;
use Illuminate\Http\Request;

class SignataireController extends Controller
{
    public function index()
    {
        $signataires = Signataire::all();
        return view('signataires.index', compact('signataires'));
    }

    public function create()
    {
        return view('signataires.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'grade' => 'required|string',
            'fonction' => 'required|string',
        ]);

        Signataire::create($request->all());

        return redirect()->route('signataires.index')
            ->with('success', 'Signataire créé avec succès.');
    }

    public function edit(Signataire $signataire)
    {
        return view('signataires.edit', compact('signataire'));
    }

    public function update(Request $request, Signataire $signataire)
    {
        $request->validate([
            'nom' => 'required|string',
            'grade' => 'required|string',
            'fonction' => 'required|string',
        ]);

        $signataire->update($request->all());

        return redirect()->route('signataires.index')
            ->with('success', 'Signataire mis à jour avec succès');
    }

    public function destroy(Signataire $signataire)
    {
        $signataire->delete();

        return redirect()->route('signataires.index')
            ->with('success', 'Signataire supprimé avec succès');
    }
}
