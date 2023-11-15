<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/SignUp.css" />
    <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon"> 
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
  </head>
  <body>
<main class="container-md my-auto pb-3 pt-5">
{{-- Help Button --}}
    <button class="btn btn-success help-btn" data-bs-toggle="modal" data-bs-target="#RegisterModal"><i class="fa-solid fa-circle-info help-txt"></i></button>
    {{-- Help Button --}}

    {{-- Help  Modal --}}
    <div class="modal fade" id="RegisterModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title md-title text-success" id="RegisterModalLabel">Register Page Guide</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <iframe width="100%" height="100%" src="https://www.youtube.com/embed/kXd7OSAxgCA?si=JGjuGUd-s270BfEZ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary fs-2" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
{{-- Help  Modal --}}
    <div class="row row-cols-2">
        <!--Image Container-->
        <div class="col mt-auto d-none d-lg-block my-auto">
            <img
            class="img-fluid pt-3"
            src="../assets/signUp2.svg"
            id="signUpVect"
            />
        </div>
        <!--Image Container-->

        <!--Form Container-->
            <div class="col col-12 col-lg-6">
                <div class="row mt-sm-5">
                        <h1 class="text-wrap">Account Details</h1>
                    <small class="mb-2">Personal Information</small>
                </div>

                <form onsubmit="signUp()" class="form" id="form-true" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                        <div class="row row-cols-1 name_row">
                            <div class="col mb-2">
                                <div class="form-floating">
                                    <input
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="fname"
                                    placeholder="Put First Name Here"
                                    name="name" 
                                    value="{{ old('name') }}" 
                                    required 
                                    autocomplete="name" 
                                    autofocus
                                    />
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    <label for="fname">Full Name</label>
                                </div>
                            </div>
                        </div>

                        <div class="row email_row">
                            <div class="col mb-2">
                                <div class="form-floating">
                                    <input
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="email"
                                    placeholder="Put Email Here"
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    required 
                                    autocomplete="email"
                                    />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="email">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-danger " role="alert" id="passwordReminder" hidden>
                            Password Must contain:
                            <hr>
                            <ul class="list-unstyled" id="passwordCheckings">
                                <li id="8chars"><i class="fa-solid fa-xmark"></i> Atleast 8 Characters</li>
                                <li id="uppercase"><i class="fa-solid fa-xmark"></i> Atleast 1 UPPERCASE Letter</li>
                                <li id="lowercase"><i class="fa-solid fa-xmark"></i> Atleast 1 lowercase letter</li>
                                <li id="oneNumber"><i class="fa-solid fa-xmark"></i> Atleast 1 Number</li>
                                <li id="symbol"><i class="fa-solid fa-xmark"></i> Atleast 1 symbol ( !, @, #, $, %, ^, &, * )</li>
                            </ul>
                        </div>
                        <div class="row password_row">
                            <div class="col mb-2">
                                <div class="form-floating">
                                    <input
                                    type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    id="password"
                                    onkeyup="checkPassword(value)"
                                    placeholder="Put Password Here"
                                    onchange=""
                                    name="password" 
                                    required 
                                    autocomplete="new-password"
                                    />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="password">Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="row conf_password_row">
                            <div class="col mb-2" id="conf_password_row">
                                <div class="form-floating">
                                    <input
                                    type="password"
                                    class="form-control"
                                    id="conf-password"
                                    onkeyup="passCheck()"
                                    placeholder="Confirm Password Here"
                                    name="password_confirmation" 
                                    required 
                                    autocomplete="new-password"
                                    />
                                    <div class="invalid-feedback">Password Do not match</div>
                                    <label for="conf-password">Confirm Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="row phone_number_row">
                            <div class="col mb-2">
                                <div class="form-floating">
                                    <input
                                    type="text"
                                    class="form-control"
                                    id="phone-number"
                                    required
                                    name="phone"
                                    placeholder="Put Phone Number Here"
                                    onchange="phoneCheck()"
                                    value="{{ old('phone') }}"
                                    />
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="invalid-feedback">Invalid Phone Number</div>
                                    <label for="phone-number">Phone Number (registered to GCASH)</label>
                                </div>
                            </div>
                        </div>
                        <div class="row address_row">
                            <div class="col mb-2">
                                <div class="form-floating">
                                    <input
                                    type="text"
                                    class="form-control"
                                    id="address"
                                    placeholder="Put Address Here"
                                    required
                                    name="address"
                                    value="{{ old('address') }}"
                                    />
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="address">Address</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="form-label">Select Account Type: </label>
                            <div class="col mb-2">
                                <div class="form-check">
                                    <input
                                    class="form-check-input"
                                    type="radio"
                                    id="farmer-type"
                                    onchange="radioChange('farmer')"             
                                    name="user_type"
                                    value="0"
                                    required

                                    />
                                    <label class="form-check-label" for="farmer-type">
                                    Farmer
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input
                                    class="form-check-input"
                                    type="radio"
                                    name="user_type"
                                    id="consumer-type"
                                    onchange="radioChange('consumer')"
                                    value="1"
                                    required

                                    />
                                    <label class="form-check-label" for="consumer-type">
                                    Consumer
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row file_row">
                            <div class="col mb-3">
                                <label
                                    for="credentials"
                                    class="form-label"
                                    id="credentials-label"
                                    >Upload File:
                                </label>
                            <input
                                type="file"
                                class="form-control"
                                id="credentials"
                                
                                name="valImage"
                                value="{{ old('valImage') }}"
                                required
                          
                            />
                            </div>
                        </div>
                        <div class="row pic_row">
                            <div class="col mb-3">
                                <label
                                    for="credentials"
                                    class="form-label"
                                    id="credentials-label"
                                    >Upload Profile Picture:
                                </label>
                            <input
                                type="file"
                                class="form-control"
                                id="pic-sign-up"
                                accept="image/png, image/jpeg"
                                
                                name="userProfile"
                                value="{{ old('userProfile') }}"
                                required
                                
                            />
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col text-start">
                                <input type="checkbox" id="termsCheck" onchange="legalAgree()">
                                <label for="termsCheck">I agree to the <button type="button" class="btn btn-link px-0 py-0" data-bs-toggle="modal" data-bs-target="#termsAndCond">
                                    Terms and Conditions
                                  </button></label>
                                <br>
                                <input type="checkbox" name="" id="privacyCheck" onchange="legalAgree()">
                                <label for="privacyCheck" >
                                    I agree to the
                                    <button type="button" class="btn btn-link px-0 py-0" data-bs-toggle="modal" data-bs-target="#privacyPolicy">
                                        Privacy Policy
                                      </button>
                                </label>
                                <!-- Button trigger modal -->
        
        <!-- Terms and Conditions Modal Modal -->
        <div class="modal fade" id="termsAndCond" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-success text-light">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Terms and Conditions</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <h5>Please read these terms and conditions carefully before using https://www.agrikulturapp.com website operated by us. </h5>
                <br>
                <h2>Conditions of use</h2>
                <p>By using this website, you certify that you have read and reviewed this Agreement and that you agree to comply with its terms. If you do not want to be bound by the terms of this Agreement, you are advised to stop using the website accordingly. AgrikulturApp only grants use and access of this website, its products, and its services to those who have accepted its terms. </p>
                <br>
                <h2>Privacy Policy</h2>
                <p>Before you continue using our website, we advise you to read our privacy policy regarding our user data collection. It will help you better understand our practices. </p>
                <br>
                <h2>Age Restriction</h2>
                <p>You must be at least 18 (eighteen) years of age before you can use this website. By using this website, you warrant that you are at least 18 years of age and you may legally adhere to this Agreement. AgrikulturApp assumes no responsibility for liabilities related to age misrepresentation. </p>
                <br>
                <h2>Intellectual property</h2>
                <p>You agree that all materials, products, and services provided on this website are the property of agrikulturapp, its affiliates, directors, officers, employees, agents, suppliers, or licensors including all copyrights, trade secrets, trademarks, patents, and other intellectual property. You also agree that you will not reproduce or redistribute the agrikulturapp’s intellectual property in any way, including electronic, digital, or new trademark registrations. 
        
                    You grant agrikulturapp a royalty-free and non-exclusive license to display, use, copy, transmit, and broadcast the content you upload and publish. For issues regarding intellectual property claims, you should contact the company in order to come to an agreement. </p>
                <br>
                <h2>User Accounts</h2>
                <p>As a user of this website, you are asked to register with us and provide private information. You are responsible for ensuring the accuracy of this information, and you are responsible for maintaining the safety and security of your identifying information. You are also responsible for all activities that occur under your account or password. 
        
                If you think there are any possible issues regarding the security of your account on the website, inform us immediately so we may address them accordingly. 
        
                We reserve all rights to terminate accounts, edit or remove content and cancel auctions at our sole discretion. </p>
                <br>
                <h2>Applicable Law</h2>
                <p>By using this website, you agree that the laws of the Philippines, without regard to principles of conflict laws, will govern these terms and conditions, or any dispute of any sort that might come between AgrikulturApp and you, or its business partners and associates. </p>
                <br>
                <h2>Disputes</h2>
                <p>Any dispute related in any way to your use of this website or to products you purchase from us shall be arbitrated by state or federal court of the Philippines and you consent to exclusive jurisdiction and venue of such courts. </p>
                <br>
                <h2>Indemnification</h2>
                <p>You agree to indemnify AgrikulturApp and its affiliates and hold AgrikulturApp harmless against legal claims and demands that may arise from your use or misuse of our services. We reserve the right to select our own legal counsel.  </p>
                <br>
                <h2>Limitation on Liability</h2>
                <p>AgrikulturApp is not liable for any damages that may occur to you as a result of your misuse of our website. 
        
                AgrikulturApp reserves the right to edit, modify, and change this Agreement at any time. We shall let our users know of these changes through electronic mail. This Agreement is an understanding between AgrikulturApp and the user, and this supersedes and replaces all prior agreements regarding the use of this website. </p>
                <br>
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="privacyPolicy" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header bg-success text-light">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Privacy Policy</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <h2>Privacy Policy of AgrikultuApp</h2>
                <p>This privacy policy will help you understand how AgrikulturApp uses and protects the data you provide to us when you visit and use https://agrikulturapp.com. 
        
        We reserve the right to change this policy at any given time, of which you will be promptly updated. If you want to make sure that you are up to date with the latest changes, we advise you to frequently visit this page. </p>
                <br>
                <h2>What User Data We Collect</h2>
                <p>When you register and visit the site, we may collect the following data</p>
                <ul>
                    <li>Your First and Last Name.</li>
                    <li>Your Email Address.</li>
                    <li>Your Phone Number.</li>
                    <li>Your RSBA Number (Farmer) or Valid ID (Consumer) </li>
                </ul>
                <br>
                <h2>Why We Collect Your Data</h2>
                <p>We are collecting your data for these reasons:  </p>
                <ul>
                    <li>To display your information so that you can transact with farmers or consumers easily and directly.</li>
                    <li>To increase your credibility. </li>
                </ul>
                <br>
                <h2>Safeguarding and Securing the Data</h2>
                <p>AgrikulturApp is committed to securing your data and keeping it confidential. AgrikulturApp has done all in its power to prevent data theft, unauthorized access, and disclosure by implementing the latest technologies and software, which help us safeguard all the information we collect online. </p>
                <br>
                <h2>Our Cookie Policy</h2>
                <p>We do not collect any data using cookies. </p>
                <br>
                <h2>Links to Other Websites</h2>
                <p>We do not have links to other websites or advertisements.</p>
                <br>
                <h2>Restricting the Collection of your Personal Data</h2>
                <p>At some point, you might wish to restrict the use and collection of your personal data. You can achieve this by doing the following: 
        
        Contact AgrikulturApp by emailing agrikulturapp@gmail.com and ask us to remove or terminate your account. 
        
        If you have already agreed to share your information with us, feel free to contact us via email and we will be more than happy to change this for you. 
        
        AgrikulturApp will not lease, sell or distribute your personal information to any third parties, unless we have your permission. We might do so if the law forces us. Your personal information will be used as a mean of contacting you by the farmer or consumer when a transaction is made.  </p>
                <br>
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
                            </div>
                        </div>
                        <div class="row submit_row">
                            <div class="col mb-2">
                                <button
                                    type="submit"
                                    class="btn btn-success w-100 fs-5"
                                    id="form-submit"
                                    disabled
                                >
                                    Sign Up
                                </button>
                            </div>
                        </div>
                </form>
                
                <small
                >Already have an account? <a href="{{ route('login') }}">Log In</a></small
                >
            </div>
        <!--Form Container-->
    </div>
    <script src="../js/signUp.js"></script>
    <!-- Google Translate Script -->
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!-- Google Translate Script -->
</main>
</body>
</html>
<!--Main Div-->
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 -->