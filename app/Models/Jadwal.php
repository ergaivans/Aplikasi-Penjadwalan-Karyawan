<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = "jadwal";

    public static function getJadwal()
    {
        $records = DB::table('jadwal as jd')
        ->select('jd.ID_JADWAL','ka.NAMA_KARYAWAN','jd.JADWAL','jd.TANGGAL','jd.KETERANGAN')
        ->join('karyawan as ka', 'ka.ID_KARYAWAN' , '=' , 'jd.ID_KARYAWAN')
        ->get()
        ->toArray();
        return $records;
    }
    public static function getJadwal2()
    {
        $records = DB::table('jadwal as jd')
        ->select('jd.ID_JADWAL','ka.NAMA_KARYAWAN','jd.JADWAL','jd.TANGGAL','jd.KETERANGAN','jd.REALISASI_JADWAL')
        ->join('karyawan as ka', 'ka.ID_KARYAWAN' , '=' , 'jd.ID_KARYAWAN')
        ->get()
        ->toArray();
        return $records;
    }
}
