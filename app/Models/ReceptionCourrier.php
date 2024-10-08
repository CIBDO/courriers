<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceptionCourrier extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_courrier_reception';

    protected $fillable = [
        'reference',
        'bordereau',
        'priorite',
        'confidentialite',
        'date_courrier',
        'date_arrivee',
        'expeditaire',
        'id_courrier',
        'id_service',
        'id_personnel',
        'objet_courrier',
        'nbre_piece',
        'charger_courrier',
        'statut',
        'id_signataire',
    ];

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
    public function signataire()
    {
        return $this->belongsTo(Signataire::class, 'id_signataire');
    }
    public function imputations()
    {
        return $this->hasMany(Imputation::class, 'id_courrier_reception');
    }

    public function dispositions()
    {
        return $this->belongsToMany(Disposition::class, 'imputation_disposition', 'id_courrier_reception', 'id_disposition');
    }
}
