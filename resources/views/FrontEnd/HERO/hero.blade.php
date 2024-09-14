@extends('FrontEnd.master')
@section('content')

{{-- Menu --}}

<div class="menu">
    <div class="menu_container">
        <div class="menu_data">
            @foreach($hero_menu as $hero)
            <div class="menu_content">
                <div class="menu_logo">
                    <img src="{{ asset('images/logo.png') }}" class="menu_img" alt="pic">
                </div>
                <div class="menu_text">
                    <h1>{{$hero->title}}</h1>
                    <p>{{$hero->description}}</p>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
</div>


{{-- coding --}}
{{-- Information --}}

<div class="about_title_container">
    <div class="about_title">
        <h1>احصائيات</h1>
        <div class="about_discription">
            <p style=" text-shadow: 0 0 5px #f562ff, 0 0 15px #f562ff, 0 0 25px #f562ff, 0 0 20px #f562ff, 0 0 30px #890092, 0 0 80px #890092, 0 0 80px #890092;
    color: #fccaff;
    text-shadow: 0 0 5px #ffa500, 0 0 15px #ffa500, 0 0 20px #ffa500, 0 0 40px #ffa500, 0 0 60px #ff0000, 0 0 10px #ff8d00, 0 0 98px #ff0000;
    color: #fff6a9;
    font-family: "Sacramento", cursive;
    text-align: center;
    animation: blink 12s infinite;
    -webkit-animation: blink 12s infinite;"> ----- <i class="fa-solid fa-chart-simple"></i>  -----</p>
        </div>
    </div>
</div>
<div class="info">
    <div class="info_container">
        <div class="info_data">
            <div class="info_bg">
                <div class="info_content">
                    <i style=" text-shadow: 0 0 5px #f562ff, 0 0 15px #f562ff, 0 0 25px #f562ff, 0 0 20px #f562ff, 0 0 30px #890092, 0 0 80px #890092, 0 0 80px #890092;
    color: #fccaff;
    text-shadow: 0 0 5px #00ff95, 0 0 15px #00ff55, 0 0 20px #00ff37, 0 0 40px #00ff62, 0 0 60px #eeff00, 0 0 10px #5eff00, 0 0 98px #33ff00;
    color: #a9ffe2;
    font-family: "Sacramento", cursive;
    text-align: center;
    animation: blink 12s infinite;
    -webkit-animation: blink 12s infinite;" class="fa-solid fa-graduation-cap"></i>
                    <h1>طلاب</h1>
                    <p>{{ $user }}</p>
                </div>
            </div>
        </div>
        <div class="info_data">
            <div class="info_bg">
                <div class="info_content">
                    <i style=" text-shadow: 0 0 5px #f562ff, 0 0 15px #f562ff, 0 0 25px #f562ff, 0 0 20px #f562ff, 0 0 30px #890092, 0 0 80px #890092, 0 0 80px #890092;
    color: #fccaff;
    text-shadow: 0 0 5px #ff5b5b, 0 0 15px #ff5b5b, 0 0 20px #ff5b5b, 0 0 40px #ff7c7c, 0 0 60px #ff0000, 0 0 10px #ff5b5b, 0 0 98px #ff0000;
    color: #fff6a9;
    font-family: "Sacramento", cursive;
    text-align: center;
    animation: blink 12s infinite;
    -webkit-animation: blink 12s infinite;" class="fa-solid fa-computer"></i>
                    <h1>كورسات</h1>
                    <p>6</p>
                </div>
            </div>
        </div>
        <div class="info_data">
            <div class="info_bg">
                <div class="info_content">
                    <i style="text-shadow: 0 0 5px #f562ff, 0 0 15px #f562ff, 0 0 25px #f562ff, 0 0 20px #f562ff, 0 0 30px #890092, 0 0 80px #890092, 0 0 80px #890092;
    color: #fccaff;
    text-shadow: 0 0 5px #c531ff, 0 0 15px #c531ff, 0 0 20px #c531ff, 0 0 40px #ff7cee, 0 0 60px #fa60ff, 0 0 10px #c531ff, 0 0 98px #ff92f0;
    color: #df8fff;
    font-family: "Sacramento", cursive;
    text-align: center;
    animation: blink 12s infinite;
    -webkit-animation: blink 12s infinite;" class="fa-solid fa-bars-progress"></i>
                    <h1>بروجيكت</h1>
                    <p>122</p>
                </div>
            </div>
        </div>

    </div>
