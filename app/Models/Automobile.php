<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Automobile extends Model
{
    use HasFactory;

    protected $fillable = [
        'NomConducteur',
        'Marque',
        'modele',
        'matricule',
        'parking_id',
        'date_entree',
        'date_sortie',
        'statut' // en stationnement/sorti
    ];

    public function parking()
    {
        return $this->belongsTo(Parking::class);
    }
}
