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
        'id_expeditaire',
        'id_courrier',
        'id_destinataire',
        'id_personnel',
        'nbre_piece',
        'statut',
        'charger_courrier',
        'observation',
    ];

    public function expeditaire()
    {
        return $this->belongsTo(Expeditaire::class, 'id_expeditaire');
    }

    public function courrier()
    {
        return $this->belongsTo(Courrier::class, 'id_courrier');
    }

    public function destinataire()
    {
        return $this->belongsTo(Destinataire::class, 'id_destinataire');
    }

    public function personnel()
    {
        return $this->belongsTo(Personnel::class, 'id_personnel');
    }

}
