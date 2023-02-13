<?php

namespace App\Http\Controllers;

use App\DataPro;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alldata = DB::table('data_pros')->count();
        $mobil = 'mobil';
        $dataMobil = DB::table('data_pros')
                ->where('subklasifikasi', 'LIKE', "{$mobil}%")
                ->where('status', '!=', '')
                ->count();
        $motor = 'motor';
        $dataMotor = DB::table('data_pros')
                ->where('subklasifikasi', 'LIKE', "{$motor}%")
                // ->where('status', 'LIKE', "")
                ->count();
        $interior = 'furniture';
        $dataInterior = DB::table('data_pros')
                ->where('subklasifikasi', 'LIKE', "{$interior}%")
                ->where('status', '!=', '')
                ->count();
        $lokasi = DB::table('data_pros')
                ->whereNotNull('latitude')
                ->whereNotNull('longitude')
                ->count();

        return view('home', compact('alldata', 'lokasi', 'dataMobil', 'dataMotor', 'dataInterior'));
    }

    public function datambtech()
    {
        $datapro = DataPro::paginate(10);
        // dd($datapro);
        return view('datatable', compact('datapro'));
    }

    public function getPosts(Request $request)
    {
        $iduser = $request->user()->level;
        if ($iduser == 1) {
            $datapro = DataPro::select(['id', 'region', 'provinsi', 'kota', 'klasifikasi', 'subklasifikasi', 'kriteria', 'status', 'toko', 'alamat', 'hp', 'phone', 'latitude', 'longitude', 'deleted_at'])->where('deleted_at', null);
            return \DataTables::of($datapro)
            ->addColumn('action', function ($datapro) {
                return
                    \Form::open(['method' => 'DELETE', 'route' => ['data.data.destroy', "$datapro->id"], 'onsubmit' => 'return ConfirmDelete()']) .
                    '<a href="detailpdf/' . $datapro->id . '" target="_blank" class=""><i class="fa fa-print"></i></a> | ' .
                    '<a href="data/' . $datapro->id . '/edit" class=""><i class="fa fa-edit"></i></a> | ' .
                    ($datapro->latitude == null ? '' : '<a href="https://www.google.com/maps/dir/?api=1&destination=' . $datapro->latitude . ',' . $datapro->longitude . '" target="_blank"><i class="fa fa-map"></i></a> | ') .
                    \Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'class' => '']) .
                    \Form::close();
                })
            ->make(true);
        } else {
            $datapro = DataPro::select(['id', 'region', 'provinsi', 'kota', 'klasifikasi', 'subklasifikasi', 'kriteria', 'status', 'toko', 'alamat', 'hp', 'phone', 'latitude', 'longitude'])->where('deleted_at', null);
            return \DataTables::of($datapro)
            ->addColumn('action', function ($datapro) {
                return
                    \Form::open(['method' => 'DELETE', 'route' => ['data.data.destroy', "$datapro->id"], 'onsubmit' => 'return ConfirmDelete()']) .
                    '<a href="detailpdf/' . $datapro->id . '" target="_blank" class=""><i class="fa fa-print"></i></a> | ' .
                    '<a href="data/' . $datapro->id . '/edit" class=""><i class="fa fa-edit"></i></a> | ' .
                    ($datapro->latitude == null ? '' : '<a href="https://www.google.com/maps/dir/?api=1&destination=' . $datapro->latitude . ',' . $datapro->longitude . '" target="_blank"><i class="fa fa-map"></i></a> | ') .
                    \Form::close();
                })
            ->make(true);
        }
    }
    //$posts = Post::with('author','category')
}
