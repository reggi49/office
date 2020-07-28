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
                            <li><a href="{{url('/')}}">Dashboard</a></li>
                            <li><a href="{{ url('/data')}}">Data Table</a></li>
                            <li class="active">Edit Data</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="col-md-12">
                    @if(Session::has('message'))
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <span class="badge badge-pill badge-success">Info</span>{{ Session::get('message') }}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    </div>
                    @endif
                    <div class="card-body">
                    <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>Edit Form</strong> Data Seat Maker
                      </div>
                      <div class="card-body card-block">
                        <form action="{{action('DataController@update', $id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="region" class=" form-control-label">Region</label></div>
                            <div class="col-12 col-md-9">
                              {{-- <input type="text" id="region" name="region" placeholder="Region" value="{{$datapro->region}}" class="form-control"> --}}
                              <select name="region" id="region" class="form-control">
                                <option value="REGIONAL I, JABODETABEK" @if($datapro->region === 'REGIONAL I, JABODETABEK') selected @endif>REGIONAL I, JABODETABEK</option>
                                <option value="REGIONAL II, JAWA BALI" @if($datapro->region === 'REGIONAL II, JAWA BALI') selected @endif>REGIONAL II, JAWA BALI</option>
                                <option value="REGIONAL III, SUMATERA" @if($datapro->region === 'REGIONAL III, SUMATERA') selected @endif>REGIONAL III, SUMATERA</option>
                                <option value="REGIONAL IV, KALIMANTAN" @if($datapro->region === 'REGIONAL IV, KALIMANTAN') selected @endif>REGIONAL IV, KALIMANTAN</option>
                                <option value="REGIONAL V, SULAWESI" @if($datapro->region === 'REGIONAL V, SULAWESI') selected @endif>REGIONAL V, SULAWESI</option>
                                <option value="REGIONAL VI, NTB & NTT" @if($datapro->region === 'REGIONAL VI, NTB & NTT') selected @endif>REGIONAL VI, NTB & NTT</option>
                                <option value="REGIONAL VII, MALUKU & PAPUA" @if($datapro->region === 'REGIONAL VII, MALUKU & PAPUA') selected @endif>REGIONAL VII, MALUKU & PAPUA</option>
                              </select>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Provinsi</label></div>
                            <div class="col-12 col-md-9">
                              <select name="provinsi" id="provinsi" class="form-control" onchange="ajaxkota(this.value)">
                                @foreach($dataprovinsi as $provinsi)
                                    <option value="{{ $provinsi->id_prov }},{{ $provinsi->nama }}"
                                      @if (strtolower(str_replace(" ","",$provinsi->nama)) === strtolower(str_replace(" ","",$datapro->provinsi)))
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
                            <div class="col-12 col-md-9">
                              {{-- <input type="text" id="klasifikasi" name="klasifikasi" placeholder="klasifikasi" value="{{$datapro->klasifikasi}}" class="form-control"> --}}
                              <select name="klasifikasi" id="klasifikasi" class="form-control" onchange="fltrKlasifikasi()">
                                {{-- <option  selected="selected">[PILIH KLASIFIKASI]</option> --}}
                                <option value="TRANSPORTATION" @if($datapro->klasifikasi === 'TRANSPORTATION') selected @endif>TRANSPORTATION</option>
                                <option value="PROPERTY" @if($datapro->klasifikasi === 'PROPERTY') selected @endif>PROPERTY</option>
                                <option value="TOKO" @if($datapro->klasifikasi === 'TOKO') selected @endif>TOKO</option>
                              </select>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="subklasifikasi" class=" form-control-label">Sub Klasifikasi</label></div>
                            <div class="col-12 col-md-9">
                              {{-- <input type="text" id="subklasifikasi" name="subklasifikasi" placeholder="Sub klasifikasi" value="{{$datapro->subklasifikasi}}" class="form-control"> --}}
                              <select name="subklasifikasi" id="subklasifikasi" class="form-control" onchange="fltrsubKlasifikasi()">
                                <option value="{{$datapro->subklasifikasi}}">{{$datapro->subklasifikasi}}</option>
                              </select>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="kriteria" class=" form-control-label">Kriteria Usaha</label></div>
                            <div class="col-12 col-md-9">
                              {{-- <input type="text" id="kriteria" name="kriteria" placeholder="kriteria usaha" value="{{$datapro->kriteria}}" class="form-control"> --}}
                              <select name="kriteria" id="kriteria" class="form-control">
                                <option value="{{$datapro->kriteria}}">{{$datapro->kriteria}}</option>
                              </select>
                            </div>
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
                            <div class="col-12 col-md-9"><input type="text" name="birthday" id="datepicker" placeholder="birthday" value="{{ \Carbon\Carbon::parse($datapro->b_day)->format('d-m-Y')}}" class="date form-control""></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="alamat_rumah" class=" form-control-label">Alamat Rumah</label></div>
                            <div class="col-12 col-md-9"><textarea name="alamat_rumah" id="alamat_rumah" rows="5" placeholder="Alamat Rumah" class="form-control">{{$datapro->alamat_rumah}}</textarea></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="keterangan" class=" form-control-label">Keterangan</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="keterangan" name="keterangan" placeholder="Keterangan"  value="{{$datapro->keterangan}}" class="form-control" disabled></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="contact" class=" form-control-label">Agama</label></div>
                            <div class="col-12 col-md-9">
                            {{-- <div class="col-12 col-md-9"><input type="text" id="religion" name="religion" placeholder="Agama" class="form-control"></div> --}}
                            <select name="religion" id="religion" onchange="myReligion()" class="form-control">
                                {{-- <option value="{{$datapro->religion}}">{{$datapro->religion}}</option> --}}
                                <option value="Islam" @if($datapro->religion === 'Islam') selected @endif>Islam</option>
                                <option value="Protestan" @if($datapro->religion === 'Protestan') selected @endif>Protestan</option>
                                <option value="Katolik" @if($datapro->religion === 'Katolik') selected @endif>Katolik</option>
                                <option value="Hindu" @if($datapro->religion === 'Hindu') selected @endif>Hindu</option>
                                <option value="Buddha" @if($datapro->religion === 'Buddha') selected @endif>Buddha</option>
                                <option value="Khonghucu" @if($datapro->religion === 'Khonghucu') selected @endif>Khonghucu</option>
                            </select>
                            </div>
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
                            <div class="col col-md-3"><label for="contact" class=" form-control-label">Latitude</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="latitude" name="latitude" placeholder="Latitude" value="{{$datapro->latitude}}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="contact" class=" form-control-label">Longitude</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="longitude" name="longitude" placeholder="Longitude" value="{{$datapro->longitude}}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="contact" class=" form-control-label"></label></div>
                            @if (($datapro->latitude && $datapro->longitude) != '')
                              <div class="col-12 col-md-9"><a href="https://www.google.com/maps/dir/?api=1&destination={{$datapro->latitude}},{{$datapro->longitude}}" class="btn btn-info" target="_blank">Bawa Saya Kesini!</a></div>
                            @endif
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class="form-control-label">Gambar 1</label></div>
                            <div class="col-12 col-md-9">
                              <img id="preview"
                                    src="{{asset((isset($datapro) && $datapro->gambar!='')?'/images/'.$datapro->gambar:'images/noimage.jpg')}}"
                                    style="
                                    width: 250px;
                                    height: 150px;"/>
                              <input class="form-control" style="display:none" name="gambar1" type="file" id="image">
                              <br/>
                              <a href="javascript:changeBanner();">Change</a> |
                              <a style="color: red" href="javascript:removeImage()">Remove</a>
                              <input type="hidden" style="display: none" value="0" name="remove" id="remove">
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="imageProfile" class=" form-control-label">Profil Toko</label></div>
                              <div class="col-12 col-md-9">
                                <img id="previewProfile"
                                    src="{{asset((isset($datapro) && $datapro->gambar2!='')?'/images/'.$datapro->gambar2:'images/72images.jpg')}}"
                                    height="150px" width="150px"/>
                                    <input class="form-control" style="display:none" name="gambar2" type="file" id="imageProfile">
                                <br/>
                                <a href="javascript:changeProfile();">Change</a> |
                                <a style="color: red" href="javascript:removeProfile()">Remove</a>
                                <input type="hidden" style="display: none" value="0" name="removeprofile" id="removeProfile">
                            </div>
                          </div>
                        <div class="row form-group">
                        <div class="col col-md-3"></div>
                        <div class="col-12 col-md-9">
                        <button type="submit" class="btn btn-primary btn-sm" @if(Auth::user()->level == 3) style="display: none" @endif>
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <a href="{{ url('detailpdf/'.$datapro->id)}}" class="button btn btn-success btn-sm">Print</a>
                        <button type="reset" class="btn btn-danger btn-sm">
                          <i class="fa fa-ban"></i> Reset
                        </button>
                        </div>
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
function myReligion(){
  if(document.getElementById('religion').value == "Islam") {
    document.getElementById("celebration").value = "Idul Fitri";
  }else if (document.getElementById('religion').value == "Protestan") {
    document.getElementById("celebration").value = "Natal";
  }else if (document.getElementById('religion').value == "Katolik") {
    document.getElementById("celebration").value = "Natal";
  }else if (document.getElementById('religion').value == "Hindu") {
    document.getElementById("celebration").value = "Nyepi";
  }else if (document.getElementById('religion').value == "Buddha") {
    document.getElementById("celebration").value = "Waisak";
  }else if (document.getElementById('religion').value == "Khonghucu") {
    document.getElementById("celebration").value = "Imlek";
  } else {
    document.getElementById("celebration").value = "-";
  }
} 
function fltrKlasifikasi(){
  if(document.getElementById('klasifikasi').value == "TRANSPORTATION") {
    $("#subklasifikasi").html("<option value='MOTOR'>PILIH SUBKLASIFIKASI</option><option value='MOTOR'>MOTOR</option><option value='MOBIL'>MOBIL</option><option value='OTHER TRANSPORT'>OTHER TRANSPORT</option>");
  }else if (document.getElementById('klasifikasi').value == "PROPERTY") {
    $("#subklasifikasi").html("<option value='FURNITURE'>[PILIH FURNITURE]</option><option value='FURNITURE'>FURNITURE</option>");
  }else if (document.getElementById('klasifikasi').value == "TOKO") {
    $("#subklasifikasi").html("<option value='TOKO'>[PILIH TOKO]</option><option value='TOKO'>TOKO</option>");
  } else {
    document.getElementById("celebration").value = "-";
  }
} 
function fltrsubKlasifikasi(){
  if(document.getElementById('subklasifikasi').value == "MOTOR") {
    $("#kriteria").html(" <option value='SEAT MAKER'>SEAT MAKER</option><option value='AGENT JOK'>AGEN JOK</option><option value='DEALER MOTOR'>DEALER MOTOR</option><option value='VARIASI MOTOR'>VARIASI MOTOR</option>");
  }else if (document.getElementById('subklasifikasi').value == "MOBIL") {
    $("#kriteria").html(" <option value='SEAT MAKER'>SEAT MAKER</option><option value='DEALER MOBIL'>DEALER MOBIL</option><option value='VARIASI'>VARIASI</option>");
  }else if (document.getElementById('subklasifikasi').value == "OTHER TRANSPORT") {
    $("#kriteria").html(" <option value='KAROSERI'>KAROSERI</option><option value='PO BUS'>PO BUS</option><option value='SEAT MANUFACTURE'>SEAT MANUFACTURE</option>");
  }else if (document.getElementById('subklasifikasi').value == "FURNITURE") {
    $("#kriteria").html(" <option value='DESIGN INTERIOR'>DESIGN INTERIOR</option><option value='SOFA MAKER'>SOFA MAKER</option><option value='CONTRACTOR'>CONTRACTOR</option><option value='CONTRACTOR INTERIOR'>CONTRACTOR INTERIOR</option><option value='DESIGN INTERIOR'>DESIGN INTERIOR</option><option value='CONSULTAN INTERIOR'>CONSULTAN INTERIOR</option><option value='FURNITURES INTERIOR'>FURNITURE MANUFACTURE</option><option value='SHOWROOM'>SHOWROOM</option><option value='UMKM'>UMKM</option><option value='ARSITEK'>ARSITEK</option>");
  }else if (document.getElementById('subklasifikasi').value == "TOKO") {
    $("#kriteria").html(" <option value='TOKO BAHAN'>TOKO BAHAN</option>");
  } else {
    document.getElementById("celebration").value = "-";
  }
} 
// filter input 
function setInputFilter(textbox, inputFilter) {
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
    textbox.addEventListener(event, function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  });
}
setInputFilter(document.getElementById("phone"), function(value) {
  return /^-?\d*$/.test(value); });
</script>
@endsection
