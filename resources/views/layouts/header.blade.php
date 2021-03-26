<header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                  <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>  
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (is_null(Auth::user()->avatar))
                                <img class="user-avatar rounded-circle" src="{{ url('images/MBtech-Logo.png') }}" alt="User Avatar">
                            @else
                                <img class="user-avatar rounded-circle" src="{{ url(Auth::user()->avatar) }}" alt="User Avatar">
                            @endif
                        </a>

                        <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="{{ url('users/update/'.Auth::user()->id)}}"><i class="fa fa- user"></i>My Profile</a>

                                {{-- <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a> --}}

                                {{-- <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a> --}}
                                <a href="{{ route('logout') }}" class="nav-link"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power -off"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                 </form>   
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language" >
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header>