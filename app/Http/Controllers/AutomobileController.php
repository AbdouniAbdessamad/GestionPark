<?php

namespace App\Http\Controllers;

use App\Models\Automobile;
use Illuminate\Http\Request;

class AutomobileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $automobiles = Automobile::all();
        return view('automobiles.index', compact('automobiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('automobiles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'NomConducteur' => 'required|string|max:255',
            'Marque' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'matricule' => 'required|string|max:255|unique:automobiles',
        ]);

        Automobile::create($request->all());

        return redirect()->route('automobiles.index')
            ->with('success', 'Automobile créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Automobile $automobile)
    {
        return view('automobiles.show', compact('automobile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Automobile $automobile)
    {
        return view('automobiles.edit', compact('automobile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Automobile $automobile)
    {
        $request->validate([
            'NomConducteur' => 'required|string|max:255',
            'Marque' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'matricule' => 'required|string|max:255|unique:automobiles,matricule,' . $automobile->id,
        ]);

        $automobile->update($request->all());

        return redirect()->route('automobiles.index')
            ->with('success', 'Automobile mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Automobile $automobile)
    {
        $automobile->delete();

        return redirect()->route('automobiles.index')
            ->with('success', 'Automobile supprimé avec succès.');
    }
}
