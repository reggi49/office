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
        return DataPro::select('Region', 'Provinsi','Kota','Klasifikasi','Subklasifikasi','Kriteria','Toko','Alamat','Alamat ke 2','No Telp','Faxs','Email', 'No Handphone','Kontak','Tanggal Lahir','Alamat Rumah','Agama','Hari Raya','Status','latitude','Longitude','Keterangan', 'tanggal Di-delete');
    }
}