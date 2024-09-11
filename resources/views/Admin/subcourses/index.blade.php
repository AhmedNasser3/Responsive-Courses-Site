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
              <button style="background: white; color:#131313; padding: 10px 15px;border:none;" class="card-title" ><a style=" color:#131313;" href={{route('subcourses.create')}}>New subcategory Table</a></button>
			  <div class="table-responsive">
               <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">SUB_SUB_CATEGORY</th>
                      <th scope="col">TITLE</th>
                      <th scope="col">DESCRIPTION</th>
                      <th scope="col">VIDEO</th>
                      <th scope="col">DELETE</th>
                      <th scope="col">EDIT</th>
                    </tr>
                  </thead>
                  <tbody>
					@foreach($subcourses as $key => $subcourses)
                    <tr>
                      <td>{{$key+1}}</td>
                      {{-- <td>{{$subcourses['sub_subcategory']['title']}}</td> --}}
                      <td>{{$subcourses->title}}</td>
                      <td>{{$subcourses->description}}</td>
                      <td><img style="width: 100px" src="{{ $subcourses->video }}"  class="course_image"></td>

					  <form action="{{ route('subcourses.delete', ['subcourses' => $subcourses]) }}" method="post">
						@csrf
						@method('delete')
                      <td><button style="background:transparent; border:none; color:white;"><a  class="delete_btn" ><i class="fa-solid fa-trash-can"></i></a>
						</td>
					  </form>
                      <td><a href="{{route('subcourses.edit', ['subcourses' => $subcourses])}}"><i class="fa-solid fa-pen-to-square"></i></a></td>
					</tr>
					@endforeach
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
