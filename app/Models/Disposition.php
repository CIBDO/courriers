<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposition extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_disposition';
    protected $fillable = ['nom_disposition'];

    public function imputations()
    {
        return $this->belongsToMany(Imputation::class, 'imputation_disposition', 'id_disposition', 'id_imputation');
    }
}
