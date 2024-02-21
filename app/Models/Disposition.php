<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposition extends Model
{
    protected $primaryKey = 'id_disposition';
    protected $fillable = ['nom_disposition'];
}
