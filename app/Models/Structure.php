<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    use HasFactory;
       protected $primaryKey = 'id_structure';
    // Table associée à ce modèle
    protected $table = 'structures';

    // Les champs qui peuvent être remplis via le formulaire
    protected $fillable = [
        'nom_structure',
        'ministere_tutelle',
        'direction_tutelle',
        'adresse',
        'telephone',
        'email',
        'logo',
    ];

    // Activer les timestamps
    public $timestamps = true;
}
