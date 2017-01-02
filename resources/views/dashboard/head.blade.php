 <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
                    <img src="{{ url('image/user.png') }}" alt="merkery_logo" class="hidden-xs hidden-sm img-circle">
                        <img src="{{ url('image/user.png') }}" alt="merkery_logo" class="visible-xs visible-sm circle-logo">
                    
                </div>
                <div class="navi">
                    <ul>
                        <li class="active"><a href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>
                        @if(Auth::user()->role != 'admin')
                        <li><a href="{{ url('check') }}"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Check In/Out</span></a></li>
                        @endif
                        <li><a href="{{ url('statistics') }}"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Statistics</span></a></li>
                        @if(Auth::user()->role=='admin')
                        <li><a href="{{ url('users') }}"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Users</span></a></li>
                        <li><a href="{{url('settings')}}"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Setting</span></a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                <div class="row">
                    <header>
                        <div class="col-md-7">
                            <nav class="navbar-default pull-left">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                            </nav>
                            <div class="search hidden-xs hidden-sm">
                                <input class="form-control input-sm" type="search" placeholder="Search" id="search" >
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="header-rightside">
                                <ul class="list-inline header-top pull-right">
                                    <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                    <li>
                                        <a href="#" class="icon-info">
                                            <i class="fa fa-bell" aria-hidden="true"></i>
                                            <span class="label label-primary">3</span>
                                        </a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ url('image/user.png') }}" alt="user">
                                            <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="navbar-content">
                                                    <span>{{ Auth::user()->name }}</span>
                                                    <p class="text-muted small">
                                                        {{ Auth::user()->email }}
                                                    </p>
                                                    <div class="divider">
                                                    </div>
                                                    <a href="{{ url('/logout') }}"
                                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"
                                                        class="view btn-sm active">Logout</a>

                                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>


                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </header>
                </div>


                <div class="user-dashboard">