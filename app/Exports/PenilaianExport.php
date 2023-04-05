<?php

namespace App\Exports;

use App\Models\Penilaian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PenilaianExport implements FromCollection,WithHeadings,ShouldAutoSize
{
    public function headings():array{
        return[
            'NAMA_KARYAWAN','TOTAL_WI','PELANGGAN','CLOSING','CLOSING_AGENT_UNDER_TOTAL'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Karyawan::all();
        return collect(Penilaian::getPenilaian());
    }
}
