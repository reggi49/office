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
        $datapro = DataPro::select(['id', 'region', 'provinsi', 'kota', 'kecamatan', 'status', 'toko', 'alamat', 'phone']);
        return \DataTables::of($datapro)
        ->addColumn('action', function ($datapro) {
            return 
                \Form::open(array('method'=>'DELETE', 'route' => array('data.data.destroy',"$datapro->id"))) .
                '<a href="'.$datapro->id.'/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                    | ' .
                \Form::button('<i class="fa fa-trash"></i>', array('type' => 'submit','class'=>'btn btn-xs btn-danger')) .
                \Form::close();
        })
        // ->editColumn('created_at', function ($datapro) {
        //     return $datapro->created_at->format('Y/m/d');
        // })
        // ->addColumn('status', function ($datapro) {
        //     return 'published';
        // })
        // ->editColumn('id', 'ID: {{$id}}')
        // ->removeColumn('password')
        ->make(true);
    }
    //$posts = Post::with('author','category')
}
