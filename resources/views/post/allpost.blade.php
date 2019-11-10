@extends('welcome')
@section('content')
@parent
 <div class="container">
 	<div>
 		
 		<table class="table table-responsive">
 			<tr>
	 			<th>PostId</th>
	 			<th>Category id</th>
	 			<th>Title</th>
	 			<th>Images</th>
	 			<th>Details</th>
 			</tr>
 			@foreach($all_post as $row)
 			<tr>
 				<td>{{$row->id}}</td>
 				<td>{{$row->name}}</td>
 				<td>{{$row->title}}</td>
 				<td><img src="{{ URL::to($row->image) }}" style="height: 40px; width: 70px;"></td>
 				<td>{{$row->details}}</td>
 				<td>
 					<a href="{{ URL::to('view/postedit/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
 					<a href="{{ URL::to('view/deletepost/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
 					<a href="{{ URL::to('view/singlepost/'.$row->id)}}" class="btn btn-sm btn-success">PostView</a>
 				</td>
 			</tr>
 			@endforeach
 			
 		</table>

 		
 	</div>
 	
   
@endsection