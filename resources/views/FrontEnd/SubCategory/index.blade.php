@extends('FrontEnd.master')
@section('content')
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
@endsection
