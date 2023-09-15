<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/Profile.css" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
     @vite(['resources/js/app.js']) <!--'resources/sass/app.scss',  -->
</head>
<body>

    <div id="app">

        <!--Navigation Bar-->
        <nav
      class="navbar nav-underline sticky-lg-top navbar-expand-xxl bg-body-tertiary"
    >
      <div class="container-fluid">
        <a
          class="navbar-brand d-flex align-items-center text-success"
          id="brand"
          href="#"
          ><img src="../assets/logo-nobg.png" class="img-fluid logo-pic" />
          <p class="title">Agrikultur'App</p></a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon fs-1"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul
            class="navbar-nav ms-auto mb-2 mb-lg-0 text-end d-flex align-items-xxl-center"
          >
            <li class="nav-item me-2">
              <a
                class="nav-link text-success"
                id="nav-link"
                href="{{ url('crop-options') }}"
                ><i class="fa-solid fa-gavel"></i> Auction Page</a
              >
            </li>
            <li class="nav-item d-block d-xxl-none">
              <a
                class="nav-link text-success"
                href="{{ url('notifications') }}""
                id="nav-link"
                ><i class="fa-solid fa-bell"></i> Notifications</a
              >
            </li>
            <li class="nav-item me-2">
              <a
                class="nav-link text-success"
                href="{{ url('guidelines') }}"
                id="nav-link"
                ><i class="fa-solid fa-table"></i> Pricing Guidelines</a
              >
            </li>
            <li class="nav-item">
              <p class="desc text-end d-block d-xxl-none">
                Logged In as:
                <strong
                  ><a
                    href="Profile.html"
                    class="nav-link active text-success text-decoration-underline"
                    >{{ Auth::user()->name }}</a
                  ></strong
                >
              </p>
            </li>

            <li class="nav-item me-2">
              <!-- Logout from built-in auth on laravel -->
              <a class="btn btn-success w-auto fs-3 d-block d-xxl-none float-end" href="{{ route('logout') }}" 
                      onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-right-from-bracket"></i>{{ __('Sign Out') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
              </form>
              <!-- end > Logout from built-in auth on laravel -->
            </li>
          </ul>
          <div class="nav-pic d-none d-xxl-block btn-group dropdown">
            <button
              type="button"
              class="btn dropdown-toggle d-flex align-items-center w-100 h-100"
              id="dropdownMenuButton"
              data-bs-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <img
                src="../assets/Teddy.jpg"
                class="rounded-circle object-fit-fill"
                width="100%"
                height="100%"
              />
            </button>
            <div
              class="dropdown-menu fs-3"
              id="dropdown-menu"
              aria-labelledby="dropdownMenuButton"
            >
              <a class="dropdown-item text-success" href="{{ url('profile') }}"
                ><i class="fa-solid fa-user"></i> Profile</a
              >
              <a class="dropdown-item text-success" href="{{ url('notifications') }}"
                ><i class="fa-solid fa-bell"></i> Notifications</a
              >
              <div class="dropdown-divider"></div>
                  <!-- Logout from built-in auth on laravel -->
                  <a class="btn btn-success w-100 fs-3" href="{{ route('logout') }}" 
                      onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"
                    ><i class="fa-solid fa-right-from-bracket"></i>{{ __('Sign Out') }}</a
                  >
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                  <!-- end > Logout from built-in auth on laravel -->
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!--Navigation Bar-->


           

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<!--         <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <-- Left Side Of Navbar --
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <-- Right Side Of Navbar --
                    <ul class="navbar-nav ms-auto">


                    
                        <-- Authentication Links --

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest


                    </ul>
                </div>
            </div>
        </nav> -->




        <!-- 
             <-Navigation Bar->

             <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container-fluid">
                    <a class="navbar-brand d-flex align-items-center text-success" id="brand" href="#" >
                        <img src="../assets/logo-nobg.png" class="img-fluid logo-pic" />
                        <p class="title">{{ config('app.name', 'Laravel') }}</p>
                    </a>
                    <button class="navbar-toggler" type="button"  data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"  aria-controls="navbarSupportedContent"  aria-expanded="false"  aria-label="Toggle navigation" >
                                <span class="navbar-toggler-icon fs-1"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-end d-flex align-items-xxl-center">
                            @guest
                                @if (Route::has('login'))
                                <li class="nav-item me-2">
                                    <a class="nav-link text-success"  href="{{ route('register') }}" id="nav-link">
                                        <i class="fa-solid fa-table">
                                            
                                        </i>{{ __('Register') }}
                                    </a>
                                </li>
                                @endif
                                @if (Route::has('register'))
                                <li class="nav-item me-2">
                                    <a class="nav-link text-success" href="{{ route('login') }}" id="nav-link">
                                        <i class="fa-solid fa-table">
                                            
                                        </i>{{ __('Login') }}
                                    </a>
                                </li>
                                @endif
                            @endguest
                        </ul>

                    </div>
                </div>

            </nav>
            Navigation Bar-
         -->
</html>
