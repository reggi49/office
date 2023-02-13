<?php

namespace App\Http\Controllers;

use App\DataPro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use PDF;


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

        return view('data.index', compact('datapro'));
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
        $datapro = new \App\DataPro;
        $datapro->region = $request->get('region');
        $datapro->provinsi = substr($request->get('provinsi'), 3);
        $datapro->kota = $request->get('kota');
        $datapro->klasifikasi = $request->get('klasifikasi');
        $datapro->subklasifikasi = $request->get('subklasifikasi');
        $datapro->kriteria = $request->get('kriteria');
        $datapro->toko = $request->get('toko');
        $datapro->alamat = $request->get('alamat_toko');
        $datapro->alamat_2 = $request->get('alamat_toko');
        $datapro->phone = $request->get('telp');
        $datapro->faxs = $request->get('telp');
        $datapro->email = $request->get('email');
        $datapro->hp = $request->get('phone');
        $datapro->contact = $request->get('contact');
        $date = date_create($request->get('birthday'));
        $datapro->b_day = date_format($date, 'Y-m-d');
        // $datapro->b_day = strtotime($format);
        $datapro->alamat_rumah = $request->get('alamat_rumah');
        // $datapro->id=1;
        $datapro->religion = $request->get('religion');
        $datapro->celebration = $request->get('celebration');
        $datapro->keterangan = 'edited by ' . $request->user()->name . $request->user()->id;
        // $datapro->keterangan=$request->get('keterangan');
        $datapro->latitude = $request->get('latitude');
        $datapro->longitude = $request->get('longitude');
        $datapro->status = $request->get('status');
        if ($request->hasfile('gambar1') && $request->hasfile('gambar2')) {
            $datapro->gambar = $this->uploadFoto($request);
            $datapro->gambar2 = $this->uploadProfil($request);
            // dd($datapro);
            $datapro->save();
        } elseif ($request->hasfile('gambar1')) {
            $datapro->gambar = $this->uploadFoto($request);
            $datapro->save();
        } elseif ($request->hasfile('gambar2')) {
            $datapro->gambar2 = $this->uploadProfil($request);
            $datapro->save();
        } else {
            $datapro->save();
        }

        // dd($datapro);
        // $datapro->save();

        return redirect('data')->with('message', 'Data ' . $datapro->toko . ' Berhasil Ditambahkan, Silahkan Dicek Kembali.');
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
        
        return view('data.show', compact('item'));
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

        return view('data.edit', compact('datapro','id','dataprovinsi'));
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
        $datapro = DataPro::find($id);
        $datapro->region = $request->get('region');
        $datapro->provinsi = substr($request->get('provinsi'), 3);
        $datapro->kota = $request->get('kota');
        $datapro->klasifikasi = $request->get('klasifikasi');
        $datapro->subklasifikasi = $request->get('subklasifikasi');
        $datapro->kriteria = $request->get('kriteria');
        $datapro->toko = $request->get('toko');
        $datapro->alamat = $request->get('alamat_toko');
        $datapro->alamat_2 = $request->get('alamat_toko');
        $datapro->phone = $request->get('telp');
        $datapro->faxs = $request->get('telp');
        $datapro->email = $request->get('email');
        $datapro->hp = $request->get('phone');
        $datapro->contact = $request->get('contact');
        $date = date_create($request->get('birthday'));
        $datapro->b_day = date_format($date, 'Y-m-d');
        // $datapro->b_day = strtotime($format);
        $datapro->alamat_rumah = $request->get('alamat_rumah');
        $datapro->religion = $request->get('religion');
        $datapro->celebration = $request->get('celebration');
        // $datapro->keterangan=$request->get('keterangan');
        $datapro->keterangan = 'edited by ' . $request->user()->name . $request->user()->id;
        $datapro->latitude = $request->get('latitude');
        $datapro->longitude = $request->get('longitude');
        $datapro->status = $request->get('status');
        if ($request->hasfile('gambar1') && $request->hasfile('gambar2')) {
            $datapro->gambar = $this->uploadFoto($request);
            $datapro->gambar2 = $this->uploadProfil($request);
            $datapro->save();
        } elseif ($request->hasfile('gambar1')) {
            $datapro->gambar = $this->uploadFoto($request);
            $datapro->save();
        } elseif ($request->hasfile('gambar2')) {
            $datapro->gambar2 = $this->uploadProfil($request);
            $datapro->save();
        } else {
            $datapro->save();
        }

        return redirect()->back()->with('message', 'Informasi berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $datapro = DataPro::find($id);
        $datapro->deleted_at = date('Y-m-d H:i:s');
        $datapro->keterangan = 'deleted by ' . $request->user()->name . $request->user()->id;
        $datapro->save();
        // $datapro->delete();
        return redirect('data')->with('success', 'Information has been  deleted');
    }

    private function uploadFoto(Request $request)
    {
        $this->validate($request, [
            'gambar1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // $foto = $request->file('gambar1') ;
        // $ext = $foto->getClientOriginalExtension();
        $toko = $request->get('toko');
        $cleantoko = str_replace('/', '', $toko);
        $image = $request->file('gambar1');
        $input['imagename'] = $cleantoko.time().'.'.$image->getClientOriginalExtension();

        $destinationPath = str_replace('office/public', 'html', public_path()) . '/office/images/thumbnail';
        // Image::configure(array('driver' => 'imagick'));
        $img = Image::make($image->getRealPath());
        $img->resize(250, 150, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);

        $destinationPath = str_replace('office/public', 'html', public_path()) . '/office/images';
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

    private function uploadProfil(Request $request)
    {
        $this->validate($request, [
            'gambar2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $toko = $request->get('toko');
        $cleantoko = str_replace('/', '', $toko);
        $image = $request->file('gambar2');
        $input['imagename'] = 'profil-'.$cleantoko.time().'.'.$image->getClientOriginalExtension();

        $destinationPath = str_replace('office/public', 'html', public_path()) . '/office/images/thumbnail';
        // Image::configure(array('driver' => 'imagick'));
        $img = Image::make($image->getRealPath());
        $img->resize(150, 150, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);

        $destinationPath = str_replace('office/public', 'html', public_path()) . '/office/images';
        $image->move($destinationPath, $input['imagename']);

        return $input['imagename'];
    }

    public function getKota($id)
    {
        $idkota = substr($id, 0, 2);
        $datakotas = DB::table('kabupaten')->where('id_prov', $idkota)->orderBy('nama', 'asc')->get();
        echo "<option value=''>Pilih Kota/Kab</option>";
        foreach ($datakotas as $datakota) {
            echo "<option value='{$datakota->nama}'>{$datakota->nama}</option>";
        };
    }

    public function detailpdf($id)
    {
        // $data= DataPro::find($id);
        // dd($data);
        // $dataprovinsi = DB::table('provinsi')->get();

        $data = DataPro::find($id);
        view()->share('data', $data);

        $pdf = PDF::loadView('exportpdf.detail', $data);

        return $pdf->stream('detailpdf.pdf');
    }

    public function allpdf()
    {
        // $data= DataPro::find($id);
        // dd($data);
        // $dataprovinsi = DB::table('provinsi')->get();

        $items = DataPro::all();
        view()->share('items', $items);

        $pdf = PDF::loadView('exportpdf.all', $items);

        return $pdf->stream('allpdf.pdf');
    }
}
