<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bidding Page</title>
    <link rel="stylesheet" href="{{URL::asset('css/Bidding.css')}}" />
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
          href="#"
          ><img
            src="../assets/logo-nobg.png"
            class="img-fluid logo-pic rounded-circle"
          />
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
              class="btn dropdown-toggle"
              id="dropdownMenuButton"
              data-bs-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <img src="../assets/Teddy.jpg" class="img-fluid rounded-circle" />
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
    <main class="container-fluid">
      <div class="row main-row">
        <!-- Mobile Container -->
        <div class="col main-cont d-lg-none">
          <div
            class="row bg-light border-bottom border-black h-50 d-flex flex-lg-column justify-content-center align-items-center p-4"
          >
            <img src="../assets/sitaw.jpg" alt="" class="mb-2" id="bid-image" />
          </div>
          <div class="row bg-light row-cols-2 p-2">
            <div class="col border-end border-black">
              <p class="mt-2">Creator</p>
              <div class="d-flex align-items-center">
                <img
                  src="../assets/devTeam/Darren.png"
                  alt=""
                  class="rounded-circle m-2"
                  style="width: 50px"
                />
                <p class="fs-5 fw-bold">Darren Ventura</p>
              </div>
              <p>Base Bid Price: 499</p>
            </div>
            <div class="col border-black">
              <p class="mt-2">Ending In</p>
              <div class="d-flex align-items-center">
                <p class="fs-1 fw-bold mt-3">January 02, 2022</p>
              </div>
              <p class="mt-3">
                Latest Bid Price: <span class="fw-bold">499</span>
              </p>
            </div>
          </div>
          <div
            class="col cta-col bg-light pb-4 border-top border-2 border-black"
          >
            <p class="title text-start">Top Bidders</p>
            <div class="row bids-row bg-light-subtle mb-4">
              <div class="bids-table mt-2">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col"></th>
                      <th scope="col">Name</th>
                      <th scope="col">Bid Amount</th>
                      <th scope="col">Date</th>
                    </tr>
                  </thead>
                  <tbody id="tbody">
                    <tr>
                      <td class="text-center">
                        <img
                          src="/assets/Teddy.jpg"
                          alt=""
                          class="rounded-circle"
                          id="table-img"
                        />
                      </td>
                      <td>Teddy Pascual</td>
                      <td>420</td>
                      <td>2023-1-2</td>
                    </tr>
                    <tr>
                      <td class="text-center">
                        <img
                          src="/assets/Teddy.jpg"
                          alt=""
                          class="rounded-circle"
                          id="table-img"
                        />
                      </td>
                      <td>Teddy Pascual</td>
                      <td>420</td>
                      <td>2023-1-2</td>
                    </tr>
                    <tr>
                      <td class="text-center">
                        <img
                          src="/assets/Teddy.jpg"
                          alt=""
                          class="rounded-circle"
                          id="table-img"
                        />
                      </td>
                      <td>Teddy Pascual</td>
                      <td>420</td>
                      <td>2023-1-2</td>
                    </tr>
                    <tr>
                      <td class="text-center">
                        <img
                          src="/assets/Teddy.jpg"
                          alt=""
                          class="rounded-circle"
                          id="table-img"
                        />
                      </td>
                      <td>Teddy Pascual</td>
                      <td>420</td>
                      <td>2023-1-2</td>
                    </tr>
                    <tr>
                      <td class="text-center">
                        <img
                          src="/assets/Teddy.jpg"
                          alt=""
                          class="rounded-circle"
                          id="table-img"
                        />
                      </td>
                      <td>Teddy Pascual</td>
                      <td>420</td>
                      <td>2023-1-2</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div
              class="row cta-row d-flex justify-content-center mb-2 mt-2 mt-lg-5"
            >
              <div
                class="border border-black w-75 d-flex justify-content-center align-items-center p-2 gap-2"
              >
                <input
                  type="number"
                  class="form-control border-0 bg-transparent text-center"
                  id="inputPrice"
                  placeholder="Enter Your Bid"
                  onkeyup="al()"
                />
                <button
                  class="btn btn-success"
                  onclick="lezgo()"
                  id="bid-btn"
                  disabled
                >
                  Bid
                </button>
              </div>
            </div>
            <p class="fs-5 fw-light text-center text-secondary">
              Auction Id: 31231241242
            </p>
          </div>
        </div>
        <!-- Mobile Container -->
        <!-- Web  Container -->
        <div class="col d-none d-lg-block p-5">
          <div class="row row-cols-2">
            <div class="col">
              <div
                class="d-flex justify-content-center align-items-center gap-5"
              >
                <div class="d-flex align-items-center">
                  <img
                    src="../assets/devTeam/Darren.png"
                    alt=""
                    class="rounded-circle m-2"
                    style="width: 50px"
                  />
                  <p class="desc fw-bold">Darren Ventura</p>
                </div>
                <h1>|</h1>
                <h1>Auction Id: 124312551</h1>
              </div>
              <div class="web-img-cont bg-danger-subtle overflow-hidden mb-2">
                <img
                  src="/assets/sigarilyas.jpg"
                  alt=""
                  id="web-img"
                  class="w-100 h-100 object-fit-cover"
                />
              </div>
              <div
                class="d-flex justify-content-center align-items-center gap-5"
              >
                <p class="desc">Base Bid Price: 499</p>
                <p class="desc">|</p>
                <p class="desc">Latest Bid Price: 499</p>
              </div>
            </div>
            <div class="col">
              <p class="title text-center">Sigarilyas</p>
              <p class="title text-success">499</p>
              <p class="md-title">Bidding will end at: January 02, 2024</p>
              <p class="md-title">Volume: 22kg</p>
              <div class="d-flex flex-column align-items-center">
                <p class="title">Top Bidders</p>
                <div class="row bids-row bg-light-subtle mb-4 w-100">
                  <div class="bids-table mt-2">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">Name</th>
                          <th scope="col">Bid Amount</th>
                          <th scope="col">Date</th>
                        </tr>
                      </thead>
                      <tbody id="tbody">
                        <tr>
                          <td class="text-center">
                            <img
                              src="/assets/Teddy.jpg"
                              alt=""
                              class="rounded-circle"
                              id="table-img"
                            />
                          </td>
                          <td>Teddy Pascual</td>
                          <td>420</td>
                          <td>2023-1-2</td>
                        </tr>
                        <tr>
                          <td class="text-center">
                            <img
                              src="/assets/Teddy.jpg"
                              alt=""
                              class="rounded-circle"
                              id="table-img"
                            />
                          </td>
                          <td>Teddy Pascual</td>
                          <td>420</td>
                          <td>2023-1-2</td>
                        </tr>
                        <tr>
                          <td class="text-center">
                            <img
                              src="/assets/Teddy.jpg"
                              alt=""
                              class="rounded-circle"
                              id="table-img"
                            />
                          </td>
                          <td>Teddy Pascual</td>
                          <td>420</td>
                          <td>2023-1-2</td>
                        </tr>
                        <tr>
                          <td class="text-center">
                            <img
                              src="/assets/Teddy.jpg"
                              alt=""
                              class="rounded-circle"
                              id="table-img"
                            />
                          </td>
                          <td>Teddy Pascual</td>
                          <td>420</td>
                          <td>2023-1-2</td>
                        </tr>
                        <tr>
                          <td class="text-center">
                            <img
                              src="/assets/Teddy.jpg"
                              alt=""
                              class="rounded-circle"
                              id="table-img"
                            />
                          </td>
                          <td>Teddy Pascual</td>
                          <td>420</td>
                          <td>2023-1-2</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="w-100 px-5 d-flex flex-column gap-2 mt-5">
                  <input
                    type="number"
                    name=""
                    id=""
                    class="form-control border-black text-center fs-1"
                  />
                  <button type="submit" class="w-100 btn btn-success fs-1">
                    Bid
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="{{URL::asset('js/biddings.js')}}"></script>
    </main>
  </body>
</html>
