<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">
  <head>

    <script src="https://cdn.tailwindcss.com"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title','Daftar Movies')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">



    <style>
        main > .container {
            padding: 60px 15px 0;
        }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>





  </head>
  <body class="d-flex flex-column h-100">

    {{-- Header --}}

    <header>
  <nav class="navbar navbar-expand-md fixed-top shadow-lg bg-success">
    <div class="container-fluid px-4 md:px-8 flex items-center justify-between">
      <a href="/movies" class="navbar-brand text-white text-2xl font-extrabold flex items-center space-x-2 hover:text-yellow-300 transition duration-300">
        <span>🎥</span>
        <span>Bioskop Politeknik Negeri Padang</span>
      </a>

      {{-- filepath: resources/views/layouts/main.blade.php --}}
<div class="d-flex align-items-center gap-3">
  <a href="{{ route('movies.datamovie') }}" class="btn btn-warning btn-sm">
    <i class="bi bi-plus-circle"></i> Input Data
  </a>
  @if(Auth::check())
    <span class="text-white fw-bold">
      <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
    </span>
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
      @csrf
      <button type="submit" class="btn btn-danger btn-sm">Logout</button>
    </form>
  @else
    <a href="{{ route('login') }}" class="btn btn-light btn-sm">Login</a>
  @endif
</div>

      <button class="navbar-toggler border-2 border-white rounded-md p-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
              aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon bg-white rounded"></span>
      </button>
    </div>
  </nav>
</header>


<!-- Main -->
<main class="flex-grow-1">
  <div class="container">
    @yield('content')
  </div>
</main>

{{-- Footer --}}

<footer class="bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 text-gray-300 py-8 shadow-inner mt-10">
  <div class="container mx-auto text-center px-4">
    <p class="text-sm md:text-base font-semibold">
      &copy; <span id="year"></span> Politeknik Negeri Padang &mdash; Manajemen Informatika 2A
    </p>
    <p class="text-xs mt-1 text-gray-400 italic">
      Dibuat oleh <span class="text-indigo-400 font-medium">Fadhil Syauqi Ramadhan</span>
    </p>
  </div>
</footer>


<!-- Script untuk Tahun Otomatis -->
<script>
  document.getElementById("year").textContent = new Date().getFullYear();
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>



