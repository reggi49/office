<?php

namespace App\Exports;

use App\DataPro;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return DataPro::all();
        return DataPro::select('region', 'provinsi','kota','klasifikasi','subklasifikasi','kriteria','toko','alamat','alamat_2','phone','faxs','email', 'hp','contact','b_day','alamat_rumah','religion','celebration','status','latitude','longitude','keterangan', 'deleted_at')->get();
    }

    public function headings(): array
    {
        return [
            'Region', 'Provinsi', 'Kota', 'Klasifikasi', 'Subklasifikasi', 'Kriteria', 'Toko', 'Alamat', 'Alamat 2', 'No Telp', 'Faxs', 'Email', 'No Handphone', 'Kontak', 'Tanggal Lahir', 'Alamat Rumah', 'Agama', 'Hari Raya', 'Status', 'Latitude', 'Longitude', 'Keterangan', 'Tangggal Di-delete'
        ];
    }

}