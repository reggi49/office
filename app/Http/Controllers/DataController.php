<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\DataPro;
use PDF;
use Image;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $datapro= new \App\DataPro;
        $datapro->region=$request->get('region');
        $datapro->provinsi=substr($request->get('provinsi'),3);
        $datapro->kota=$request->get('kota');
        $datapro->klasifikasi=$request->get('klasifikasi');
        $datapro->subklasifikasi=$request->get('subklasifikasi');
        $datapro->kriteria=$request->get('kriteria');
        $datapro->toko=$request->get('toko');
        $datapro->alamat=$request->get('alamat_toko');
        $datapro->alamat_2=$request->get('alamat_toko');
        $datapro->phone=$request->get('telp');
        $datapro->faxs=$request->get('telp');
        $datapro->email=$request->get('email');
        $datapro->hp=$request->get('phone');
        $datapro->contact=$request->get('contact');
        $date=date_create($request->get('birthday'));
        $datapro->b_day = date_format($date,"Y-m-d");
        // $datapro->b_day = strtotime($format);
        $datapro->alamat_rumah=$request->get('alamat_rumah');
        // $datapro->id=1;
        $datapro->religion=$request->get('religion');
        $datapro->celebration=$request->get('celebration');
        $datapro->keterangan=$request->get('keterangan');
        $datapro->latitude=$request->get('latitude');
        $datapro->longitude=$request->get('longitude');
        $datapro->status=$request->get('status');
        // $datapro->deleted_at='2018-00-00';
        if($request->hasfile('gambar1')){
            $datapro->gambar=$this->uploadFoto($request);
            $datapro->save();
        }else{
            $datapro->gambar = "noimage.jpg";
            $datapro->save();
        }
        // dd($datapro);
        // $datapro->save();
        
        return redirect('data')->with('success', 'Information has been added');
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
        $datapro= DataPro::find($id);
        $datapro->region=$request->get('region');
        $datapro->provinsi=substr($request->get('provinsi'),3);
        $datapro->kota=$request->get('kota');
        $datapro->klasifikasi=$request->get('klasifikasi');
        $datapro->subklasifikasi=$request->get('subklasifikasi');
        $datapro->kriteria=$request->get('kriteria');
        $datapro->toko=$request->get('toko');
        $datapro->alamat=$request->get('alamat_toko');
        $datapro->alamat_2=$request->get('alamat_toko');
        $datapro->phone=$request->get('telp');
        $datapro->faxs=$request->get('telp');
        $datapro->email=$request->get('email');
        $datapro->hp=$request->get('phone');
        $datapro->contact=$request->get('contact');
        $date=date_create($request->get('birthday'));
        $datapro->b_day = date_format($date,"Y-m-d");
        // $datapro->b_day = strtotime($format);
        $datapro->alamat_rumah=$request->get('alamat_rumah');
        $datapro->religion=$request->get('religion');
        $datapro->celebration=$request->get('celebration');
        $datapro->keterangan=$request->get('keterangan');
        $datapro->latitude=$request->get('latitude');
        $datapro->longitude=$request->get('longitude');
        $datapro->status=$request->get('status');
        // $datapro->deleted_at='2018-00-00';
        if($request->hasfile('gambar1')){
            $datapro->gambar= $this->uploadFoto($request);
            $datapro->save();
        }else{
            $datapro->save();
        }
        
        return redirect()->back()->with('message', "Informasi berhasil diperbaharui");;
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
        return redirect('data')->with('success','Information has been  deleted');
    }

    private function uploadFoto(Request $request)
    {
        $this->validate($request, [
            'gambar1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // $foto = $request->file('gambar1') ;
        // $ext = $foto->getClientOriginalExtension();
         
        $image = $request->file('gambar1');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        
        $destinationPath = public_path('images/thumbnail');
        Image::configure(array('driver' => 'imagick'));
        $img = Image::make($image->getRealPath());
        $img->resize(250, 150, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
   
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);
   
        // $this->postImage->add($input);

        // if($request->file('gambar1')->isValid()){
        //     $namaFoto = md5(date('YmdHis')).".$ext";
        //     $upload_path = 'images';
        //     $request->file('gambar1')->move($upload_path, $namaFoto);
        //     return $namaFoto;
        // }
        return $input['imagename'];
    }

    public function getKota($id) 
    {
        $idkota = substr($id,0,2);
        $datakotas = DB::table('kabupaten')->where('id_prov', $idkota)->orderBy('nama', 'asc')->get();
        echo "<option value=''>Pilih Kota/Kab</option>";
        foreach ($datakotas as $datakota) {
            echo "<option value='{$datakota->nama}'>{$datakota->nama}</option>";
        };
        return;
    }

    public function detailpdf($id)
    {
        // $data= DataPro::find($id);
        // dd($data);
        // $dataprovinsi = DB::table('provinsi')->get();

        $data = DataPro::find($id);
        view()->share('data',$data);

        $pdf = PDF::loadView('exportpdf.detail', $data);

        return $pdf->stream('detailpdf.pdf');

    }
    public function allpdf()
    {
        // $data= DataPro::find($id);
        // dd($data);
        // $dataprovinsi = DB::table('provinsi')->get();

        $items = DataPro::all();
        view()->share('items',$items);

        $pdf = PDF::loadView('exportpdf.all', $items);

        return $pdf->stream('allpdf.pdf');

    }
}
