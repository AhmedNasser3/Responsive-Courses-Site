@extends('Admin.dashboard')
@section('admincontent')
<div class="col-4">
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
<form method="post" action="{{ route('sub_subcategory.store') }}" >
@csrf
@method('POST')
<div class="form-group">
<label for="input-1">subcategory</label>
<select name="sub_categories_id" class="form-control"  >
<option value="" selected="" disabled="" class="form-control">Select Category</option>
@foreach($subcategory as $subcategory)
<option value="{{ $subcategory->id }}" class="form-control">{{ $subcategory->subcategory_title }}</option>
@endforeach
</div>
<div class="form-group">
<label for="input-1">sub_subcategory_title</label>
<input type="text"  name="title" class="form-control" id="input-1" placeholder="Enter Your description">
</div>
<div class="form-group">
<label for="input-1">sub_subcategory_description</label>
<input type="text"  name="description" class="form-control" id="input-1" placeholder="Enter Your description">
</div>
<div class="form-group">
<button type="submit" class="px-5 btn btn-light"><i class="icon-lock"></i>انشاء</button>
</div>
</form>
</div>
</div>
</div>
@endsection
