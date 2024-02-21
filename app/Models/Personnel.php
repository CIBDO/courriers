<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        'mot_de_passe',
        'id_profil',
        'id_service',
    ];
}
