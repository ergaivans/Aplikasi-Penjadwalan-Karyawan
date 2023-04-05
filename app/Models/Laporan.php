<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Laporan extends Model
{
    use HasFactory;
    protected $table = "laporan";

    public static function getLaporan()
{
    $records = DB::table('laporan')->select('ID_LAPORAN','ID_KARYAWAN','TANGGAL_LAPORAN','KEGIATAN','KETERANGAN','DOKUMENTASI','WI')->get()->toArray();
    return $records;
}
}
