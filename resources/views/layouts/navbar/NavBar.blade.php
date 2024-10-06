@php
use App\Models\Category;
   $category =  Category::all();
@endphp
<style>

.notification {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #333; /* Dark gray background */
            color: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
            visibility: hidden;
            z-index: 9999; /* Ensure it appears above other elements */
        }

        .notification.show {
            opacity: 1;
            visibility: visible;
        }
</style>
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
                @if (!Auth::check())
                    @else
                    <li  style="display: flex;"><span> <a  style="display: flex; padding:0 10px 0 0; text-decoration:none;" href="#" class="nav__link"><i class="fa-solid fa-copy"></i></a></span><a href="#" id="textToCopy"  style="text-decoration: none"  class="nav__link">{{Auth::user()->unique_code}}</a></li>
                    <div id="notification" class="notification">تم نسخ الكود الخاص بيك</div>
                @endif

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
<script>
    document.getElementById('textToCopy').addEventListener('click', function() {
        // Use Clipboard API to copy text
        navigator.clipboard.writeText(this.textContent).then(function() {
            // Show the notification
            var notification = document.getElementById('notification');
            notification.classList.add('show');

            // Hide the notification after 3 seconds
            setTimeout(function() {
                notification.classList.remove('show');
            }, 3000);
        }).catch(function(error) {
            console.error('Error copying text: ', error);
        });
    });
</script>
