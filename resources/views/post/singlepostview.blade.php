@extends('welcome')
@section('content')
@parent
 <div class="container">
 	<div>
 		
 			<h2>{{$all_post_view->title}}</h2>
 			<h3>{{$all_post_view->name}}</h3>
 			<img src="{{URL::to($all_post_view->image)}}">
 			<h4>{{$all_post_view->details}}</h4>

 	

 		
 	</div>
 	
   
@endsection