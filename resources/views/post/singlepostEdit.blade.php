@extends('welcome')
@section('content')
@parent
 <div class="container">
 	<p>
 		
 		
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
   <form  action="{{ URL::to('view/singlepostedit/'.$allpost->id) }}"  method="post"  enctype="multipart/form-data">
   	@csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Title</label>
              <input type="text" class="form-control" value="{{$allpost->title}}"  name='title' required >
              
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category</label>
             
              <select class="form-control" name="category_id">
              	 @foreach($allcat as $row)
              	<option value="{{$row->id}}" <?php if ($row->id==$allpost->category_id) echo "selected ";?> >
              		{{ $row->name  }}</option>s
              	   @endforeach
   	
              </select>
           
              
            </div>
          </div>
          <hr>
          
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>New image </label>
              <input type="file"  placeholder="imageupload" name='image' >
              
            </div>
          </div>
          </br>
          </br>
           <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <h4>Old Image </h4>
              <img src="{{URL::to($allpost->image)  }}" >
              <input type="hidden" name="old_image" value="{{$allpost->image}}">
              
            </div>
          </div>



          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Details</label>
              <textarea rows="5" class="form-control"  name='details' required>
              	{{$allpost->details}} 
              </textarea>
          
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
          </div>
        </form>
      </div>  
@endsection