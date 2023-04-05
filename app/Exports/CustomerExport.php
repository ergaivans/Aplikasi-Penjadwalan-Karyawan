<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CustomerExport implements FromCollection,WithHeadings,ShouldAutoSize
{
    public function headings():array{
        return[
            'NAMA_KARYAWAN','JABATAN','NAMA_CUSTOMER','NOTLP_CUS','UNIT_MINAT','NOMINAL','JENIS'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Customer::all();
        return collect(Customer::getCustomer());
    }
}
