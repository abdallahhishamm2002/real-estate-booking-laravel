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
  @vite('resources/css/app.css')


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

  <div class="header-container">
    <div class="logo">
        <div class="logo-icon">✧</div>
        <div class="logo-text">Bright Star</div>
    </div>
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ route('properties.index') }}">Properties</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            <li><a href="{{ route('viewings.index') }}">My Viewings</a></li>
            @auth
           
            @endauth
        </ul>
    </nav>
    <div class="auth-buttons">
        {{-- signup button --}}
<div class="">
  @if (Auth::check())
  <div class="relative inline-block text-left">
      <button onclick="toggleDropdown()" class="flex items-center space-x-2 focus:outline-none">
          
          <span class="text-green-700 font-semibold">{{ Auth::user()->name }}</span>
          <svg class="w-4 h-4 text-green-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
          </svg>
          <img src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('assets/images/profile.png') }}" 
          alt="Avatar" 
          class="w-10 h-10 rounded-full object-cover border-2 border-green-500 shadow" />
      </button>

      <div id="dropdown" class="hidden absolute right-0 mt-2 w-44 bg-white border rounded-md shadow-lg z-50">
          <a href="{{ route('profile') }}" class="block px-4 py-2 text-green-700 hover:bg-green-100">My Profile</a>

          <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="w-full text-left px-4 py-2 text-green-700 hover:bg-green-100">
                  Logout
              </button>
          </form>
      </div>
  </div>
@else
  <a href="{{ route('login') }}" class="nav-link">Sign In</a>
  <a href="{{ route('register') }}" class="nav-link">Sign Up</a>
@endif

