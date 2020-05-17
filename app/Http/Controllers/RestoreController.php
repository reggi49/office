<?php

namespace App\Http\Controllers;

use App\DataPro;
use App\Exports\DataExport;
use Illuminate\Support\Facades\DB;
// use Maatwebsite\Excel\Facades\Excel;
use Excel;

use Illuminate\Http\Request;

class RestoreController extends Controller
{
    public function importExport()
    {
        return view('restore/importExport');
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadExcel($type)
    {
		return Excel::download(new DataExport, 'data.xlsx');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function importExcel(Request $request)
    {

        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('excel',$nama_file);
 
		// import data
		Excel::import(new RestoreController, public_path('/excel/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data Seat Maker Berhasil Diimport!');
 
    }
}
