@extends('layouts.app')
@include('layouts.sidebar')  
@section('content')
   
<div id="right-panel" class="right-panel">

        <!-- Header-->
        @include('layouts/header')
        <!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Data table</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="col-md-12">
                        
                        <div class="card-body">
                            <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>Edit Form</strong> Data Seat Maker
                      </div>
                      <div class="card-body card-block">
                        <form action="{{action('DataController@update', $id)}}" method="post" class="form-horizontal">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="region" class=" form-control-label">Region</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="region" name="region" placeholder="Region" value="{{$datapro->region}}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Provinsi</label></div>
                            <div class="col-12 col-md-9">
                              <select name="provinsi" id="provinsi" class="form-control" onchange="ajaxkota(this.value)">
                                @foreach($dataprovinsi as $provinsi)
                                    <option value="{{ $provinsi->id_prov }},{{ $provinsi->nama }}"
                                      @if (strtolower($provinsi->nama) === strtolower($datapro->provinsi))
                                          selected
                                      @endif
                                      >
                                      {{ $provinsi->nama }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="row form-group" >
                            <div class="col col-md-3"><label for="kota" class=" form-control-label">Kota</label></div>
                            <div class="col-12 col-md-9" id="kab_box">
                              <select name="kota" id="kota" class="form-control">
                                  <option value="{{ $datapro->kota }}">{{ $datapro->kota }}</option>
                              </select>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="klasifikasi" class=" form-control-label">Klasifikasi</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="klasifikasi" name="klasifikasi" placeholder="klasifikasi" value="{{$datapro->kecamatan}}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="toko" class=" form-control-label">Toko</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="toko" name="toko" placeholder="toko" value="{{$datapro->toko}}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="alamat" class=" form-control-label">Alamat Toko</label></div>
                            <div class="col-12 col-md-9"><textarea name="alamat_toko" id="alamat_toko" rows="5" placeholder="Alamat toko" class="form-control">{{$datapro->alamat}}</textarea></div>
                          </div>
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="contact" class=" form-control-label">Contact</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="contact" name="contact" placeholder="Contact" value="{{$datapro->contact}}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="telp" class=" form-control-label">No. Telp / No. Faxs</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="telp" name="telp" placeholder="telp" value="{{$datapro->phone}}" class="form-control"></div>
                          </div>
                          {{-- <div class="row form-group">
                            <div class="col col-md-3"><label for="faxs" class=" form-control-label">No. Fax</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="fax" name="fax" placeholder="Fax Number" value="{{$datapro->faxs}}" class="form-control"></div>
                          </div> --}}
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="email" class=" form-control-label">Email</label></div>
                            <div class="col-12 col-md-9"><input type="email" id="email" name="email" placeholder="Masukan Email" value="{{$datapro->email}}" class="form-control"></div>
                          </div>
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="phone" class=" form-control-label">No. Handphone</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="phone" name="phone" placeholder="Phone" value="{{$datapro->hp}}" class="form-control"></div>
                          </div>
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="birthday" class=" form-control-label">Tanggal Lahir</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="birthday" id="datepicker" placeholder="birthday" value="{{$datapro->b_day}}" class="date form-control""></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="alamat_rumah" class=" form-control-label">Alamat Rumah</label></div>
                            <div class="col-12 col-md-9"><textarea name="alamat_rumah" id="alamat_rumah" rows="5" placeholder="Alamat Rumah" class="form-control">{{$datapro->alamat_rumah}}</textarea></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="keterangan" class=" form-control-label">Keterangan</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="keterangan" name="keterangan" placeholder="Keterangan"  value="{{$datapro->keterangan}}" class="form-control"></div>
                          </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="contact" class=" form-control-label">Agama</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="religion" name="religion" placeholder="Agama" value="{{$datapro->religion}}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="contact" class=" form-control-label">Hari Raya</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="celebration" name="celebration" placeholder="Hari Raya" value="{{$datapro->celebration}}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Status</label></div>
                            <div class="col col-md-9">
                              <div class="form-check-inline form-check">
                                <label for="status" class="form-check-label ">
                                <input type="radio" id="status" name="status" value="X"  class="form-check-input" @if($datapro->status === 'X')checked @endif>X
                                </label>
                                <label for="status" class="form-check-label ">
                                  <input type="radio" id="istatus" name="status" value="Y" class="form-check-input" @if($datapro->status === 'Y')checked @endif>Y
                                </label>
                                <label for="inline-radio3" class="form-check-label ">
                                  <input type="radio" id="status" name="status" value="Z" class="form-check-input" @if($datapro->status === 'Z')checked @endif>Z
                                </label>
                                <label for="inline-radio3" class="form-check-label ">
                                  <input type="radio" id="status" name="status" value="N" class="form-check-input" @if($datapro->status === 'N')checked @endif>N
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Gambar 1</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="gambar1" name="gambar1" class="form-control-file"></div>
                          </div>
                           {{-- <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Gambar 2</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input" class="form-control-file"></div>
                          </div> --}}
                        <button type="submit" class="btn btn-primary btn-sm" @if(Auth::user()->level == 3) style="display: none" @endif>
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <a href="{{ url('detailpdf/'.$datapro->id)}}" class="button btn btn-success btn-sm">Print</a>
                        <button type="reset" class="btn btn-danger btn-sm">
                          <i class="fa fa-ban"></i> Reset
                        </button>
                        </form>
                      </div>
                      
                    </div>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->
   <script>
       var ajaxku=buatajax();
function ajaxkota(id){
  var url="{{ url('/getkota') }}/"+id;
  ajaxku.onreadystatechange=stateChanged;
  ajaxku.open("GET",url,true);
  ajaxku.send(null);
}

function ajaxkec(id){
  var url="select_daerah.php?kab="+id+"&sid="+Math.random();
  ajaxku.onreadystatechange=stateChangedKec;
  ajaxku.open("GET",url,true);
  ajaxku.send(null);
}

function ajaxkel(id){
  var url="select_daerah.php?kec="+id+"&sid="+Math.random();
  ajaxku.onreadystatechange=stateChangedKel;
  ajaxku.open("GET",url,true);
  ajaxku.send(null);
}

function buatajax(){
  if (window.XMLHttpRequest){
    return new XMLHttpRequest();
  }
  if (window.ActiveXObject){
    return new ActiveXObject("Microsoft.XMLHTTP");
  }
  return null;
}
function stateChanged(){
  var data;
  if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
      document.getElementById("kota").innerHTML = data
    }else{
      document.getElementById("kota").value = "<option selected>Pilih Kota/Kab</option>";
    }
    // document.getElementById("kab_box").style.display='table-row';
    // document.getElementById("kec_box").style.display='none';
    // document.getElementById("kel_box").style.display='none';
    // document.getElementById("lat_box").style.display='none';
    // document.getElementById("lng_box").style.display='none';
    // document.getElementById("table").style.display='none';
  }
}
       </script>
@endsection
