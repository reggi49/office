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
                        <h1>Data Seat Maker</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                        <li><a href="{{ url ('/') }}">Dashboard</a></li>
                            <li class="active">Data Seat Maker</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                        </div>
                        
                        <div class="card-body">
                            <div class="pull-left">
                <a href="{{ url ('/data/create') }}" class="btn btn-success" @if(Auth::user()->level == 3) style="display: none" @endif><i class="fa fa-pencil"></i> Add New Post</a>               
              </div>
                  <table id="bootstrap-data-table" class="table table-bordered table-striped  datatable">
                    <thead>
                      <tr>
                        <th width="10px">No</th>
                        <th>Region</th>
                        <th>Provinsi</th>
                        <th>Kota</th>
                        <th>Klasifikasi</th>
                        <th width="10px">Kode</th>
                        <th>Toko</th>
                        <th>Alamat</th>
                        <th>Phone</th>
                        <th>Telp</th>
                        <th width="100px">Aksi</th>
                      </tr>
                    </thead>
                    
                  </table>
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->
@endsection
