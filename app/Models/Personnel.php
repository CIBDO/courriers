<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    protected $primaryKey = 'id_personnel';
    protected $fillable = [
        'nom_personnel',
        'prenom_personnel',
        'Matricule',
        'grade',
        'corps',
        'id_service',
    ];

    // Relation vers le modèle Service
    public function service()
    {
        return $this->belongsTo(Service::class, 'id_service');
    }
}

