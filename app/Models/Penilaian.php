<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Penilaian extends Model
{
    use HasFactory;
    protected $table = "periode_pel";

    public static function getPenilaian()
    {
        $records = DB::table('periode_pel')
        ->select('NAMA_KARYAWAN','TOTAL_WI','PELANGGAN','CLOSING','CLOSING_AGENT_UNDER_TOTAL')
        ->get()
        ->toArray();
        return $records;
    }
}
