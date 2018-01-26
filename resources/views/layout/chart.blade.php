<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Coin Monitoring</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="refresh" content="10"/>
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
          {{-- <ul class="nav navbar-nav pull-xs-right">
            <li class="nav-item active">
              <li class="nav-item">
                <a class="nav-link" href="">Bitcoin.co.id</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">Coinmarketcap</a>
              </li>
              
              
            </li>
          </ul> --}}
        </div>
      </div>
    </nav>
    <a href="#" class="logo">Chart Monitoring</a>
  </header>
  
  <div class="container">
      <h3 id="h3-navbars" class="h3-marks">Bitcoin Indonesia</h3>
  </div>
  <!-- #########################
       CARDS -->
  <div class="container">
    

    <div class="card-columns one-ui-kit-example-container">
        
        @foreach($data['bitcoin'] as $row)
        <div class="card card-success card-inverse text-xs-center">
          <div class="card-block">
            <blockquote class="card-blockquote">
              <h2 class="card-title">{{$row['name']}}</h2>
              <p>{{number_format($row['price_now'],2,",",".")}} </p>
              <footer> <cite title="Source Title">{{$row['percentage']}}</cite></footer>
            </blockquote>
          </div>
        </div>
        @endforeach
        
    </div><!-- /card-columns -->
  </div> <!-- /container for CARDS -->
  
  <div class="container">
      <h3 id="h3-navbars" class="h3-marks">Coinmarketcap</h3>
  </div>
  <!-- #########################
       CARDS -->
  <div class="container">
    

    <div class="card-columns one-ui-kit-example-container">
        
        @foreach($data['coinmarketcap'] as $row)
        <div class="card card-success card-inverse text-xs-center">
          <div class="card-block">
            <blockquote class="card-blockquote">
              <h2 class="card-title">{{$row['name']}}</h2>
              <p>{{number_format($row['price_idr'],2,",",".")}} / ( {{round($row['price_usd'],2)}} USD )</p>
              <footer> <cite title="Source Title">{{$row['percent_change_1h']}}</cite></footer>
            </blockquote>
          </div>
        </div>
        @endforeach
        
    </div><!-- /card-columns -->
  </div> <!-- /container for CARDS -->
  <div class="container">
    <div class="card-columns one-ui-kit-example-container">
      <center><iframe src="https://vip.bitcoin.co.id/chart/xrpidr" width="1000px" height="400px"></iframe></center>
    </div>
  </div>
  <div class="container">
      
  </div> <!-- /container for BREADCRUMBS & PAGINATION -->

  

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>