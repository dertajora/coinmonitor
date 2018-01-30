@extends('layout.index')

@section('header', 'Chart Monitoring')	

@section('content')
	
	@foreach($data as $row => $value)
	<div class="container">
      	<h3 id="h3-navbars" class="h3-marks">{{$value}}</h3>
  	</div>

  	<div class="container">
  	  <center>
  	  <div class="card-columns one-ui-kit-example-container">
  	      <iframe src="https://vip.bitcoin.co.id/chart/{{$row}}" width="1048px" height="400px"></iframe>
  	  </div>
  	  </center>
  	</div>
  	@endforeach

@endsection