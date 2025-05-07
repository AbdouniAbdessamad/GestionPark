<?php

namespace App\Http\Controllers;

use App\Models\DemandeInventaire;
use App\Models\Inventaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandeInventaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demandes = DemandeInventaire::where('created_by', Auth::id())->latest()->get();
        return view('demande-inventaires.index', compact('demandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $inventaires = Inventaire::all();
        return view('demande-inventaires.create', compact('inventaires'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date_demande' => 'required|date',
            'libelle' => 'required|string|max:255',
            'quantite' => 'required|integer|min:1',
        ]);

        $validated['created_by'] = Auth::id();
        $validated['status'] = 'en attente';

        DemandeInventaire::create($validated);

        return redirect()->route('demande-inventaires.index')
            ->with('success', 'Demande d\'inventaire créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DemandeInventaire $demandeInventaire)
    {
        return view('demande-inventaires.show', compact('demandeInventaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DemandeInventaire $demandeInventaire)
    {
        if ($demandeInventaire->status !== 'en attente') {
            return redirect()->route('demande-inventaires.index')
                ->with('error', 'Cette demande ne peut plus être modifiée.');
        }
        return view('demande-inventaires.edit', compact('demandeInventaire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DemandeInventaire $demandeInventaire)
    {
        if ($demandeInventaire->status !== 'en attente') {
            return redirect()->route('demande-inventaires.index')
                ->with('error', 'Cette demande ne peut plus être modifiée.');
        }

        $validated = $request->validate([
            'date_demande' => 'required|date',
            'libelle' => 'required|string|max:255',
            'quantite' => 'required|integer|min:1',
        ]);

        $demandeInventaire->update($validated);

        return redirect()->route('demande-inventaires.show', $demandeInventaire)
            ->with('success', 'Demande d\'inventaire mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DemandeInventaire $demandeInventaire)
    {
        if ($demandeInventaire->status !== 'en attente') {
            return redirect()->route('demande-inventaires.index')
                ->with('error', 'Cette demande ne peut plus être supprimée.');
        }

        $demandeInventaire->delete();

        return redirect()->route('demande-inventaires.index')
            ->with('success', 'Demande d\'inventaire supprimée avec succès.');
    }
}
