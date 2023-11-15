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
   <!-- Translate Button -->
   <button id="translate-btn" class="btn btn-success rounded-circle position-absolute fs-1 m-2 opacity-50" data-bs-toggle="modal" data-bs-target="#translateModal"><i class="fa-solid fa-language" ></i></button>
<div class="modal fade" id="translateModal" tabindex="-1" aria-labelledby="translateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Translate Page?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div id="google_translate_element"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary fs-2" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      <!-- Translate Button -->
  {{-- Help Button --}}
  <button class="btn btn-success help-btn" data-bs-toggle="modal" data-bs-target="#notificationsModal"><i class="fa-solid fa-circle-info help-txt"></i></button>
  {{-- Help Button --}}

  {{-- Help  Modal --}}
  <div class="modal fade" id="notificationsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title md-title text-success" id="notificationsModalLabel">Notifications Guide</h5>
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
      <p class="title text-center">Notifications</p>

      <table class="table table-striped table-bordered table-hover">
        <thead></thead>
        <tbody>
          @forelse (Auth::user()->notifications as $notification)
            @if($notification->data['phase'] == 1)
                <tr>
                
                     
                      
                      <td>
                        @if(Auth::user()->id == $notification->data['creator_id'] )
                            
                          <a
                            href="{{ url('send-bid')}}?auction_id={{ $notification->data['auction_id'] }}"
                            class="notif-link d-flex align-items-center gap-5 text-decoration-none p-4"
                          >
                        @elseif(Auth::user()->id == $notification->data['bidder_id'])
                            @if($notification->data['auction_id'])
                                @if(session('finishedTrans'.$notification->data['auction_id']))
                                  <div class="alert alert-danger alert-dismissible fade show float-end addAlert" role="alert">
                                    <p class="md-title text-start"><i class="fa-regular fa-circle-check"></i> {{ session('finishedTrans'.$notification->data['auction_id']) }}</p>
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div> 
                                @endif
                            @endif
                            @if(session('unAuthorized'))
                              <div class="alert alert-danger alert-dismissible fade show float-end addAlert" role="alert">
                                <p class="md-title text-start"><i class="fa-regular fa-circle-check"></i> {{ session('unAuthorized') }}</p>
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div> 
                            @endif
                          <a 
                            href="{{ route('congratulation', ['auction_id' => $notification->data['auction_id']]) }}" 
                            class="notif-link d-flex align-items-center gap-5 text-decoration-none p-4"
                            >
                        @else
                          <a
                            href="{{ url('send-bid')}}?auction_id={{ $notification->data['auction_id'] }}"
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
                          
                            @if(Auth::user()->id == $notification->data['creator_id'] )
                              <p class="md-title text-success">
                                Your auction listing has ended
                              </p>
                            @elseif(Auth::user()->id == $notification->data['bidder_id'])
                              <p class="md-title text-success">
                                Congratulations! You won an auction!
                              </p>
                            @else
                              <p class="md-title text-danger">
                                Thank you for participating on the Auction!
                              </p>
                            @endif
                          
                            <p class="sm-title text-secondary">
                              Auction ID:{{ $notification->data['auction_id'] }}
                            </p>
                          </div>
                        </a>
                      </td>
                    </tr>
            @elseif($notification->data['phase'] == 2)
                    <tr>
                        <td>
                        @if($notification->data['auction_id'])
                                @if(session('finishedTrans'.$notification->data['auction_id']))
                                  <div class="alert alert-danger alert-dismissible fade show float-end addAlert" role="alert">
                                    <p class="md-title text-start"><i class="fa-regular fa-circle-check"></i> {{ session('finishedTrans'.$notification->data['auction_id']) }}</p>
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div> 
                                @endif
                            @endif
                            @if(session('unAuthorized'.$notification->data['auction_id']))
                              <div class="alert alert-danger alert-dismissible fade show float-end addAlert" role="alert">
                                <p class="md-title text-start"><i class="fa-regular fa-circle-check"></i> {{ session('unAuthorized'.$notification->data['auction_id']) }}</p>
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div> 
                            @endif
                            <a
                              href="{{ url('confirm_payment')}}?auction_id={{ $notification->data['auction_id'] }}"
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
                                Auction ID: {{ $notification->data['auction_id'] }}
                              </p>
                            </div>
                          </a>
                        </td>
                      </tr>
            @elseif($notification->data['phase'] == 3)
                    <tr>
                      <td>
                          <a
                            href="{{ url('finished')}}?auction_id={{ $notification->data['auction_id'] }}"
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
                              Auction ID: {{ $notification->data['auction_id'] }}
                            </p>
                          </div>
                        </a>
                      </td>
                    </tr>
            @endif


          <!-- 
          <tr>
              <td>
                <h3>Auction Id: {{ $notification->data['auction_id'] }}</h3>
                <h3>Crop Id: </h3>
                <h3>Farmer : {{ $notification->data['creator_id'] }}</h3>
                <h3>Winner : {{ $notification->data['bidder_id'] }}</h3>
              </td>
            </tr>
             -->
             @if(!$notification->read_at)
                {{ $notification->markAsRead() }}
              @endif
          @empty
            <tr>
              <td>
                <p class="md-title text-secondary">No notification found</p>
              </td>
            </tr>
          @endforelse
        <!-- @if(!empty($notif)) 
          @foreach($notif as $notify)
            <tr>
                <td>
                    @if(Auth::user()->type == "farmer" )
                    <a
                      href="{{ url('send-bid')}}?auction_id={{$notify->auction_id}}"
                      class="notif-link d-flex align-items-center gap-5 text-decoration-none p-4"
                    >
                    @elseif(Auth::user()->type == "bidder")
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
                        @if(Auth::user()->type == "farmer" )
                            Your auction listing has ended
                        @elseif(Auth::user()->type == "bidder")
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

          @if(Auth::user()->type == "farmer")

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

          @elseif(Auth::user()->type == "bidder")

          
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
          

        @endif-->
          
        </tbody>
      </table>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="module">//type="module" is important! do not remove it.

