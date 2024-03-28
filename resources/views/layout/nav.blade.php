<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <div class="col-lg-3 bg-dark d-none d-lg-block">
            <a href="index.html" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <h1 class="m-0 display-4 text-primary text-uppercase" style="color: var(--primary) !important">Gymscasa</h1>
            </a>
        </div>
        <div class="col-lg-9">
            <div class="row gx-0 bg-secondary d-none d-lg-flex">
                <div class="col-lg-7 px-5 text-start">
                    <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                        <i class="fa fa-envelope text-primary me-2" style="color: var(--primary) !important"></i>
                        <h6 class="mb-0">gymscasa@gmail.com</h6>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center py-2">
                        <i class="fa fa-phone-alt text-primary me-2" style="color: var(--primary) !important"></i>
                        <h6 class="mb-0">+555 555 555</h6>
                    </div>
                </div>
                <div class="col-lg-5 px-5 text-end">
                    <div class="d-inline-flex align-items-center py-2">
                        <a class="btn btn-light btn-square rounded-circle me-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="btn btn-light btn-square rounded-circle me-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-light btn-square rounded-circle me-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="btn btn-light btn-square rounded-circle me-2" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="btn btn-light btn-square rounded-circle" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0 px-lg-5">
                <a href="index.html" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 display-4 text-primary text-uppercase">Gymscasa</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{route('index')}}" class="nav-item nav-link  ">Home</a>
                        <a href="{{route('reservation')}}" class="nav-item nav-link  {{ request()->routeIs('reservation') ? 'active' : '' }}">reservation</a>
                        <a href="{{route('video.index')}}" class="nav-item nav-link  {{ request()->routeIs('video.index') ? 'active' : '' }}">programs</a>
                        <a href="{{route('front.index')}}"  class="nav-item nav-link  {{ request()->routeIs('front.index') ? 'active' : '' }}  ">boutique</a>
                        <a href="{{url('/chatify')}}"  class="nav-item nav-link  {{ request()->url()==='/chatify' ? 'active' : '' }}  ">messagerie</a>
                        <a href="{{route('contact')}}" class="nav-item nav-link ">Contact</a>
                        @auth
                        @if(Auth::user()->id==3)
                        <a class="nav-item nav-link  {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} " href="{{route('admin.dashboard')}}">admin panneau</a>
                        @endauth
                        @endif
                        @guest
                        <a href="{{route('login')}}" class="nav-item nav-link ">Join Us</a>
                        @else
                         <li class="nav-item dropdown" style="list-style:none;">
                        <a style="font-size:20px" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                
                                <a class="dropdown-item" href="{{ route('usersdetails.show',Auth::user()->id) }}">
        {{ __('Profile') }}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
                    </div>
                   
                </div>
                @guest
                    
                 
                <a href="{{route('login')}}" class="btn btn-primary py-md-3 px-md-5 d-none d-lg-block">Join Us</a>

               
                
            @else
                
          
            @endguest
            </nav>
        </div>
    </div>
</div>
<!-- Header End -->


