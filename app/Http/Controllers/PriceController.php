<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Price;

class PriceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $pricemobil = Price::orderBy('id')
        ->where('category', 'mobil')
        ->WhereNull('deleted_at')
        ->get();

        $pricemotor = Price::orderBy('id')
        ->where('category', 'motor')
        ->WhereNull('deleted_at')
        ->get();

        $pricesofa = Price::orderBy('id')
        ->where('category', 'sofa')
        ->WhereNull('deleted_at')
        ->get();

        return view('price.index', compact('pricemobil','pricemotor','pricesofa'));
    }
    public function create()
    {
        return view('price.create');
    }
    public function show($id)
    {
        $item = Post::published()->findOrFail($id);
        
        return view('data.show',compact('item'));
    }
    public function edit($id) 
    {
        $price = Price::find($id);
        return view('price.edit',compact('price','id'));
    }
    public function store(Request $request)
    {
        $price= new \App\Price;
        $price->name=$request->get('name');
        $price->category=$request->get('category');
        $price->products=$request->get('products');
        $price->first_specs=$request->get('first_specs');
        $price->second_specs=$request->get('second_specs');
        $price->third_specs=$request->get('third_specs');
        $price->keterangan= 'diinput by '.$request->user()->name.$request->user()->id;
        if($request->hasfile('gambar')){
            $price->gambar= $this->uploadFoto($request);
            $price->save();
        }
        $price->save();
        
        // dd($datapro);
        
        return redirect('price')->with('message', ' Harga '.$price->name.' Berhasil Ditambahkan, Silahkan Dicek Kembali.');
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
        $price= Price::find($id);
        $price->name=$request->get('name');
        $price->category=$request->get('category');
        $price->products=$request->get('products');
        $price->first_specs=$request->get('first_specs');
        $price->second_specs=$request->get('second_specs');
        $price->third_specs=$request->get('third_specs');
        $price->keterangan= 'edited by '.$request->user()->name.$request->user()->id;
        if($request->hasfile('gambar')){
            $price->gambar= $this->uploadFoto($request);
            $price->save();
        }
        $price->save();
        
        return redirect()->back()->with('message', ' Harga '.$price->name.' berhasil diperbaharui');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $price = Price::find($id);
        $price->deleted_at = date("Y-m-d H:i:s");
        $price->keterangan= 'deleted by '.$request->user()->name.$request->user()->id;
        $price->save();
        // $datapro->delete();
        return redirect('price')->with('message',' Harga Berhasil Dihapus');
    }

    private function uploadFoto(Request $request)
    {
        $this->validate($request, [
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // $foto = $request->file('gambar1') ;
        // $ext = $foto->getClientOriginalExtension();
        $toko = $request->get('name');
        $cleanname = str_replace("/", "", $toko);
        $image = $request->file('gambar');
        $input['imagename'] = $cleanname.time().'.'.$image->getClientOriginalExtension();
        
        $destinationPath = str_replace("office/public","html",public_path()).'/office/images/thumbnail';
        // Image::configure(array('driver' => 'imagick'));
        $img = Image::make($image->getRealPath());
        $img->resize(250, 250, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
   
        $destinationPath = str_replace("office/public","html",public_path()).'/office/images';
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
}
