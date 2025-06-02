@include('master')
<!DOCTYPE html>
<html lang="en">
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
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
  <!-- responsive style -->
  <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />
</head>

<body class="sub_page">

  <!-- contact section -->
  <section class="contact_section layout_padding-top">
    <div class="container">
      <div class="heading_container">
        <h2>Get In Touch</h2>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 px-0">
          <div class="map_container">
            <div class="map-responsive">
              <iframe 
                src="https://www.wpmapspro.com/wp-content/uploads/2022/12/Right-to-left-languages.png" 
                width="600" 
                height="300" 
                frameborder="0" 
                style="border:0; width: 100%; height:100%" 
                allowfullscreen>
              </iframe>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-5">
          <div class="form_container">
            <form action="{{ route('contact.submit') }}" method="POST">
              @csrf

              @if (session('success'))
                <div class="alert alert-success mb-3">
                  {{ session('success') }}
                </div>
              @endif

              <div class="mb-3">
                <input 
                  name="name" 
                  type="text" 
                  class="form-control" 
                  placeholder="Name" 
                  value="{{ old('name') }}" 
                />
                @error('name')
                  <div class="text-danger small">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <input 
                  name="email" 
                  type="email" 
                  class="form-control" 
                  placeholder="Email" 
                  value="{{ old('email') }}" 
                />
                @error('email')
                  <div class="text-danger small">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <input 
                  name="phone" 
                  type="text" 
                  class="form-control" 
                  placeholder="Phone Number" 
                  value="{{ old('phone') }}" 
                />
                @error('phone')
                  <div class="text-danger small">{{ $message }}</div>
                @enderror
              </div>

              <div class="mb-3">
                <textarea 
                  name="message" 
                  class="form-control" 
                  rows="5" 
                  placeholder="Message"
                >{{ old('message') }}</textarea>
                @error('message')
                  <div class="text-danger small">{{ $message }}</div>
                @enderror
              </div>

              <div class="d-flex">
                <button type="submit" class="btn btn-success px-4">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end contact section -->

  <!-- info section -->
  <section class="info_section">
    <div class="container">
      <div class="row">
        <!-- About -->
        <div class="col-md-3">
          <div class="info_contact">
            <h5>About Apartment</h5>
            <div>
              <div class="img-box">
                <img src="{{ asset('assets/images/location.png') }}" width="18px" alt="">
              </div>
              <p>Address</p>
            </div>
            <div>
              <div class="img-box">
                <img src="{{ asset('assets/images/phone.png') }}" width="12px" alt="">
              </div>
              <p>+0201140307194</p>
            </div>
            <div>
              <div class="img-box">
                <img src="{{ asset('assets/images/mail.png') }}" width="18px" alt="">
              </div>
              <p>brighthouse@gmail.com</p>
            </div>
          </div>
        </div>
        <!-- Information -->
        <div class="col-md-3">
          <div class="info_info">
            <h5>Information</h5>
            <p>Our company is located at the down town</p>
          </div>
        </div>
        <!-- Useful Links -->
        <div class="col-md-3">
          <div class="info_links">
            <h5>Useful Link</h5>
            <ul>
              <li><a href="#"><img src="{{ asset('assets/images/fb.png') }}" alt=""></a></li>
              <li><a href="#"><img src="{{ asset('assets/images/twitter.png') }}" alt=""></a></li>
              <li><a href="#"><img src="{{ asset('assets/images/linkedin.png') }}" alt=""></a></li>
              <li><a href="#"><img src="{{ asset('assets/images/youtube.png') }}" alt=""></a></li>
            </ul>
          </div>
        </div>
        <!-- Newsletter -->
        <div class="col-md-3">
          <div class="info_form">
            <h5>Newsletter</h5>
            <form action="">
              <input type="email" class="form-control mb-2" placeholder="Enter your email">
              <button class="btn btn-outline-light">Subscribe</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end info section -->

  <!-- JS Scripts -->
  <script type="text/javascript" src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/bootstrap.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>
