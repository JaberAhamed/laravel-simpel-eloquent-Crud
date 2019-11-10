@extends('welcome')
@section('content')

 <div class="container">
 	<div>
 		<p>
 		<a href="{{ URL::to('student') }}" class="btn btn-success">All Students</a>
 		
 	</p>
 	</div>
 	<div>
 		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
      @endif
 	</div>
   <form action="{{URL::to('student/'.$student->id)}}" method="post">
   	@csrf
   	@method('PUT')
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student</label>
              <input type="text" class="form-control" value="{{ $student->name }}" name="name" required >
              
            </div>
          </div>
          
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Email</label>
              <input type="text" class="form-control" value="{{ $student->email }}" name="email" required/>
          
            </div>
          </div>
           <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Phone</label>
              <input type="text"  class="form-control" value="{{ $student->phone }}" name="phone" required/>
          
            </div>
          </div>



          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" >Submit</button>
          </div>
          
        </form>
   </div>
@endsection