@extends('layouts.adminApp')

@section('admin')
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Auction Management</title>
    <link rel="stylesheet" href="../css/ManageAuctions.css" />
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
        <p class="title">Active Listings</p>
        <form class="d-flex gap-2">
          <input
            class="form-control mr-sm-2"
            type="search"
            placeholder="Search ID"
            aria-label="Search"
            id="myInput"
            onkeyup="myFunction2()"
          />
        </form>
      </div>

      <table class="table" id="myTable">
        <thead class="bg-success">
          <tr>
            <th scope="col" class="bg-success text-light">Auction Id</th>
            <th scope="col" class="bg-success text-light">Crop Type</th>
            <th scope="col" class="bg-success text-light">Date</th>
            <th scope="col" class="bg-success text-light">Owner</th>
            <th scope="col" class="bg-success text-light">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($auctions as $auction)
            <tr>
              <td><a href="{{ url('send-bid')}}?auction_id={{$auction->auction_id}}" class="btn btn-outline-success fs-lg-4 sm-title">View Listing ID:{{ $auction->auction_id}} </a></td>
              <td>{{ $auction->user_id}}</td> <!--Crop Type dapat to-->
              <td>{{ $auction->created_at}}</td>
              <td>{{ $auction->user_id}}</td>
              <td>
                <!-- <button class="btn btn-outline-danger">Remove Auction</button> -->
                {{-- <a href="{{url('rmAuction')}}?auction_id={{ $auction->auction_id}}" class="btn btn-outline-danger">Remove Auction</a> --}}
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#{{ $auction->auction_id}}Backdrop">
                  Remove Auction
                </button>
                <!-- Modal -->
                  <div class="modal fade" id="{{ $auction->auction_id}}Backdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Remove Auction ID: {{ $auction->auction_id}}</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Are you sure you want to remove <a href="{{ url('send-bid')}}?auction_id={{$auction->auction_id}}" target="_blank" class="btn btn-outline-success sm-title">Auction Listing ID:{{ $auction->auction_id}}</a> 
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary fs-2" data-bs-dismiss="modal">Close</button>
                          <a class="btn btn-outline-danger fs-2"href="{{url('rmAuction')}}?auction_id={{ $auction->auction_id}}">Remove Auction</a>
                        </div>
                      </div>
                    </div>
                  </div>
              </td>
            </tr>
          @endforeach

          <!-- <tr>
            <td>123156422312</td>
            <td>Sitaw</td>
            <td>January 23-24 7am</td>
            <td>Denmark</td>
            <td>
              <button class="btn btn-outline-danger">Remove Auction</button>
            </td>
          </tr> -->
        </tbody>
      </table>
    </main>
    <script src="../js/auctionSearch.js"></script>
@endsection