</div>


{{-- About Me --}}
<div id="about" class="about_title_container">
    <div class="about_title">
        <h1>عني</h1>
        <div class="about_discription">
            <p style="text-shadow: 0 0 5px #f562ff, 0 0 15px #f562ff, 0 0 25px #f562ff, 0 0 20px #f562ff, 0 0 30px #890092, 0 0 80px #890092, 0 0 80px #890092;
    color: #fccaff;
    text-shadow: 0 0 5px #dd6cff, 0 0 15px #dd6cff, 0 0 20px #dd6cff, 0 0 40px #dd6cff, 0 0 60px #5a0a8f, 0 0 10px #5a0a8f, 0 0 98px #5a0a8f;
    color: #b089c0;
    font-family: "Sacramento", cursive;
    text-align: center;
    animation: blink 12s infinite;
    -webkit-animation: blink 12s infinite;"> ----- <i class="fa-solid fa-code"></i>  -----</p>
        </div>
    </div>
</div>
<div class="about">
    <div class="about_container">
        <div class="about_data">
            <div class="about_content">
                <div class="about_img">
                    <img src="{{ asset('images/logo.png') }}" alt="pic" class="about_image">
                </div>
                <div class="about_text">
                    <h1>Ahmed Nasser</h1>
                    <p>professional web developer with over three years of experience. Skilled in React.js, CSS, HTML, and PHP, Ahmed is proficient in using Laravel and Ajax, as well as Bootstrap and Tailwind libraries. He has worked at Software Cloud 2 and Digital Nists, and is currently employed at Deppsi.</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Courses --}}
<div class="about_title_container">
    <div class="about_title">
        <h1>كورسات</h1>
        <div class="about_discription">
            <p style="text-shadow: 0 0 5px #f562ff, 0 0 15px #f562ff, 0 0 25px #f562ff, 0 0 20px #f562ff, 0 0 30px #890092, 0 0 80px #890092, 0 0 80px #890092;
    color: #fccaff;
    text-shadow: 0 0 5px #6ceeff, 0 0 15px #6ceeff, 0 0 20px #6ceeff, 0 0 40px #6ceeff, 0 0 60px #1034ff, 0 0 10px #003cff, 0 0 98px #2f00ff;
    color: #d9fffd;
    font-family: "Sacramento", cursive;
    text-align: center;
    animation: blink 12s infinite;
    -webkit-animation: blink 12s infinite;"> ----- <i class="fa-solid fa-table-columns"></i>  -----</p>
        </div>
    </div>
</div>
<div class="course">
    <div class="course_container">
        <div class="course_data">
            @foreach ($category as $category)

            <div class="course_content">
                <div class="course_img">

                    <a href="{{url('subcategory/'.$category->id.'/'.$category->category_slug)}}">
                        <img src="{{ $category->category_img }}" alt="pic_course" class="course_image">
                    </a>
                </div>
                <div class="course_text">
                    <h1>{{ $category->category_title }}</h1>
                    <p>{{ $category->category_description }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>



{{-- icons --}}
<link href="https://unpkg.com/ionicons@4.2.2/dist/css/ionicons.min.css" rel="stylesheet">
</head>
<div class="social_container">
<div class="social">
		<ul class="social__media">
			<li>
				<a href="#">
					<i class="icon ion-logo-html5"></i>
				</a>
			</li>
			<li>
				<a href="#">
					<i class="icon ion-logo-css3"></i>
				</a>
			</li>
			<li>
				<a href="#">
					<i class="icon ion-logo-nodejs"></i>
				</a>
			</li>
			<li>
				<a href="#">
					<i class="icon ion-logo-npm"></i>
				</a>
			</li>
      <li>
				<a href="#">
					<i class="icon ion-logo-sass"></i>
				</a>
			</li>
      <li>
				<a href="#">
					<i class="icon ion-logo-angular"></i>
				</a>
			</li>
      <li>
				<a href="#">
					<i class="icon ion-logo-ionic"></i>
				</a>
			</li>
		</ul>
    </div>
</div>
@endsection
