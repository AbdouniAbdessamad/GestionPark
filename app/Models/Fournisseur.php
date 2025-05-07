<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    protected $fillable = [
        "id",
        "nom",
        "adresse",
        "telephone",
        "email",
    ];

    public function inventaires()
    {
        return $this->hasMany(Inventaire::class, 'fournisseur_id');
    }
}
