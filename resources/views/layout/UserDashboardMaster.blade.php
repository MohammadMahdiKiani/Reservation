<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <title>حساب کاربری</title>
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
                        <a class="nav-link" href="{{route('user.dashboard')}}">
                            
                            پیشخوان
                        </a>
                        <div class="sb-sidenav-menu-heading">کاربری</div>
                        <a class="nav-link" href="{{route('editUser')}}">
                            
                            تغییر اطلاعات کاربری
                        </a>
                        <a class="nav-link" href="{{route('editPassword')}}">
                            
                            تغییر رمز عبور
                        </a>
                        <div class="sb-sidenav-menu-heading">خرید</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">

                            رزرو
                        </a>
                        {{-- <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div> --}}
            </nav>
        </div>
        @yield('content')
        
 {{-- <div class="listings-sidebar">

    <div class="search-area default-ad-search">
        <div class="profile-menu">
            <h5 class="profile-menu-title">حساب کاربری شما</h5>
            <div class="profile-menu-body">

                <div class="custom-control ">
                    <a class="active" href="https://www.bashgam.com/profile"><i
                            class="fal fa-user"></i>پروفایل</a>
                    <a class="" href="https://www.bashgam.com/profile/order/ticket"><i class="fal fa-ticket"></i>بلیط
                        ها</a>
                    <a class="" href="https://www.bashgam.com/profile/order/seance"><i class="fal fa-calendar"></i>رزروشده
                        ها</a>
                    <a class="" href="https://www.bashgam.com/profile/personal/edit"><i class="fal fa-user-check"></i>اطلاعات
                        شخصی</a>
                </div>

            </div>
        </div><!-- ends: .filter-checklist -->

    </div><!-- ends: .default-ad-search -->

 </div> --}}

</body>