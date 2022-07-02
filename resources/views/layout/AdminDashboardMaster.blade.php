<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <title>@yield('title')</title>
        @include('layout.head')
        <style>
            .cat-box{
    background-color: #494f58;
    box-shadow:   10px #040404;
    margin-top: 20px;
}
.cat-box h3{
    color: #fff;
    font-size: 18px;
    padding: 15px;
    border-bottom: 1px solid #535a64;
    font-weight: 900;
}
</style>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="/css/UserDashboardStyle.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    </head>
<body class="text-right" id="page-top">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{route('index')}}">صفحه اصلی</a>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="navbar-brand ps-3">@php
                echo Auth::user()->first_name;
                echo " ";
                echo Auth::user()->last_name;
            @endphp خوش آمدید</li>
            <li class="nav-item"><a class="btn btn-danger" href="{{route('logout')}}">خروج</a></li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="{{route('admin.dashboard')}}">
                            
                            پیشخوان
                        </a>
                        <div class="sb-sidenav-menu-heading">مدیریت</div>
                        <a class="nav-link" href="{{route('admin.allusers')}}">
                            
                            مدیریت کاربران
                        </a>
                        <a class="nav-link" href="{{route('admin.indexgyms')}}">
                            
                            اطلاعات سالن های ورزشی
                        </a>
                        <a class="nav-link" href="#">
                            
                            رزرو ها
                        </a>
                        <div class="sb-sidenav-menu-heading">کاربری</div>
                        <a class="nav-link" href="{{route('admin.editUser')}}">
                            
                            تغییر اطلاعات کاربری
                        </a>
                        <a class="nav-link" href="{{route('admin.editPassword')}}">
                            
                            تغییر رمز عبور
                        </a>
    
                        
            </nav>
        </div>
        @yield('content')
        
</body>