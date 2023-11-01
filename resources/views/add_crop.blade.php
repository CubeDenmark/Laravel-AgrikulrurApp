@extends('layouts.adminApp')

@section('admin')
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
            <h1 class="title text-center text-light mt-5">
                Add Crop
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
              <form class="d-flex flex-column" id="createForm" action="{{ route('newCrop') }}" method="POST" enctype="multipart/form-data">
                <!--Select Input-->
                @csrf
    
                <!--Crop Name-->
                <div class="input-group mb-3 bg-transparent">
                    <input
                      onkeyup="btnDis()"
                      name="crop_name"
                      id="crop_volume"
                      type="text"
                      class="form-control cropTitle bg-transparent text-light"
                      placeholder="Crop Name"
                      aria-label="Volume"
                      required
                    />
                </div>
                <!--Crop Name-->

                <!--Suggested Price-->
                <div class="input-group mb-3">
                  <span id="peso-sign" class="input-group-text cropTitle bg-transparent text-light">₱</span>
                      <input
                        onkeyup="btnDis()"
                        name="suggested_price"
                        id="crop_price"
                        type="number"
                        class="form-control cropTitle bg-transparent text-light"
                        placeholder="Suggested Price per Kilo"
                        aria-label="Price"
                        required
                      />
                </div>
                <!--Suggested Price-->
                <!--Upload File -->
                <label for="crop_picture" class="text-light md-title"
                  >Upload Crop Picture:</label
                >
                <div class="input-group mb-3 bg-transparent">
                  <input
                    name="crop_image"
                    onkeyup="btnDis()"
                    id="crop_picture"
                    type="file"
                    accept="image/png, image/jpeg"
                    class="form-control cropTitle bg-transparent text-light"
                    placeholder="Picture"
                    aria-label="Picture"
                  />
                </div>
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
