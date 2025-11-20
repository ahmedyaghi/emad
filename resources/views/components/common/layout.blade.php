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
      @includeIf("components.$role.sidebar")
      <!-- end:: aside --> 
      </div>
      <main>
        <main class="main-content">
            <x-common.header />
         
          <div class="main-content-inner"> 
            {{ $slot }}
          </div>
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
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  </body>
</html>