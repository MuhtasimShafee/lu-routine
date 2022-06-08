 <section class="nav-menu">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <nav class="navbar navbar-expand-lg navbar-light ">
                        <div class="container-fluid p-0">
                            <a class="navbar-brand" href="/">
                                <span>LU routine</span>
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                                <ul class="navbar-nav">

                                    <li class="nav-items">
                                        @if(!Auth::check())
                                        <a class="nav-link" href="{{ route('register') }}"><button>Register</button></a>
                                        @endif
                                    </li>
                                    @if(Auth::check())
                                    <li class="nav-items">
                                        <a class="nav-link" href="{{ route('dashboard.index') }}"><button>Dashboard</button></a>
                                        
                                    </li>
                                    @else

                                    <li class="nav-items">
                                        <a class="nav-link" href="{{ route('login') }}"><button>Login</button></a>
                                        
                                    </li>
                                    @endif
                                    @if(Auth::check())
                                    <li class="nav-items">
                                        <a class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();"><button>Logout</button></a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                    @csrf
                                                    </form>
                                        
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section> 




{{-- <section class="nav-menu">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <nav class="navbar navbar-expand-lg navbar-light ">
                    <div class="container-fluid p-0">
                        <a class="navbar-brand" href="/">LU Routine</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                     @if(Auth::check())
                                    <a class="nav-link active" aria-current="page" href="{{ route('dashboard.index') }}"> <button>
                                            Dashboard</button></a>
                                    @else
                                    <a class="nav-link active" aria-current="page" href="{{ route('login') }}"> <button>
                                            Login</button></a>
                                    @endif
                                </li>
                                <li class="nav-item">
                                    @if(!Auth::check())
                                    <a class="nav-link" href="{{ route('register') }}"> <button>Register</button> </a>
                                    @endif
                                </li>
                                <li class="nav-item">
                                    @if(Auth::check())
                                    
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <button>Logout</button> 
                                    
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section> --}}
