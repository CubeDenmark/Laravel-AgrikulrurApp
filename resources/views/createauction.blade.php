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
            <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <p class="fs-3 fw-bold">{{ session('success') }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              @if (session('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <p class="fs-3 fw-bold">{{ session('failed') }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
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
                      placeholder="Crop Kilo"
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
    <!--Create Form Section-->
@endsection
