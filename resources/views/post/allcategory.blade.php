@extends('welcome')
@section('content')
@parent
 <div class="container">
 	<div>
 		)
 		<table class="table table-responsive">
 			<tr>
	 			<th>CatId</th>
	 			<th>Category Name</th>
	 			<th>Category Slug</th>
	 			<th>Category Created at</th>
	 			<th>Category Action</th>
 			</tr>
 			@foreach($allcat as $row)
 			<tr>
 				<td>{{$row->id}}</td>
 				<td>{{$row->name}}</td>
 				<td>{{$row->slug}}</td>
 				<td>{{$row->created_at}}</td>
 				<td>
 					<a href="{{ URL::to('view/update/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
 					<a href="{{ URL::to('view/deletecat/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
 					<a href="{{ URL::to('view/singlecat/'.$row->id)}}" class="btn btn-sm btn-success">View</a>
 				</td>
 			</tr>
 			@endforeach
 			
 		</table>

 		
 	</div>
 	
   
@endsection