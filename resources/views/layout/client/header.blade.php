<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <title>RegFood || Restaurant HTML Template</title>
    <link rel="icon" type="image/png" href="{{ asset('client/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('client/css/all.min.css') }}?ver={{ rand() }}">
    <link rel="stylesheet" href="{{ asset('client/css/bootstrap.min.css') }}?ver={{ rand() }}">
    <link rel="stylesheet" href="{{ asset('client/css/slick.css') }}?ver={{ rand() }}">
    <link rel="stylesheet" href="{{ asset('client/css/nice-select.css') }}?ver={{ rand() }}">
    <link rel="stylesheet" href="{{ asset('client/css/custom_spacing.css') }}?ver={{ rand() }}">
    <link rel="stylesheet" href="{{ asset('client/css/venobox.min.css') }}?ver={{ rand() }}">
    <link rel="stylesheet" href="{{ asset('client/css/animate.css') }}?ver={{ rand() }}">
    <link rel="stylesheet" href="{{ asset('client/css/jquery.exzoom.css') }}?ver={{ rand() }}">
    <link rel="stylesheet" href="{{ asset('client/css/style.css') }}?ver={{ rand() }}">
    <link rel="stylesheet" href="{{ asset('client/css/responsive.css') }}?ver={{ rand() }}">
</head>

<body>
    <section class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-sm-6 col-md-8">
                    <ul class="topbar_info d-flex flex-wrap d-none d-sm-flex">
                        <li><a href="mailto:example@gmail.com"><i class="fas fa-envelope"></i> openaivdoan@gmail.com</a>
                        </li>
                        <li class="d-none d-md-block"><a href="callto:123456789"><i class="fas fa-phone-alt"></i>
                                0333666999</a></li>
                    </ul>
                </div>
                <div class="col-xl-6 col-sm-6 col-md-4">
                    <ul class="topbar_icon d-flex flex-wrap">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a> </li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a> </li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a> </li>
                        <li><a href="#"><i class="fab fa-behance"></i></a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <nav class="navbar navbar-expand-lg main_menu">
        <div class="container">
            <a class="navbar-brand" href="{{route('client')}}">
                <img src="{{ asset('client/images/logo.png') }}" alt="RegFood" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="far fa-bars menu_icon_bar"></i>
                <i class="far fa-times close_icon_close"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Thực đơn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Đầu bếp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Liên hệ</a>
                    </li>
                </ul>
                <ul class="menu_icon d-flex flex-wrap">
                    <li>
                        <a class="cart_icon" href="#"><i class="fas fa-shopping-basket"></i>
                            <span>05</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-user"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
