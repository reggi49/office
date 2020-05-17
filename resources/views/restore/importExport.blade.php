@extends('layouts.app')
@include('layouts.sidebar')
@section('content')
<div id="right-panel" class="right-panel">
      <!-- Header-->
        @include('layouts/header')
        <!-- /header -->

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
                            <li class="active">Data Import - Export</li>
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
                            <strong class="card-title">Data Import / Export</strong>
                        </div>
                        
                        <div class="card-body">
                            <div class="pull-left">
                      </div>
          <div class="panel-body">
 
            <a href="{{ url('downloadexcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
            <a href="{{ url('downloadexcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
            <a href="{{ url('downloadexcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>
 
            <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ url('importexcel ') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
 
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
 
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
 
                <input type="file" name="file" />
                <button class="btn btn-primary">Import File</button>
            </form>
                            </div>

 
                            </div>

          </div>
                  </div><!-- .content -->

 </div><!-- /#right-panel -->

    <!-- Right Panel -->
@endsection
