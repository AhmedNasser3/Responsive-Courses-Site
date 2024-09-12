@extends('Admin.dashboard')
@section('admincontent')
<style>

</style>
<div class="clearfix"></div>
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="mt-3 row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">subcategory Table</h5>
            <button style="background: white; color:#131313; padding: 10px 15px;border:none;" class="card-title" >
              <a style=" color:#131313;" href={{route('subcategory.create')}}>New subcategory Table</a>
            </button>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Show Courses</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($visible as $key => $subCourses)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$subCourses['users']['name']}}</td>
                    @if ($subCourses->is_visible == 0)
                    <td style="color: rgb(187, 21, 21)">{{$subCourses->subcategory_visible->title}}</td>
                    @else
                    <td style="color: #8fff8f">{{$subCourses->subcategory_visible->title}}</td>
                    @endif
                    <td>
                      <form action="{{ route('admin.update-visibility', ['course_id' => $subCourses->subcategory_visible->id]) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- استخدام PUT بدلاً من POST -->

                        <input type="hidden" name="users_id" value="{{ $subCourses->users_id }}">
                        <input type="hidden" name="courses_id" value="{{ $subCourses->courses_id }}">
                        <input type="hidden" name="sub_id" value="{{ $subCourses->sub_id }}">
                        <input type="hidden" name="is_visible" value="{{ $subCourses->is_visible == 0 ? 1 : 0 }}"> <!-- عكس القيمة الحالية -->

                        <!-- زر تفعيل/إلغاء التفعيل -->
                        <button type="submit" style="background: none; border: none; cursor: pointer;">
                          <span class="toggle-btn" style="background-color: {{ $subCourses->is_visible ? 'green' : 'red' }}; padding: 10px; color: white;">
                            {{ $subCourses->is_visible ? 'Deactivate' : 'Activate' }}
                          </span>
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div><!--End Row-->
    <div class="overlay toggle-menu"></div>
  </div>
</div><!--End content-wrapper-->
@endsection
