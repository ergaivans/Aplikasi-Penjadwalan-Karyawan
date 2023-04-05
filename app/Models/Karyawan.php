<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = "karyawan";

    public static function getKaryawan()
    {
        $records = DB::table('karyawan')
        ->select('ID_KARYAWAN','NAMA_KARYAWAN','NO_TLP','TTL','ALAMAT','JABATAN','ID_PENANGGUNG','EMAIL','ID_USER','PASSWORD')
        ->get()
        ->toArray();
        return $records;
    }
}
