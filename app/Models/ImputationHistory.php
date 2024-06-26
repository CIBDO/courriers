<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImputationHistory extends Model
{
    protected $primaryKey = 'id_imputation_history';
    protected $table = 'imputation_historys';

    protected $fillable = [
        'id_courrier_reception', 'date_imputation', 'origine', 'objet', 'id_courrier', 'id_service', 'id_personnel', 'id_disposition', 'observation'
    ];

    public function courrierReception()
    {
        return $this->belongsTo(ReceptionCourrier::class, 'id_courrier_reception');
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