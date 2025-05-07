<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_demande',
        'distance_total',
        'matricule',
        'status',
        'created_by'
    ];

    protected $casts = [
        'date_demande' => 'datetime',
        'distance_total' => 'float'
    ];

    // Relationship with User (created_by)
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relationship with Automobile
    public function automobile()
    {
        return $this->belongsTo(Automobile::class, 'matricule', 'matricule');
    }
}
