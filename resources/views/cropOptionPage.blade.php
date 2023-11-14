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
    <button class="btn btn-success help-btn" data-bs-toggle="modal" data-bs-target="#cropOptionModal"><i class="fa-solid fa-circle-info help-txt"></i></button>
    {{-- Help Button --}}

    {{-- Help  Modal --}}
    <div class="modal fade" id="cropOptionModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title md-title text-success" id="cropOptionModalLabel">Supply Auction Page Guide</h5>
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
      Welcome to the <span class="text-success">Supply Auction Page</span>
    </p>
    
    <div class="d-flex flex-column-reverse flex-lg-row justify-content-between">
      <p class="md-title text-start mx-4">Offered Produce Auctions</p>
      <div class="d-flex justify-content-between align-items-center">
        <span class="d-block d-lg-none"></span>
        <div class="d-flex">
          <a
            href="{{url('crop-options')}}"
            class="md-title text-start mx-4 text-decoration-none text-success"
            >Supply</a
          >
          <p class="md-title text-start mx-4">|</p>
          <a
            href="{{ url('demandAuctions') }}"
            class="md-title text-start mx-4 text-decoration-none text-dark"
            >Demand</a
          >
        </div>
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
    <!-- Google Translate Script -->
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!-- Google Translate Script -->
@endsection
