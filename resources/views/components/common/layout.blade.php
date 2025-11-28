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
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&amp;display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css')}}"/>
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
      <div class="dashboard-container">
      <!-- begin:: aside --> 
      @php
          $role = auth()->user()->getRoleNames()->first();
      @endphp
      <aside class="sidebar">
          <div class="sidebar-header d-none d-lg-block"><img class="logo" src="{{asset('assets/images/logo-white.svg')}}" alt=""/></div>
          <ul class="sidebar-menu">
          @includeIf("components.$role.sidebar",['role' => $role])  
          </ul>
          <div class="sidebar-footer"><a class="profile d-flex align-items-center gap-2" href="{{route($role.'.profile')}}">
              <div class="profile-image col-auto"><img src="{{asset('assets/images/avatar.png')}}" alt=""/></div>
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
            <x-common.header :role="$role"/>
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
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
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
  </body>
</html>