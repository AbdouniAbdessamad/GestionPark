<?php

namespace App\Http\Controllers;
use App\Models\Demande;
use App\Models\DemandeInventaire;
use App\Models\Conge;
use Illuminate\Http\Request;
use App\Models\Automobile;
use App\Models\AutomobileLog;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Inventaire;

class AdminDemandeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function auto(){
        $users = User::all();
        $demandesvoiture = Demande::where('status', 'en attente')->paginate(10);
        return view('admin.auto', compact('demandesvoiture', 'users'));
    }
    public function allauto()
    {
        $demandesvoiture = Demande::all();
        $users = User::all();
        return view('admin.allauto', compact('demandesvoiture', 'users'));
    }
    public function validateDemande($id)
    {
        $demande = Demande::findOrFail($id);
        $automobile = Automobile::where('matricule', $demande->matricule)->firstOrFail();
        
        $demande->status = 'validé';
        $automobile->Status = 'en_utilisation';
        
        $demande->save();
        $automobile->save();
        
        return redirect()->route('admin.auto')
            ->with('success', 'Demande validée avec succès.');
    }
    public function rejectDemande($id)
    {
        $demande = Demande::findOrFail($id);
        $demande->status = 'rejeté';
        $demande->save();
        
        return redirect()->route('admin.auto')
            ->with('success', 'Demande rejetée avec succès.');
    }
    public function allDemande()
    {
        $demandesvoiture = Demande::all();
        return view('admin.all', compact('demandesvoiture'));
    }




    public function DemandeMateriel()
    {
        $users = User::all();
        $demandesmateriel = DemandeInventaire::where('status', 'en attente')->paginate(10);
        return view('admin.materiel', compact('demandesmateriel', 'users'));
    }
    public function validateMateriel($id)
    {
        $demande = DemandeInventaire::findOrFail($id);
        
        // Find the corresponding inventory item
        $inventaire = Inventaire::where('libelle', $demande->libelle)->firstOrFail();
        
        // Check if there's enough quantity available
        if ($inventaire->quantite < $demande->quantite) {
            return redirect()->route('admin.materiel')
                ->with('error', 'Quantité insuffisante en stock.');
        }
        
        // Deduct the requested quantity from inventory
        $inventaire->quantite -= $demande->quantite;
        $inventaire->save();
        
        // Update demand status
        $demande->status = 'validé';
        $demande->save();
        
        return redirect()->route('admin.materiel')
            ->with('success', 'Demande validée et quantité déduite avec succès.');
    }
    public function rejectMateriel($id)
    {
        $demande = DemandeInventaire::find($id);
        $demande->status = 'rejeté';
        $demande->save();
        return redirect()->route('admin.materiel');
    }
    public function allMateriel(){
        $users = User::all();
        $demandesmateriel = DemandeInventaire::all();
        return view('admin.allmateriel', compact('demandesmateriel', 'users'));
    }

    public function materielHistory()
    {
        $demandesmateriel = DemandeInventaire::with('createdBy')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('admin.materiel-history', compact('demandesmateriel'));
    }

    public function DemandeConge()
    {
        $users = User::all();
        $demandesconge = Conge::where('status', 'en attente')->paginate(10);
        return view('admin.conge', compact('demandesconge', 'users'));
    }
    public function validateConge($id)
    {
        $demande = Conge::find($id);
        $demande->status = 'validé';
        $demande->save();
        return redirect()->route('admin.conge');
    }
    public function rejectConge($id)
    {
        $demande = Conge::find($id);
        $demande->status = 'rejeté';
        $demande->save();
        return redirect()->route('admin.conge');
    }
    public function allConge(){
        $demandesconge = Conge::all();
        $users = User::all();
        return view('admin.allconge', compact('demandesconge', 'users'));
    }
    
    public function usingauto()
    {
        $automobiles = Automobile::where('Status', 'en_utilisation')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        
        return view('admin.usingauto', compact('automobiles'));
    }

    public function returnAuto($id)
    {
        $automobile = Automobile::findOrFail($id);
        
        // Get the latest validated demand for this automobile
        $latestDemande = Demande::where('matricule', $automobile->matricule)
            ->where('status', 'validé')
            ->latest()
            ->first();
            
        if ($latestDemande) {
            // Update kilometrage
            $automobile->Kilometrage = $automobile->Kilometrage + $latestDemande->distance_total;
        }
        
        // First, change status to disponible
        $automobile->Status = 'disponible';
        
        // Then check if kilometrage has reached a multiple of 10,000 km
        if ($automobile->Kilometrage >= 10000) {
            // Calculate how many 10,000 km intervals have been passed
            $intervals = floor($automobile->Kilometrage / 10000);
            $lastInterval = $intervals * 10000;
            
            // If we've crossed a 10,000 km interval
            if ($automobile->Kilometrage >= $lastInterval) {
                $automobile->Status = 'Vidange';
                \Log::info("Status changed to Vidange for automobile {$automobile->matricule} at {$automobile->Kilometrage} km");
            }
        }

        $automobile->save();

        return redirect()->route('admin.usingauto')
            ->with('success', 'Véhicule marqué comme rendu avec succès.');
    }

    public function autoHistory()
    {
        $automobiles = Automobile::where('Status', 'disponible')
            ->whereHas('demandes', function($query) {
                $query->where('status', 'validé');
            })
            ->with(['demandes' => function($query) {
                $query->where('status', 'validé')
                    ->orderBy('created_at', 'desc');
            }])
            ->paginate(10);
        
        return view('admin.auto-history', compact('automobiles'));
    }
}