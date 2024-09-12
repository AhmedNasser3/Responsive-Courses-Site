  <!--Start sidebar-wrapper-->
  <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
     <a href="{{ route('admin.dashboard') }}">
      <img src="{{ asset('images/logo.png') }}"class="logo-icon" alt="logo icon">
      <h5 class="logo-text">Admin</h5>
    </a>
  </div>
  <ul class="sidebar-menu do-nicescrol">
     <li class="sidebar-header"><a href="{{ route('admin.dashboard') }}">البار الرئيسية</a></li>
     <li>
       <a href="{{ route('admin.dashboard') }}">
         <i class="zmdi zmdi-view-dashboard"></i> <span>رئيسية</span>
       </a>
     </li>
     <li>
       <a href="{{route('hero.index')}}">
        <i class="zmdi zmdi-format-list-bulleted"></i> <span>Add  Hero Menu</span>
       </a>
     </li>
     <li>
       <a href="{{ route('category.index') }}">
         <i class="zmdi zmdi-format-list-bulleted"></i> <span>Add Category</span>
       </a>
     </li>
     <li>
       <a href="{{ route('subcategory.index') }}">
        <i class="zmdi zmdi-format-list-bulleted"></i><span>Add Subcategory</span>
       </a>
     </li>
     <li>
     <li>
       <a href="{{ route('sub_subcategory.index') }}">
        <i class="zmdi zmdi-format-list-bulleted"></i> <span>Add Sub Subcategory</span>
       </a>
     </li>
     <li>
     <li>
       <a href="{{ route('video.index') }}">
        <i class="zmdi zmdi-format-list-bulleted"></i> <span>Add Videos of Courses</span>
       </a>
     </li>
     <li>
     <li>
     <li>
       <a href="{{ route('admin.index') }}">
        <i class="zmdi zmdi-format-list-bulleted"></i> <span>Edit Courses For Users</span>
       </a>
     </li>
     <li>
       <a href="profile.html">
        <i class="fa-solid fa-user"></i> <span>حسابي</span>
       </a>
     </li>
     <li>
       <a href="login.html" target="_blank">
        <form action="{{ route('admin.logout') }}" method="post">
            @csrf
            <i class="fa-solid fa-right-from-bracket"></i><span>تسجيل خروج من الأدمن</span>
        </form>
       </a>
     </li>
     <li class="sidebar-header">LABELS</li>
     <li><a href="javaScript:void();"><i class="zmdi zmdi-coffee text-danger"></i> <span>Important</span></a></li>
     <li><a href="javaScript:void();"><i class="zmdi zmdi-chart-donut text-success"></i> <span>Warning</span></a></li>
     <li><a href="javaScript:void();"><i class="zmdi zmdi-share text-info"></i> <span>Information</span></a></li>
   </ul>
  </div>
  <!--End sidebar-wrapper-->
