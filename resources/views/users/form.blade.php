@extends('layouts.app')
@include('layouts.sidebar')  

@section('title', 'MyBlog | Users')

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
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Users Data</li>
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
                        <strong>User</strong> Form
                      </div>
                      <div class="card-body card-block">
                            <h1>{{isset($users)?'Edit':'New'}} User</h1>
                            <hr/>
                            @if(isset($users))
                                {!! Form::model($users,['method'=>'put','files'=>true]) !!}
                            @else
                                {!! Form::open(['files'=>true]) !!}
                            @endif                           
                          <div class="row form-group">
                            {!! Form::label("name","Nama",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                            <div class="col-md-9">
                                {!! Form::text("name",null,["class"=>"form-control".($errors->has('name')?" is-invalid":""),"autofocus",'placeholder'=>'Nama']) !!}
                                {!! $errors->first('name','<span class="invalid-feedback">:message</span>') !!}
                            </div>
                        </div>
                          {{-- <div class="row form-group">
                            {!! Form::label("username","Username",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                            <div class="col-md-9">
                                {!! Form::text("username",null,["class"=>"form-control".($errors->has('username')?" is-invalid":""),"autofocus",'placeholder'=>'Username']) !!}
                                {!! $errors->first('username','<span class="invalid-feedback">:message</span>') !!}
                            </div>
                        </div> --}}
                          <div class="row form-group">
                            {!! Form::label("email","Email",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                            <div class="col-md-9">
                                {!! Form::text("email",null,["class"=>"form-control".($errors->has('email')?" is-invalid":""),"autofocus",'placeholder'=>'Email']) !!}
                                {!! $errors->first('email','<span class="invalid-feedback">:message</span>') !!}
                            </div>
                        </div>
                          <div class="row form-group">
                            {!! Form::label("no_telp","No Telp",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                            <div class="col-md-9">
                                {!! Form::text("no_telp",null,["class"=>"form-control".($errors->has('no_telp')?" is-invalid":""),"autofocus",'placeholder'=>'No Telp']) !!}
                                {!! $errors->first('no_telp','<span class="invalid-feedback">:message</span>') !!}
                            </div>
                        </div>
                        <div class="row form-group" @if(Auth::user()->level != 1) style="display: none" @endif>
                            {!! Form::label("level","Level User",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                            <div class="col-12 col-md-9">
                            {!! Form::radio('level', '3', true)!!} Pengguna
                            {!! Form::radio('level', '2')!!} Admin
                            {!! Form::radio('level', '1')!!} Super Admin
                            </div>
                        </div>
                        <div class="row form-group" @if(Auth::user()->level != 1) style="display: none" @endif>
                            {!! Form::label("status","Status User",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                            <div class="col-12 col-md-9">
                            {!! Form::radio('status', '1', true)!!} Aktif
                            {!! Form::radio('status', '2')!!} Tidak Aktif
                            </div>
                        </div>
                          <div class="row form-group">
                            {!! Form::label("password","Password",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                            <div class="col-md-9">
                                {!! Form::password('password', ['class' => 'form-control']) !!}
                                {!! $errors->first('password','<span class="invalid-feedback">:message</span>') !!}
                            </div>
                            </div>
                          <div class="row form-group">
                            {!! Form::label("image","Image",["class"=>"col-form-label col-md-3"]) !!}
                            <div class="col-md-5">
                                <img id="preview"
                                    src="{{asset((isset($users) && $users->avatar!='')?''.$users->avatar:'images/noimage.jpg')}}"
                                    height="200px" width="200px"/>
                                {!! Form::file("image",["class"=>"form-control","style"=>"display:none"]) !!}
                                <br/>
                                <a href="javascript:changeProfile();">Change</a> |
                                <a style="color: red" href="javascript:removeImage()">Remove</a>
                                <input type="hidden" style="display: none" value="0" name="remove" id="remove">
                            </div>
                        </div>
                         <div class="form-group row">
                            <div class="col-md-3 col-lg-2"></div>
                            <div class="col-md-4">
                                @if(Auth::user()->level === 1)<a href="{{url('/users')}}" class="btn btn-danger">
                                    Back</a> @endif
                                {!! Form::button("Save",["type" => "submit","class"=>"btn
                                btn-primary"])!!}
                            </div>
                        </div>
                        {{-- <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                          <i class="fa fa-ban"></i> Reset
                        </button> --}}
                        {!! Form::close() !!}
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