window.Echo.private(`App.Models.User.{{Auth::user()->id}}`)
    .notification((notification) => {
        console.log('Notification received:', notification.data['auction_id']);
        // Handle the notification data as needed

        // Update UI with received message
        let auction = notification.data['auction_id'];
        //let crop = notification.crop;
        let creator = notification.data['creator_id'];
        //let user_type = notification.user_type;
        let bidder_id = notification.data['bidder_id'];

        let phase = notification.data['phase'];

        let row = document.createElement("tr");

        
          let name = document.createElement("td");
        
          name.innerHTML = `
                <tr>
                  <td>
                  @if(!empty($notification->data))
                  @if(Auth::user()->id == $notification->data['creator_id'] )
                            
                            <a
                              href="{{ url('send-bid')}}?auction_id=${auction}"
                              class="notif-link d-flex align-items-center gap-5 text-decoration-none p-4"
                            >
                          @elseif(Auth::user()->id == $notification->data['bidder_id'])
                              @if($notification->data['auction_id'])
                                  @if(session('finishedTrans'.$notification->data['auction_id']))
                                    <div class="alert alert-danger alert-dismissible fade show float-end addAlert" role="alert">
                                      <p class="md-title text-start"><i class="fa-regular fa-circle-check"></i> {{ session('finishedTrans'.$notification->data['auction_id']) }}</p>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div> 
                                  @endif
                              @endif
                              @if(session('unAuthorized'))
                                <div class="alert alert-danger alert-dismissible fade show float-end addAlert" role="alert">
                                  <p class="md-title text-start"><i class="fa-regular fa-circle-check"></i> {{ session('unAuthorized') }}</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div> 
                              @endif
                            <a 
                              href="{{ url('congratulation')}}?auction_id=${auction}"
                              class="notif-link d-flex align-items-center gap-5 text-decoration-none p-4"
                              >
                          @else
                            <a
                              href="{{ url('send-bid')}}?auction_id=${auction}"
                              class="notif-link d-flex align-items-center gap-5 text-decoration-none p-4"
                            >
                          @endif
                     
                      <img
                        src="../assets/winner.svg"
                        width="150px"
                        height="150px"
                        class="rounded-circle bg-white object-fit-cover"
                      />
                      <div>
                        <p class="md-title text-success">
                              @if(Auth::user()->id == $notification->data['creator_id'] )
                                <p class="md-title text-success">
                                  Your auction listing has ended
                                </p>
                              @elseif(Auth::user()->id == $notification->data['bidder_id'])
                                <p class="md-title text-success">
                                  Congratulations! You won an auction!
                                </p>
                              @else
                                <p class="md-title text-danger">
                                  Thank you for participating on the Auction!
                                </p>
                              @endif
                        </p>
                        <p class="sm-title text-secondary">
                          Auction ID: ${auction}
                        </p>
                      </div>
                    </a>
                  </td>
                </tr>
                
                @endif`;
           
        row.appendChild(name);

        $("tbody").prepend(row);
        

       
       
    });
        


/*
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
    });*/

</script>
<script>
    // Disable the back button
    history.pushState(null, null, document.URL);
    window.addEventListener('popstate', function () {
        history.pushState(null, null, document.URL);
    });
    </script>
</main>
    <!-- Google Translate Script -->
    <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!-- Google Translate Script -->
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
