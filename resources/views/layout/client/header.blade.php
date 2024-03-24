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
                        <li><a href="mailto:example@gmail.com"><i class="fas fa-envelope"></i> examplemail@gmail.com</a>
                        </li>
                        <li class="d-none d-md-block"><a href="callto:123456789"><i class="fas fa-phone-alt"></i>
                                +96487452145214</a></li>
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
            <a class="navbar-brand" href="index.html">
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
                        <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">about</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu.html">menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="chefs.html">chefs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">pages <i class="far fa-angle-down"></i></a>
                        <ul class="droap_menu">
                            <li><a href="menu_details.html">menu details</a></li>
                            <li><a href="blog_details.html">blog details</a></li>
                            <li><a href="cart_view.html">cart view</a></li>
                            <li><a href="check_out.html">checkout</a></li>
                            <li><a href="payment.html">payment</a></li>
                            <li><a href="testimonial.html">testimonial</a></li>
                            <li><a href="404.html">404/Error</a></li>
                            <li><a href="faq.html">FAQs</a></li>
                            <li><a href="sign_in.html">sign in</a></li>
                            <li><a href="sign_up.html">sign up</a></li>
                            <li><a href="forgot_password.html">forgot password</a></li>
                            <li><a href="privacy_policy.html">privacy policy</a></li>
                            <li><a href="terms_condition.html">terms and condition</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blogs.html">blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">contact</a>
                    </li>
                </ul>
                <ul class="menu_icon d-flex flex-wrap">
                    <li>
                        <a class="cart_icon" href="cart_view.html"><i class="fas fa-shopping-basket"></i>
                            <span>05</span></a>
                    </li>
                    <li>
                        <a href="dashboard.html"><i class="fas fa-user"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
