<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imputation extends Model
{
    protected $primarykey='id_imputation';
    protected $fillable = [
        'id_reception_courrier',
        'date_imputation',
        'id_service',
        'id_personnel',
        'id_disposition',
        'observation',
    ];
}