</div>

    
    </div>
  </div>

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 offset-md-1">
            <div class="detail-box">
              <h1>
                <span> Find</span> <br>
                Your <br>
                Shining <br>
                Home
              </h1>
              <p class="det">
                Discover Properties that shine as bright as the stars in our exclusive galaxy of luxury homes
              </p>  
            </div>
          </div>
        </div>
      </div>
    </section>
  

    <!-- end slider section -->
  </div>
  
  <!-- find section -->
  

  <!-- end find section -->


  <!-- about section -->

  <section class="about_section layout_padding-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="{{ asset('assets/images/about-img.jpg') }}" alt="">          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Our Apartments
              </h2>
            </div>
            <p>
              "There are many types of real estate opportunities available, but the majority have been transformed over time, whether through market trends, modern developments, or changing buyer demands."
            </p>
            <a href="properties">
              Get Started
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- sale section -->

  <section class="sale_section layout_padding-bottom">
    <div class="container-fluid">
      <div class="heading_container">
        <h2>
          House For Sale
        </h2>
      </div>
      <div class="sale_container">
        <div class="box">
          <div class="img-box">
            <img src="{{ asset('assets/images/s-1.jpg') }}" alt="">          </div>
          <div class="detail-box">
            <h6>
              North Coast Villa
            </h6>
            <p>
              Marassi Compound
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="{{ asset('assets/images/s-2.jpg') }}" alt="">          </div>
          <div class="detail-box">
            <h6>
              New Cairo Villa
            </h6>
            <p>
              Mountain View Compound
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="{{ asset('assets/images/s-3.jpg') }}" alt="">          </div>
          <div class="detail-box">
            <h6>
              Madinaty Villa
            </h6>
            <p>
              Villas District P12
            </p>
          </div>
        </div>
        
      </div>
      <div class="btn-box">
        <a href="properties">
          Find More
        </a>
      </div>
    </div>
  </section>

  <!-- end sale section -->

  

  <!-- deal section -->

  <section class="deal_section layout_padding-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Very Good Deals
              </h2>
            </div>
            <a href="pricing">
              Get Started
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <div class="box b1">
              <img src="{{ asset('assets/images/d-1.jpg') }}" alt="">
            </div>
            <div class="box b1">
              <img src="{{ asset('assets/images/d-2.jpg') }}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end deal section -->


  <!-- us section -->
  <section class="us_section layout_padding2">

    <div class="container">
      <div class="heading_container">
        <h2>
          Why Choose Us
        </h2>
      </div>
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <div class="box">
            <div class="img-box">
              <img src="{{ asset('assets/images/u-1.jpg') }}" alt="">
            </div>
            <div class="detail-box">
              <h3 class="price">
                1000+
              </h3>
              <h5>
                Years of House
              </h5>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="box">
            <div class="img-box">
              <img src="{{ asset('assets/images/u-2.jpg') }}" alt="">
            </div>
            <div class="detail-box">
              <h3>
                20000+
              </h3>
              <h5>
                Projects Delivered
              </h5>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="box">
            <div class="img-box">
              <img src="{{ asset('assets/images/u-3.jpg') }}" alt="">
            </div>
            <div class="detail-box">
              <h3>
                10000+
              </h3>
              <h5>
                Satisfied Customers
              </h5>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="box">
            <div class="img-box">
              <img src="{{ asset('assets/images/u-4.jpg') }}" alt="">
            </div>
            <div class="detail-box">
              <h3>
                1500+
              </h3>
              <h5>
                Cheap Rates
              </h5>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="properties">
          Get Started
        </a>
      </div>
    </div>
  </section>

  <!-- end us section -->

  <!-- client secction -->

  <section class="testimonial-section">
    <h2 class="testimonial-title">
      <span class="highlight"></span>
      What Our Clients Say
    </h2>
    <div class="testimonial-box">
      <button class="testimonial-nav prev" onclick="changeTestimonial(-1)">&lt;</button>
      <div class="testimonial-content" id="testimonial-content">
        <!-- سيتم تعبئة المراجعة هنا عبر جافاسكريبت -->
      </div>
      <button class="testimonial-nav next" onclick="changeTestimonial(1)">&gt;</button>
    </div>
  </section>
  <script>
    const testimonials = [
      {
        name: "Sarah Johnson",
        role: "Bought a Family Home",
        photo: "https://randomuser.me/api/portraits/women/44.jpg",
        text: "BrightStar Realty made buying our dream home so easy! The team was professional, responsive, and truly cared about our needs. Highly recommended for anyone looking for a new property."
      },
      {
        name: "Michael Lee",
        role: "Rented a Luxury Apartment",
        photo: "https://randomuser.me/api/portraits/men/32.jpg",
        text: "I found the perfect apartment in the city thanks to BrightStar. The process was smooth and the staff were always available to answer my questions."
      },
      {
        name: "Fatima Al-Farsi",
        role: "Sold Her Villa",
        photo: "https://randomuser.me/api/portraits/women/68.jpg",
        text: "I was able to sell my villa quickly and at a great price. The marketing and support from the team were excellent. Thank you!"
      }
    ];
    
    let current = 0;
    
    function showTestimonial(index) {
      const t = testimonials[index];
      document.getElementById('testimonial-content').innerHTML = `
        <div class="testimonial-icon">
          <img src="${t.photo}" alt="${t.name}" />
        </div>
        <div>
          <h3 class="testimonial-name">${t.name}</h3>
          <p class="testimonial-role">${t.role}</p>
          <p class="testimonial-text">“${t.text}”</p>
        </div>
      `;
    }
    
    function changeTestimonial(dir) {
      current += dir;
      if (current < 0) current = testimonials.length - 1;
      if (current >= testimonials.length) current = 0;
      showTestimonial(current);
    }
    
    // Initialize
    showTestimonial(current);
    </script>

  <!-- end client section -->

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
                <iframe src="https://www.wpmapspro.com/wp-content/uploads/2022/12/Right-to-left-languages.png" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-5">
            <div class="form_container">
              <form action="">
                <div><input type="text" placeholder="Name" /></div>
                <div><input type="email" placeholder="Email" /></div>
                <div><input type="text" placeholder="Phone Number" /></div>
                <div><input type="text" class="message-box" placeholder="Message" /></div>
                <div class="d-flex">
                  <button>Send</button>
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
                <input type="email" placeholder="Enter your email">
                <button>Subscribe</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end info section -->


    <script>
      function toggleDropdown() {
          const dropdown = document.getElementById('dropdown');
          dropdown.classList.toggle('hidden');
      }
  
      window.onclick = function(event) {
          if (!event.target.closest('.relative')) {
              document.getElementById('dropdown').classList.add('hidden');
          }
      }
  </script>
  

  <script type="text/javascript" src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/bootstrap.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>


</body>

</html>