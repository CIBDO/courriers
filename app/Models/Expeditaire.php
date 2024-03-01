<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expeditaire extends Model
{
    protected $primaryKey = 'id_expeditaire';
    protected $fillable = ['nom_expeditaire'];
}
