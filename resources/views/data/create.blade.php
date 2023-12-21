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
                            <li><a href="{{url('/data')}}">Index Table</a></li>
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
                        <strong>Form</strong> Input Seat Maker
                      </div>
                      <div class="card-body card-block">
                        <form action="{{url('data')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="region" class=" form-control-label">Region</label></div>
                            <div class="col-12 col-md-9">
                            <select name="region" id="region" class="form-control">
                              <option selected="selected">[PILIH REGION]</option>
                              <option value="REGIONAL I, JABODETABEK">REGIONAL I, JABODETABEK</option>
                              <option value="REGIONAL II, JAWA BALI">REGIONAL II, JAWA BALI</option>
                              <option value="REGIONAL III, SUMATERA">REGIONAL III, SUMATERA</option>
                              <option value="REGIONAL IV, KALIMANTAN">REGIONAL IV, KALIMANTAN</option>
                              <option value="REGIONAL V, SULAWESI">REGIONAL V, SULAWESI</option>
                              <option value="REGIONAL VI, NTB & NTT">REGIONAL VI, NTB & NTT</option>
                              <option value="REGIONAL VII, MALUKU & PAPUA">REGIONAL VII, MALUKU & PAPUA</option>
                            </select>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Provinsi</label></div>
                            <div class="col-12 col-md-9">
                              <select name="provinsi" id="provinsi" class="form-control" onchange="ajaxkota(this.value)">
                                @foreach($dataprovinsi as $provinsi)
                                    <option value="{{ $provinsi->id_prov }},{{ $provinsi->nama }}">{{ $provinsi->nama }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="row form-group" >
                            <div class="col col-md-3"><label for="kota" class=" form-control-label">Kota</label></div>
                            <div class="col-12 col-md-9" id="kab_box">
                              <select name="kota" id="kota" class="form-control">
                                
                              </select>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="klasifikasi" class=" form-control-label">Klasifikasi</label></div>
                            <div class="col-12 col-md-9">
                              {{-- <input type="text" id="klasifikasi" name="klasifikasi" placeholder="klasifikasi" class="form-control"> --}}
                              <select name="klasifikasi" id="klasifikasi" class="form-control" onchange="fltrKlasifikasi()">
                                <option selected="selected">[PILIH KLASIFIKASI]</option>
                                <option value="TRANSPORTATION">TRANSPORTATION</option>
                                <option value="PROPERTY">PROPERTY</option>
                                <option value="TOKO">TOKO</option>
                                <option value="FASHION">FASHION</option>
                              </select>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="subklasifikasi" class=" form-control-label">Sub Klasifikasi</label></div>
                            <div class="col-12 col-md-9">
                              {{-- <input type="text" id="subklasifikasi" name="subklasifikasi" placeholder="sub klasifikasi" class="form-control"> --}}
                              <select name="subklasifikasi" id="subklasifikasi" class="form-control" onchange="fltrsubKlasifikasi()">
                              
                              </select>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="kriteria" class=" form-control-label">Kriteria Usaha</label></div>
                            <div class="col-12 col-md-9">
                              {{-- <input type="text" id="kriteria" name="kriteria" placeholder="kriteria" class="form-control"> --}}
                              <select name="kriteria" id="kriteria" class="form-control">
                                
                              </select>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="toko" class=" form-control-label">Toko</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="toko" name="toko" placeholder="toko" class="form-control" required></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="alamat" class=" form-control-label">Alamat Toko</label></div>
                            <div class="col-12 col-md-9"><textarea name="alamat_toko" id="alamat_toko" rows="5" placeholder="Alamat toko" class="form-control" required></textarea></div>
                          </div>
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="contact" class=" form-control-label">Kontak</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="contact" name="contact" placeholder="Contact" class="form-control" required></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="telp" class=" form-control-label">No.Telp / No. Faxs</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="telp" name="telp" placeholder="telp" class="form-control"></div>
                          </div>
                          {{-- <div class="row form-group">
                            <div class="col col-md-3"><label for="faxs" class=" form-control-label">No. Fax</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="fax" name="fax" placeholder="Fax Number" class="form-control"></div>
                          </div> --}}
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="email" class=" form-control-label">Email</label></div>
                            <div class="col-12 col-md-9"><input type="email" id="email" name="email" placeholder="Masukan Email" class="form-control"></div>
                          </div>
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="phone" class=" form-control-label">No. Handphone</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="phone" name="phone" placeholder="Cth : 081232312121 " class="form-control" required></div>
                          </div>
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="birthday" class=" form-control-label">Tanggal Lahir</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="birthday" id="datepicker" placeholder="birthday" class="date form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="alamat" class=" form-control-label">Alamat Rumah</label></div>
                            <div class="col-12 col-md-9"><textarea name="alamat_rumah" id="alamat_rumah" rows="5" placeholder="Alamat toko" class="form-control"></textarea></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="keterangan" class=" form-control-label">Keterangan</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="keterangan" name="keterangan" placeholder="Keterangan" class="form-control" disabled></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="contact" class=" form-control-label">Agama</label></div>
                            <div class="col-12 col-md-9">
                            {{-- <div class="col-12 col-md-9"><input type="text" id="religion" name="religion" placeholder="Agama" class="form-control"></div> --}}
                            <select name="religion" id="religion" onchange="myReligion()" class="form-control">
                                <option selected="selected">[PILIH AGAMA]</option>
                                <option value="Islam">Islam</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Khonghucu">Khonghucu</option>
                            </select>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="contact" class=" form-control-label">Hari Raya</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="celebration" name="celebration" placeholder="Hari Raya" class="form-control" value="Pilih Agama"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Status</label></div>
                            <div class="col col-md-9">
                              <div class="form-check-inline form-check">
                                <label for="status" class="form-check-label ">
                                  <input type="radio" id="status" name="status" value="X" class="form-check-input">X
                                </label>
                                <label for="status" class="form-check-label ">
                                  <input type="radio" id="istatus" name="status" value="Y" class="form-check-input">Y
                                </label>
                                <label for="inline-radio3" class="form-check-label ">
                                  <input type="radio" id="status" name="status" value="Z" class="form-check-input">Z
                                </label>
                                <label for="inline-radio3" class="form-check-label ">
                                  <input type="radio" id="status" name="status" value="N" class="form-check-input">N
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="contact" class=" form-control-label">Latitude</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="latitude" name="latitude" placeholder="Latitude" class="form-control" required></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="contact" class=" form-control-label">Longitude</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="longitude" name="longitude" placeholder="Longitude" class="form-control" required></div>
                          </div>
                              <div class="row form-group">
                                <div class="col col-md-3"><label for="image" class=" form-control-label">Banner Toko</label></div>
                                  <div class="col-12 col-md-9">
                                    <img id="preview"
                                        src="{{url('images/noimage.jpg')}}"
                                        height="150px" width="250px"/>
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
                                    src="{{url('images/72images.jpg')}}"
                                    height="150px" width="150px"/>
                                    <input class="form-control" style="display:none" name="gambar2" type="file" id="imageProfile">
                                <br/>
                                <a href="javascript:changeProfile();">Change</a> |
                                <a style="color: red" href="javascript:removeProfile()">Remove</a>
                                <input type="hidden" style="display: none" value="0" name="removeprofile" id="removeProfile">
                            </div>
                          </div>
                           {{-- <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Gambar 2</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input" class="form-control-file"></div>
                          </div> --}}
                        <div class="row form-group">
                        <div class="col col-md-3"></div>
                        <div class="col-12 col-md-9">
                        <button type="submit" class="btn btn-primary btn-sm" @if(Auth::user()->level == 3) style="display: none" @endif>
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
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
  }else if (document.getElementById('klasifikasi').value == "FASHION") {
    $("#subklasifikasi").html("<option value='FASHION'>[PILIH FASHION]</option><option value='FASHION'>FASHION</option>");
  } else {
    document.getElementById("celebration").value = "-";
  }
} 
function fltrsubKlasifikasi(){
  if(document.getElementById('subklasifikasi').value == "MOTOR") {
    $("#kriteria").html(" <option value='SEAT MAKER'>SEAT MAKER</option><option value='AGENT JOK'>AGEN JOK</option><option value='VARIASI MOTOR'>VARIASI MOTOR</option>");
  }else if (document.getElementById('subklasifikasi').value == "MOBIL") {
    $("#kriteria").html(" <option value='SEAT MAKER'>SEAT MAKER</option><option value='VARVARIASI MOBILIASI'>VARIASI MOBIL</option>");
  }else if (document.getElementById('subklasifikasi').value == "OTHER TRANSPORT") {
    $("#kriteria").html(" <option value='KAROSERI'>KAROSERI</option><option value='PO BUS'>PO BUS</option><option value='SEAT MANUFACTURE'>SEAT MANUFACTURE</option><option value='KAPAL LAUT'>KAPAL LAUT</option><option value='KERETA API'>KERETA API</option>");
  }else if (document.getElementById('subklasifikasi').value == "FURNITURE") {
    $("#kriteria").html(" <option value='DESIGN INTERIOR'>DESIGN INTERIOR</option><option value='SOFA MAKER'>SOFA MAKER</option><option value='CONTRACTOR INTERIOR'>CONTRACTOR INTERIOR</option><option value='FURNITURES INTERIOR'>FURNITURE MANUFACTURE</option>");
  }else if (document.getElementById('subklasifikasi').value == "TOKO") {
    $("#kriteria").html(" <option value='TOKO BAHAN'>TOKO BAHAN</option>");
  }else if (document.getElementById('subklasifikasi').value == "FASHION") {
    $("#kriteria").html(" <option value='TAS'>TAS</option><option value='SEPATU'>SEPATU</option><option value='SOUVENIR'>SOUVENIR</option><option value='UMKM'>UMKM</option>");
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
