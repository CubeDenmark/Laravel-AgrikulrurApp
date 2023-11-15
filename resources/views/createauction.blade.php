@extends('layouts.app')

@section('content')
  <title>Create New Auction</title>
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
    <link rel="stylesheet" href="../css/createAuction.css" />
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


    <!--Create Form Section-->
    <section class="container-fluid create-form-section">
      <div class="container-fluid">
        
        <div class="d-flex justify-content-center align-items-center">
          <div class="card mt-5 form-card">
            
            {{-- Help Button --}}
    <button class="btn btn-success help-btn border border-dark" data-bs-toggle="modal" data-bs-target="#auctionModal"><i class="fa-solid fa-circle-info help-txt"></i></button>
    {{-- Help Button --}}

    {{-- Help  Modal --}}
    <div class="modal fade" id="auctionModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title md-title text-success" id="auctionModalLabel">Create Auction Guide</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <iframe width="100%" height="100%" src="https://www.youtube.com/embed/bwfTqY9QwRU?si=AlCebYzkchIaJxhH" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary fs-2" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
{{-- Help  Modal --}}
 <!-- Translate Button -->
 <button id="translate-btn" class="btn btn-success rounded-circle position-absolute fs-1 m-2 opacity-50  border border-dark" data-bs-toggle="modal" data-bs-target="#translateModal"><i class="fa-solid fa-language" ></i></button>
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
            <h1 class="title text-center text-light mt-5">
              Create New Auction
            </h1>
            <div class="card-body d-flex flex-column">
            <div class="d-flex justify-content-between">
              <span></span>
            @if (session('success'))
              <div class="alert alert-success alert-dismissible fade show float-end addAlert" role="alert">
                <p class="md-title text-start"><i class="fa-regular fa-circle-check"></i> {{ session('success') }}</p>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
            
              @if (session('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <p class="md-title"><i class="fa-solid fa-circle-exclamation"></i> {{ session('failed') }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
            </div>
              <form class="d-flex flex-column" id="createForm" action="{{ route('newAuction') }}" method="POST" enctype="multipart/form-data">
                <!--Select Input-->
                @csrf
                <select type="text" id="crop_category" name="crop_id"  class="form-select mb-2 fs-1 bg-transparent text-light" aria-label="Default select example" required>
                      
                      <option value="null" class="bg-body-tertiary" selected disabled>
                        Choose a Crop Type
                      </option>
                      @foreach($crops as $crop)
                      <option value="{{$crop->crop_id}}" class="bg-success text-light">
                        {{$crop->crop_name}}
                      </option>
                      @endforeach
                </select>
                <!--Select Input-->

                <!--Price Input-->
                <div class="input-group mb-3">
                  <span id="peso-sign" class="input-group-text fs-1 bg-transparent text-light">₱</span>
                      <input
                        onkeyup="btnDis()"
                        name="input_price"
                        id="crop_price"
                        type="number"
                        class="form-control fs-1 bg-transparent text-light"
                        placeholder="Crop Price per Kilo"
                        aria-label="Price"
                        required
                      />
                </div>
                <!--Price Input-->

                <!--Volume Input-->
                <div class="input-group mb-3 bg-transparent">
                  <span class="input-group-text fs-1 bg-transparent text-light">Kg:</span>
                    <input
                      onkeyup="btnDis()"
                      name="input_volume"
                      id="crop_volume"
                      type="number"
                      class="form-control fs-1 bg-transparent text-light"
                      placeholder="Kilo of Crop"
                      aria-label="Volume"
                      required
                    />
                </div>
                <!--Volume Input-->

                <!--Picture Input-->
                <label for="crop_picture" class="text-light md-title"
                  >Upload Picture of your Produce</label
                >
                <div class="input-group mb-3 bg-transparent">
                  <input
                    onkeyup="btnDis()"
                    id="crop_picture"
                    type="file"
                    accept="image/png, image/jpeg"
                    class="form-control fs-1 bg-transparent text-light"
                    placeholder="Picture"
                    aria-label="Picture"
                    name="auction_cropImg"
                  />
                </div>
                <!--Picture Input-->

                <div class="d-flex justify-content-between mt-3">
                  <!--Utility Buttons-->
                  <a
                    id="back-btn"
                    class="btn text-light bg-transparent align-self-end w-50 fs-1"
                    href="javascript:history.back()"
                  >
                    Back
                  </a>
                  <button
                    type="submit"
                    id="form-btn"
                    onclick="confirmSubmit()"
                    class="btn btn-success align-self-end w-50 fs-1"
                  >
                    Submit
                  </button>
                  <!--Utility Buttons-->
                </div>
              </form>
            </div>
          </div>
        </div>
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
    <!--Create Form Section-->
@endsection
