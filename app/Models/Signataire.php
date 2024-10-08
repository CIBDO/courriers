<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signataire extends Model
{
    protected $primaryKey = 'id_signataire';
    protected $fillable = ['nom', 'grade', 'fonction'];
    public function receptionCourriers()
    {
        return $this->hasMany(ReceptionCourrier::class, 'id_signataire');
    }
}
