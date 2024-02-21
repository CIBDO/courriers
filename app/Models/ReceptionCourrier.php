<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceptionCourrier extends Model
{
    protected $primarykey='id_reception_courrier';
    protected $fillable = [
        'reference',
        'priorite',
        'confidentialite',
        'date_courrier',
        'date_arrivee',
        'expeditaire',
        'id_courrier',
        'objet_courrier',
        'nbre_piece',
        'charger_courrier',
        'statut',
    ];
}
