<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\DataPro;
use PDF;

use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datapro = DataPro::paginate(10);
       
        // dd($datapro);
        return view("data.index",compact('datapro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataprovinsi = DB::table('provinsi')->get();
        return view('data.create', compact('dataprovinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasfile('gambar1'))
         {
            $file = $request->file('gambar1');
            $gambar1=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $gambar1);
         }
        $datapro= new \App\DataPro;
        $datapro->region=$request->get('region');
        $datapro->provinsi=$request->get('provinsi');
        $datapro->kota=$request->get('kota');
        $datapro->kecamatan=$request->get('klasifikasi');
        $datapro->toko=$request->get('toko');
        $datapro->alamat=$request->get('alamat_toko');
        $datapro->alamat_2=$request->get('alamat_toko');
        $datapro->phone=$request->get('telp');
        $datapro->faxs=$request->get('fax');
        $datapro->email=$request->get('email');
        $datapro->hp=$request->get('phone');
        $datapro->contact=$request->get('contact');
        $date=date_create($request->get('birthday'));
        $datapro->b_day = date_format($date,"Y-m-d");
        // $datapro->b_day = strtotime($format);
        $datapro->alamat_rumah=$request->get('alamat_rumah');
        $datapro->id=1;
        $datapro->religion=$request->get('religion');
        $datapro->celebration=$request->get('celebration');
        $datapro->keterangan=$request->get('keterangan');
        $datapro->status=$request->get('status');
        // $datapro->deleted_at='2018-00-00';
        $datapro->gambar=$gambar1;
        // dd($datapro);
        $datapro->save();
        
        return redirect('index')->with('success', 'Information has been added');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Post::published()->findOrFail($id);
        
        return view('data.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datapro = DataPro::find($id);
        $dataprovinsi = DB::table('provinsi')->get();
        return view('data.edit',compact('datapro','id','dataprovinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $passport= DataPro::find($id);
        $datapro= new \App\DataPro;
        $datapro->region=$request->get('region');
        $datapro->provinsi=$request->get('provinsi');
        $datapro->kota=$request->get('kota');
        $datapro->kecamatan=$request->get('klasifikasi');
        $datapro->toko=$request->get('toko');
        $datapro->alamat=$request->get('alamat_toko');
        $datapro->alamat_2=$request->get('alamat_toko');
        $datapro->phone=$request->get('telp');
        $datapro->faxs=$request->get('fax');
        $datapro->email=$request->get('email');
        $datapro->hp=$request->get('phone');
        $datapro->contact=$request->get('contact');
        $date=date_create($request->get('birthday'));
        $datapro->b_day = date_format($date,"Y-m-d");
        // $datapro->b_day = strtotime($format);
        $datapro->alamat_rumah=$request->get('alamat_rumah');
        $datapro->id=1;
        $datapro->religion=$request->get('religion');
        $datapro->celebration=$request->get('celebration');
        $datapro->keterangan=$request->get('keterangan');
        $datapro->status=$request->get('status');
        // $datapro->deleted_at='2018-00-00';
        $datapro->gambar=$gambar1;
        $datapro->save();
        return redirect('data')->with('success', 'Information has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datapro = DataPro::find($id);
        $datapro->delete();
        return redirect('passports')->with('success','Information has been  deleted');
    }

    public function detailpdf($id)
    {
        // $data= DataPro::find($id);
        // dd($data);
        // $dataprovinsi = DB::table('provinsi')->get();

        $data = DataPro::find($id);
        view()->share('data',$data);

        $pdf = PDF::loadView('exportpdf.detail', $data);

        return $pdf->download('detailpdf.pdf');

    }
    public function allpdf()
    {
        // $data= DataPro::find($id);
        // dd($data);
        // $dataprovinsi = DB::table('provinsi')->get();

        $items = DataPro::all();
        view()->share('items',$items);

        $pdf = PDF::loadView('exportpdf.all', $items);

        return $pdf->download('allpdf.pdf');

    }
}
