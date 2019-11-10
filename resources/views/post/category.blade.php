@extends('welcome')
@section('content')
@parent
 <div class="container">
 	<div>
 		<p>
 		<a href="{{ route('add.category') }}" class="btn btn-danger">Add Category</a>
 		<a href="{{ route('all.category') }}" class="btn btn-primary">All Category</a>
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
   <form action="{{ route('store.cate') }}" method="post">
   	@csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category</label>
              <input type="text" class="form-control" placeholder="Category" name="name" required >
              
            </div>
          </div>
          
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug</label>
              <textarea rows="5" class="form-control" placeholder="Slug" name="slug" required></textarea>
          
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