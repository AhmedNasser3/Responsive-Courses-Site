@extends('FrontEnd.master')
@section('content')
    <div class="course">
        <div class="course_container">
            <div class="course_data">
                <div class="course_content">
                    @foreach ($subcourses as $subcourses)
                    <div class="course_img">
                        <video width="1000" height="700" controls controlslist="nodownload noplaybackrate noremoteplayback" disablePictureInPicture>
                            <source src="{{ asset('storage/videos/' . $subcourses->video) }}" type="video/mp4">
                            </video>
                            <h1>{{ $subcourses->title }}</h1>
                            <h4>{{ $subcourses->description }}</h4>
                        </div>
                        <div class="course_text"></div>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>

@endsection
