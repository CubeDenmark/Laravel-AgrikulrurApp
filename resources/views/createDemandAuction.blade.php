
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
            <h1 class="title text-center text-light mt-5">
              Create New Demand Auction
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
              <form class="d-flex flex-column" id="createForm" action="{{ route('new_demAuction') }}" method="POST" enctype="multipart/form-data">
                
                @csrf
                <!-- Crop name input field -->
                <div class="input-group mb-3">
                      <input
                        onkeyup="btnDis()"
                        name="crop_name"
                        id="crop_name"
                        type="text"
                        class="form-control fs-1 bg-transparent text-light"
                        placeholder="Crop Name"
                        aria-label="Price"
                        required
                      />
                </div>

                <!--Price Input-->
                <div class="input-group mb-3">
                  <span
                    id="peso-sign"
                    class="input-group-text fs-1 bg-success text-light"
                    >₱</span
                  >
                  <input
                    onkeyup="btnDis()"
                    name="input_price"
                    id="crop_price"
                    type="number"
                    class="form-control fs-1 bg-transparent text-light"
                    placeholder="Crop Price"
                    aria-label="Price"
                    required
                  />
                </div>
                <!--Price Input-->

                <!--Volume Input-->
                <div class="input-group mb-3 bg-transparent">
                  <span class="input-group-text fs-1 bg-success text-light"
                    >Kg:
                  </span>
                  <input
                    onkeyup="btnDis()"
                    name="input_volume"
                    id="crop_volume"
                    type="number"
                    class="form-control fs-1 bg-transparent text-light"
                    placeholder="Crop Volume"
                    aria-label="Volume"
                    required
                  />
                </div>
                <!--Volume Input-->

                <!--Pick-up Date Input-->
                <label for="crop_picture" class="text-light md-title"
                  >Enter Pick-up Date</label
                >
                <div class="input-group mb-3 bg-transparent">
                  <input
                    type="date"
                    name="pick_up_date"
                    id=""
                    class="form-control fs-1 bg-transparent text-light"
                  />
                </div>
                <!--Pick-up Date Input-->

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
