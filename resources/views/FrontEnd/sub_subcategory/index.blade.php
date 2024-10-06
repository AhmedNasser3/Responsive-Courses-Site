@extends('FrontEnd.master')
@section('content')
<div class="sub">
    <div class="sub_container">
        @php
            $hiddenMessageShown = false; // متغير لتتبع إذا تم عرض الرسالة
        @endphp

        @foreach ($visible_courses as $key => $subcategory)
            {{-- عرض الفيديو الأول --}}
            @if ($key == 0)
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
            @else
                {{-- إخفاء الفيديوهات الأخرى إذا كانت غير مرئية --}}
                @if ($subcategory->is_visible == 0 && !$hiddenMessageShown)
                    {{-- عرض الرسالة مرة واحدة فقط --}}
                    <h1>الحصة الاولي مجانية يجب الدفع للحصول علي باقي الحصص</h1>
                    @php
                        $hiddenMessageShown = true; // تم عرض الرسالة
                    @endphp
                @elseif ($subcategory->is_visible == 1)
                    {{-- عرض الفيديوهات المرئية --}}
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
            @endif
        @endforeach
    </div>
</div>
@endsection
