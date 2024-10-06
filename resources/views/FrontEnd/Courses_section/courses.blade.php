@extends('FrontEnd.master')
@section('content')
    <div class="course">
        <div class="course_container">
            <div class="course_data">
                <div class="course_content">
                    @foreach ($subcourses as $subcourse) <!-- تعديل التسمية -->
                    <div class="course_img">
                        <video width="1000" height="700" controls controlslist="nodownload noplaybackrate noremoteplayback" disablePictureInPicture>
                            <source src="{{ asset('storage/videos/' . $subcourse->video) }}" type="video/mp4">
                        </video>
                        <h1>{{ $subcourse->title }}</h1>
                        <h4>{{ $subcourse->description }}</h4>

                        <!-- عرض متوسط التقييمات -->
                        <h3>Average Rating: {{ $subcourse->averageRating() ?? 'No ratings yet' }}</h3>

                        <!-- عرض التقييمات -->
                        <h4>Ratings:</h4>
                        @foreach ($subcourse->ratings as $rating)
                            <div>
                                <strong>{{ $rating->user->name }}</strong> - {{ $rating->rating }} stars
                                <p>{{ $rating->comment }}</p>
                            </div>
                        @endforeach

                        <!-- نموذج لإضافة تقييم إذا كان المستخدم مسجلاً -->
                        @auth
                        <h4>Leave a Rating:</h4>
                        <form action="{{ route('ratings.store', $subcourse->id) }}" method="POST">
                            @csrf
                            <label for="rating">Rating (1-5):</label>
                            <select name="rating" id="rating" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>

                            <label for="comment">Comment:</label>
                            <textarea name="comment" id="comment"></textarea>

                            <button type="submit">Submit</button>
                        </form>
                        @endauth
                    </div>
                    <div class="course_text"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
