<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Notifications</title>
    <link rel="stylesheet" href="../css/Notifications.css" />
    <!-- Boostrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
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
          href="AuctionPage.html"
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
    <main class="container bg-light">
      <p class="title">Notifications</p>
      <!--START OF NOTIF-->
      <div class="winning-template">
        <div
          class="d-flex flex-column justify-content-center align-items-center"
        >
          <img src="../assets/celebrate.svg" alt="" class="img-fluid" />
          <p class="md-title">Congrats you won an Auction!</p>
        </div>
        <p class="desc fw-bold">Hello Teddy,</p>
        <p class="desc">
          Congratulations on being the winning bidder! To claim your products,
          please click the button below.
        </p>
        <a href="Checkout.html" class="btn btn-success fs-3 mx-3">Claim Here</a>
      </div>
    </main>
  </body>
</html>
