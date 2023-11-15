@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="../css/listingsDemand.css" />
    <title>Demand Auction Page</title>
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
     <!-- Translate Button -->
     <button id="translate-btn" class="btn btn-success rounded-circle position-absolute fs-1 m-2 opacity-50" data-bs-toggle="modal" data-bs-target="#translateModal"><i class="fa-solid fa-language" ></i></button>
<div class="modal fade" id="translateModal" tabindex="-1" aria-labelledby="translateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Translate Page?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div id="google_translate_element"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary fs-2" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      <!-- Translate Button -->
    {{-- Help Button --}}
    <button class="btn btn-success help-btn" data-bs-toggle="modal" data-bs-target="#demandModal"><i class="fa-solid fa-circle-info help-txt"></i></button>
    {{-- Help Button --}}

    {{-- Help  Modal --}}
    <div class="modal fade" id="demandModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title md-title text-success" id="demandModalLabel">Demand Auctions Page Guide</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <iframe width="100%" height="100%" src="https://www.youtube.com/embed/goZUGhYYNsA?si=QrHImI96SERkny9t" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary fs-2" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
{{-- Help  Modal --}}
    <p class="title text-center mt-5 mb-5">
      Welcome to Demand Auctions Page</span>
    </p>
    <div class="d-flex justify-content-between">
      <span></span>
      <div class="d-flex">
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
    <div class="container-fluid d-flex justify-content-between">
      <span class="d-none d-sm-block"></span>
      @if(Auth::user()->type == "bidder")
      <a
        href="{{ url('create_demAuction')}}"
        class="btn btn-success text-success mb-4 create-new-btn"
      >
       
        
          <p class="md-title new-text-btn">
            <i class="fa-regular fa-square-plus"></i> Create New Demand Auction
          </p>
       
        
      </a>
    </div>
    @endif
    <section
      class="offered-produce container-fluid p-5 d-flex justify-content-center justify-content-lg-start" id="offered">
      <div class="desktop-view flex-wrap d-flex flex-column flex-lg-row justify-content-center justify-content-lg-start gap-5">

      @foreach($auctionData as $auction)
          <div class="card" style="width: 18rem">
                <p class="title text-center my-auto">{{$auction->crop_name}}</p>
                <hr>
                  <div class="card-body">
                        
                          <div class="d-flex flex-column justify-content-between h-100">
                            <div>
                              <div class="card-text">
                                <!-- <p class="fs-2">Price: {{$auction->auction_id}}</p> -->
                                <p class="fs-2">Volume: <b>{{$auction->crop_volume}}kg</b></p>
                                <p class="fs-2">Base Bid Price: <b>₱{{$auction->starting_price}}/kg</b></p>
                                <p class="fs-2">Pick-up Date: <b>{{$auction->pick_up_date}}</b></p>
                                <p class="fs-2">Latest Bid Price:
                                  <p class="fs-2 highlight-text">
                                    <b>
                                      ₱{{$auction->latest_bid_price}}/kg
                                    </b>
                                  </p>
                                </p>
                              </div>
                              <p class="fs-2">Farmer name: <br><h3 class="card-title md-title">{{$auction->creator_id}}</h3></p>
                            </div>
                                                    <a href="{{ url('selectAuction') }}?auction_id={{$auction->auction_id}}" class="btn btn-success fs-1 w-50">Bid</a>
                                              </div>
                          </div>
          </div>
        @endforeach
  
      </div>
    </section>
        <!-- Google Translate Script -->
        <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!-- Google Translate Script -->
@endsection