<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CongeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conges = Conge::where('created_by', Auth::id())->get();
        return view('conges.index', compact('conges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('conges.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date_debut' => 'required|date',
            'Duree' => 'required|integer|min:1',
            'type_conge' => 'required|string',
        ]);

        $conge = Conge::create([
            'date_debut' => $validated['date_debut'],
            'Duree' => $validated['Duree'],
            'type_conge' => $validated['type_conge'],
            'status' => 'en attente',
            'created_by' => Auth::id()
        ]);

        return redirect()->route('conges.index')
            ->with('success', 'Demande de congé créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Conge $conge)
    {
        return view('conges.show', compact('conge'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conge $conge)
    {
        return view('conges.edit', compact('conge'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Conge $conge)
    {
        $validated = $request->validate([
            'date_debut' => 'required|date',
            'Duree' => 'required|integer|min:1',
            'type_conge' => 'required|string',
        ]);

        $conge->update($validated);

        return redirect()->route('conges.index')
            ->with('success', 'Demande de congé mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conge $conge)
    {
        $conge->delete();
        return redirect()->route('conges.index')
            ->with('success', 'Demande de congé supprimée avec succès');
    }
}
