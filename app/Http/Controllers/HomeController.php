<?php

namespace App\Http\Controllers;
use App\DataPro;
use DataTables;

use Illuminate\Http\Request;

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
        return view('home');
    }

    public function datambtech(){
        $datapro = DataPro::paginate(10);
       
        // dd($datapro);
        return view("datatable",compact('datapro'));        
    }

    public function getPosts(Request $request)
    {
        $iduser = $request->user()->level;
        if($iduser == 1){
            $datapro = DataPro::select(['id', 'region', 'provinsi', 'kota', 'kecamatan', 'status', 'toko', 'alamat', 'phone']);
            return \DataTables::of($datapro)
            ->addColumn('action', function ($datapro) {
                    return 
                        \Form::open(array('method'=>'DELETE', 'route' => array('data.data.destroy',"$datapro->id"),'onsubmit' => 'return ConfirmDelete()')) .
                        '<a href="detailpdf/'.$datapro->id.'" class=""><i class="fa fa-print"></i></a> | ' .
                        '<a href="data/'.$datapro->id.'/edit" class=""><i class="fa fa-edit"></i></a> | ' .
                        \Form::button('<i class="fa fa-trash-o"></i>', array('type' => 'submit','class'=>'')) .
                        \Form::close();
            })
            ->make(true);
        }else if ($iduser == 2){
            $datapro = DataPro::select(['id', 'region', 'provinsi', 'kota', 'kecamatan', 'status', 'toko', 'alamat', 'phone']);
            return \DataTables::of($datapro)
            ->addColumn('action', function ($datapro) {
                return 
                    \Form::open(array('method'=>'DELETE', 'route' => array('data.data.destroy',"$datapro->id"),'onsubmit' => 'return ConfirmDelete()')) .
                    '<a href="detailpdf/'.$datapro->id.'" class=""><i class="fa fa-print"></i></a> | ' .
                    '<a href="data/'.$datapro->id.'/edit" class=""><i class="fa fa-edit"></i></a>' .
                    \Form::close();
                    })
            ->make(true);
        }else{
            $datapro = DataPro::select(['id', 'region', 'provinsi', 'kota', 'kecamatan', 'status', 'toko', 'alamat', 'phone']);
            return \DataTables::of($datapro)
            ->addColumn('action', function ($datapro) {
                 return 
                    \Form::open(array('method'=>'DELETE', 'route' => array('data.data.destroy',"$datapro->id"),'onsubmit' => 'return ConfirmDelete()')) .
                    '<a href="detailpdf/'.$datapro->id.'" class=""><i class="fa fa-print"></i></a>' .
                    \Form::close();
                    })
            ->make(true);
        }
    }
    //$posts = Post::with('author','category')
}
