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

</head>
<body>

    {{-- <nav id="myNavmenu" class="navmenu navmenu-default navmenu-fixed-left offcanvas" role="navigation">
        <a class="navmenu-brand" href="#">Brand</a>
        
        <button data-toggle="offcanvas" data-target="#myNavmenu">
            <i class="fas fa-times"></i>
        </button>

        <ul class="nav navmenu-nav flex-column">
          <li class="nav-item active"><a class="nav-link" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Link</a></li>
        </ul>
      </nav>
      
      <header class="navbar navbar-light bg-light fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="offcanvas" data-target="#myNavmenu" data-canvas="body">
          <span class="navbar-toggler-icon"></span>
        </button>
      </header> --}}
    
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