<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    protected $fillable = [
        'date_debut',
        'Duree',
        'type_conge',
        'status',
        'created_by'
    ];

    protected $casts = [
        'date_debut' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
