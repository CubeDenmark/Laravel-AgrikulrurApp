@extends('layouts.app')

@section('content')
    <title>Auction Page</title>
    <link rel="stylesheet" href="../css/listingsDemand.css" />

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

    <p class="title text-center mt-5 mb-5">
      Welcome to the <span class="text-success">Amplaya Demand Auctions</span>
    </p>
    <div class="container-fluid d-flex justify-content-between">
      <span></span>
      <a
        href="CreateDemandAuctionPage.html"
        class="btn btn-success text-success mb-4 create-new-btn"
      >
        <p class="md-title new-text-btn">
          <i class="fa-regular fa-square-plus"></i> Create New Demand Auction
        </p>
      </a>
    </div>
    <section
      class="offered-produce container-fluid p-5 d-flex justify-content-center justify-content-lg-start"
      id="offered"
    >
      <div
        class="desktop-view flex-wrap d-flex flex-column flex-lg-row justify-content-center justify-content-lg-start gap-5"
      >
        <div class="card" style="width: 18rem">
          <img src="../assets/Ampalaya.jpeg" class="card-img-top" alt="" />
          <div class="card-body">
            <h5 class="card-title md-title">Farmer: Teddy</h5>
            <div class="card-text">
              <p class="fs-2">Price: 420</p>
              <p class="fs-2">Volume: 12</p>
              <p class="fs-2">Base Bid Price: 16</p>
              <p class="fs-2">
                Pick-up Date: <span class="fst-italic">September 01, 2023</span>
              </p>
              <p class="fs-2 highlight-text">Latest Bid Price: 69</p>
            </div>
            <a href="BiddingPageDemand.html" class="btn btn-success fs-1 w-50"
              >Bid</a
            >
          </div>
        </div>
        <div class="card" style="width: 18rem">
          <img src="../assets/Ampalaya.jpeg" class="card-img-top" alt="" />
          <div class="card-body">
            <h5 class="card-title md-title">Farmer: Teddy</h5>
            <div class="card-text">
              <p class="fs-2">Price: 420</p>
              <p class="fs-2">Volume: 12</p>
              <p class="fs-2">Base Bid Price: 16</p>
              <p class="fs-2">
                Pick-up Date: <span class="fst-italic">September 01, 2023</span>
              </p>
              <p class="fs-2 highlight-text">Latest Bid Price: 69</p>
            </div>
            <a href="BiddingPageDemand.html" class="btn btn-success fs-1 w-50"
              >Bid</a
            >
          </div>
        </div>
        <div class="card" style="width: 18rem">
          <img src="../assets/Ampalaya.jpeg" class="card-img-top" alt="" />
          <div class="card-body">
            <h5 class="card-title md-title">Farmer: Teddy</h5>
            <div class="card-text">
              <p class="fs-2">Price: 420</p>
              <p class="fs-2">Volume: 12</p>
              <p class="fs-2">Base Bid Price: 16</p>
              <p class="fs-2">
                Pick-up Date: <span class="fst-italic">September 01, 2023</span>
              </p>
              <p class="fs-2 highlight-text">Latest Bid Price: 69</p>
            </div>
            <a href="BiddingPageDemand.html" class="btn btn-success fs-1 w-50"
              >Bid</a
            >
          </div>
        </div>
        <div class="card" style="width: 18rem">
          <img src="../assets/Ampalaya.jpeg" class="card-img-top" alt="" />
          <div class="card-body">
            <h5 class="card-title md-title">Farmer: Teddy</h5>
            <div class="card-text">
              <p class="fs-2">Price: 420</p>
              <p class="fs-2">Volume: 12</p>
              <p class="fs-2">Base Bid Price: 16</p>
              <p class="fs-2">
                Pick-up Date: <span class="fst-italic">September 01, 2023</span>
              </p>
              <p class="fs-2 highlight-text">Latest Bid Price: 69</p>
            </div>
            <a href="BiddingPageDemand.html" class="btn btn-success fs-1 w-50"
              >Bid</a
            >
          </div>
        </div>
      </div>
    </section>
@endsection
