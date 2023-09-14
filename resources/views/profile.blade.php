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
      <div class="row row-cols-1 row-cols-lg-2">
        <!--Image Container-->
        <div
          class="col d-flex flex-column align-items-center justify-content-center img-section"
        >
          <img
            src="../assets/avatar1.svg"
            class="rounded-circle object-fit-fill"
            style="width: 35rem; height: 35rem"
            alt=""
            id="profile-pic"
          />
          <label for="change-prof" class="md-title mt-5"
            >Change Profile Picture</label
          >
          <form action="" class="w-755">
            <div class="input-group">
              <input
                type="file"
                class="form-control bg-transparent"
                id="change-prof"
                accept="image/png, image/jpeg"
              />
              <button
                type="submit"
                class="btn btn-success"
                id="save-img-btn"
                disabled
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
          <form action="" class="fs-5 information-section p-4" id="info-form">
            <p class="title text-light">Personal Information</p>
            <!--Name Information-->
            <div class="d-flex mb-3">
              <input
                type="text"
                class="form-control"
                id="name_inp"
                placeholder="Teddy Pascual"
                onchange="boom()"
                disabled
              />
              <button
                class="edit-btn text-success"
                id="edit-info-btn"
                type="button"
                onclick='ror("name_inp")'
              >
                <i class="fa-solid fa-pen-to-square"></i>
              </button>
            </div>
            <!--Name Information-->

            <!--Email Information-->
            <div class="d-flex mb-3">
              <input
                type="text"
                class="form-control"
                id="email_inp"
                placeholder="kledted23@gmail.com"
                onchange="boom()"
                disabled
              />
              <button
                class="edit-btn text-success"
                id="edit-info-btn"
                type="button"
                onclick='ror("email_inp")'
              >
                <i class="fa-solid fa-pen-to-square"></i>
              </button>
            </div>
            <!--Email Information-->

            <!--Address Information-->
            <div class="d-flex mb-3">
              <input
                type="text"
                class="form-control"
                id="address_inp"
                placeholder="Capas,Tarlac"
                onchange="boom()"
                disabled
              />
              <button
                class="edit-btn text-success"
                id="edit-info-btn"
                type="button"
                onclick='ror("address_inp")'
              >
                <i class="fa-solid fa-pen-to-square"></i>
              </button>
            </div>
            <!--Address Information-->

            <!--Mobile Number Information-->
            <div class="d-flex mb-3">
              <input
                type="text"
                class="form-control"
                id="mobileNum_inp"
                placeholder="09982409945"
                onchange="boom()"
                disabled
              />
              <button
                class="edit-btn text-success"
                id="edit-info-btn"
                type="button"
                onclick='ror("mobileNum_inp")'
              >
                <i class="fa-solid fa-pen-to-square"></i>
              </button>
            </div>
            <!--Mobile Number Information-->
            <button
              type="submit"
              class="btn btn-success fs-1"
              id="save-btn"
              disabled
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