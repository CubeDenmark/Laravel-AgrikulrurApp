@extends('layouts.app')

@section('content')
    <title>Congrats Farmer</title>
    <link rel="stylesheet" href="../ccs/Notifications.css" />
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

    <main class="container bg-light">
      <!--START OF NOTIF-->
      <div class="winning-template">
        <div
          class="d-flex flex-column justify-content-center align-items-center"
        >
          <img src="../assets/celebrate.svg" alt="" class="img-fluid" />
          <p class="md-title">Congratulations!</p>
        </div>
        <p class="desc">You have completed a transaction with a consumer!</p>
        <p class="desc">
          You can also call the consumer for more information and details.
        </p>
        
        <p class="desc">Name: <span id="farmer">@foreach($users as $user){{ $user->name}}@endforeach</span></p>
        <p class="desc">
          <a class="phone-number text-black" href="tel:@foreach($users as $user){{ $user->phone}}@endforeach">
            <i class="fa-sharp fa-solid fa-phone fa-lg"></i>@foreach($users as $user){{ $user->phone}}@endforeach
          </a>
        </p>
        
      </div>
    </main>
@endsection
