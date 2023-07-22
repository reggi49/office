<?php

namespace App\Exports;

use App\DataPro;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use DateTime;

class DataExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return DataPro::all();
        return DataPro::select('region', 'provinsi', 'kota', 'klasifikasi', 'subklasifikasi', 'kriteria', 'toko', 'alamat', 'alamat_2', 'phone', 'faxs', 'email', 'hp', 'contact', 'b_day', 'alamat_rumah', 'religion', 'celebration', 'status', 'latitude', 'longitude', 'keterangan', 'deleted_at')->get();
    }

    public function headings(): array
    {
        return [
            'Region', 'Provinsi', 'Kota', 'Klasifikasi', 'Subklasifikasi', 'Kriteria', 'Toko', 'Alamat', 'Alamat 2', 'No Telp', 'Faxs', 'Email', 'No Handphone', 'Kontak', 'Tanggal Lahir', 'Alamat Rumah', 'Agama', 'Hari Raya', 'Status', 'Latitude', 'Longitude', 'Keterangan', 'Tangggal Di-delete'
        ];
    }

    public function map($row): array
    {
        $birthDate = DateTime::createFromFormat('Y-m-d', $row->b_day);
        $tglLahir = $birthDate ? $birthDate->format('d/m/Y') : 'Invalid Date';
        $deletedAt = DateTime::createFromFormat('Y-m-d', $row->deleted_at);
        $tglDelete = $deletedAt ? $deletedAt->format('d/m/Y') : 'Invalid Date';

        return [
            $row->region, $row->provinsi, $row->kota, $row->klasifikasi, $row->subklasifikasi, $row->kriteria, $row->toko, $row->alamat, $row->alamat_2, $row->phone, $row->faxs, $row->email, $row->hp, $row->contact, $tglLahir, $row->alamat_rumah, $row->religion, $row->celebration, $row->status, $row->latitude, $row->longitude, $row->keterangan, $tglDelete,
        ];
    }
}
