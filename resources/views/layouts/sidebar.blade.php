<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{url('/')}}"><img src="{{ asset('images/MBtech-Logo.png?1')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="{{url('/')}}"><img src="{{ asset('images/MBtech-Logo.png?1')}}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{url('/')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    @if(Auth::user()->level === 1)
                    <li>
                        <a href="{{url('/price')}}"> <i class="menu-icon fa fa-money"></i>Price </a>
                    </li>
                    @endif
                   
                    {{-- <h3 class="menu-title">UI elements</h3><!-- /.menu-title --> --}}
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Modul Data</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{url('/data')}}">Data MBTech</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="{{url('/cetak')}}">Cetak Data</a></li>
                            @if(Auth::user()->level === 1)
                                <li><i class="fa fa-file-excel-o"></i><a href="{{url('/importexport')}}">Export/Import</a></li>
                            @endif
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Modul User</a>
                        <ul class="sub-menu children dropdown-menu">
                            @if(Auth::user()->level === 1)
                                <li><i class="fa fa-table"></i><a href="{{url('/users')}}">Manajemen User</a></li>
                            @else 
                                <li><i class="fa fa-table"></i><a href="{{ url('users/update/'.Auth::user()->id)}}">Update User Info</a></li>
                            @endif
                            {{-- @elseif (Auth::user()->level === 2)
                                <li><i class="fa fa-table"></i><a href="{{ url('users/update/'.Auth::user()->id)}}">Update User Info</a></li>
                            @elseif (Auth::user()->level === 3)
                                <li><i class="fa fa-table"></i><a href="{{ url('users/update/'.Auth::user()->id)}}">Update User Info</a></li>
                            @endif --}}
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-envelope-o"></i>Modul Costumer</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-envelope-o"></i><a href="{{url('/customer')}}">Manajemen Email</a></li>
                            {{-- <li><i class="fa fa-table"></i><a href="tables-data.html">Data Table</a></li> --}}
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->