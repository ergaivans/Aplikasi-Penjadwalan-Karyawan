<?php

namespace App\Exports;

use App\Models\Laporan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class LaporanExport implements FromCollection,WithHeadings,ShouldAutoSize
{
    public function headings():array{
        return[
            'ID_LAPORAN','ID_KARYAWAN','TANGGAL_LAPORAN','KEGIATAN','KETERANGAN','DOKUMETASI','WI'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Laporan::all();
        return collect(Laporan::getLaporan());
    }
}
