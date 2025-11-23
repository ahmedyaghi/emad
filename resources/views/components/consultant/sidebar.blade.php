<aside class="sidebar">
    <div class="sidebar-header d-none d-lg-block"><img class="logo" src="{{asset('assets/images/logo-white.svg')}}" alt=""/></div>
    <ul class="sidebar-menu">
    <li class="menu-item"><a class="{{ request()->routeIs('consultant.dashboard') ? 'active' : '' }} menu-link" href="{{route('consultant.dashboard')}}"><span class="menu-icon"><img src="../assets/images/home.svg" alt=""/></span><span class="menu-text"> الصفحة الرئيسية</span></a></li>
    <li class="menu-item"><a class="{{ request()->routeIs('consultant.trainees') ? 'active' : '' }} menu-link" href="{{route('consultant.trainees')}}"><span class="menu-icon"><img src="../assets/images/agreement.svg" alt=""/></span><span class="menu-text"> المتدربين</span></a></li>
    <li class="menu-item"><a class="{{ request()->routeIs('consultant.reports') ? 'active' : '' }} menu-link" href="{{route('consultant.reports')}}"><span class="menu-icon"><img src="../assets/images/file.svg" alt=""/></span><span class="menu-text">  التقارير</span></a></li>
    <li class="menu-item"><a class="{{ request()->routeIs('consultant.assessments') ? 'active' : '' }} menu-link" href="{{route('consultant.assessments')}}"><span class="menu-icon"><img src="../assets/images/catalogue.svg" alt=""/></span><span class="menu-text"> التقييم النهائي</span></a></li>
    <li class="menu-item"><a class="{{ request()->routeIs('consultant.notes') ? 'active' : '' }} menu-link" href="{{route('consultant.notes')}}"><span class="menu-icon"><img src="../assets/images/property-edit.svg" alt=""/></span><span class="menu-text">  ملاحظات</span></a></li>
    </ul>
    <div class="sidebar-footer"><a class="profile d-flex align-items-center gap-2" href="{{route('consultant.profile')}}">
        <div class="profile-image col-auto"><img src="{{asset('assets/images/avatar.png')}}" alt=""/></div>
        <div class="col">
        <h6 class="text-white">{{Auth::user()->name}}</h6>
        <h6 class="text-white font-light font-12">عرض الملف الشخصي</h6>
        </div>
        <div class="col-auto icon"><img src="{{asset('assets/images/arrow-left.svg')}}" alt=""/></div></a></div>
</aside>