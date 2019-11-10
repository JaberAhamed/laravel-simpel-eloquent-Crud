@extends('welcome')
@section('content')
@parent
 <div class="container">
 	<div>
 	
 		<table class="table table-responsive">
 			<tr>
	 			<th>Student Id</th>
	 			<th>Student Name</th>
	 			<th>Student Email</th>
	 			<th>Student Phone</th>
	 			
 			</tr>
 			
 			<tr>
 				<td>{{$student->id}}</td>
 				<td>{{$student->name}}</td>
 				<td>{{$student->email}}</td>
 				<td>{{$student->phone}}</td>
 				
 			</tr>
 		
 			
 		</table>

 		
 	</div>
 	
   
@endsection
