@extends('Admin.dashboard')
@section('admincontent')
<!-- start loader -->
<div id="pageloader-overlay" class="visible incoming">
    <div class="loader-wrapper-outer">
        <div class="loader-wrapper-inner">
            <div class="loader"></div>
        </div>
    </div>
</div>
<!-- end loader -->

<!-- Start wrapper -->
<div id="wrapper">
    <div class="clearfix"></div>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="mt-3 row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Create Course</div>
                            <hr>
                            <form id="uploadForm" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="sub_sub_categories_id">Sub Sub Category</label>
                                    <select name="sub_sub_categories_id" id="sub_sub_categories_id" class="form-control">
                                        <option value="" selected="" disabled="">Select Category</option>
                                        @foreach($sub_subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter Your title">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" id="description" class="form-control" placeholder="Enter Your description">
                                </div>

                                <div class="form-group">
                                    <label for="video">Upload Video</label>
                                    <input type="file" name="video" id="video" class="form-control" accept="video/*">
                                </div>

                                <div class="form-group">
                                    <button type="button" class="px-5 btn btn-light" onclick="uploadVideo()">Upload</button>
                                    <button type="button" id="saveButton" class="px-5 btn btn-primary" onclick="saveCourse()" style="display: none;">Save</button>
                                </div>

                                <!-- Progress bar -->
                                <progress id="progressBar" value="0" max="100" style="width:100%;"></progress>
                                <p id="status"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Axios script for handling video upload with progress -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    let uploadedVideoPath = '';

    function uploadVideo() {
        const formData = new FormData();
        formData.append('video', document.getElementById('video').files[0]);
        formData.append('title', document.getElementById('title').value);
        formData.append('description', document.getElementById('description').value);
        formData.append('sub_sub_categories_id', document.getElementById('sub_sub_categories_id').value);

        const progressBar = document.getElementById('progressBar');
        const status = document.getElementById('status');

        axios.post('{{ route('subcourses.store') }}', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            },
            onUploadProgress: function (progressEvent) {
                let percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                progressBar.value = percentCompleted;
                status.innerHTML = percentCompleted + '% uploaded';
            }
        })
        .then(function (response) {
            status.innerHTML = 'Upload complete!';
            uploadedVideoPath = response.data.video_path; // Save the video path
            document.getElementById('saveButton').style.display = 'inline-block'; // Show the Save button
            console.log(response.data);
        })
        .catch(function (error) {
            status.innerHTML = 'Upload failed!';
            console.error(error);
        });
    }

    function saveCourse() {
        if (!uploadedVideoPath) {
            alert('Please upload a video first.');
            return;
        }

        const formData = new FormData();
        formData.append('video_path', uploadedVideoPath);
        formData.append('title', document.getElementById('title').value);
        formData.append('description', document.getElementById('description').value);
        formData.append('sub_sub_categories_id', document.getElementById('sub_sub_categories_id').value);

        axios.post('{{ route('subcourses.store') }}', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(function (response) {
            alert('Course saved successfully!');
            window.location.reload(); // Refresh the page to clear the form
        })
        .catch(function (error) {
            alert('Failed to save course.');
            console.error(error);
        });
    }
</script>
@endsection
