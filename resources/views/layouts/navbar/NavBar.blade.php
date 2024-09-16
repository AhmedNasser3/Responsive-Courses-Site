@php
use App\Models\Category;
   $category =  Category::all();
@endphp
<header class="header">
    <nav class="container nav">
        <div class="nav__data">
            <a href="/"  style="text-decoration: none"  class="nav__logo">
                <i class="ri-planet-line"></i> UVOLOX
            </a>

            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-menu-line nav__burger"></i>
                <i class="ri-close-line nav__close"></i>
            </div>
        </div>
        <!--=============== NAV MENU ===============-->
        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li><a href="/"  style="text-decoration: none"  style="text-decoration: none" class="nav__link">رئيسية</a></li>

                <li><a href="#about"  style="text-decoration: none"  class="nav__link">عني</a></li>
                <li><a href="#courses"  style="text-decoration: none"  class="nav__link">كورسات</a></li>

                <!--=============== DROPDOWN 1 ===============-->
                {{-- <li class="dropdown__item">
                    <div class="nav__link">
                        كورسات <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                    </div>

                    <ul class="dropdown__menu">
                        @foreach ($category as $category)
                        <li>
                            <a href="#"  style="text-decoration: none"  class="dropdown__link">
                                <i class="ri-arrow-up-down-line"></i> {{ $category->category_title }}
                            </a>
                        </li>
                        @endforeach

                        <!--=============== DROPDOWN SUBMENU ===============-->
                    </ul>
                </li> --}}
                <!--=============== DROPDOWN 2 ===============-->
                {{-- <li class="dropdown__item">
                    <div class="nav__link">
                        مواعيد الكورسات <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                    </div>

                    <ul class="dropdown__menu">
                        <li>
                            <a href="#"  style="text-decoration: none"  class="dropdown__link">
                                <i class="ri-user-line"></i> HTML
                            </a>
                        </li>

                        <li>
                            <a href="#"  style="text-decoration: none"  class="dropdown__link">
                                <i class="ri-lock-line"></i> CSS
                            </a>
                        </li>

                        <li>
                            <a href="#"  style="text-decoration: none"  class="dropdown__link">
                                <i class="ri-message-3-line"></i> JS
                            </a>
                        </li>
                    </ul>
                </li> --}}
                <li>
                    {{-- <a href="#"  style="text-decoration: none"  class="nav__link">اخر الأخبار</a></li> --}}
                    @if (Auth::check())
                <form class="nav__link" method="POST" action="{{ route('logout') }}">
                    @csrf
                <li><a href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();" style="text-decoration: none"  class="nav__link" ><i class="fa-solid fa-right-from-bracket"></i></a></li>
                </form>
                @else
                <li><a href="{{ route('login') }}" style="text-decoration: none"  class="nav__link" >تسجيل دخول</a></li>
                @endif
                {{-- <li><a href="#"  style="text-decoration: none"  class="nav__link">تواصل معنا</a></li> --}}
            </ul>
        </div>
    </nav>
</header>
