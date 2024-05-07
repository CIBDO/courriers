<?php

namespace App\Http\Controllers;
use App\Models\Imputation;
use App\Models\ReceptionCourrier;
use App\Models\Personnel;
use App\Models\Service;
use App\Models\Courrier;
use App\Models\BordereauEnvoi;
 
class DashboardController extends Controller
{
    public function index()
    {
        $receptionCourriers = ReceptionCourrier::paginate(6);

        $totalReceptionCourriers = ReceptionCourrier::count();
        $totalBordereauEnvois = BordereauEnvoi::count();
        $totalImputations = Imputation::count();
        $totalPersonnels = Personnel::count();

        return view('pages.home.index', [
            'receptionCourriers' => $receptionCourriers,
            'totalReceptionCourriers' => $totalReceptionCourriers,
            'totalBordereauEnvois' => $totalBordereauEnvois,
            'totalImputations' => $totalImputations,
            'totalPersonnels' => $totalPersonnels,
        ]);
       
    }
        
    
}