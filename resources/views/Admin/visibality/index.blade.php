@extends('Admin.dashboard')
@section('admincontent')
@extends('Admin.dashboard')
@section('admincontent')
<div class="clearfix"></div>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="mt-3 row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">subcategory Table</h5>
              <button style="background: white; color:#131313; padding: 10px 15px;border:none;" class="card-title" ><a style=" color:#131313;" href={{route('subcategory.create')}}>New subcategory Table</a></button>
			  <div class="table-responsive">
               <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">User ID</th>
                      <th scope="col">Sub Sub category ID</th>
                      <th scope="col">visible</th>
                    </tr>
                  </thead>
                  <tbody>
					@foreach($visible as $key => $visible)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$visible['category']['category_title']}}</td>
                      <td>{{$visible->users_id}}</td>
                      <td>{{$visible->courses_id}}</td>
                  </tbody>
                </table>
            </div>
            </div>
          </div>
        </div>
      </div><!--End Row-->
	  <!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->
    </div>
    <!-- End container-fluid-->
    </div><!--End content-wrapper-->
@endsection

@endsection
