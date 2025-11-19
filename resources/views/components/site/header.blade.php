@props(['internal' => true])
<div class="main-header {{ $internal ? 'internal' : '' }}">
    <nav class="navbar navbar-expand-lg navbar-light py-0">
        <div class="overlay collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"></div>
        <div class="container"><a class="navbar-brand py-0" href="{{route('main')}}"><img src="{{asset('assets/images/logo.svg')}}" alt="{{$settings['site_title'] ?? ''}}"/></a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa-solid fa-bars fa-lg"></i></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa-solid fa-bars fa-lg"></i></button>
            <ul class="navbar-nav mx-auto">
            <li class="nav-item"><a class="nav-link active" href="{{route('main')}}">الرئيسية</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('training-opportunities')}}">فرص تدريبية</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('articles')}}">المقالات </a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('contact-us')}}">تواصل معنا</a></li>
            </ul>
            @guest
            <ul class="navbar-nav align-items-lg-center col-auto">
                <li class="nav-item mx-lg-2 mb-3 mb-lg-0"><a class="btn btn-white roubnded-pill" href="" data-bs-toggle="modal" data-bs-target="#modalRegister">انشاء الحساب</a></li>
                <li class="nav-item"><a class="btn btn-primary roubnded-pill" href="" data-bs-toggle="modal" data-bs-target="#loginModal">تسجيل الدخول</a></li>
            </ul>   
            @endguest
           
            @auth
            <ul class="navbar-nav align-items-lg-center col-auto">
                <li class="nav-item"><a class="btn btn-primary roubnded-pill" href="{{route('logout')}}">تسجيل الخروج</a></li>
            </ul> 
            @endauth
        </div>
        </div>
    </nav>
</div>