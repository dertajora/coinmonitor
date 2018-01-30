<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Coin Monitoring</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    @yield('meta')
    <!-- <link rel="stylesheet" href="css/bootstrap.css" media="screen"> -->
    <link rel="stylesheet" href="css/bs4-one-ui-kit.css">
    <style type="text/css">
      body {
        min-height: 2000px;
      }
      
      #page-header {
        height: 300px;
        width: 100%;
        background-image: -webkit-linear-gradient(top left, #572991 0%, #7A45BD 50%, #491B84 100%);
        background-image: -o-linear-gradient(top left, #572991 0%, #7A45BD 50%, #491B84 100%);
        background-image: linear-gradient(to bottom right, #572991 0%, #7A45BD 50%, #491B84 100%);
        text-align: center;
        padding-top: 90px;
      }

      #page-header a.logo {
        font-family: "Open sans";
        font-size: 80px;
        color: #FFFFFF;
        line-height: 149px;
        text-shadow: 0px 7px 0px rgba(0,0,0,0.11);  
      }
      #page-header a.logo:hover {
        text-decoration: none;
      }

      .h3-marks {
        margin: 25px 0;
        color: #D6D6D6;
      }
      .one-ui-kit-example-container {
        background-color: rgba(245, 245, 245, 0.42);
        padding: 2rem;
        border: 1px solid #eee;
      }
      .one-ui-kit-example-container .modal {
          position: relative;
          top: auto;
          right: auto;
          bottom: auto;
          left: auto;
          z-index: 1;
          display: block;
      }
    </style>
  </head>
  <body>

  <header id="page-header">
    <nav class="navbar navbar-fixed-top bg-faded">
      <div class="container">
        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#navbar-header" aria-controls="navbar-header">
          &#9776;
        </button>
        <div class="collapse navbar-toggleable-xs" id="navbar-header">
          <a class="navbar-brand" href="#top">Home</a>
          <ul class="nav navbar-nav pull-xs-right">
            <li class="nav-item active">
              <li class="nav-item">
                <a class="nav-link" href="{{url('/coin')}}">Price</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/chart')}}">Chart</a>
              </li>
              
              
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <a href="#" class="logo">@yield('header')</a>
  </header>
  
    @yield('content')


    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>