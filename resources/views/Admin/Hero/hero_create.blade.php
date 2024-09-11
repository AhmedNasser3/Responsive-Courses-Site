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

 <div class="row mt-3">
   <div class="col-lg-6">
	  <div class="card">
		<div class="card-body">
		<div class="card-title">HERO MENU</div>
		<hr>
		 <form method="POST" action="{{route('hero.store')}}">
			@csrf
      @method('POST')

		<div class="form-group">
		 <label for="input-1">title</label>
		 <input type="text" name="title" class="form-control" id="input-1" placeholder="Enter Your title">
		</div>
		<div class="form-group">
		 <label for="input-1">description</label>
		 <input type="text"  name="description" class="form-control" id="input-1" placeholder="Enter Your description">
		</div>
		<div class="form-group">
		 <button type="submit" class="btn btn-light px-5"><i class="icon-lock"></i>انشاء</button>
	   </div>
	   </form>
	  </div>
	  </div>
   </div>
@endsection
