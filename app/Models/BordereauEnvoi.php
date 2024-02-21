<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BordereauEnvoi extends Model
{
    protected $primarykey = 'id_bordereau';
    protected $fillable = [
        'reference_bordereau',
        'date_bordereau',
        'id_courrier',
        'designation',
        'destinateur',
        'id_disposition',
        'id_signataire',
        'nbre_piece',
        'charger_courrier',
    ];
}
