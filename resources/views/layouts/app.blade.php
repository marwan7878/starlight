<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script
      src="https://cdn.tiny.cloud/1/m8u9n55urqipgv1fuziq6h79fucsxc5k7e978yndxdqdxn6e/tinymce/6/tinymce.min.js"
      referrerpolicy="origin">
    </script>
    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('css/lineicons.css') }}"/>
    @vite('resources/sass/app.scss')
</head>
<body>
<!-- ======== sidebar-nav start =========== -->
<aside class="sidebar-nav-wrapper" style="right: 0 !important; position: fixed !important;">
    <div class="navbar-logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo/elkenany.png') }}" style="width: 70px" alt="logo"/>
        </a>
    </div>
    <nav class="sidebar-nav">
        @include('layouts.navigation')
    </nav>
</aside>
<div class="overlay"></div>
<!-- ======== sidebar-nav end =========== -->

<!-- ======== main-wrapper start =========== -->
<main class="main-wrapper">
    <!-- ========== header start ========== -->
    <header class="header py-3 sticky-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-6">
                    <div class="header-left d-flex align-items-center">
                        <div class="menu-toggle-btn mr-20">
                            <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                                <i class="lni lni-chevron-right me-2 pl-5"></i> القائمة
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-6">
                    <div class="header-right">
                        <!-- profile start -->
                        <div class="profile-box ml-15">
                            <button
                                    class="dropdown-toggle bg-primary border-0 btn btn-primary"
                                    type="button"
                                    id="profile"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                            
                                <div class="profile-info ms-2">
                                    
                                    @if(!empty(Auth::user()->name))
                                        <div class="info">
                                            <h6 class="text-light fw-bold">{{ Auth::user()->name }}</h6>
                                        </div>
                                    @else
                                        <script>window.location.href = "{{ route('login') }}";</script>
                                    @endif
                                </div>
                                <i class="lni lni-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                                <li>
                                        <a class="fw-bold" href="{{ route('profile.show') }}"> <i class="lni lni-user pl-5 "></i>حسابي</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                        <a class="fw-bold" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"> <i class="lni lni-exit pl-5"></i>تسجيل الخروج</a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <!-- profile end -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ========== header end ========== -->

    <!-- ========== section start ========== -->
    <section class="section">
        <div class="container-fluid">
            @yield('content')
        </div>
        <!-- end container -->
    </section>
    <!-- ========== section end ========== -->

    <!-- ========== footer start =========== -->
    {{-- <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 order-last order-md-first">
                    <div class="copyright text-md-start">
                        <p class="text-sm">
                            Designed and Developed by
                            <a href="https://plainadmin.com" rel="nofollow" target="_blank">
                                الكناني جروب
                            </a>
                        </p>
                    </div>
                </div>
                <!-- end col-->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </footer> --}}
    <!-- ========== footer end =========== -->
</main>
<!-- ======== main-wrapper end =========== -->

<!-- ========= All Javascript files linkup ======== -->
@vite('resources/js/app.js')
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
