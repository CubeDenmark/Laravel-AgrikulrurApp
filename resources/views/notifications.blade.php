@extends('layouts.app')

@section('content')
  <title>Notifications</title>
    <link rel="stylesheet" href="../css/Notifications.css" />
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
    @vite('resources/js/app.js')

<main class="container">
      <p class="title text-center">Notifications</p>

      <table class="table table-striped table-bordered table-hover">
        <thead></thead>
        <tbody>
        @if(!empty($notif))
          @foreach($notif as $notify)
            <tr>
                <td>
                    @if(Auth::user()->type == 0 )
                    <a
                      href="{{ url('send-bid')}}?auction_id={{$notify->auction_id}}"
                      class="notif-link d-flex align-items-center gap-5 text-decoration-none p-4"
                    >
                    @elseif(Auth::user()->type == 1)
                    <a
                      href="{{ url('congratulation')}}?auction_id={{$notify->auction_id}}"
                      class="notif-link d-flex align-items-center gap-5 text-decoration-none p-4"
                    >
                    @endif
                    <img
                      src="../assets/winner.svg"
                      width="150px"
                      height="150px"
                      id="notif-img"
                      class="rounded-circle bg-white object-fit-cover"
                    />
                    <div>
                      <p class="md-title text-success">
                        @if(Auth::user()->type == 0 )
                            Your auction listing has ended
                        @elseif(Auth::user()->user_type == 3)
                            Congratulations! You won an auction!
                        @endif
                      </p>
                      <p class="sm-title text-secondary">
                        Auction ID: {{$notify->auction_id}}
                      </p>
                    </div>
                  </a>
                </td>
              </tr>
            @endforeach
        @endif

          @if(Auth::user()->type == 0)

          @if(!empty($farmer_conpay))
            @foreach($farmer_conpay as $fConpay)
              <tr>
                <td>
                    <a
                      href="{{ url('confirm_payment')}}?auction_id={{$fConpay->auction_id}}"
                      class="notif-link d-flex align-items-center gap-5 text-decoration-none p-4"
                    >
                    <img
                      src="../assets/transferMoney.png"
                      width="150px"
                      height="150px"
                      id="notif-img"
                      class="rounded-circle bg-white object-fit-cover"
                    />
                    <div>
                      <p class="md-title text-success">
                        Winning bidder just paid for your item,
                        Confirm Payment Now!
                      </p>
                      <p class="sm-title text-secondary">
                        Auction ID: {{$fConpay->auction_id}}
                      </p>
                    </div>
                  </a>
                </td>
              </tr>
            @endforeach
          @endif

          @elseif(Auth::user()->type == 1)

          
            @foreach($consumer_conpay as $cConpay)
              <tr>
                <td>
                    <a
                      href="{{ url('finished')}}?auction_id={{$cConpay->auction_id}}"
                      class="notif-link d-flex align-items-center gap-5 text-decoration-none p-4"
                    >
                    <img
                      src="../assets/present.svg"
                      width="150px"
                      height="150px"
                      id="notif-img"
                      class="rounded-circle bg-white object-fit-cover"
                    />
                    <div>
                      <p class="md-title text-success">
                        Farmer just confirmed your payment! Claim your Item Now!
                      </p>
                      <p class="sm-title text-secondary">
                        Auction ID: {{$cConpay->auction_id}}
                      </p>
                    </div>
                  </a>
                </td>
              </tr>
            @endforeach
          

        @endif
          
        </tbody>
      </table>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="module">//type="module" is important! do not remove it.
    // Add your WebSocket event listener here
    window.Echo.channel('notification{{Auth::user()->id}}').listen('.notifier.message', (data) => {
        // Update UI with received message
        let auction = data.auction;
        let crop = data.crop;
        let creator = data.creator;
        let user_type = data.user_type;
        let bidder_id = data.bidder;

        let row = document.createElement("tr");

       
        let name = document.createElement("td");
        
        name.innerHTML = `
              <tr>
                <td>
                    <a
                      href="{{ url('congratulation')}}?auction_id=${auction}"
                      class="notif-link d-flex align-items-center gap-5 text-decoration-none p-4"
                    >              
                    <img
                      src="../assets/winner.svg"
                      width="150px"
                      height="150px"
                      class="rounded-circle bg-white object-fit-cover"
                    />
                    <div>
                      <p class="md-title text-success">
                            Your auction listing has ended
                      </p>
                      <p class="sm-title text-secondary">
                        Auction ID: ${auction}
                      </p>
                    </div>
                  </a>
                </td>
              </tr>
                            
        `;
           
        row.appendChild(name);

        $("tbody").prepend(row);
    });
</script>
</main>
@endsection

<!-- <script type="module">//type="module" is important! do not remove it. 
    // Add your WebSocket event listener here
    window.Echo.channel('notification{{ Auth::user()->id }}').listen('.notifier.message', (data) => {
        // Update UI with received message
        let auction = data.auction;
        let crop = data.crop;
        let creator = data.creator;
        let bidder_id = data.bidder;

        let row = document.createElement("tr");

       
        let name = document.createElement("td");
        name.innerHTML = `
              <tr>
                <td>
                    <a
                    href="{{ url('send-bid')}}?auction_id=" ${bidder_id}
                      class="notif-link d-flex align-items-center gap-5 text-decoration-none p-4"
                    >              
                    <img
                      src="../assets/winner.svg"
                      width="150px"
                      height="150px"
                      class="rounded-circle bg-white object-fit-cover"
                    />
                    <div>
                      <p class="md-title text-success">
                            Your auction listing has ended
                      </p>
                      <p class="sm-title text-secondary">
                        Auction ID: ${auction}
                      </p>
                    </div>
                  </a>
                </td>
              </tr>
                            
        `;
           
        row.appendChild(name);

        $("tbody").prepend(row);
    });
</script>


// for both


<script type="module">//type="module" is important! do not remove it.
    // Add your WebSocket event listener here
    window.Echo.channel('end_auction').listen('.end_auction.message', (data) => {
        // Update UI with received message
        let auction = data.auction;
        let crop = data.crop;
        let creator = data.creator;
        let user_type = data.user_type;
        let bidder_id = data.bidder;

        let row = document.createElement("tr");

       
        let name = document.createElement("td");
        
        name.innerHTML = `
              <tr>
                <td>
                    <a
                    href="{{ url('send-bid')}}?auction_id=${auction}"
                      class="notif-link d-flex align-items-center gap-5 text-decoration-none p-4"
                    >              
                    <img
                      src="../assets/winner.svg"
                      width="150px"
                      height="150px"
                      class="rounded-circle bg-white object-fit-cover"
                    />
                    <div>
                      <p class="md-title text-success">
                            Your auction listing has ended
                      </p>
                      <p class="sm-title text-secondary">
                        Auction ID: ${auction}
                      </p>
                    </div>
                  </a>
                </td>
              </tr>
                            
        `;
           
        row.appendChild(name);

        $("tbody").prepend(row);
    });
</script>
















-->
