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
                        <h1>Users Data</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{url('/')}}">Dashboard</a></li>
                            <li class="active">Users Data</li>
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
                        <strong>User</strong> Form
                      </div>
                      <div class="card-body card-block">
                        <form action="{{url('users')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="nama" class=" form-control-label">Nama lengkap</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="nama" name="nama" placeholder="Nama Lengkap" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="username" class=" form-control-label">Username</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="username" name="username" placeholder="Username" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="email" class=" form-control-label">Email</label></div>
                            <div class="col-12 col-md-9"><input type="email" id="email" name="email" placeholder="Email" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="no_telp" class=" form-control-label">No. Telp</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="no_telp" name="no_telp" placeholder="telp" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="password" class=" form-control-label">Passpord</label></div>
                            <div class="col-12 col-md-9"><input type="password" id="password" name="password" placeholder="Password" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Foto</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="gambar1" name="gambar1" class="form-control-file"></div>
                          </div>
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
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
@endsection
