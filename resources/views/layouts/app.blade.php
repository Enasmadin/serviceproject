<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Talabia</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    @yield('links')

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('styles')

</head>

<body class="bg-light">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm mb-5">
            <div class="container">
                <a class="navbar-brand d-flex justify-content-between align-items-center" href="{{ url('/') }}">
                    
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ __('الخدمات') }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item "
                                            href="{{ route('services.index') }}">{{ __('كل الخدمات') }}</a> 
                                    </li>         
                                        @auth
                                        @if(Auth::user()->is_admin == '2'  && Auth::user()->status == 'accepted' )
                                    <li>
                                        <a class="dropdown-item "
                                            href="{{ route('services.create') }}">{{ __('خدمه جديد') }}</a>
                                   </li> 
                                      @endif 
                                        @endauth
                                </ul>
                            </li>
                          
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ __('الطلبيات') }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item " href="{{ route('orders.index') }}">
                                            {{ __('كل الطلبيات') }}
                                        </a>
                                    <li>
                                </ul>
                            </li>
                            
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                       @guest  
                          
                             @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link " href="{{ route('login') }}">{{ __('دخول') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('حسابا جديدا') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" role="button" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" v-pre href="#">
                                    <div class="d-flex flex-md-row-reverse">
                                        <div
                                            class="d-flex flex-column justify-content-center align-items-center text-capitalize">
                                            <span class="text-white">
                                                {{ Auth::user()->name }}
                                            </span>
                                            <small class="text-muted fw-bold">
                                                @if (Auth::user()->is_admin == '0')
                                                    user
                                                @elseif(Auth::user()->is_admin == '1')
                                                   admin
                                                   @else
                                                   subadmin 
                                                @endif
                                            </small>
                                        </div>
                                        
                                    </div>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                   

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('خروج') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                       
                             @endguest 
                             @if (  auth()->check() && auth()->user()->is_admin == '1')
                             <a class="nav-item nav-link" href="{{ route('users.index') }}" role="button">
                                 لوحة التحكم
                             </a>
                           @endif 
                          
                    </ul> 
                </div>
            </div>
        </nav>
        

        <main class="py-4 min-vh-100">
            @yield('content')
        </main>
    </div>
    @yield('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>
