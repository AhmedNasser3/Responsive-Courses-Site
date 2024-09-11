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
		<div class="card-title">Category Edit</div>
		<hr>
		<form method="get" action="{{route('category.update', ['category' => $category])}}" enctype="multipart/form-data">
		@csrf
        @method('get')
		<div class="form-group">
		<label for="input-1">title</label>
		<input type="text" name="category_title" class="form-control" id="input-1" value="{{ $category->category_title }}" placeholder="Enter Your title">
		</div>
		<div class="form-group">
		<label for="input-1">description</label>
		<input type="text"  name="category_description" class="form-control" id="input-1" value="{{ $category->category_description}}" placeholder="Enter Your description">
		</div>
		<div class="form-group">
		<div class="form-group">
		<label for="input-1">category_img</label>
        <img src="{{ URL::to($category->category_img) }}" style="height: 80px; width: 130px;">
        <input type="file" name="old_image" value="{{ $category->category_img }}">
        </div>
		<div class="form-group">
		<button type="submit" class="px-5 btn btn-light"><i class="icon-lock"></i>انشاء</button>
	    </div>
	    </form>
	    </div>
	</div>
</div>


<script type="text/javascript">
    function readURL(input){
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#one')
          .attr('src', e.target.result)
          .width(80)
          .height(80);
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
@endsection
