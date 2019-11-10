@extends('welcome')
@section('content')
@parent
 <div class="container">
	 	<div>
	 		@foreach($allpost as $row)
	 		<a href="{{ URL::to('view/singlepost/'.$row->id) }}">
	 		<img src="{{ URL::to($row->image)}}" style="height: 100px; width: 150px ">
	 		<h2>{{ $row->title}}</h2>
	 		</a>
	 	    </br>
	 		<p>{{$row->name}}</p>
	 		 </br>
	 		<p>{{$row->details}}</p>
	        @endforeach

	        {{ $allpost->links() }}
	 		
	 	</div>

        
 </div>
 	
   
@endsection