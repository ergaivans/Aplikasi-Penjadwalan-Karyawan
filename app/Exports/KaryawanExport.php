<?php

namespace App\Exports;

use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class KaryawanExport implements FromCollection,WithHeadings,ShouldAutoSize
{
    public function headings():array{
        return[
            'ID_KARYAWAN','NAMA_KARYAWAN','NO_TELP','TTL','ALAMAT','JABATAN','ID_PENANGGUNG','EMAIL','ID_USER','PASSWORD'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Karyawan::all();
        return collect(Karyawan::getKaryawan());
    }
}
