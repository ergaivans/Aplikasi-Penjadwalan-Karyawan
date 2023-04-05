<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\JadwalExport;
use App\Exports\KaryawanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanExport;
use App\Exports\CustomerExport;
use App\Exports\PenilaianExport;
class exportexcel extends Controller
{

    public function exportcustomer(){
        return Excel::download(new CustomerExport,'Customer.xlsx');
    }
    public function exportjadwal () {
        return Excel::download(new JadwalExport,'Jadwal.xlsx');
    }
    public function exportkaryawan () {
        return Excel::download(new KaryawanExport,'Karyawan.xlsx');
    }
    public function exportlaporan() {
        return Excel::download(new LaporanExport,'Laporan.xlsx');
    }
    public function exportpenilaian() {
        return Excel::download(new PenilaianExport,'Rekap-Penilaian.xlsx');
    }


}
