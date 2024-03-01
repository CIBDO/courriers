<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinataire extends Model
{
    protected $primaryKey = 'id_destinateur';
    protected $fillable = ['nom_destinataire'];
}
