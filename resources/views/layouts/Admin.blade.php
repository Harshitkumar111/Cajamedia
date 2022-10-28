<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- Scripts -->
    @viteReactRefresh
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="/css/Admin.css">
    
</head>
<body>
    
  <div class="container-admin">
   <div class="row-admin">
    <header>
     <div class="left">
        <h1>Cajamedia</h1>
     </div>
      <div class="header">
      @guest
      @if (Route::has('login'))
          <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
      @endif

      @if (Route::has('register'))
          <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
      @endif
      @else
      <div class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->first_name}} {{ Auth::user()->last_name}}
          </a>

          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
        </div>
  @endguest
</div>
    </header>
    {{-- <hr> --}}
   <div class="left-section"  >
     <a href="/admin" > <li><i class="fa-solid fa-house-user" ></i>&nbsp &nbsp Dashboard</li> </a>
     <a href="/fetchuser"><li><i class="fa-solid fa-recycle"></i>&nbsp &nbsp User Mangmeent</li></a>
     <a href="/country"> <li><i class="fa-solid fa-globe"></i></i>&nbsp &nbsp Country</li></a>
     <a href="/state"><li><i class="fa-regular fa-building"></i></i>&nbsp &nbsp State</li></a>
     <a href="/city"><li><i class="fa-solid fa-city"></i>&nbsp &nbsp City</li></a>
     <a href="/product"><li><i class="fa-solid fa-people-roof"></i></i>&nbsp &nbsp Manage Product</li></a>
     <a href="/product_category"><li><i class="fa-solid fa-list-check"></i></i>&nbsp &nbsp Product Catagory</li></a>
     <a href="/discount"><li><i class="fa-solid fa-percent"></i></i>&nbsp &nbsp Product Discount</li></a>

     <a href="/order"><li><i class="fa-brands fa-first-order"></i></i>&nbsp &nbsp Management Order</li></a>
     <a href="/payment"><li><i class="fa-brands fa-cc-amazon-pay"></i></i>&nbsp &nbsp Payment</li></a>

    {{-- <a href="/admin">Dashboard</a><br>
    <a href="/fetchuser">User Mangmeent</a><br>
    <a href="/state">State</a><br>
    <a href="/city">City</a> --}}
    
   </div>
   <div class="right-section">
       
    <main class="py-4">
        @yield('content')
    </main>


   </div>

   </div>
  </div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 

    <script src="/js/main.js"></script>

</body>
</html>