@extends('layouts.adminApp')

@section('admin')
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Pricing Guidelines</title>
    <!--Custom CSS Tag-->
    <link rel="stylesheet" href="../css/GuidelinesForm.css" />
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

    
    <main class="container-fluid d-flex justify-content-center min-vh-100 pt-5">
      <form action="{{ route('updatePrice')}}" method="get">  
        @if(!empty($crops))
          @foreach($crops as $crop)
            <div class="d-flex justify-content-between mb-5">
              <label for="Ampalaya" class="title mx-2 text-light">{{$crop->crop_name}}: </label>
              <input
                type="text"
                id="Ampalaya"
                class="form-control bg-transparent w-50 rounded-5 fs-1 text-light text-center"
                value="{{$crop->suggested_price}}"
                name="{{$crop->crop_id}}"
                required
              />
            </div>
          @endforeach
        @endif
        <!-- <div class="d-flex justify-content-between mb-5"> 
          <label for="Kalabasa" class="title mx-2 text-light">Kalabasa: </label>
          <input
            type="text"
            id="Kalabasa"
            class="form-control bg-transparent w-50 rounded-5 fs-1 text-light text-center"
            placeholder="20"
            required
          />
        </div>-->

        
        <div class="d-flex justify-content-center">
          <!-- <a href="" class="btn btn-success w-75 fs-1">Save</a> -->
        <button type="submit" class="btn btn-success w-75 fs-1">Save</button>
        </div>
      </form>
    </main>
    <!-- <script src="../js/auctionSearch.js"></script> -->
@endsection
