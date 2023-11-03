<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="../css/Login.css" />
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
  </head>
  <body>
    <main class="container bg-body-tertiary p-5 login_cont">
      <!--Image Container-->
      <div class="row">
        <div class="col d-none d-lg-block my-auto">
          <img
            class="img-fluid"
            src="../assets/login2.svg"
            alt="Login Pic"
            lazy
          />
        </div>
        <!--Form Container-->
        <div class="col mx-auto">
          <h1 class="form-label text-center">Login</h1>
          <form class="" onsubmit="signUp()" method="POST" action="{{ route('login') }}">
          @csrf
            <div class="form-floating">
              <input
                type="email"
                class="form-control mb-3 @error('email') is-invalid @enderror"
                id="email-inp"
                placeholder="Enter Email here"
                name="email" 
                value="{{ old('email') }}" 
                required autocomplete="email" 
                autofocus
              />
              @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              <label for="email-inp">Email</label>
            </div>
            <div class="form-floating">
              <input
                type="password"
                class="form-control mb-3 @error('password') is-invalid @enderror"
                id="pass-inp"
                placeholder="Enter Password here"
                name="password" 
                required 
                autocomplete="current-password"
              />
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              <label for="pass-inp">Password</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
            <button type="submit" class="btn btn-success w-100 mb-3">
              Submit
            </button>
          </form>
          <small
            >Don't have an account? 
            @if (Route::has('register'))
                  <a class="btn btn-link" href="{{ route('register') }}">
                      {{ __('Sign Up') }}
                  </a>
            @endif
          </small>
          </div>
        <!--Form Container-->
      </div>
      <script src="../index.js"></script>
    </main>
</body>
</html>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

    

