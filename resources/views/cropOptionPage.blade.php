@extends('layouts.app')

@section('content')
  <title>Supply Auction Page</title>
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
      Welcome to the <span class="text-success">Supply Auction Page</span>
    </p>
    <div class="d-flex justify-content-between">
      <p class="md-title text-start mx-4">Offered Produce Auctions</p>
      <div class="d-flex align-items-center">
        <a
          href="AuctionPage.html"
          class="md-title text-start mx-4 text-decoration-none text-success"
          >Supply</a
        >
        <p class="md-title text-start mx-4">|</p>
        <a
          href="DemandAuctionPage.html"
          class="md-title text-start mx-4 text-decoration-none text-dark"
          >Demand</a
        >
      </div>
    </div>
    <!--Titles-->

    <!--Offered Produce Section-->
    <section class="offered-produce container-fluid p-5 min-h-100vh" id="offered">

      <!--Desktop View-->
      <div
          class="row row-cols-1 row-cols-xl-4 row-cols-md-2 row-cols-lg-3 row-gap-4 column-gap-0 d-flex"
        >
        @foreach($crops as $crop)
        <div class="col d-flex justify-content-center align-items-center">
            <div class="card">
              <img
                src="images/crops/{{$crop->crop_image}}"
                class="card-img-top object-fit-cover"
                alt="Ampalaya"
              />
              <div class="card-body">
                <h5 class="card-title md-title">{{$crop->crop_name}}</h5>
                <a href="{{ url('auctions') }}?type={{$crop->crop_id}}" class="btn btn-success fs-4">View Auctions</a>
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
@endsection
