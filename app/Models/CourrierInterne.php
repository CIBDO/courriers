<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourrierInterne extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_courrierinterne';

    protected $fillable = [
        'reference',
        'date_creation',
        'objet',
        'id_signataire',
        'id_courrier',
        'id_service',
        'id_personnel',
        'id_disposition',
        'nbre_piece',
        'statut',
        'charger_courrier',
        'observation',
    ];

    public function signataire()
    {
        return $this->belongsTo(Signataire::class, 'id_signataire');
    }

    public function courrier()
    {
        return $this->belongsTo(Courrier::class, 'id_courrier');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'id_service');
    }

    public function personnel()
    {
        return $this->belongsTo(Personnel::class, 'id_personnel');
    }
    public function disposition()
    {
        return $this->belongsTo(Disposition::class, 'id_disposition');
    }

}
