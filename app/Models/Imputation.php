<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imputation extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_imputation';
   /*  public $incrementing = true; */
    /* protected $keyType = 'bigint'; */

    protected $fillable = [
        'id_courrier_reception',
        'date_imputation',
        /* 'id_courrier', */
        'id_service',
        'id_personnel',
        'id_disposition',
        'observation',
    ];

   // Dans votre modèle Imputation
public function courrierReception()
{
    return $this->belongsTo(ReceptionCourrier::class, 'id_courrier_reception', 'id_courrier_reception');
}

/* public function courrier()
{
    return $this->belongsTo(Courrier::class, 'id_courrier', 'id_courrier');
} */

public function service()
{
    return $this->belongsTo(Service::class, 'id_service', 'id_service');
}

public function personnel()
{
    return $this->belongsTo(Personnel::class, 'id_personnel', 'id_personnel');
}

public function disposition()
{
    return $this->belongsTo(Disposition::class, 'id_disposition', 'id_disposition');
}
}
