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
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                        </div>
                        <div class="card-body">
                            <div class="pull-left">
                            <a href="{{ url('/users/create')}}" class="btn btn-success"><i class="fa fa-pencil"></i> Add New User</a>               
              </div>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                          <tbody>
                @foreach($users as $user)

            <tr>
                <td>{{ $user->id}}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                <form id="frm_{{$user->id}}"
                        action="{{url('users/delete/'.$user->id)}}"
                        method="post" style="padding-bottom: 0px;margin-bottom: 0px">
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="javascript:if(confirm('Are you sure want to delete?')) $('#frm_{{$user->id}}').submit()"
                                class="btn btn-danger btn-sm btn-block">Delete</a>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{url('users/update/'.$user->id)}}"
                                class="btn btn-primary btn-sm btn-block">Edit</a>
                        </div>
                        <input type="hidden" name="_method" value="delete"/>
                        {{csrf_field()}}
                    </div>
                </form>
                {{-- <a href="{{url('users/'.$user->id.'/edit')}}" class="btn btn-xs btn-default">
                        <i class="fa fa-edit"></i>
                    </a>
                   
                        <a href="#" class="btn btn-xs btn-danger">
                            <i class="fa fa-times"></i>
                        </a> --}}
                </td>
            </tr>

                @endforeach

                      </tbody>

                        </table>
                        {{ $users->links() }}

                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

@endsection