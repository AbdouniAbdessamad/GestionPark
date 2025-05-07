<?php

namespace App\Http\Controllers;
use App\Models\Inventaire;
use App\Models\Fournisseur;
use Illuminate\Http\Request;

class InventaireController extends Controller
{
    public function index()
    {
        $inventaires = Inventaire::with('fournisseur')->get();
        return view('inventaires.index', compact('inventaires'));
    }

    public function create()
    {
        $fournisseurs = Fournisseur::all();
        return view('inventaires.create', compact('fournisseurs'));
    }
    
    

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'quantite' => 'required|numeric|min:0',
            'fournisseur_id' => 'required|exists:fournisseurs,id',
        ]);

        Inventaire::create($request->all());

        return redirect()->route('inventaires.index')
            ->with('success', 'Inventaire créé avec succès.');
    }

    public function show(Inventaire $inventaire)
    {
        $inventaire->load('fournisseur');
        return view('inventaires.show', compact('inventaire'));
    }

    public function edit(Inventaire $inventaire)
    {
        $fournisseurs = Fournisseur::all();
        return view('inventaires.edit', compact('inventaire', 'fournisseurs'));
    }

    public function update(Request $request, Inventaire $inventaire)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'quantite' => 'required|numeric|min:0',
            'fournisseur_id' => 'required|exists:fournisseurs,id',
        ]);

        $inventaire->update($request->all());

        return redirect()->route('inventaires.index')
            ->with('success', 'Inventaire mis à jour avec succès.');
    }

    public function destroy(Inventaire $inventaire)
    {
        $inventaire->delete();

        return redirect()->route('inventaires.index')
            ->with('success', 'Inventaire supprimé avec succès.');
    }

}
