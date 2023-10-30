@extends('layouts.app')

@section('content')

  <title>Bidding Page</title>
    <link rel="stylesheet" href="../css/Bidding.css" />
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
    <!--Font Links-->
   
    <main class="container-fluid">
      <div class="row main-row">
        <!-- Mobile Container -->
        <div class="col main-cont d-lg-none">
          <div
            class="row bg-light border-bottom border-black h-50 d-flex flex-lg-column justify-content-center align-items-center p-4"
          >
            <img src="../assets/Sitaw.jpeg" alt="" class="mb-2" id="bid-image" />
          </div>
          <div class="row bg-light row-cols-2 p-2">
            <div class="col d-flex flex-column gap-3 border-end border-black">
              <p class="mt-2">Creator</p>
                @foreach($creator as $farmer)
                    <div class="d-flex align-items-center">
                      <img
                        src="/images/profiles/{{ $farmer->profile_img }}"
                        alt=""
                        class="rounded-circle m-2 object-fit-cover"
                        width="50px"
                        height="50px"
                      />
             

                    <p class="fs-5 fw-bold">{{ $farmer->name }}</p> 
                    </div>
                  @endforeach
              <p class="mt-3">Base Bid Price: 

               @foreach($auctions as $auction)
                    <span id="bp2">{{ $auction->starting_price }}</span>
               @endforeach
              
              </p>
            </div>
            <div class="col border-black">
              <p class="mt-2">Ending In</p>
              <div class="d-flex align-items-center">
                @foreach($auctions as $auction)
                  <p class="fs-1 fw-bold mt-3">{{ $auction->end_time }}</p>
                @endforeach
              </div>
              <p class="mt-3">
                Latest Bid Price:              
                  @if(!empty($highestbid))
                    <span class="fw-bold" id="lbp3">{{ $highestbid->bid_amount }}</span>
                  @endif
              </p>
            </div>
          </div>
          <div
            class="col cta-col bg-light pb-4 border-top border-2 border-black"
          >
            <p class="title text-start">Top Bidders</p>
            <div class="row bids-row bg-light-subtle mb-4">
              <div class="bids-table mt-2">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col"></th>
                      <th scope="col">Name</th>
                      <th scope="col">Bid Amount</th>
                      <th scope="col">Date</th>
                    </tr>
                  </thead>
                  <tbody id="tbody1">
                  
                  @if(!empty($bids))            
                    @foreach($bids as $bid) 
                    <tr>
                        <td class="text-center">
                          <img
                            src="/images/profiles/{{ $bid->profile_img }}"
                            alt=""
                            class="rounded-circle object-fit-cover"
                            id="table-img"
                          />
                        </td>
                        <td>{{ $bid->name }}</td>
                        <td>₱ {{ $bid->bid_amount }}</td>
                        <td>{{ $bid->created_at }}</td>
                    </tr>
                    @endforeach
                  @endif

                  </tbody>
                </table>
              </div>
            </div>
            <div
              class="row cta-row d-flex justify-content-center mb-2 mt-2 mt-lg-5"
            >
            <div id="validation-errors1"  role="alert">
                      
            </div> 


            @if($auction->status == 'closed')
              <div class="alert alert-success w-100 h-100 text-center fs-3">This auction is completed!</div>
            @esleif(Auth::user()->user_type == 1)
            <div class="alert alert-success w-100 h-100 text-center fs-3">Have a great day Admin!</div>
            @elseif(Auth::user()->id == $farmer->id)
              <div
              class="border border-black w-75 d-flex justify-content-center align-items-center p-2 gap-2"
            >
              <button
                class="btn btn-success h-100"
                data-bs-toggle="modal"
                data-bs-target="#updateMobileModal"
              >
                <p class="fs-1 text-light p-2">
                  <i class="fa-solid fa-pen-to-square"></i> Update Base Bid
                  Price
                </p>
              </button>
              <div
                class="modal fade"
                id="updateMobileModal"
                tabindex="-1"
                aria-labelledby="updateMobileModalLabel"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-2" id="exampleModalLabel">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Update Base Bid Price
                      </h1>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <form action="" id="updForm">
                        <input
                          type="email"
                          class="form-control mb-3 h-full fs-3"
                          id="email-inp"
                          value="20"
                          autocomplete="off"
                        />
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button
                        type="button"
                        class="btn btn-secondary fs-3"
                        data-bs-dismiss="modal"
                      >
                        Close
                      </button>
                      <button
                        type="button"
                        class="btn btn-success fs-3"
                        id="updateBbpBtn"
                      >
                        Save changes
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <button
                class="btn btn-success p-3 h-100"
                data-bs-toggle="modal"
                data-bs-target="#closeMobileBiddingModal"
              >
                <p class="fs-1 text-light">
                  <i class="fa-solid fa-square-xmark"></i> Close Bidding
                </p>
              </button>
              <div
                class="modal fade"
                id="closeMobileBiddingModal"
                tabindex="-1"
                aria-labelledby="closeMobileBiddingModalLabel"
                aria-hidden="true"
              >
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-2" id="exampleModalLabel">
                        <i class="fa-solid fa-square-xmark"></i>
                        Close Bidding
                      </h1>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <p class="title">
                        Are you sure you want to manually close the bidding?
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button
                        type="button"
                        class="btn btn-secondary fs-3"
                        data-bs-dismiss="modal"
                      >
                        Exit
                      </button>
                      <button
                        type="button"
                        class="btn btn-success fs-3"
                        data-bs-dismiss="modal"
                      >
                        Close the Bidding
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @else
              <div
                class="border border-black w-75 d-flex justify-content-center align-items-center p-2 gap-2" id="bid-div"
              >
              
                <input
                  type="number"
                  class="form-control border-0 bg-transparent text-center"
                  id="inputPrice"
                  placeholder="Enter Your Bid"
                  
                /><!-- onkeyup="al()" -->
                <button
                  class="btn btn-success"
                  id="bid-btn"
                  
                ><!-- onclick="lezgo()" -->
                  Bid
                </button>
              </div>

            @endif

             
            </div>
            <p class="fs-5 fw-light text-center text-secondary">
            Auction Id:
                  @foreach($auctions as $auction)
                  {{ $auction->auction_id }}
                  @endforeach
            </p>
          </div>
        </div>
        <!-- Mobile Container -->

        <!-- Web  Container -->
        <div class="col d-none d-lg-block p-5">
          <div class="row row-cols-2">
            <div class="col">
              <div
                class="d-flex justify-content-center align-items-center gap-5"
              >
              @foreach($creator as $farmer)
                <div class="d-flex align-items-center">
                  <img
                    src="/images/profiles/{{ $farmer->profile_img }}"
                    alt=""
                    class="rounded-circle m-2 object-fit-cover"
                    width="50px"
                    height="50px"
                  />

                  
                    <p class="desc fw-bold">{{ $farmer->name }}</p>
                    <!-- <p class="fs-5 fw-bold"></p> -->
                  
                  <!-- <p class="desc fw-bold">Darren Ventura</p> -->
                </div>
                @endforeach
                <h1>|</h1>
                <h1>
                  Auction Id:
                  @foreach($auctions as $auction)
                  {{ $auction->auction_id }}
                  @endforeach
                </h1>
              </div>
              <div class="web-img-cont bg-danger-subtle overflow-hidden mb-2">
                <img
                  src="../assets/Sigarilyas.jpeg"
                  alt=""
                  id="web-img"
                  class="w-100 h-100 object-fit-cover"
                />
              </div>
              <div
                class="d-flex justify-content-center align-items-center gap-5"
              >
                <p class="desc">Base Bid Price:
                  @foreach($auctions as $auction)
                    <span id="bp2">{{ $auction->starting_price }}</span>
                  @endforeach
                </p>

                <p class="desc">|</p>

                <p class="desc">Latest Bid Price: 
                  @if(!empty($highestbid))
                      <span id="lbp2">{{ $highestbid->bid_amount }}</span>     
                  @endif
                </p>

              </div>
            </div>
            <div class="col border border-2 border-tertiary-subtle pb-2">
              <p class="title text-center">{{ $crop->crop_name}}</p>

                    
              @if(Session::has('success'))
                <p class="title text-success"><span id="lbp3">{{ $highestbid->bid_amount }}</span></p>
              @endif
              @if(Session::has('failed'))
                <p class="title text-success"><span id="lbp3">{{Session::get('failed')}}</span></p>
              @endif
              

              @foreach($auctions as $auction)
                  <!-- <p class="fs-1 fw-bold mt-3">{{ $auction->created_at }}</p> -->
                  <p class="md-title">Bidding will end at: {{ $auction->created_at }}</p>
                @endforeach
              @foreach($auctions as $auction)
              <p class="md-title">Volume: {{ $auction->crop_volume}}kg</p>
              @endforeach
              <div class="d-flex flex-column align-items-center">
                <p class="title">Top Bidders</p>
                <div class="row bids-row bg-light-subtle mb-4 w-100">
                  <div class="bids-table mt-2">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">Name</th>
                          <th scope="col">Bid Amount</th>
                          <th scope="col">Date</th>
                        </tr>
                      </thead>
                      <tbody id="tbody2">
                      @foreach($bids as $bid) 
                        <tr>
                          <td class="text-center">
                            <img
                              src="/images/profiles/{{ $bid->profile_img }}"
                              alt=""
                              class="rounded-circle object-fit-cover"
                              id="table-img"
                            />
                          </td>
                          <td>{{ $bid->name }}</td>
                          <td>₱ {{ $bid->bid_amount }}</td>
                          <td>{{ $bid->created_at }}</td>
                        </tr>
                      @endforeach
       
                      </tbody>
                    </table>
                  </div>
                </div>
                @if(Session::has('success'))
                  <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('failed'))
                  <div class="alert alert-danger">{{Session::get('failed')}}</div>
                @endif
                <div class="w-100 px-5 d-flex flex-column gap-2 mt-5" id="bid-div-desk">
                  <!-- <form id="form_data" method="POST" enctype="multipart/form-data" onsubmit="pushBid(event)"> 
                    @csrf-->
                  
                    <div id="validation-errors2"  role="alert">
                      
                    </div>

                        @if($auction->status == 'closed')
                          <div class="alert alert-success w-100 h-100 text-center fs-3">This auction is completed!</div>
                          @elseif(Auth::user()->user_type == 1)
                          <p class="title text-success text-center">Have a good day Admin!</p>
                        @elseif(Auth::user()->id == $farmer->id)
                          <button
                          class="btn btn-success"
                          data-bs-toggle="modal"
                          data-bs-target="#updateModal"
                        >
                          <p class="md-title text-light p-2">
                            <i class="fa-solid fa-pen-to-square"></i> Update Base Bid
                            Price
                          </p>
                        </button>
                        <div
                          class="modal fade"
                          id="updateModal"
                          tabindex="-1"
                          aria-labelledby="updateModalLabel"
                          aria-hidden="true"
                        >
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-2" id="exampleModalLabel">
                                  <i class="fa-solid fa-pen-to-square"></i>
                                  Update Base Bid Price
                                </h1>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                <form action="" id="updForm">
                                  <input
                                    type="email"
                                    class="form-control mb-3 h-full fs-3"
                                    id="email-inp"
                                    value="20"
                                    autocomplete="off"
                                  />
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button
                                  type="button"
                                  class="btn btn-secondary fs-3"
                                  data-bs-dismiss="modal"
                                >
                                  Close
                                </button>
                                <button
                                  type="button"
                                  class="btn btn-success fs-3"
                                  id="updateBbpBtn"
                                >
                                  Save changes
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <button
                          class="btn btn-success p-3"
                          data-bs-toggle="modal"
                          data-bs-target="#closeBiddingModal"
                        >
                          <p class="md-title text-light">
                            <i class="fa-solid fa-square-xmark"></i> Close Bidding
                          </p>
                        </button>
                        <div
                          class="modal fade"
                          id="closeBiddingModal"
                          tabindex="-1"
                          aria-labelledby="closeBiddingModalLabel"
                          aria-hidden="true"
                        >
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-2" id="exampleModalLabel">
                                  
                                  Close Bidding
                                </h1>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                <p class="title">
                                  Are you sure you want to manually close the bidding?
                                </p>
                              </div>
                              <div class="modal-footer">
                                <button
                                  type="button"
                                  class="btn btn-secondary fs-3"
                                  data-bs-dismiss="modal"
                                >
                                  Exit
                                </button>
                                <button
                                  type="button"
                                  class="btn btn-success fs-3"
                                  data-bs-dismiss="modal"
                                >
                                  Close the Bidding
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                        @else
                            <input
                            type="number"
                            name="desktop"
                            id="inPriceDesk"
                            class="form-control border-black text-center fs-1"
                            
                          /><!--onkeyup="al2()" -->
                          <button
                            type="submit"
                            id="bid-btn2"
                            class="w-100 btn btn-success fs-1"
                            
                          ><!-- onclick="lezgo2()"-->
                            Bid
                          </button>
                          <!-- </form> -->

                        @endif
    
                        @if(!empty($bidders))
                          @foreach($bidders as $bidder)
                            
                          @endforeach
                        @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {

        //para sa Web toh par
           
             $('#bid-btn2').click(function() {
                var message = $('#inPriceDesk').val();
                if (message.trim() !== '') {
                    // AJAX request to send the message to the server
                    $.ajax({
                        method: 'POST',
                        url: '/send-message', // Replace with your route
                        data: 
                        { 
                          _token: '{{ csrf_token() }}',
                          message: message,
                          channel: '@foreach($auctions as $auction){{ $auction->auction_id }}@endforeach',
                          bidder: "{{ Auth::user()['id'] }}",
                        },
                        success: function(response) {
                            // Handle success if needed
                            console.log('Message Response: ', response);

                            if (response == 'failed') {
                                // Log or display validation errors


                                const errors = response;

                                // Clear any existing error messages
                                const validationErrorsDiv = document.getElementById('validation-errors2');
                                validationErrorsDiv.innerHTML = '';
                                

                                // Create and append error messages
                                for (const field in errors) {
                                    if (errors.hasOwnProperty(field)) {
                                        //const errorMessages = errors[field].join('<br>'); or 
                                        const errorMessages = errors.join('<br>'); // Combine multiple error messages for the field
                                        const errorMessageElement = document.createElement('div');
                                        errorMessageElement.classList.add("new");
                                        errorMessageElement.innerHTML = `<div class="alert alert-danger"><h2>Please Provide Higher Bid</2></div>`;
                                        validationErrorsDiv.appendChild(errorMessageElement);
                                    }
                                }

                                

                            } else {
                                // Handle other errors
                            }
                        },
                        error: function(xhr, status, error) {
                            // Handle error if needed
                            console.log('Error sending message: ', error);
                        }
                    });
                }
            });

            //Mobile toh par. ala pa ako naisip na logic para onti lang yung code sana

            $('#bid-btn').click(function() {
                var message = $('#inputPrice').val();
                if (message.trim() !== '') {
                    // AJAX request to send the message to the server
                    $.ajax({
                        method: 'POST',
                        url: '/send-message', // Replace with your route
                        data: 
                        { 
                          _token: '{{ csrf_token() }}',
                          message: message,
                          channel: '@foreach($auctions as $auction){{ $auction->auction_id }}@endforeach',
                          bidder: "{{ Auth::user()['id'] }}",
                        },
                        success: function(response) {
                            // Handle success if needed
                            console.log('Message Response: ', response);

                            if (response == 'failed') {
                                // Log or display validation errors


                                const errors = response;

                                // Clear any existing error messages
                                const validationErrorsDiv = document.getElementById('validation-errors1');
                                validationErrorsDiv.innerHTML = '';
                                

                                // Create and append error messages
                                for (const field in errors) {
                                    if (errors.hasOwnProperty(field)) {
                                        //const errorMessages = errors[field].join('<br>'); or 
                                        const errorMessages = errors.join('<br>'); // Combine multiple error messages for the field
                                        const errorMessageElement = document.createElement('div');
                                        errorMessageElement.classList.add("new");
                                        errorMessageElement.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <p class="fs-3 fw-bold">Please Provide a Higher Bid</p>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>`;
                                        validationErrorsDiv.appendChild(errorMessageElement);
                                    }
                                }

                                

                            } else {
                                // Handle other errors
                            }
                        },
                        error: function(xhr, status, error) {
                            // Handle error if needed
                            console.log('Error sending message: ', error);
                        }
                    });
                }
            });




  });
</script>
<script type="module">//type="module" is important! do not remove it.
    // Add your WebSocket event listener here
    
    window.Echo.channel('chat{{ $auction->auction_id }}').listen('.recieve.message', (data) => {
        // Update UI with received message
        let inputPrice2 = data.message;
        let bidder_id = data.bidder;
        let profile_img = data.profile_img;

        let row = document.createElement("tr");

        let imagecol = document.createElement("td");
        imagecol.classList.add("text-center");

        let image = document.createElement("img");
        image.src = `${profile_img}`;
        image.classList.add("rounded-circle");
        image.id = "table-img";
        imagecol.appendChild(image);
        row.appendChild(imagecol);

        let name = document.createElement("td");
        name.innerText = `${bidder_id}`;
        row.appendChild(name);
        
        let price = document.createElement("td");
        price.innerText = `₱ ${inputPrice2}`;
        row.appendChild(price);

        //const d = new Date();
        let date = document.createElement("td");

        @foreach($bids as $bid)
        date.innerText =  '{{ $bid->created_at }}';
        @endforeach
        

        row.appendChild(date);

        //tbody1.append(row);
        //tbody2.append(row);
        $("tbody").prepend(row);

        let latestprice2 = inputPrice2;
        lbp2.innerText = `${latestprice2}`;
        lbp3.innerText = `${latestprice2}`;
        lbp.innerText = `${latestprice2}`;
        lbp.innerText = `${latestprice2}`;

  
        //inputPrice2.value = null;
        //btn2.disabled = true;

    });
    /*
     function pushBid(e){
              e.preventDefault();
              console.log($('#form_data'));
              var bid = $('#form_data')[0];
              var bidFormData = new FormData(bid);

              //$('.formErrors').html('');
              $.ajax({
                method:"POST",
                url:"{{ url('send-message')}}",
                data:bidFormData,
                processData:false,
                contentType:false,
                success:function(response){
                },
                error:function(error){
                  var formErr = error.responseJSON.errors;
                  console.log(error);
                  for(var err in forErr){
                    $('.'+ err + '_err').html(formErr[err][0]);
                  }
                }
              })
            }
          */
</script>
<script type="module">//type="module" is important! do not remove it.
    // Add your WebSocket event listener here
    window.Echo.channel('end_auction').listen('.end_auction.message', (data) => {
        // Update UI with received message
        let auction = data.auction;
        let crop = data.crop;
        let creator = data.creator;
        let bidder_id = data.bidder;

        const alertMessage = document.createElement("div");
        alertMessage.classList.add("alert", "alert-success", "w-100", "h-100", "text-center", "fs-3");
        alertMessage.textContent="This auction is completed!";
        const alertMessage2 = document.createElement("div");
        alertMessage2.classList.add("alert", "alert-success", "w-100", "h-100", "text-center", "fs-3");
        alertMessage2.textContent="This auction is completed!";


        const bidBtn = document.getElementById("bid-btn");
        bidBtn.remove();
        const inputMobile = document.getElementById("inputPrice");
        inputMobile.remove();
        const bidBtn2 = document.getElementById("bid-btn2");
        bidBtn2.remove();
        const inputDesktop = document.getElementById("inPriceDesk");
        inputDesktop.remove();

        
        const bidDiv = document.getElementById('bid-div');
        bidDiv.append(alertMessage);
        bidDiv.classList.remove("border", "border-black");

        const bidDiv2 = document.getElementById('bid-div-desk');
        bidDiv2.append(alertMessage2);
        bidDiv2.classList.remove("border", "border-black");

        
    });

</script>


      <!-- <script src="../js/biddings.js"></script> -->
</main>
@endsection
