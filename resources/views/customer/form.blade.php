@extends('layouts.app')
@include('layouts.sidebar')
@section('content')
<div id="right-panel" class="right-panel">

<!-- Header-->
@include('layouts/header')
<!-- /header -->
<!-- Header-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<div class="col-sm-12">
    @if(Session::has('message'))
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
<span class="badge badge-pill badge-success">Info</span>{{ Session::get('message') }}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            @endif

<div class="content mt-3">
    
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
<div class="card">
    <div class="card-header">
    <strong>Seat Maker Location</strong> Form
    </div>
    <div class="card-body card-block">
    <form action="{{url('customer/sendmail')}}" method="post" class="form-horizontal">
        {{ csrf_field() }} 
        <div class="row form-group">
        <div class="col col-md-3"><label for="daerah" class="form-control-label">Nama Daerah</label></div>
        <div class="col-12 col-md-9"><input type="text" id="daerah" name="daerah" placeholder="Masukan Nama Daerah" class="form-control"><span class="help-block"></span>
        <div id="daerahList"></div></div></div>
        <div class="row form-group">
        <div class="col col-md-3"><label for="email" class="form-control-label">Email</label></div>
        <div class="col-12 col-md-9"><input type="email" id="email" name="email" placeholder="Masukan Email" class="form-control"><span class="help-block"></span></div>
        </div>
    </div>
    <div class="card-footer">
    <button type="submit" class="btn btn-primary btn-sm">
        <i class="fa fa-dot-circle-o"></i> Submit
    </button>
    <button type="reset" class="btn btn-danger btn-sm">
        <i class="fa fa-ban"></i> Reset
    </button>
    </div>
    </form>
</div>
 </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
<script>
$(document).ready(function(){

 $('#daerah').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('customer.loaddaerah') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#daerahList').fadeIn();  
                    $('#daerahList').html(data);
          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#daerah').val($(this).text());  
        $('#daerahList').fadeOut();  
    });  

});
</script>
@endsection
