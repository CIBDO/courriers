<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_service';
    protected $fillable = ['nom_service'];

    public function imputations()
    {
        return $this->hasMany(Imputation::class, 'id_service');
    }
}
