@extends('layouts.adminApp')

@section('admin')
    <title>User Activation</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Activation</title>
    <link rel="stylesheet" href="../css/ManageUsers.css" />
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

    <main class="container-fluid overflow-x-scroll">
      <!--Header-->
      <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
          <a href="{{ url('manageUsers') }}" class="fs-1 nav-link">Users</a>
          <p>|</p>
          <a
            class="fs-1 fw-bold nav-link active text-decoration-underline text-success"
            href="{{ url('activateUsers') }}"
            >Activate Users</a
          >
        </div>
        <form class="d-flex gap-2">
          <input
            class="form-control mr-sm-2"
            type="search"
            placeholder="Search Name"
            aria-label="Search"
            id="myInput"
            onkeyup="myFunction()"
          />
        </form>
      </div>

      <table class="table" id="myTable">
        <thead class="bg-success">
          <tr>
            <th scope="col" class="bg-success text-light">Photo</th>
            <th scope="col" class="bg-success text-light">Name</th>
            <th scope="col" class="bg-success text-light">Contact Number</th>
            <th scope="col" class="bg-success text-light">Email</th>
            <th scope="col" class="bg-success text-light text-center">
              Action
            </th>
          </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
          <tr>
            <td><img src="images/profiles/{{ $user->profile_img}}" class="rounded-circle object-fit-cover" id="userImg" /></td>
            <td class="fw-bold">{{ $user->name}}</td>
            <td>{{ $user->phone}}</td>
            <td>{{ $user->email}}</td>
            <td>
              <div class="d-flex flex-column gap-2">

                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#{{ $user->id }}activateUserBackdrop">
                  Reject User
                </button>
                <div class="modal fade" id="{{ $user->id }}activateUserBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Reject User: {{ $user->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Are you sure you want to reject {{ $user->name}}?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary fs-2" data-bs-dismiss="modal">Close</button>
                        <a class="btn btn-outline-danger fs-2" href="{{ url('rejectUser')}}?id={{ $user->id}}">Reject User</a>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- <a href="{{ url('rejectUser')}}?id={{ $user->id}}" class="btn btn-outline-danger btn-lg">
                  Reject User
                </a> --}}
                <!-- Button trigger modal -->
                <button
                  type="button"
                  class="btn btn-success"
                  data-bs-toggle="modal"
                  data-bs-target="#{{ $user->id}}"
                >
                  Activate User
                </button>
              </div>

              <!-- Modal -->
              <div
                class="modal fade"
                id="{{ $user->id}}"
                tabindex="-1"
                aria-labelledby="{{ $user->id}}Label"
                aria-hidden="true"
              >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-2" id="{{ $user->id}}Label">
                        Account Details
                      </h1>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <p class="sm-title">
                        Name: <span class="text-success">{{ $user->name}}</span>
                      </p>
                      <p class="sm-title">
                        Contact Number:
                        <span class="text-success">{{ $user->phone}}</span>
                      </p>
                      <p class="sm-title">
                        Email:
                        <span class="text-success">{{ $user->email}}</span>
                      </p>
                      <a
                        target="_blank"
                        href="images/{{ $user->val_img}}"
                        class="btn btn-success fs-3"
                      >
                        View Credentials
                      </a>
                    </div>
                    <div class="modal-footer">
                      <button
                        type="button"
                        class="btn btn-secondary fs-2"
                        data-bs-dismiss="modal"
                      >
                        Close
                      </button>
                      <a href="{{ url('activate')}}?id={{ $user->id}}" class="btn btn-success fs-2">
                        Activate User
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        @endforeach
        
        </tbody>
      </table>
    </main>
    <script src="../js/tableSearch.js"></script>
@endsection