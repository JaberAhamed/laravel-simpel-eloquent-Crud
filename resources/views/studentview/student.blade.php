@extends('welcome')
@section('content')

 <div class="container">
 	<div>
 		<p>
 		<a href="" class="btn btn-success">All Students</a>
 		
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
   <form action="{{URL::to('student') }}" method="post">
   	@csrf
   	          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student</label>
              <input type="text" class="form-control" placeholder="Student Name" name="name" required >
              
            </div>
          </div>
          
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Email</label>
              <input type="text" class="form-control" placeholder="Student Email" name="email" required/>
          
            </div>
          </div>
           <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Phone</label>
              <input type="text"  class="form-control" placeholder="Student Phone" name="phone" required/>
          
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