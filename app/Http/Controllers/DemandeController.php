<?php

namespace App\Http\Controllers;
use App\Models\Automobile;
use App\Models\Demande;
use App\Models\Inventaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('demandes.index');
    }
    public function indexa()
    {
        $demandes = Demande::where('created_by', Auth::id())->latest()->get();
        return view('demandes.indexa', compact('demandes'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $automobiles = Automobile::where('Status', 'disponible')->get();
        return view('demandes.create', compact('automobiles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date_demande' => 'required|date',
            'distance_total' => 'required|numeric',
            'matricule' => 'required|string',
            'status' => 'required|string',
        ]);

        $demande = Demande::create([
            'date_demande' => $validated['date_demande'],
            'distance_total' => $validated['distance_total'],
            'matricule' => $validated['matricule'],
            'status' => $validated['status'],
            'created_by' => Auth::id()
        ]);

        return redirect()->route('demandes.indexa')
            ->with('success', 'Demande créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Demande $demande)
    {
        return view('demandes.show', compact('demande'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'date_demande' => 'required|date',
            'distance_total' => 'required|numeric',
            'matricule' => 'string',
            'status' => 'string',
        ]);

        $demande = Demande::findOrFail($id);
        $demande->update($validated);

        return redirect()->route('demandes.index')
            ->with('success', 'Demande mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Demande::findOrFail($id)->delete();   
        return redirect()->route('demandes.index')
            ->with('success', 'Demande supprimée avec succès');
    }
}
