<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemandeInventaire extends Model
{
    protected $fillable = [
        'date_demande',
        'libelle',
        'quantite',
        'status',
        'created_by',
    ];

    protected $casts = [
        'date_demande' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

