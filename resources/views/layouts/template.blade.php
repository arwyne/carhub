<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css">

    <!-- fontawesome icons -->
    <script src="https://kit.fontawesome.com/763fd16ca4.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    

</head>
<body>

      <nav class="navbar navbar-expand-md">

          <a class="navbar-brand" href="{{ url('/') }}">
            <img class="logo" src="{{ asset('images/logo.png') }}" alt=""><span>CarHub</span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navCollapse">
              <span><i class="fas fa-angle-double-down toggler-icon"></i></span>
          </button>

          <div class="collapse navbar-collapse" id="navCollapse">
            <ul class="navbar-nav ml-auto">
              @guest
              <li class="nav-item"><a class="nav-link" href="">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Register</a></li>
              @else
              <li class="nav-item"><a class="nav-link" href="">Home</a></li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Profile
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Reservation</a>
                  <a class="dropdown-item" href="#">Transactions</a>
                </div>
              </li>
              <li class="nav-item"><a class="nav-link" href="">Logout</a></li>
              @endguest

              


            </ul>
          </div>
      </nav>

        
        
      </header>
      
      @yield('body')
      
      
      
      
      
      
      <footer class="footer">
        <div class="container-disclaimer">
            <p class="text-center mb-0">
                 Arwyne De Guzman | Zuitt Coding Bootcamp &copy; 2020
            </p>
            <p class="text-center mb-0">Information contained within this web site is intended solely for educational purposes only</p>
        </div>
    </footer>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/js/jasny-bootstrap.min.js"></script>
    
</body>
</html>