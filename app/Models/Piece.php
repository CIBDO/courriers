<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_bordereau',
        'designation',
        'nbre_piece',
    ];

    public function bordereau()
    {
        return $this->belongsTo(BordereauEnvoi::class);
    }
}
