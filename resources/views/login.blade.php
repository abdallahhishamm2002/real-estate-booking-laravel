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
<!-- Bootstrap CSS -->
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




<section class="vh-100">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 text-black">
  
          <div class="px-5 ms-xl-4">
            <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
          </div>
  
          <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
  
          <form method="POST" action="{{ route('login.submit') }}" style="width: 23rem;">
    @csrf

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

    <div class="form-outline mb-4">
      <input 
        type="email" 
        id="form2Example18" 
        name="email" 
        value="{{ old('email') }}" 
        class="form-control form-control-lg" 
        required 
      />
      <label class="form-label" for="form2Example18">Email address</label>
      @error('email')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <div class="form-outline mb-4">
      <input 
        type="password" 
        id="form2Example28" 
        name="password" 
        class="form-control form-control-lg" 
        required 
      />
      <label class="form-label" for="form2Example28">Password</label>
      @error('password')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <div class="mb-4 form-check">
      <input 
        class="form-check-input" 
        type="checkbox" 
        name="remember" 
        id="remember" 
        {{ old('remember') ? 'checked' : '' }} 
      />
      <label class="form-check-label" for="remember">
        Remember me
      </label>
    </div>

    <div class="pt-1 mb-4">
      <button 
        type="submit" 
        class="btn btn-info btn-lg btn-block"
      >
        Login
      </button>
    </div>

    <p class="small mb-5 pb-lg-2">
      <a class="text-muted" href="#!">Forgot password?</a>
    </p>
    <p>
      Don't have an account? 
      <a href="{{ route('signup.form') }}" class="link-info">Register here</a>
    </p>
</form>

  
          </div>
  
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img3.webp"
            alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
        </div>
      </div>
    </div>
  </section>

</body>
</html>