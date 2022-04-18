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
                        <h1>Price</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{url('/')}}">Dashboard</a></li>
                            <li><a href="{{url('/price')}}">Price</a></li>
                            <li class="active">Input Price</li>
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
                        <strong>Form</strong> Input Price
                      </div>
                      <div class="card-body card-block">
                        <form action="{{url('price')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="name" class=" form-control-label">Nama</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="name" name="name" placeholder="Nama" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="category" class=" form-control-label">Kategori</label></div>
                            <div class="col-12 col-md-9">
                                {{-- <input type="text" id="klasifikasi" name="klasifikasi" placeholder="klasifikasi" class="form-control"> --}}
                                <select name="category" id="category" class="form-control">
                                <option selected="selected">[PILIH KATEGORI]</option>
                                <option value="mobil">MOBIL</option>
                                <option value="motor">MOTOR</option>
                                <option value="sofa">SOFA</option>
                                </select>
                            </div>
                          </div>  
                          <div class="row form-group">
                          <div class="col col-md-3"><label for="products" class=" form-control-label">Produk</label></div>
                          <div class="col-12 col-md-9">
                            {{-- <input type="text" id="klasifikasi" name="klasifikasi" placeholder="klasifikasi" class="form-control"> --}}
                            <select name="products" id="products" class="form-control">
                            <option value="‎" selected="selected">[PILIH BAHAN]</option>
                            <option value="Basic=Camaro - Camaro Fiesta - New Superior - Picasso">BASIC</option>
                            <option value="Carrera">PRIME COLOR</option>
                            <option value="Giorgio">GIORGIO</option>
                            <option value="Riders Cruiser">Riders</option>
                            </select>
                          </div>
                          </div>  
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="alamat" class=" form-control-label">Spesifikasi 1</label></div>
                            <div class="col-12 col-md-9"><textarea name="first_specs" id="first_specs" rows="5" placeholder="Keterangan Harga Pertama" class="form-control"></textarea></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="alamat" class=" form-control-label">Spesifikasi 2</label></div>
                            <div class="col-12 col-md-9"><textarea name="second_specs" id="second_specs" rows="5" placeholder="Keterangan Harga Kedua" class="form-control"></textarea></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="alamat" class=" form-control-label">Spesifikasi 3</label></div>
                            <div class="col-12 col-md-9"><textarea name="third_specs" id="third_specs" rows="5" placeholder="Keterangan Harga Ketiga" class="form-control"></textarea></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="gambar" class=" form-control-label">Gambar</label></div>
                              <div class="col-12 col-md-9">
                                <img id="previewProfile"
                                    src="{{url('images/72images.jpg')}}"
                                    height="150px" width="150px"/>
                                    <input class="form-control" style="display:none" name="gambar" type="file" id="imageProfile">
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
@endsection
