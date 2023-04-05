<?php

namespace App\Exports;

use App\Models\Jadwal;
use App\Jadwalkar;
use Illuminate\Contracts\View\View;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class JadwalExport implements FromCollection,WithHeadings,ShouldAutoSize
{
    public function headings():array{
        return[
                 'ID JADWAL','NAMA KARYAWAN','JADWAL','TANGGAL','KETERANGAN'
                  ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Customer::all();
        return collect(Jadwal::getJadwal());
    }
}

