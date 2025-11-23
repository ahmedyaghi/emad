<aside class="sidebar">
    <div class="sidebar-header d-none d-lg-block"><img class="logo" src="{{asset('assets/images/logo-white.svg')}}" alt=""/></div>
    <ul class="sidebar-menu">
    <li class="menu-item"><a class="{{ request()->routeIs('individual.dashboard') ? 'active' : '' }} menu-link" href="{{route('individual.dashboard')}}"><span class="menu-icon"><img src="{{asset('assets/images/home.svg')}}" alt=""/></span><span class="menu-text"> الصفحة الرئيسية</span></a></li>
    <li class="menu-item"><a class="{{ request()->routeIs('individual.training-opportunities') ? 'active' : '' }} menu-link" href="{{route('individual.training-opportunities')}}"><span class="menu-icon"><img src="{{asset('assets/images/briefcase2.svg')}}" alt=""/></span><span class="menu-text"> استكشف الفرص التدريبية</span></a></li>
    <li class="menu-item"><a class="{{ request()->routeIs('individual.my-training-opportunities') ? 'active' : '' }} menu-link" href="{{route('individual.my-training-opportunities')}}"><span class="menu-icon"><img src="{{asset('assets/images/catalogue.svg')}}" alt=""/></span><span class="menu-text">طلباتي</span></a></li>
    <li class="menu-item"><a class="{{ request()->routeIs('individual.reports') ? 'active' : '' }} menu-link" href="{{route('individual.reports')}}"><span class="menu-icon"><img src="{{asset('assets/images/file.svg')}}" alt=""/></span><span class="menu-text">التقييمات والتقارير</span></a></li>
    <li class="menu-item"><a class="{{ request()->routeIs('individual.courses') ? 'active' : '' }} menu-link" href="{{route('individual.courses')}}"><span class="menu-icon"><img src="{{asset('assets/images/audio-book.svg')}}" alt=""/></span><span class="menu-text">دوراتي</span></a></li>
    <li class="menu-item"><a class="{{ request()->routeIs('individual.exams') ? 'active' : '' }} menu-link" href="{{route('individual.exams')}}"><span class="menu-icon"><img src="{{asset('assets/images/property-edit.svg')}}" alt=""/></span><span class="menu-text">الاختبارات</span></a></li>
    </ul>
    <div class="sidebar-footer"><a class="profile d-flex align-items-center gap-2" href="{{route('individual.profile')}}">
        <div class="profile-image col-auto"><img src="{{asset('assets/images/avatar.png')}}" alt=""/></div>
        <div class="col">
        <h6 class="text-white">{{Auth::user()->name}}</h6>
        <h6 class="text-white font-light font-12">عرض الملف الشخصي</h6>
        </div>
        <div class="col-auto icon"><img src="{{asset('assets/images/arrow-left.svg')}}" alt=""/></div></a></div>
</aside>