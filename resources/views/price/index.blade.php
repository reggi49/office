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
                        <h1>Price Information</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                        <li><a href="{{ url ('/') }}">Dashboard</a></li>
                            <li class="active">Price Information</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    @if(Session::has('message'))
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <span class="badge badge-pill badge-success">Info</span>{{ Session::get('message') }}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Price List</strong>
                            <div class="card-actions">
                                <a href="{{ url ('/price/create') }}" class="btn-setting" @if(Auth::user()->level == 3) style="display: none" @endif><i class="fa fa-pencil"></i> Add Price</a>               
                                {{-- <button class="btn-minimize" type="button" data-toggle="collapse" data-target="" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fa fa-angle-down"></i>
                                </button> --}}
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="pull-left">
                        </div>
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Mobil</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Motor</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Sofa</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <table class="table" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Keterangan</th>
                                            <th>Produk</th>
                                            <th>Spesification 1</th>
                                            <th>Spesification 2</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach($pricemobil as $key => $pricemobil)
                                        <tr>
                                            <td>{{ $pricemobil->name }}</a></td>
                                            <td>{{ $pricemobil->products }}</td>
                                            <td>{{ $pricemobil->first_specs }}</td>
                                            <td>{{ $pricemobil->second_specs }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <a href="{{url('price/'.$pricemobil->id.'/edit/')}}"
                                                            class="fa fa-edit"></a>
                                                    </div>
                                                <div class="col-sm-6">
                                                    <form id="frm_{{$pricemobil->id}}"
                                                        action="{{url('price/'.$pricemobil->id)}}"
                                                        method="post" style="padding-bottom: 0px;margin-bottom: 0px">
                                                        {{csrf_field()}}
                                                        {{ method_field('DELETE') }}
                                                            <a href="javascript:if(confirm('Are you sure want to delete?')) $('#frm_{{$pricemobil->id}}').submit()"
                                                                class="fa fa-trash-o"></a>
                                                    </form>
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <table class="table" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Keterangan</th>
                                            <th>Produk</th>
                                            <th>Spesification 1</th>
                                            <th>Spesification 2</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach($pricemotor as $key => $pricemotor)
                                        <tr>
                                            <td>{{ $pricemotor->name }}</a></td>
                                            <td>{{ $pricemotor->products }}</td>
                                            <td>{{ $pricemotor->first_specs }}</td>
                                            <td>{{ $pricemotor->second_specs }}</td>
                                            <td>
                                               <div class="row">
                                                    <div class="col-sm-6">
                                                        <a href="{{url('price/'.$pricemotor->id.'/edit/')}}"
                                                            class="fa fa-edit"></a>
                                                    </div>
                                                <div class="col-sm-6">
                                                    <form id="frm_{{$pricemotor->id}}"
                                                        action="{{url('price/'.$pricemotor->id)}}"
                                                        method="post" style="padding-bottom: 0px;margin-bottom: 0px">
                                                        {{csrf_field()}}
                                                        {{ method_field('DELETE') }}
                                                            <a href="javascript:if(confirm('Are you sure want to delete?')) $('#frm_{{$pricemotor->id}}').submit()"
                                                                class="fa fa-trash-o"></a>
                                                    </form>
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <table class="table" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Keterangan</th>
                                            <th>Produk</th>
                                            <th>Spesification 1</th>
                                            <th>Spesification 2</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach($pricesofa as $key => $pricesofa)
                                        <tr>
                                            <td>{{ $pricesofa->name }}</a></td>
                                            <td>{{ $pricesofa->products }}</td>
                                            <td>{{ $pricesofa->first_specs }}</td>
                                            <td>{{ $pricesofa->second_specs }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <a href="{{url('price/'.$pricesofa->id.'/edit/')}}"
                                                            class="fa fa-edit"></a>
                                                    </div>
                                                <div class="col-sm-6">
                                                    <form id="frm_{{$pricesofa->id}}"
                                                        action="{{url('price/'.$pricesofa->id)}}"
                                                        method="post" style="padding-bottom: 0px;margin-bottom: 0px">
                                                        {{csrf_field()}}
                                                        {{ method_field('DELETE') }}
                                                            <a href="javascript:if(confirm('Are you sure want to delete?')) $('#frm_{{$pricesofa->id}}').submit()"
                                                                class="fa fa-trash-o"></a>
                                                    </form>
                                                </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
