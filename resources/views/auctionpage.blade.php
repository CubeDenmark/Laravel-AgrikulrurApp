@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="../css/listings.css" />
    <title>Auction Page</title>
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
    {{-- Help Button --}}
    <button class="btn btn-success help-btn" data-bs-toggle="modal" data-bs-target="#demandModal"><i class="fa-solid fa-circle-info help-txt"></i></button>
    {{-- Help Button --}}

    {{-- Help  Modal --}}
    <div class="modal fade" id="auctionModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title md-title text-success" id="auctionModalLabel">Auctions Page Guide</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <iframe width="100%" height="100%" src="https://www.youtube.com/embed/GkGxeuew2ac?si=JaPuwV-StTRh0mOZ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary fs-2" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
{{-- Help  Modal --}}
    <p class="title text-center mt-5 mb-5">
      Welcome to the <span class="text-success">{{$cropName->crop_name}} Auctions</span>
    </p>
    <div class="container-fluid d-flex justify-content-between">
      <span></span>
      @if(Auth::user()->type == "farmer")
      <a
        href="{{ url('create_auction')}}"
        class="btn btn-success text-success mb-4 create-new-btn"
      >
       
        
          <p class="md-title new-text-btn">
            <i class="fa-regular fa-square-plus"></i> Create New Auction
          </p>
       
        
      </a>
    </div>
    @endif
    <section
      class="offered-produce container-fluid p-5 d-flex justify-content-center justify-content-lg-start" id="offered">
      <div class="desktop-view flex-wrap d-flex flex-column flex-lg-row justify-content-center justify-content-lg-start gap-5">

      @foreach($auctionData as $auction)
          <div class="card" style="width: 18rem">
                <img src="images/auctions/{{$auction->auctionCropImage}}" alt="{{$auction->auctionCropImage}}" class="card-img-top object-fit-cover" />
                  <div class="card-body">
                        <h5 class="card-title md-title">Farmer:{{$auction->user_id}}</h5>
                          <div class="card-text">
                            <!-- <p class="fs-2">Price: {{$auction->auction_id}}</p> -->
                            <p class="fs-2">Volume: {{$auction->crop_volume}}kg</p>
                            <p class="fs-2">Base Bid Price: ₱{{$auction->starting_price}}/kg</p>
                            <p class="fs-2 highlight-text">Latest Bid Price: ₱{{$auction->latest_bid_price}}/kg</p>
                          </div>
                        <a href="{{ url('send-bid') }}?auction_id={{$auction->auction_id}}" class="btn btn-success fs-1 w-50">Bid</a>
                  </div>
          </div>
        @endforeach
  
      </div>
    </section>
@endsection