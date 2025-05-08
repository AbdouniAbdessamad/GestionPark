<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fournisseur;
class FournisseurController extends Controller
{
    public function index()
    {
        $fournisseurs = Fournisseur::paginate(10);
        return view('fournisseurs.index', compact('fournisseurs'));
    }

    public function create()
    {
        return view('fournisseurs.create');
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'email' => 'required',

        ]);

        Fournisseur::create($request->all());

        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur créé avec succès.');
    }

    public function show(Fournisseur $fournisseur)
    {
        return view('fournisseurs.show', compact('fournisseur'));
    }

    public function edit(Fournisseur $fournisseur)
    {
        return view('fournisseurs.edit', compact('fournisseur'));
    }
    

    public function update(Request $request, Fournisseur $fournisseur)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'email' => 'required',
        ]);

        $fournisseur->update($request->all());

        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur mis à jour avec succès.');
    }           

    public function destroy(Fournisseur $fournisseur)
    {
        $fournisseur->delete();

        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur supprimé avec succès.');
    }
    
    
}
