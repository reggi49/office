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
                        
                        <div class="card-body">
                            <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <strong>User</strong> Form
                      </div>
                      <div class="card-body card-block">
                            <h1>{{isset($image)?'Edit':'New'}} User</h1>
                            <hr/>
                            @if(isset($image))
                                {!! Form::model($image,['method'=>'put','files'=>true]) !!}
                            @else
                                {!! Form::open(['files'=>true]) !!}
                            @endif                           
                          <div class="row form-group">
                            {!! Form::label("Username","Username",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                            <div class="col-md-9">
                                {!! Form::text("username",null,["class"=>"form-control".($errors->has('username')?" is-invalid":""),"autofocus",'placeholder'=>'Username']) !!}
                                {!! $errors->first('username','<span class="invalid-feedback">:message</span>') !!}
                            </div>
                        </div>
                          <div class="row form-group">
                            {!! Form::label("Username","Username",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                            <div class="col-md-9">
                                {!! Form::text("username",null,["class"=>"form-control".($errors->has('username')?" is-invalid":""),"autofocus",'placeholder'=>'Username']) !!}
                                {!! $errors->first('username','<span class="invalid-feedback">:message</span>') !!}
                            </div>
                        </div>
                          <div class="row form-group">
                            {!! Form::label("Email","Email",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                            <div class="col-md-9">
                                {!! Form::text("email",null,["class"=>"form-control".($errors->has('email')?" is-invalid":""),"autofocus",'placeholder'=>'Email']) !!}
                                {!! $errors->first('email','<span class="invalid-feedback">:message</span>') !!}
                            </div>
                        </div>
                          <div class="row form-group">
                            {!! Form::label("No Telp","No Telp",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                            <div class="col-md-9">
                                {!! Form::text("no_telp",null,["class"=>"form-control".($errors->has('no_telp')?" is-invalid":""),"autofocus",'placeholder'=>'No Telp']) !!}
                                {!! $errors->first('no_telp','<span class="invalid-feedback">:message</span>') !!}
                            </div>
                        </div>
                          <div class="row form-group">
                            {!! Form::label("password","Password",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                            <div class="col-md-9">
                                {!! Form::text("password",null,["class"=>"form-control".($errors->has('password')?" is-invalid":""),"autofocus",'placeholder'=>'Password']) !!}
                                {!! $errors->first('password','<span class="invalid-feedback">:message</span>') !!}
                            </div>
                            </div>
                          <div class="row form-group">
                            {!! Form::label("image","Image",["class"=>"col-form-label col-md-3"]) !!}
                            <div class="col-md-5">
                                <img id="preview"
                                    src="{{asset((isset($image) && $image->image!='')?'uploads/'.$image->image:'images/noimage.jpg')}}"
                                    height="200px" width="200px"/>
                                {!! Form::file("image",["class"=>"form-control","style"=>"display:none"]) !!}
                                <br/>
                                <a href="javascript:changeProfile();">Change</a> |
                                <a style="color: red" href="javascript:removeImage()">Remove</a>
                                <input type="hidden" style="display: none" value="0" name="remove" id="remove">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                          <i class="fa fa-ban"></i> Reset
                        </button>
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
    <script>
        function changeProfile() {
            $('#image').click();
        }
        $('#image').change(function () {
            var imgPath = $(this)[0].value;
            var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
                readURL(this);
            else
                alert("Please select image file (jpg, jpeg, png).")
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.readAsDataURL(input.files[0]);
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                    $('#remove').val(0);
                }
            }
        }
        function removeImage() {
            $('#preview').attr('src', '{{url('images/noimage.jpg')}}');
            $('#remove').val(1);
        }
    </script>
@endsection