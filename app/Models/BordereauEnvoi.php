<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BordereauEnvoi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_bordereau';

    protected $fillable = [
        'reference_bordereau',
        'date_bordereau',
        'priorite',
        'confidentialite',
        'id_courrier',
        'id_disposition',
        'id_signataire',
        'statut',
        'destinateur',
        'total_pieces',
        'charger_courrier',
    ];
    public function pieces()
    {
        return $this->hasMany(Piece::class, 'id_bordereau'); // Assurez-vous que la clé étrangère est id_bordereau dans la table pieces
    }
   
    public function courrier()
    {
        return $this->belongsTo(Courrier::class, 'id_courrier');
    }

    public function disposition()
    {
        return $this->belongsTo(Disposition::class, 'id_disposition');
    }

    public function signataire()
    {
        return $this->belongsTo(Signataire::class, 'id_signataire');
    }
}
