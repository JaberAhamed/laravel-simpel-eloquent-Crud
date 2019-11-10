@extends('welcome')
@section('content')
@parent
 <div class="container">
 	
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
   <form action="{{ URL::to('view/updatecat/'.$updatecat->id)}}" method="post">
   	@csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category</label>
              <input type="text" class="form-control" placeholder="Category" value="{{$updatecat->name}}" name="name">
              
            </div>
          </div>
          
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug</label>
              <input type="text"  rows="5" class="form-control" placeholder="Slug" value="{{$updatecat->slug}}" name="slug">
          
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" >Update</button>
          </div>
          
        </form>
@endsection