 <!-- Navigation-->
 <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body text-white">
    </div>
  </div>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="./"></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('/')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('/doctors')}}"></span>Doctors</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{url('/about')}}">About</a></li>
                  @if (!Auth::check())
                      
                
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{route('login')}}" id="login_now">Login</a></li>
                  
                   @else
                       
                 
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>