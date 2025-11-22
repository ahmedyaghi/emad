@props(['internal' => true])
<!DOCTYPE html>
<html dir="rtl">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>الرئيسية</title>
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
    <link href="{{ asset('assets/images/logo.svg') }}" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&amp;display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('assets/css/smart_wizard_all.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/fancybox.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.rtl.min.css') }}"/>
    
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">  --}}
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}"/>
  </head>
  <body>
    <!-- begin:: Page -->
      <div class="page">
        <div class="main-wrapper">
        <!-- begin:: Header --> 
          <x-site.header :internal="$internal"/>
        <!-- end:: Header --> 
        <main>
          {{ $slot }}  
        </main>
        <x-site.footer />
        <x-site.modal />
        </div>
      </div>
    <!-- end:: Page -->
    <script src="{{ asset('assets/js/query.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/smartWizard.min.js') }}"></script>
    <script src="{{ asset('assets/js/fancybox.umd.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
      $(document).ready(function() {
          var $select = $('#per_page');

          // Initialize Select2 (if not already)
          if (!$select.hasClass('select2-hidden-accessible')) {
              $select.select2({
                  width: '70px'
              });
          }

          $select.on('select2:select', function(e) {
              var value = e.params.data.id; // selected value

              // Use URL API to modify current URL
              var url = new URL(window.location.href);

              // Set per_page parameter
              url.searchParams.set('per_page', value);

              // Reset page to 1
              url.searchParams.set('page', 1);

              // Redirect
              window.location.href = url.toString();
          });
      });
      </script>



  </body>
</html> 