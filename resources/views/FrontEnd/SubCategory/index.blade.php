@extends('FrontEnd.master')
@section('content')
@if (!Auth::check())

<style>
    .error_bg{
        background: rgb(15, 15, 15);
        height: 100vh;
        display: grid;
        justify-content: center;
        align-content: center;
        text-align: center;
    }
</style>
<div class="error_bg">
    <h1>يجب تسجيل دخولك اولا للاشتراك في الكورس</h1>
    <h3>اضغط علي علامة الواتس اب بالاسفل علي اليمين للتواصل معنا والاشتراك بالكورس</h3>
    <div style="background: white; padding:10px 20px;">
        <a href="{{ route('login') }}" style="font-size:1.2rem;color: rgb(0, 0, 0); text-decoration:none; padding:10px 20px">تسجيل الدخول</a>
    </div>
</div>
    @else
<div class="sub">
    <div class="sub_container">
        @foreach ($subcategories as $subcategory)

        <a class="sub_text_link" href="{{ url('sub_subcategory/' . $subcategory->id . '/' . Auth::id() . '/' . $subcategory->subcategory_slug) }}">
            <div class="sub_data">
                <div class="sub_content">
                    <div class="sub_text">
                        <h1>{{ $subcategory->subcategory_title}}</h1>
                        <p>{{ $subcategory->subcategory_description}}</p>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endif
@endsection
