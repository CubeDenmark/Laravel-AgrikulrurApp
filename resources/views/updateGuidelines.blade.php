@extends('layouts.adminApp')

@section('admin')
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Produce Pricing Guidelines</title>
    <!--Custom CSS Tag-->
    <link rel="stylesheet" href="../css/Guidelines.css" />
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

    <main class="container-fluid">
      <div class="d-flex justify-content-between align-items-center m-2">
        <p class="md-title">Last Updated: January 2, 2023</p>
        <a href="{{url('updatePriceForm')}}" class="btn btn-success upd-btn">Update</a>
      </div>
      <table class="table text-center text-md-start" id="myTable">
        <thead class="bg-success">
          <tr>
            <th scope="col" class="bg-success text-light">Photo</th>
            <th scope="col" class="bg-success text-light">Produce</th>
            <th scope="col" class="bg-success text-light">
              Market Price per Kg
            </th>
          </tr>
        </thead>
        <tbody>
          @if(!empty($crops))
            @foreach($crops as $crop)
              <tr>
                <td><img src="images/crops/{{$crop->crop_image}}" /></td>
                <td class="md-title">{{$crop->crop_name}}</td>
                <td class="md-title text-success">₱{{$crop->suggested_price}}</td>
              </tr>
            @endforeach
          @endif
          <!--  
          <tr>
            <td><img src="../assets/Kalabasa.jpg" /></td>
            <td class="md-title">Kalabasa</td>
            <td class="md-title text-success">₱40</td>
          </tr>
          <tr>
            <td><img src="../assets/Tomato.png" /></td>
            <td class="md-title">Kamatis</td>
            <td class="md-title text-success">₱50</td>
          </tr>
          <tr>
            <td><img src="../assets/Okra.jpeg" /></td>
            <td class="md-title">Okra</td>
            <td class="md-title text-success">₱10</td>
          </tr>
          <tr>
            <td><img src="../assets/sigarilyas.jpg" /></td>
            <td class="md-title">Sigarilyas</td>
            <td class="md-title text-success">₱10</td>
          </tr>
          <tr>
            <td><img src="../assets/sitaw.jpg" /></td>
            <td class="md-title">Sitaw</td>
            <td class="md-title text-success">₱10</td>
          </tr>
          -->
        </tbody>
      </table>
    </main>
@endsection