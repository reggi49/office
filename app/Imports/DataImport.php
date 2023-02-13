<?php

namespace App\Imports;

use App\DataPro;
use Maatwebsite\Excel\Concerns\ToModel;

class DataImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DataPro([
            'id' => $row[1],
            'region' => $row[2],
            'provinsi' => $row[3],
            'kota' => $row[4],
            'klasifikasi' => $row['5'],
            'subklasifikasi' => $row['6'],
            'kriteria' => $row['7'],
            'status' => $row['19'],
            'toko' => $row['8'],
            'alamat' => $row['9'],
            'phone' => $row['10'],
            'faxs' => $row['11'],
            'email' => $row['12'],
            'hp' => $row['13'],
            'contact' => $row['14'],
            'b_day' => $row['15'],
            'alamat_rumah' => $row['16'],
            'religion' => $row['17'],
            'celebration' => $row['18'],
            'latitude' => $row['20'],
            'longitude' => $row['21'],
            'gambar' => $row['22'],
            'gambar2' => $row['23'],
            'id_prov' => $row['24'],
            'id_kota' => $row['25'],
            'keterangan' => $row['26'],
            'created_at' => $row['27'],
            'updated_at' => $row['28'],
        ]);
    }
}
