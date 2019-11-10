@extends('welcome')
@section('content')

 <div class="container">
 	<div>
 		<p>
 		<a href="{{ URL::to('student/create')}}" class="btn btn-success">Add Students</a>
 		
 	</p>
 	</div>
 	<div>
 		
 		<table class="table table-responsive">
 			<tr>
	 			<th>Student Id</th>
	 			<th>Student Name</th>
	 			<th>Student Email</th>
	 			<th>Student Phone</th>
	 			<th>Student Action</th>
 			</tr>
 			@foreach($student as $row)
 			<tr>
 				<td>{{$row->id}}</td>
 				<td>{{$row->name}}</td>
 				<td>{{$row->email}}</td>
 				<td>{{$row->phone}}</td>
 				<td>
 			
 					<a href="{{ URL::to('student/'.$row->id.'/edit')}}" class="btn btn-sm btn-info">Edit</a>


 					<form action="{{ URL::to('student/'.$row->id) }}"  method="post">
 						@csrf
 						@method('DELETE')
 						
                         <button class="btn btn-sm btn-danger">Delete</button>
 					</form>
 					<!-- <a href="{{ URL::to('view/student/delete/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a> -->
 					<a href="{{ URL::to('student/'.$row->id) }}" class="btn btn-sm btn-success">View</a>
 				</td>
 			</tr>
 			@endforeach
 			
 		</table>

 		
 	</div>
 	
   
@endsection
