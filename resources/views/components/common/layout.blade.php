@props(['title' => 'لوحة التحكم'])
<!DOCTYPE html>
<html dir="rtl">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>{{$title}}</title>
    <meta property="og:type" content=""/>
    <meta property="og:title" content=""/>
    <meta property="og:description" content=" "/>
    <meta property="og:image" content=""/>
    <meta property="og:image:width" content=""/>
    <meta property="og:image:height" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=" "/>
    <meta property="og:ttl" content=""/>
    <meta name="twitter:course" content=""/>
    <meta name="twitter:domain" content=""/>
    <meta name="twitter:site" content=""/>
    <meta name="twitter:creator" content=""/>
    <meta name="twitter:image:src" content=""/>
    <meta name="twitter:description" content=""/>
    <meta name="twitter:title" content=" "/>
    <meta name="twitter:url" content=""/>
    <meta name="description" content="  "/>
    <meta name="keywords" content=""/>
    <meta name="author" content=""/>
    <meta name="copyright" content=" "/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&amp;display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/smart_wizard_all.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/tempus-dominus.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/plyr.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/summernote-bs5.min.css')}}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.rtl.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/toastr.min.css')}}"/>
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css')}}"> -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css')}}"/>
  </head>
  <body>
    <!-- begin:: Page -->
    <div class="dashboard">
        <div id="loader">
            <span class="loader"></span>
        </div>
      <div class="dashboard-container">
      <!-- begin:: aside -->
      @php
          $role = auth()->user()->getRoleNames()->first();
      @endphp
      <aside class="sidebar">
          <div class="sidebar-header d-none d-lg-block text-center">
            <a href="{{route('main')}}"><img class="logo" src="{{asset('assets/images/logo-white.svg')}}" alt=""/></a>
          </div>
          <ul class="sidebar-menu">
            @switch($role)
              @case('admin')
                <li class="menu-item"><a class="{{ request()->routeIs($role.'.dashboard') ? 'active' : '' }} menu-link" href="{{route($role.'.dashboard')}}"><span class="menu-icon"><img src="{{asset('assets/images/home.svg')}}" alt=""/></span><span class="menu-text"> الصفحة الرئيسية</span></a></li>
                <li class="menu-item"><a class="{{ request()->routeIs($role.'.courses.*') ? 'active' : '' }} menu-link" href="{{route($role.'.courses.index')}}"><span class="menu-icon"><img src="{{asset('assets/images/audio-book.svg')}}" alt=""/></span><span class="menu-text"> الدورات</span></a></li>
                <li class="menu-item"><a class="{{ request()->routeIs($role.'.exams.*') ? 'active' : '' }} menu-link" href="{{route($role.'.exams.index')}}"><span class="menu-icon"><img src="{{asset('assets/images/property-edit.svg')}}" alt=""/></span><span class="menu-text">  الاختبارات</span></a></li>
                <li class="menu-item"><a class="{{ request()->routeIs($role.'.reports.*') ? 'active' : '' }} menu-link" href="{{route($role.'.reports.index')}}"><span class="menu-icon"><img src="{{asset('assets/images/file.svg')}}" alt=""/></span><span class="menu-text">  التقارير</span></a></li>
                <li class="menu-item"><a class="{{ request()->routeIs($role.'.packages.*') ? 'active' : '' }} menu-link" href="{{route($role.'.packages.index')}}"><span class="menu-icon"><img src="{{asset('assets/images/subtitle.svg')}}" alt=""/></span><span class="menu-text"> الباقات</span></a></li>
                <li class="menu-item"><a class="{{ request()->routeIs($role.'.associations.*') ? 'active' : '' }} menu-link" href="{{route($role.'.associations.index')}}"><span class="menu-icon"><img src="{{asset('assets/images/city3.svg')}}" alt=""/></span><span class="menu-text">  الجمعيات</span></a></li>
                <li class="menu-item"><a class="{{ ( request()->routeIs($role.'.users.*') ||  request()->routeIs($role.'.roles.*')) ? 'active' : '' }} menu-link" href="{{route($role.'.users.index')}}"><span class="menu-icon"><img src="{{asset('assets/images/user3.svg')}}" alt=""/></span><span class="menu-text">  إدارة المستخدمين</span></a></li>
                @break
              @case('association')
                <li class="menu-item"><a class="{{ request()->routeIs($role.'.dashboard') ? 'active' : '' }} menu-link" href="{{route($role.'.dashboard')}}"><span class="menu-icon"><img src="{{asset('assets/images/home.svg')}}" alt=""/></span><span class="menu-text"> الصفحة الرئيسية</span></a></li>
                <li class="menu-item"><a class="{{ request()->routeIs($role.'.training-opportunities.*') ? 'active' : '' }} menu-link" href="{{route($role.'.training-opportunities.index')}}"><span class="menu-icon"><img src="{{asset('assets/images/briefcase2.svg')}}" alt=""/></span><span class="menu-text">فرص التدريب التعاوني</span></a></li>
                <li class="menu-item"><a class="{{ request()->routeIs($role.'.trainees.*') ? 'active' : '' }} menu-link" href="{{route($role.'.trainees.index')}}"><span class="menu-icon"><img src="{{asset('assets/images/agreement.svg')}}" alt=""/></span><span class="menu-text"> المتدربين</span></a></li>
                <li class="menu-item"><a class="{{ request()->routeIs($role.'.reports.*') ? 'active' : '' }} menu-link" href="{{route($role.'.reports.index')}}"><span class="menu-icon"><img src="{{asset('assets/images/file.svg')}}" alt=""/></span><span class="menu-text">  التقارير</span></a></li>
                <li class="menu-item"><a class="{{ request()->routeIs($role.'.assessments.*') ? 'active' : '' }} menu-link" href="{{route($role.'.assessments.index')}}"><span class="menu-icon"><img src="{{asset('assets/images/property-edit.svg')}}" alt=""/></span><span class="menu-text"> التقييم النهائي</span></a></li>
                <li class="menu-item"><a class="{{ request()->routeIs($role.'.articles.*') ? 'active' : '' }} menu-link" href="{{route($role.'.articles.index')}}"><span class="menu-icon"><img src="{{asset('assets/images/book.svg')}}" alt=""/></span><span class="menu-text"> المقالات</span></a></li>
              @break
              @case('consultant')
              @case('faculty-member')
                <li class="menu-item"><a class="{{ request()->routeIs($role.'.dashboard') ? 'active' : '' }} menu-link" href="{{route($role.'.dashboard')}}"><span class="menu-icon"><img src="{{asset('assets/images/home.svg')}}" alt=""/></span><span class="menu-text"> الصفحة الرئيسية</span></a></li>
                <li class="menu-item"><a class="{{ request()->routeIs($role.'.trainees.*') ? 'active' : '' }} menu-link" href="{{route($role.'.trainees.index')}}"><span class="menu-icon"><img src="{{asset('assets/images/agreement.svg')}}" alt=""/></span><span class="menu-text"> المتدربين</span></a></li>
                <li class="menu-item"><a class="{{ request()->routeIs($role.'.reports.*') ? 'active' : '' }} menu-link" href="{{route($role.'.reports.index')}}"><span class="menu-icon"><img src="{{asset('assets/images/file.svg')}}" alt=""/></span><span class="menu-text">  التقارير</span></a></li>
                <li class="menu-item"><a class="{{ request()->routeIs($role.'.assessments.*') ? 'active' : '' }} menu-link" href="{{route($role.'.assessments.index')}}"><span class="menu-icon"><img src="{{asset('assets/images/catalogue.svg')}}" alt=""/></span><span class="menu-text"> التقييم النهائي</span></a></li>
                <li class="menu-item"><a class="{{ request()->routeIs($role.'.notes.*') ? 'active' : '' }} menu-link" href="{{route($role.'.notes.index')}}"><span class="menu-icon"><img src="{{asset('assets/images/property-edit.svg')}}" alt=""/></span><span class="menu-text">  ملاحظات</span></a></li>
             @break
              @case('individual')
                <li class="menu-item"><a class="{{ request()->routeIs($role.'.dashboard') ? 'active' : '' }} menu-link" href="{{route($role.'.dashboard')}}"><span class="menu-icon"><img src="{{asset('assets/images/home.svg')}}" alt=""/></span><span class="menu-text"> الصفحة الرئيسية</span></a></li>
                <li class="menu-item"><a class="{{ request()->routeIs($role.'.training-opportunities.*') ? 'active' : '' }} menu-link" href="{{route($role.'.training-opportunities.index')}}"><span class="menu-icon"><img src="{{asset('assets/images/briefcase2.svg')}}" alt=""/></span><span class="menu-text"> استكشف الفرص التدريبية</span></a></li>
                <li class="menu-item"><a class="{{ request()->routeIs($role.'.training-opportunity-applications') ? 'active' : '' }} menu-link" href="{{route($role.'.training-opportunity-applications')}}"><span class="menu-icon"><img src="{{asset('assets/images/catalogue.svg')}}" alt=""/></span><span class="menu-text">طلباتي</span></a></li>
                <li class="menu-item"><a class="{{ request()->routeIs($role.'.reports.*') || request()->routeIs($role.'.assessments.*') ? 'active' : '' }} menu-link" href="{{route($role.'.reports.index')}}"><span class="menu-icon"><img src="{{asset('assets/images/file.svg')}}" alt=""/></span><span class="menu-text">التقييمات والتقارير</span></a></li>
                <li class="menu-item"><a class="{{ request()->routeIs($role.'.courses') ? 'active' : '' }} menu-link" href="{{route($role.'.courses')}}"><span class="menu-icon"><img src="{{asset('assets/images/audio-book.svg')}}" alt=""/></span><span class="menu-text">دوراتي</span></a></li>
                <li class="menu-item"><a class="{{ request()->routeIs($role.'.exams.*') ? 'active' : '' }} menu-link" href="{{route($role.'.exams.index')}}"><span class="menu-icon"><img src="{{asset('assets/images/property-edit.svg')}}" alt=""/></span><span class="menu-text">الاختبارات</span></a></li>
                @break

              @default
            @endswitch
          </ul>
          <div class="sidebar-footer"><a class="profile d-flex align-items-center gap-2" href="{{route($role.'.profile')}}">
              <div class="profile-image col-auto"><img src="{{Auth::user()->profile?->image}}" alt=""/></div>
              <div class="col">
              <h6 class="text-white">{{Auth::user()->name}}</h6>
              <h6 class="text-white font-light font-12">عرض الملف الشخصي</h6>
              </div>
              <div class="col-auto icon"><img src="{{asset('assets/images/arrow-left.svg')}}" alt=""/></div></a></div>
      </aside>
      <!-- end:: aside -->
      </div>
      <main>
        <main class="main-content">
        <header class="header">
          <div class="d-flex align-items-center justify-content-between">
              <div class="logo d-lg-none"> <img src="{{asset('assets/images/logo.svg')}}" alt=""/></div>
              <div class="search-box d-none d-lg-block">
              <input class="form-control" type="text" placeholder="بحث..."/><span class="search-box-icon"> <img src="{{asset('assets/images/search.svg')}}" alt=""/></span>
              </div>
              <div class="header-user-info">
              <ul class="d-flex align-items-center">
                  <li> <a href="{{route('logout')}}"> <img src="{{asset('assets/images/logout.svg')}}" alt="" width="20px" height="20px"></a></li>
                  <li> <a href=""> <img src="{{asset('assets/images/notification.svg')}}" alt=""/></a></li>
                  <li class="d-flex"><a href="{{route($role.'.profile')}}"> <img class="user-avatar" src="{{Auth::user()->profile?->image}}" alt=""/></a></li>
                  <li class="toggle-sidebar d-lg-none"><img src="{{asset('assets/images/menu.svg')}}" alt=""/></li>
              </ul>
              </div>
          </div>
        </header>
            {{ $slot }}
        </main>
      </main>
    </div>
    <div class="overlay"></div>
    <!-- end:: Page -->
    <script src="{{ asset('assets/js/query.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/tempus-dominus.min.js') }}"></script>
    <script src="{{ asset('assets/js/plyr.min.js') }}"></script>
    <script src="{{ asset('assets/js/summernote-bs5.min.js') }}"></script>
    <script src="{{ asset('assets/js/summernote-ar-AR.min.js') }}"></script>
    <script src="{{asset('assets/js/toastr.min.js')}}"></script>
    <script src="{{asset('assets/js/smartWizard.min.js')}}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    @yield('scripts')
    <script>
        @if(session('success'))
            toastr.success("{{session('success')}}");
        @endif

        @if(session('error'))
            toastr.error("{{ session('error') }}");
        @endif

        @if(session('info'))
            toastr.info("{{ session('info') }}");
        @endif

        @if(session('warning'))
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
    <script>

        $(window).on('load', function () {
        $('#loader').fadeOut();
    });

    </script>
  </body>
</html>
