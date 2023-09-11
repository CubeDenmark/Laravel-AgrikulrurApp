<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Auction Page</title>
    <!--Custom CSS Tag-->
    <link rel="stylesheet" href="../css/auction.css" />
    <!--Custom CSS Tag-->

    <!--Bootstrap CSS Tag-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <!--Bootstrap CSS Tag-->

    <!--Bootstrap JS Tag-->
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
    <!--Bootstrap JS Tag-->
    <script
      src="https://kit.fontawesome.com/fae056ab45.js"
      crossorigin="anonymous"
    ></script>
    <!--Font Links-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap"
      rel="stylesheet"
    />
    <!--Font Links-->
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
                class="nav-link active text-success"
                id="nav-link"
                aria-current="page"
                href="AuctionPage.html"
                ><i class="fa-solid fa-gavel"></i> Auction Page</a
              >
            </li>
            <li class="nav-item d-block d-xxl-none">
              <a
                class="nav-link text-success"
                href="Notifications.html"
                id="nav-link"
                ><i class="fa-solid fa-bell"></i> Notifications</a
              >
            </li>
            <li class="nav-item me-2">
              <a
                class="nav-link text-success"
                href="Guidelines.html"
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
                    class="nav-link text-success text-decoration-underline"
                    >Teddy Pascual</a
                  ></strong
                >
              </p>
            </li>

            <li class="nav-item me-2">
              <a
                class="btn btn-success w-auto fs-3 d-block d-xxl-none float-end"
                href="../pages/Login.html"
                >Sign Out</a
              >
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
                src="../assets/devTeam/Denmark.jpg"
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
              <a class="dropdown-item text-success" href="Profile.html"
                ><i class="fa-solid fa-user"></i> Profile</a
              >
              <a class="dropdown-item text-success" href="Notifications.html"
                ><i class="fa-solid fa-bell"></i> Notifications</a
              >
              <div class="dropdown-divider"></div>
              <a class="btn btn-success w-100 fs-3" href="../pages/Login.html"
                ><i class="fa-solid fa-right-from-bracket"></i> Sign Out</a
              >
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!--Navigation Bar-->

    <!--Titles-->
    <p class="title text-center mt-5 mb-5">
      Welcome to the <span class="text-success">Auction Page</span>
    </p>
    <p class="md-title text-start mx-4">Offered Produce Auctions</p>
    <!--Titles-->

    <!--Offered Produce Section-->
    <section class="offered-produce container-fluid p-5" id="offered">
      <!--2 Arrows Div-->
      <div class="float-end d-lg-none text-light">
        <i class="fa-solid fa-chevron-right"></i>
        <i class="fa-solid fa-chevron-right"></i>
      </div>
      <!--2 Arrows Div-->

      <!--Mobile View-->
      <div class="d-block d-xxl-none">
        <!--Mobile Pill Navigation-->
        <ul
          class="nav crop-type-selection justify-content-center nav-pills mb-3 fs-3 text-success"
          id="pills-tab"
          role="tablist"
        >
        
          
      
          @foreach($crops as $crop)
            <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="pills-kalabasa-tab"
                  data-bs-toggle="pill"
                  data-bs-target="#pills-{{$crop->crop_id}}"
                  type="button"
                  role="tab"
                  aria-controls="pills-{{$crop->crop_id}}"
                  aria-selected="false"
                >
              {{$crop->crop_name}}
              </button>
            </li>
          @endforeach


        </ul>
        <!--Mobile Pill Navigation-->

        <!--Mobile Pill Content-->
        <div
          class="tab-content d-flex justify-content-center"
          id="pills-tabContent"
        >


          @foreach($crops as $crop)
            <div class="tab-pane fade" id="pills-{{$crop->crop_id}}" role="tabpanel"  aria-labelledby="pills-{{$crop->crop_id}}-tab" tabindex="0">
              <div class="card" style="width: 30rem">
                <img class="card-img-top" src="../assets/Kalabasa.jpg" alt="Card image cap"/>
                <div class="card-body">
                  <h5 class="card-title md-title">{{$crop->crop_name}}</h5>
                  <a href="{{ url('auctions') }}?type={{$crop->crop_id}}" class="btn btn-success">View Auctions</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <!--Mobile Pill Content-->
      </div>
      <!--Mobile View-->

      <!--Desktop View-->
      <div class="row row-cols-5 row-gap-5 d-none d-xxl-flex">
        @foreach($crops as $crop)
            <div class="col">
              <div class="card">
                <img src="../assets/Ampalaya.jpeg" class="card-img-top" alt="" />
                <div class="card-body">
                  <h5 class="card-title md-title">{{$crop->crop_name}}</h5>
                  <a href="{{ url('auctions') }}?type={{$crop->crop_id}}" class="btn btn-success">View Auctions</a>
                </div>
              </div>
            </div>
        @endforeach
<!--  
        <div class="col">
          <div class="card">
            <img src="../assets/Kalabasa.jpg" class="card-img-top" alt="" />
            <div class="card-body">
              <h5 class="card-title md-title">Kalabasa</h5>

              <a href="Kalabasa.html" class="btn btn-success">View Auctions</a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../assets/Tomato.png" class="card-img-top" alt="" />
            <div class="card-body">
              <h5 class="card-title md-title">Kamatis</h5>
              <a href="Kamatis.html" class="btn btn-success">View Auctions</a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../assets/Okra.jpeg" class="card-img-top" alt="" />
            <div class="card-body">
              <h5 class="card-title md-title">Okra</h5>
              <a href="Okra.html" class="btn btn-success">View Auctions</a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../assets/sigarilyas.jpg" class="card-img-top" alt="" />
            <div class="card-body">
              <h5 class="card-title md-title">Sigarilyas</h5>
              <a href="Sigarilyas.html" class="btn btn-success">View Auctions</a>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card">
            <img src="../assets/sitaw.jpg" class="card-img-top" alt="" />
            <div class="card-body">
              <h5 class="card-title md-title">Sitaw</h5>
              <a href="Sitaw.html" class="btn btn-success">View Auctions</a>
            </div>
          </div>
        </div>
      </div>
-->
      <!--Desktop View-->
    </section>
    <!--Offered Produce Section-->
  </body>
</html>
