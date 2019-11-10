@extends('welcome')
@section('content')
@parent
 <div class="container">
 	<div>
 		<ol>
 			<li>{{$cat->name}}</li>
 			<li>{{$cat->slug}}</li>
 			<li>{{$cat->created_at}}</li>

 		</ol>

 		
 	</div>
 	
   
@endsection