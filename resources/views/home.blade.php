@extends('layouts.app')
@include('layouts.sidebar')
@section('content')
    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        @include('layouts/header')
        <!-- /header -->
        <!-- Header-->

        

        <div class="content mt-3">

            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-success">Info</span> Selamat datang {{ Auth::user()->name }} di aplikasi MBtech Office.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count">{{$alldata}}</span>
                        </h4>
                        <p class="text-light">Total Data Toko dan Seat Maker</p>

                        <h4 class="mb-0">
                            <span class="count">{{$lokasi}}</span>
                        </h4>
                        <p class="text-light">Total Lokasi Toko dan Seat Maker</p>

                        <div class="chart-wrapper px-0" style="height:10px;" height="10"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                            <canvas id="widgetChart2" height="140" width="536" style="display: block; height: 70px; width: 268px;"></canvas>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-5">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count">{{$dataMobil}}</span>
                        </h4>
                        <p class="text-light">Total Data Klasifikasi Mobil</p>

                        <div class="chart-wrapper px-3" style="height:70px;" height="70"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                            <canvas id="widgetChart4" height="110" width="472" style="display: block; height: 55px; width: 236px;"></canvas>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count">{{$dataMotor}}</span>
                        </h4>
                        <p class="text-light">Total Data Klasifikasi Motor</p>

                    </div>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                            <canvas id="widgetChart3" height="142" width="616" style="display: block; height: 71px; width: 308px;"></canvas>
                        </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <h4 class="mb-0">
                            <span class="count">{{$dataInterior}}</span>
                        </h4>
                        <p class="text-light">Total Data Klasifikasi Interior</p>

                        <div class="chart-wrapper px-3" style="height:70px;" height="70"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                            <canvas id="widgetChart4" height="110" width="472" style="display: block; height: 55px; width: 236px;"></canvas>
                        </div>

                    </div>
                </div>
            </div>

        </div> <!-- .content -->
        
    </div><!-- /#right-panel -->
@endsection
