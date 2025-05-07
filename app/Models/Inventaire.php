<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaire extends Model
{
    protected $fillable = [
        "libelle",
        "quantite",
        "fournisseur_id",
    ];

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }
}
