<?php

namespace App\Exports;

use App\DataPro;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return DataPro::all();
        return DataPro::select('region', 'provinsi','kota','klasifikasi','subklasifikasi','kriteria','toko','alamat','alamat_2','phone','faxs','email', 'hp','contact','b_day','alamat_rumah','religion','celebration','status','latitude','longitude','keterangan', 'deleted_at');
    }
}