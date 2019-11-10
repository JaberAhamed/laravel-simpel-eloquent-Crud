@extends('welcome')
@section('content')
@parent
 <div class="container">
 	<p>
 		<a href="{{ route('add.category') }}" class="btn btn-danger">Add Category</a>
 		<a href="{{ route('all.category') }}" class="btn btn-primary">All Category</a>
 	    <a href="{{ route('all.post') }}" class="btn btn-primary">All Post</a>
 		<!-- <a href="" class="btn btn-primary">All Category</a> -->
 	</p>


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
   <form  action="{{route('user.post')}}" method="post" enctype="multipart/form-data">
   	@csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Title</label>
              <input type="text" class="form-control" placeholder="Title" name='title' required >
              
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category</label>
             
              <select class="form-control" name="category_id">
              	 @foreach($allcat as $row)
              	<option value="{{$row->id}}">{{$row->name}}</option>
              	   @endforeach
   	
              </select>
           
              
            </div>
          </div>
          <hr>
          
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Image </label>
              <input type="file"  placeholder="imageupload" name='image' >
              
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Details</label>
              <textarea rows="5" class="form-control" placeholder="Details" name='details' required></textarea>
          
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Submit</button>
          </div>
        </form>
      </div>  
@endsection