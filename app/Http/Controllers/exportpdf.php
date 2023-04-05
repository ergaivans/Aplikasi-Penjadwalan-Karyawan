<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;
class exportpdf extends Controller
{
   public function downloadpdfjadwal ()
   {
        $data8 = Jadwal::getJadwal2();
        $pdf = PDF::loadView('monitorjadwalpdf',compact('data8'));
        return $pdf->download('jadwal.pdf');
   }
}
