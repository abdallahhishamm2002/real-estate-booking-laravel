@include('master')

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Bright Star</title>

  <link rel="icon" type="image/png" href="{{ asset('assets/images/logoo.png') }}">

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:400,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Custom styles -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />

  <!-- Responsive styles -->
  <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" />
</head>

<body>


  <section class="vh-100 bg-image"
    style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                <form method="POST" action="{{ route('signup.submit') }}">
                  @csrf

                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul style="margin-bottom: 0;">
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1cg">Your Name</label>
                    <input type="text" id="form3Example1cg" name="name"
                      class="form-control form-control-lg" value="{{ old('name') }}" required />
                    @error('name')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3cg">Your Email</label>
                    <input type="email" id="form3Example3cg" name="email"
                      class="form-control form-control-lg" value="{{ old('email') }}" required />
                    @error('email')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example2cg">Phone Number</label>
                    <input type="tel" id="form3Example2cg" name="phone"
                      class="form-control form-control-lg" value="{{ old('phone') }}" required />
                    @error('phone')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4cg">Password</label>
                    <input type="password" id="form3Example4cg" name="password"
                      class="form-control form-control-lg" required />
                    @error('password')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                    <input type="password" id="form3Example4cdg" name="password_confirmation"
                      class="form-control form-control-lg" required />
                  </div>

                  <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">
                    Register
                  </button>

                  <p class="text-center text-muted mt-5 mb-0">
                    Have already an account?
                    <a href="{{ route('login.form') }}" class="fw-bold text-body"><u>Login here</u></a>
                  </p>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>

</html>
