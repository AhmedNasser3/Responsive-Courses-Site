@extends('Admin.dashboard')
@section('admincontent')
<!-- start loader -->
<div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
<!-- end loader -->
<!-- Start wrapper-->
<div id="wrapper">
<div class="clearfix"></div>
<div class="content-wrapper">
<div class="container-fluid">
 <div class="mt-3 row">
   <div class="col-lg-6">
	  <div class="card">
		<div class="card-body">
		<div class="card-title">Category Create</div>
		<hr>
		<form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
		@csrf
        @method('POST')
		<div class="form-group">
		<label for="input-1">title</label>
		<input type="text" name="category_title" class="form-control" id="input-1" placeholder="Enter Your title">
		</div>
		<div class="form-group">
		<label for="input-1">description</label>
		<input type="text"  name="category_description" class="form-control" id="input-1" placeholder="Enter Your description">
		</div>
		<div class="form-group">
		<div class="form-group">
		<label for="input-1">category_img</label>
        <input type="file" name="category_img" class="form-control">
    </div>
		<div class="form-group">
		<button type="submit" class="px-5 btn btn-light"><i class="icon-lock"></i>انشاء</button>
	    </div>
	    </form>
	    </div>
	</div>
</div>
@endsection
