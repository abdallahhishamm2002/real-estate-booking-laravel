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

  <!-- Vite / Tailwind -->
  @vite('resources/css/app.css')

  <title>Bright Star</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/images/logoo.png') }}">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:400,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Custom Styles -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" />
</head>

<body>
  {{-- navbar --}}
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
      </ul>
    </nav>
    <div class="auth-buttons">
      
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
  {{-- end navbar --}}

  {{-- page‐specific content --}}
  <main class="mt-8">
    @yield('content')
  </main>

  {{-- Global Scripts --}}
  <script>
    function toggleDropdown() {
      document.getElementById('dropdown').classList.toggle('hidden');
    }
    window.onclick = function(event) {
      if (!event.target.closest('.relative')) {
        document.getElementById('dropdown').classList.add('hidden');
      }
    }
  </script>

  <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>
