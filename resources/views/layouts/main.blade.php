<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MyBlog | My Awesome Blog</title>

    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">
    <link rel="stylesheet" href="/main/css/bootstrap.min.css">
    <link rel="stylesheet" href="/main/css/custom.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#the-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">MyBlog</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="the-navbar-collapse">
                @if (Route::has('login'))
              <ul class="nav navbar-nav navbar-right">
                @auth
                <li class="active"><a href="{{ url('/list') }}">Home</a></li>
                @else
                <li>  <a href="{{ route('login') }}">Login</a></li>
                @if (Route::has('register'))
                <li><a href="{{ route('register') }}">Register</a></li>
                 @endif
                 @endauth
              </ul>
              @endif


            </div><!-- /.navbar-collapse -->
          </div><!-- /.container -->
        </nav>
    </header>

    <div class="container">
        @yield('content');
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class="copyright">&copy;</p>
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
    </footer>

    <script src="/main/js/bootstrap.min.js"></script>
</body>
</html>
