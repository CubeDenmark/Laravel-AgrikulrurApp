<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/Profile.css" />
  </head>
  <body>
    <!--Navigation Bar-->
    <nav
      class="navbar nav-underline sticky-lg-top navbar-expand-xxl bg-body-tertiary"
    >
      <div class="container-fluid">
        <a
          class="navbar-brand d-flex align-items-center text-success"
          id="brand"
          href="{{ url('admin') }}"
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
              <a class="nav-link text-success" id="nav-link" href="{{ url('addcrop') }}"
                ><i class="fa-solid fa-circle-plus"></i> </i>Add Crop</a
              >
            </li>
            <li class="nav-item me-2">
              <a
                class="nav-link text-success"
                id="nav-link"
                aria-current="page"
                href="{{url('manageAuctions')}}"
                ><i class="fa-solid fa-gavel"></i> Manage Auction</a
              >
            </li>
            <li class="nav-item me-2">
              <a
                class="nav-link text-success"
                id="nav-link"
                aria-current="page"
                href="{{url('manageUsers')}}"
                ><i class="fa-solid fa-users"></i> Manage Users</a
              >
            </li>
            <li class="nav-item me-2">
              <a class="nav-link text-success" href="{{url('updateGuidelines')}}" id="nav-link"
                ><i class="fa-solid fa-table"></i> Update Pricing
                Guidelines</a
              >
            </li>

            <li class="nav-item me-2">
              <!-- Logout from built-in auth on laravel -->
              <a 
                class="btn btn-success w-auto fs-3 d-block d-xxl-none float-end"
                href="{{ route('logout') }}" 
                      onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"
                    ><i class="fa-solid fa-right-from-bracket"></i>{{ __('Sign Out') }}</a
                  >
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                  <!-- end > Logout from built-in auth on laravel -->
            </li>
          </ul>
          <div class="nav-pic d-none d-xxl-block btn-group dropdown">
            <button
              type="button"
              class="btn dropdown-toggle"
              id="dropdownMenuButton"
              data-bs-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <img src="../assets/avatar1.svg" class="img-fluid" />
            </button>
            <div
              class="dropdown-menu fs-3"
              id="dropdown-menu"
              aria-labelledby="dropdownMenuButton"
            >
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
                @yield('admin')
            </main>
        </div>
    </body>
</html>