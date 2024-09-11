@extends('Admin.dashboard')
@section('admincontent')<div class="col-4">
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
<form method="put" action="{{ route('subcategory.update', ['subcategory' => $subcategory]) }}" >
@csrf
@method('put')
<input type="hidden" name="id" value="{{ $subcategory->id }}">


<div class="form-group">
<label for="input-1">category</label>
<select name="category_id" class="form-control"  >
<option value="" selected="" disabled="" class="form-control">Select Category</option>
@foreach($categories as $category)
<option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected': ''}} >{{ $category->category_name_en }}</option>
           @endforeach


<div class="form-group">
<label for="input-1">subcategory_title</label>
<input type="text" value="{{ $subcategory->subcategory_title}}"  name="subcategory_title" class="form-control" id="input-1" placeholder="Enter Your description">
</div>
<div class="form-group">
<label for="input-1">subcategory_description</label>
<input type="text" value="{{ $subcategory->subcategory_description}}"  name="subcategory_description" class="form-control" id="input-1" placeholder="Enter Your description">
</div>
<div class="form-group">
<label for="input-1">subcategory_img</label>
<input type="text" value="{{ $subcategory->subcategory_img}}"  name="subcategory_img" class="form-control" id="input-1" placeholder="Enter Your description">
</div>


<div class="form-group">
<button type="submit" class="px-5 btn btn-light"><i class="icon-lock"></i>انشاء</button>
</div>
</form>
</div>
</div>
</div>
@endsection
