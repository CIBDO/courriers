<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    protected $primarykey = 'id_courrier';
    protected $fillable = ['type_courrier'];
}
