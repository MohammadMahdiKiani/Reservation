@php
    use Illuminate\Support\Facades\Auth;
@endphp
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{route('index')}}"><h1>اسپورت رزرو</h1></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{route('index')}}">صفحه اصلی</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('user.gyms')}}">سالن ورزشی</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('user.about')}}">درباره ما</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('user.contact')}}">ارتباط با ما</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('user.rules')}}">قوانین استفاده</a></li>
                @if (!auth::check())

                <li class="nav-item"><a class="btn btn-primary" href="{{route('login')}}">ورود</a></li>
                <li class="nav-item"><a class="btn btn-success" href="{{route('register')}}">ثبت نام</a></li>  
                @else

                <li class="nav-item"><a class="btn btn-primary" href="
                @if(Auth::user()->role == '0')
                {{route('user.dashboard')}}
                @endif
                @if(Auth::user()->role == '1')
                {{route('admin.dashboard')}}
                @endif
                ">حساب کاربری</a></li>
                <li class="nav-item"><a class="btn btn-link" href="{{route('logout')}}">خروج</a></li>
                
                @endif
               
                

            </ul>
        </div>
    </div>
</nav>
<header class="masthead">
    <div class="container">
        <div class="masthead-heading">اسپورت رزرو ... ورزش ... سلامتی</div>
        <div class="masthead-subheading">رزرو ساده و راحت انواع سالن های ورزشی (توپ و تور) در اصفهان</div>
        {{-- <a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a> --}}
    </div>
</header>