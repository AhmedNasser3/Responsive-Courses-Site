@extends('Admin.dashboard')
@section('admincontent')
<div class="clearfix"></div>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row mt-3">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Hero Table</h5>
              <button style="background: white; color:#131313; padding: 10px 15px;border:none;" class="card-title" ><a style=" color:#131313;" href={{route('hero.create')}}>New Hero Table</a></button>
			  <div class="table-responsive">
               <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">TITLE</th>
                      <th scope="col">DESCRIPTION</th>
                      <th scope="col">DELETE</th>
                      <th scope="col">EDIT</th>
                    </tr>
                  </thead>
                  <tbody>
					@foreach($hero_index as $key => $hero)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$hero->title}}</td>
                      <td>{{$hero->description}}</td>
					  <form action="{{ route('hero.delete', ['hero' => $hero]) }}" method="post">
						@csrf
						@method('delete')
                      <td><button style="background:transparent; border:none; color:white;"><a  class="delete_btn" ><i class="fa-solid fa-trash-can"></i></a>
						</td>
					  </form>
                      <td><a href="{{route('hero.edit', ['hero' => $hero])}}"><i class="fa-solid fa-pen-to-square"></i></a></td>
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