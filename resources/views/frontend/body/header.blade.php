<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light navigation">
                    <a class="navbar-brand" href="index.html">
                        <img src="images/logo.png" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto main-nav ">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{url('/')}}">Home</a>
                            </li>
                            
                           
                            <li class="nav-item dropdown dropdown-slide @@listing">
                                @auth
                                <a class="nav-link dropdown-toggle" href="#!" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    {{auth()->user()->name}} <span><i class="fa fa-angle-down"></i></span>
                                </a>
                               
                                <!-- Dropdown list -->
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item @@category" href="">Profile</a></li>
                                    <li><a class="dropdown-item @@listView"
                                    href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout</a></li>

                                    
                                </ul>
                            </li>
                            @endauth
                        </ul>
                        <ul class="navbar-nav ml-auto mt-10">
                            @if (Auth::guest())
                                <li>
                                    <a class="nav-link login-button" href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white add-button" href="{{route('register.page')}}"><i
                                            class="fa fa-plus-circle"></i> Get Registered</a>
                                </li>
                                @elseif(Auth::user()->user_type==2)
                                <li class="nav-item">
                                    <a class="nav-link login-button" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Logout
                                        
                                        <i class="fas fa-sign-out-alt"></i>
                                    </a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    </li>
                            @elseif(Auth::user()->user_type==3)
                            <li class="nav-item">
                                <a class="nav-link login-button" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout
                                    
                                    <i class="fas fa-sign-out-alt"></i>
                                </a>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                </li>
                            <li class="nav-item">
                                    <a class="nav-link text-white add-button" href="{{route('patient.blood-request.index')}}"><i
                                            class="fa fa-plus-circle"></i> Blood Request</a>
                                </li>
                             
                            @endif

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
