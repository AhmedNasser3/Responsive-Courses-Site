@extends('Admin.dashboard')

@section('admincontent')
<style>
  .card-title {
    font-size: 1.25rem;
  }
  .btn-custom {
    background: white;
    color: #131313;
    padding: 10px 15px;
    border: none;
    text-decoration: none;
  }
  .btn-custom:hover {
    color: #0056b3;
    text-decoration: underline;
  }
  .btn-add-all-courses {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
  }
  .btn-add-all-courses:hover {
    background-color: #0056b3;
  }
  .table td {
    vertical-align: middle;
  }
  .toggle-btn {
    display: inline-block;
    padding: 10px;
    color: white;
    border-radius: 5px;
    cursor: pointer;
  }
  .toggle-btn.activate {
    background-color: green;
  }
  .toggle-btn.deactivate {
    background-color: red;
  }
</style>

<div class="clearfix"></div>
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="mt-3 row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">              <h5 class="card-title">تفعيل الكورسات للطلاب</h5>
        </h5>
            <div class="mb-3">
              <!-- Add button for adding all courses to the user -->
              <form action="{{ route('admin.add-all-courses', ['userId' => $userId]) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn-add-all-courses">
                  اضف جميع الكورسات للطالب
                </button>
              </form>
            </div>
            <div class="table-responsive mt-3">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">المستخدم</th>
                    <th scope="col">الحصة</th>
                    <th scope="col">المحاضرة</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($visible as $key => $subCourses)
                  <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $subCourses->users->name ?? 'N/A' }}</td>
                    <td style="color: {{ $subCourses->is_visible ? '#8fff8f' : 'rgb(187, 21, 21)' }}">
                      {{ $subCourses->subcategory_visible->title ?? 'N/A' }}
                    </td>
                    <td style="color: {{ $subCourses->is_visible ? '#8fff8f' : 'rgb(187, 21, 21)' }}">
                      {{ $subCourses->scategory_visible->subcategory_title ?? 'N/A' }}
                    </td>
                    <td>
                      <form action="{{ route('admin.update-visibility', ['course_id' => $subCourses->subcategory_visible->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="users_id" value="{{ $subCourses->users_id }}">
                        <input type="hidden" name="courses_id" value="{{ $subCourses->courses_id }}">
                        <input type="hidden" name="sub_id" value="{{ $subCourses->sub_id }}">
                        <input type="hidden" name="is_visible" value="{{ $subCourses->is_visible == 0 ? 1 : 0 }}">
                        <button type="submit" style="background: none; border: none; cursor: pointer;">
                          <span class="toggle-btn {{ $subCourses->is_visible ? 'activate' : 'deactivate' }}">
                            {{ $subCourses->is_visible ? 'ايقاف الحصة' : 'تفعيل الحصة' }}
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
    </div><!-- End Row -->
    <div class="overlay toggle-menu"></div>
  </div>
</div><!-- End content-wrapper -->
@endsection
