@extends('layouts.adminApp')

@section('admin')
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Management</title>
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
          <a
            href="{{url('manageUsers')}}"
            class="fs-1 fw-bold nav-link active text-decoration-underline text-success"
            >Users</a
          >
          <p>|</p>
          <a class="fs-1 nav-link" href="{{url('activateUsers')}}">Activate Users</a>
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
            <th scope="col" class="bg-success text-light d-none d-sm-block">Photo</th>
            <th scope="col" class="bg-success text-light">Name</th>
            <th scope="col" class="bg-success text-light">Contact Number</th>
            <th scope="col" class="bg-success text-light">Email</th>
            <th scope="col" class="bg-success text-light">Action</th>
          </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
          <tr>
            <td class="d-none d-sm-block">
              <img src="images/profiles/{{ $user->profile_img}}" class="rounded-circle object-fit-cover" id="userImg" />
              <small>ID : {{ $user->id }}</small>
            </td>
            <td class="fw-bold">
              <div class="d-flex flex-column d-sm-none">
                <img src="images/profiles/{{ $user->profile_img}}" class="rounded-circle object-fit-cover" id="userImg" />
                <small>ID : {{ $user->id }}</small>
              </div>
              {{ $user->name}}
            </td>
            <td>{{ $user->phone}}</td>
            <td>{{ $user->email }}</td>
            <td>
              <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#{{ $user->id }}userBackdrop">
                Ban User
              </button>
            {{-- <a href="{{url('banUser')}}?id={{ $user->id}}" class="btn btn-outline-danger sm-title">Ban user</a> --}}
            <div class="modal fade" id="{{ $user->id }}userBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ban User ID: {{ $user->id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Are you sure you want to Ban {{ $user->name}} ID:{{ $user->id}}?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary fs-2" data-bs-dismiss="modal">Close</button>
                    <a class="btn btn-outline-danger fs-2" href="{{url('banUser')}}?id={{ $user->id}}">Ban User</a>
                  </div>
                </div>
                
              </div>
            </div>
            </td>
          </tr>
        @endforeach
          <!-- <tr>
            <td>
              <img src="../assets/avatar1.svg" /> 
              <small>ID : 2</small>
            </td>
            <td class="fw-bold">Denmark</td>
            <td>123123</td>
            <td>becu@gmail.com</td>
            <td><button class="btn btn-outline-danger">Ban User</button></td>
          </tr> -->


        </tbody>
      </table>
    </main>
    <script src="../js/tableSearch.js"></script>
@endsection
