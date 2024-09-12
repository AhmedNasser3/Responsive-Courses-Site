@extends('FrontEnd.master')
@section('content')
<div class="sub">
    <div class="sub_container">
        @foreach ($visible_courses as $subcategory)
            @if ($subcategory->is_visible == 0)
                <h1>لا يمكنك الوصول الي الفديو يجب ان تدفع اولا.</h1>
            @else
                <a class="sub_text_link" href="{{ url('subcourses/' . $subcategory->courses_id) }}">
                    <div class="sub_data">
                        <div class="sub_content">
                            <div class="sub_text">
                                <h1>{{ $subcategory['subcategory_visible']['title'] }}</h1>
                                <p>{{ $subcategory['subcategory_visible']['description'] }}</p>
                            </div>
                        </div>
                    </div>
                </a>

            @endif
        @endforeach
    </div>
</div>
@endsection
