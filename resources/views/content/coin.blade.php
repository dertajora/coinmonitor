@extends('layout.index')

@section('meta')
  <meta http-equiv="refresh" content="60"/>
@endsection

@section('header', 'Asset Monitoring')
  
@section('content')  
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
@endsection
 