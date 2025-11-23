<aside class="sidebar">
    <div class="sidebar-header d-none d-lg-block"><img class="logo" src="{{asset('assets/images/logo-white.svg')}}" alt=""/></div>
    <ul class="sidebar-menu">
    <li class="menu-item"><a class="{{ request()->routeIs('association.dashboard') ? 'active' : '' }} menu-link" href="{{route('association.dashboard')}}"><span class="menu-icon"><img src="../assets/images/home.svg" alt=""/></span><span class="menu-text"> الصفحة الرئيسية</span></a></li>
    <li class="menu-item"><a class="{{ request()->routeIs('association.training-opportunities') ? 'active' : '' }} menu-link" href="{{route('association.training-opportunities')}}"><span class="menu-icon"><img src="../assets/images/briefcase2.svg" alt=""/></span><span class="menu-text">  تدريباتي المنشورة</span></a></li>
    <li class="menu-item"><a class="{{ request()->routeIs('association.trainees') ? 'active' : '' }} menu-link" href="{{route('association.trainees')}}"><span class="menu-icon"><img src="../assets/images/agreement.svg" alt=""/></span><span class="menu-text"> المتدربين</span></a></li>
    <li class="menu-item"><a class="{{ request()->routeIs('association.reports') ? 'active' : '' }} menu-link" href="{{route('association.reports')}}"><span class="menu-icon"><img src="../assets/images/file.svg" alt=""/></span><span class="menu-text">  التقارير</span></a></li>
    <li class="menu-item"><a class="{{ request()->routeIs('association.assessments') ? 'active' : '' }} menu-link" href="{{route('association.assessments')}}"><span class="menu-icon"><img src="../assets/images/property-edit.svg" alt=""/></span><span class="menu-text"> التقييم النهائي</span></a></li>
    <li class="menu-item"><a class="{{ request()->routeIs('association.articles') ? 'active' : '' }} menu-link" href="{{route('association.articles')}}"><span class="menu-icon"><img src="../assets/images/book.svg" alt=""/></span><span class="menu-text"> المقالات</span></a></li>
    </ul>
    <div class="sidebar-footer"><a class="profile d-flex align-items-center gap-2" href="{{route('association.profile')}}">
        <div class="profile-image col-auto"><img src="{{asset('assets/images/avatar.png')}}" alt=""/></div>
        <div class="col">
        <h6 class="text-white">{{Auth::user()->name}}</h6>
        <h6 class="text-white font-light font-12">عرض الملف الشخصي</h6>
        </div>
        <div class="col-auto icon"><img src="{{asset('assets/images/arrow-left.svg')}}" alt=""/></div></a></div>
</aside>