@extends('layouts.app')

@section('content')
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
 

    <!--Titles-->
    <p class="title text-center mt-5 mb-5">
      Welcome to the <span class="text-success">Demand Auction Page</span>
    </p>
    <div class="d-flex justify-content-between">
      <p class="md-title text-start mx-4">Offered Produce Auctions</p>
      <div class="d-flex align-items-center">
        <a
          href="{{url('crop-options')}}"
          class="md-title text-start mx-4 text-decoration-none text-dark"
          >Supply</a
        >
        <p class="md-title text-start mx-4">|</p>
        <a
          href="{{ url('demandAuctions') }}"
          class="md-title text-start mx-4 text-decoration-none text-success"
          >Demand</a
        >
      </div>
    </div>
    <!--Titles-->

    <!--Offered Produce Section-->
    <section
      class="offered-produce container-fluid p-5 d-flex justify-content-center overflow-y-scroll"
      id="offered"
    >
      <!--Desktop View-->
      <div
        class="row row-cols-1 row-cols-xl-6 row-cols-lg-4 row-gap-4 column-gap-0 d-flex"
      >
        <div class="col d-flex d-md-block justify-content-center">
          <div class="card">
            <img src="../assets/Ampalaya.jpeg" class="card-img-top" alt="" />
            <div class="card-body">
              <h5 class="card-title md-title">Ampalaya</h5>
              <a href="AmpalayaDemand.html" class="btn btn-success"
                >View Auctions</a
              >
            </div>
          </div>
        </div>
        <div class="col d-flex d-md-block justify-content-center">
          <div class="card">
            <img src="../assets/Kalabasa.jpg" class="card-img-top" alt="" />
            <div class="card-body">
              <h5 class="card-title md-title">Kalabasa</h5>

              <a href="KalabasaDemand.html" class="btn btn-success"
                >View Auctions</a
              >
            </div>
          </div>
        </div>
        <div class="col d-flex d-md-block justify-content-center">
          <div class="card">
            <img src="../assets/Tomato.png" class="card-img-top" alt="" />
            <div class="card-body">
              <h5 class="card-title md-title">Kamatis</h5>
              <a href="KamatisDemand.html" class="btn btn-success"
                >View Auctions</a
              >
            </div>
          </div>
        </div>
        <div class="col d-flex d-md-block justify-content-center">
          <div class="card">
            <img src="../assets/Okra.jpeg" class="card-img-top" alt="" />
            <div class="card-body">
              <h5 class="card-title md-title">Okra</h5>
              <a href="OkraDemand.html" class="btn btn-success"
                >View Auctions</a
              >
            </div>
          </div>
        </div>
        <div class="col d-flex d-md-block justify-content-center">
          <div class="card">
            <img src="../assets/sigarilyas.jpg" class="card-img-top" alt="" />
            <div class="card-body">
              <h5 class="card-title md-title">Sigarilyas</h5>
              <a href="SigarilyasDemand.html" class="btn btn-success"
                >View Auctions</a
              >
            </div>
          </div>
        </div>
        <div class="col d-flex d-md-block justify-content-center">
          <div class="card">
            <img src="../assets/sitaw.jpg" class="card-img-top" alt="" />
            <div class="card-body">
              <h5 class="card-title md-title">Sitaw</h5>
              <a href="SitawDemand.html" class="btn btn-success"
                >View Auctions</a
              >
            </div>
          </div>
        </div>
      </div>
      <!--Desktop View-->
    </section>
    <!--Offered Produce Section-->
@endsection