@extends('layouts.app')

@section('content')
  <title>Profile</title>
    <link rel="stylesheet" href="../css/Profile.css" />
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

    <main class="container-fluid">
      {{-- Help Button --}}
    <button class="btn btn-success help-btn" data-bs-toggle="modal" data-bs-target="#profileModal"><i class="fa-solid fa-circle-info help-txt"></i></button>
    {{-- Help Button --}}

    {{-- Help  Modal --}}
    <div class="modal fade" id="profileModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title md-title text-success" id="profileModalLabel">Profile Page Guide</h5>
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
      <div class="row row-cols-1 row-cols-lg-2">
        <!--Image Container-->
        <div
          class="col d-flex flex-column align-items-center justify-content-center img-section"
        >


        <!-- <img src="images/{{ \Session::get('valImage')}}" alt=""> 
        <img src="images/profiles/{{ \Session::get('userProfile')}}" alt="">-->

          <img
            src="images/profiles/{{Auth::user()->profile_img}}"
            class="rounded-circle object-fit-cover"
            style="width: 35rem; height: 35rem"
            alt=""
            id="profile-pic"
          />
          <p class="md-title">{{ Auth::user()->user_type == 2 ? "Farmer": "Consumer"}}</p>
          <label for="change-prof" class="md-title mt-5"
            >Change Profile Picture</label
          >
          <form action="{{ route('update_profile_image')}}" class="w-755" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
              <input
                type="file"
                class="form-control bg-transparent"
                id="change-prof"
                accept="image/png, image/jpeg"
                name="update_image"
              />
              <button
                type="submit"
                class="btn btn-success"
                id="save-img-btn"
                onclick="saveProfPic()"
              >
                Save
              </button>
            </div>
            <!--Image Container-->
          </form>
        </div>
        <!--Information Container-->
        <div class="col d-flex flex-column align-items-center">
          <form action="{{ route('update_info') }}" method="POST" class="fs-5 information-section p-4" id="info-form">
          @csrf
          <p class="title text-light">Personal Information</p>
          <button
                class="btn text-light fs-2 d-flex justify-content-end align-items-center"
                id="edit-info-btn"
                type="button"
                onclick='ror("name_inp"),ror("email_inp"),ror("address_inp"),ror("mobileNum_inp")'
              >
                <i class="fa-solid fa-pen-to-square"></i> Edit
              </button>
            <!--Full Name Information-->
            <div class="d-flex mb-3">
              <input
                type="text"
                class="form-control"
                id="name_inp"
                value="{{ Auth::user()->name }}"
                onchange="boom()"
                name="fname"
                disabled
              />
              <!-- <button
                class="edit-btn text-success"
                id="edit-info-btn"
                type="button"
                onclick='ror("name_inp")'
              >
                <i class="fa-solid fa-pen-to-square"></i>
              </button>-->
            </div>
            <!--Full Name Information-->

            <!--Email Information-->
            <div class="d-flex mb-3">
              <input
                type="text"
                class="form-control"
                id="email_inp"
                value="{{ Auth::user()->email }}"
                onchange="boom()"
                name="email"
                disabled
              />
              <!-- <button
                class="edit-btn text-success"
                id="edit-info-btn"
                type="button"
                onclick='ror("email_inp")'
              >
                <i class="fa-solid fa-pen-to-square"></i>
              </button>-->
            </div>
            <!--Email Information-->

            <!--Address Information-->
            <div class="d-flex mb-3">
              <input
                type="text"
                class="form-control"
                id="address_inp"
                value="{{ Auth::user()->address }}"
                onchange="boom()"
                name="address"
                disabled
              />
              <!-- <button 
                class="edit-btn text-success"
                id="edit-info-btn"
                type="button"
                onclick='ror("address_inp")'
              >
                <i class="fa-solid fa-pen-to-square"></i>
              </button>-->
            </div>
            <!--Address Information-->

            <!--Mobile Number Information-->
            <div class="d-flex mb-3">
              <input
                type="text"
                class="form-control"
                id="mobileNum_inp"
                value="{{ Auth::user()->phone }}"
                onchange="boom()"
                name="phone"
                disabled
              />
              <!-- <button 
                class="edit-btn text-success"
                id="edit-info-btn"
                type="button"
                onclick='ror("mobileNum_inp")'
              >
                <i class="fa-solid fa-pen-to-square"></i>
              </button>-->
            </div>
            <!--Mobile Number Information-->
            <button
              type="submit"
              class="btn btn-success fs-1"
              id="save-btn"
            >
              Save
            </button>
          </form>
        </div>
        <!--Information Container-->
      </div>
    </main>
    <script src="../js/index.js"></script>
@endsection