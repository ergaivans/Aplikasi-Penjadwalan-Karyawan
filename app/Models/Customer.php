<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customer";

    public static function getCustomer()
    {
        $records =  DB::table('customer as cs')
        ->select('kar.NAMA_KARYAWAN','kar.JABATAN','cs.NAMA_CUSTOMER','cs.NOTLP_CUS','dc.UNIT_MINAT','dc.NOMINAL',DB::raw('CASE WHEN cs.JENIS = 0 THEN "Belum Terklasifikasikan" WHEN cs.JENIS = 1 THEN "Prospek" ELSE "Hot Prospek" END AS JENIS'))
        ->leftjoin('detailcustomer as dc', 'dc.ID_CUSTOMER','=', 'cs.ID_CUSTOMER' )
        ->join('laporan as lp','lp.ID_LAPORAN','=','cs.ID_LAPORAN')
        ->leftjoin('karyawan as kar','kar.ID_KARYAWAN','=','lp.ID_KARYAWAN')
        ->get()
        ->toArray();
        return $records;
    }
}
