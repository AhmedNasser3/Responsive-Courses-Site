@extends('Admin.dashboard')
@section('admincontent')
<style>
    /* General button styles */
    .toggle-btn {
        width: 60px;
        height: 30px;
        background-color: #ccc; /* Default grey background */
        border-radius: 15px;
        position: relative;
        cursor: pointer;
        transition: background-color 0.3s ease;
        border: none;
    }

    /* Circle inside the button */
    .toggle-circle {
        width: 25px;
        height: 25px;
        background-color: white;
        border-radius: 50%;
        position: absolute;
        top: 2.5px;
        left: 2.5px;
        transition: left 0.3s ease;
    }

    /* When the button is active (toggled on) */
    .active {
        background-color: #007bff; /* Blue color when active */
    }

    .active .toggle-circle {
        left: 32px; /* Move the circle to the right */
    }
    .btn-color{
        padding: 5px 10px;
        background-color: white;
        border: none;
    }
    .btn-color a{
        color: #131313;
        font-weight: 400;
    }
</style>

<div class="clearfix"></div>
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="mt-3 row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">تفعيل الكورسات للطلاب</h5>
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
					@foreach($users as $key => $users)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$users->name}}</td>
                      <td><button class="btn-color"><a href={{ '/admin/index/'.$users->id}}>تعديل الكورسات</a></button></td>
                      <td>
                        <form action="{{ route('admin.users.delete', ['userId' => $users->id]) }}" method="POST">
                            @csrf
                            @method('DELETE') <!-- تحديد أن هذا الطلب هو حذف -->
                            <input type="submit" value="مسح" style="background: rgb(136, 36, 36);border:none">
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
	  <!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->
    </div>
    <!-- End container-fluid-->
    </div><!--End content-wrapper-->










    <script>
        // JavaScript for toggling the button state and setting the value
        const toggleButton = document.getElementById('toggleButton');
        const toggleValue = document.getElementById('toggleValue');

        toggleButton.addEventListener('click', function() {
            toggleButton.classList.toggle('active'); // Toggle the 'active' class

            // Check if the button is active and set value accordingly
            if (toggleButton.classList.contains('active')) {
                toggleValue.value = 1; // If active, set value to 1
                console.log("1");
            } else {
                toggleValue.value = 0; // If not active, set value to 0
                console.log("0");
            }
        });
    </script>
@endsection
