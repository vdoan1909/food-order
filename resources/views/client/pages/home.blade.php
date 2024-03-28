@extends('layout.client.index')
@section('banner')
    <section class="banner">
        <div class="banner_overlay">
            <span class="banner_shape_1">
                <img src="{{ asset('client/images/tree_5.png') }}" alt="shape" class="img-fluid w-100">
            </span>
            <span class="banner_shape_2">
                <img src="{{ asset('client/images/tree_3.png') }}" alt="shape" class="img-fluid w-100">
            </span>
            <span class="banner_shape_3">
                <img src="{{ asset('client/images/tree_4.png') }}" alt="shape" class="img-fluid w-100">
            </span>
            <span class="banner_shape_4">
                <img src="{{ asset('client/images/tree_6.png') }}" alt="shape" class="img-fluid w-100">
            </span>
            <span class="banner_shape_5">
                <img src="{{ asset('client/images/tree_7.png') }}" alt="shape" class="img-fluid w-100">
            </span>
            <span class="banner_shape_6">
                <img src="{{ asset('client/images/tree_2.png') }}" alt="shape" class="img-fluid w-100">
            </span>
            <div class="col-12">
                <div class="banner_slider" style="background: url({{ asset('client/images/banner_bg.jpg);') }}">
                    <div class="banner_slider_overlay">
                        <div class=" container">
                            <div class="row justify-content-center">
                                <div class="col-xxl-6 col-xl-6 col-md-10 col-lg-6">
                                    <div class="banner_text wow fadeInLeft" data-wow-duration="1s">
                                        <h3>Thỏa mãn cơn thèm của bạn</h3>
                                        <h1>Món ăn ngon với cách ăn uống tuyệt vời</h1>
                                        <p>Khám phá những hương vị tuyệt vời và trải nghiệm cách ăn uống độc đáo, đến với
                                            chúng tôi để thỏa mãn đam mê ẩm thực của bạn!</p>
                                        <form>
                                            <input type="text" placeholder="Tìm kiếm . . .">
                                            <button type="submit" class="common_btn">Tìm kiếm</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-xxl-5 col-xl-6 col-sm-10 col-md-9 col-lg-6">
                                    <div class="banner_img wow fadeInRight" data-wow-duration="1s">
                                        <div class="img">
                                            <img src="{{ asset('client/images/slider_img_1.png') }}" alt="food item"
                                                class="img-fluid w-100">
                                            <span>
                                                Giảm giá 35%
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <div class="cart_popup">
        <div class="modal fade" id="cartModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                class="fal fa-times"></i></button>
                        <div class="cart_popup_img">
                            <img src="" alt="menu" class="img-fluid w-100">
                        </div>
                        <div class="cart_popup_text">
                            <a href="#" class="title"></a>
                            <h4 class="price"> </h4>

                            <div class="details_quentity">
                                <h5>số lượng</h5>
                                <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
                                    <div class="quentity_btn">
                                        <button class="btn btn-danger"><i class="fal fa-minus"></i></button>
                                        <input type="text" placeholder="1" value="1">
                                        <button class="btn btn-success"><i class="fal fa-plus"></i></button>
                                    </div>
                                    <h3 class="sum_price"></h3>
                                </div>
                            </div>
                            <ul class="details_button_area d-flex flex-wrap">
                                <li><a class="common_btn" href="#">thêm giỏ hàng</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="menu mt_95 xs_mt_65">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 wow fadeInUp" data-wow-duration="1s">
                    <div class="section_heading mb_25">
                        <h4>Danh sách món ăn</h4>
                        <h2>Món ăn ngon phổ biến</h2>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 wow fadeInUp" data-wow-duration="1s">
                    <div class="menu_filter d-flex flex-wrap">
                        @foreach ($list_dish_ctg as $dish_ctg)
                            <a href="#">
                                {{ $dish_ctg->ten_danh_muc }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row grid">
                @foreach ($list_dish as $dish)
                    <div class="col-xxl-3 col-sm-6 col-lg-4 chicken wow fadeInUp" data-wow-duration="1s">
                        <div class="menu_item">
                            <div class="menu_item_img">
                                <img src="{{ asset('storage/' . $dish->anh_mon_an) }}" alt="menu"
                                    class="img-fluid w-100">
                            </div>
                            <div class="menu_item_text">
                                <a class="category" href="#">
                                    @foreach ($list_dish_ctg as $dish_ctg)
                                        @if ($dish_ctg->id == $dish->id_the_loai)
                                            {{ $dish_ctg->ten_danh_muc }}
                                        @endif
                                    @endforeach
                                </a>
                                <a class="title" title="{{ $dish->ten_mon_an }}"
                                    href="{{ route('client.menu-detail', ['id' => $dish->id]) }}">
                                    {{ Str::limit($dish->ten_mon_an, 15) }}
                                </a>
                                <h5 class="price"> {{ number_format($dish->gia_mon_an, 0, '.', '.') }} VND</h5>
                                <a class="add_to_cart" href="#" data-dish-id="{{ $dish->id }}"
                                    data-dish-name="{{ $dish->ten_mon_an }}"
                                    data-dish-image="{{ asset('storage/' . $dish->anh_mon_an) }}"
                                    data-dish-price="{{ number_format($dish->gia_mon_an, 0, '.', '.') }}"
                                    data-bs-toggle="modal" data-bs-target="#cartModal">Thêm giỏ hàng</a>
                                <ul class="d-flex flex-wrap justify-content-end">
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="{{ route('client.menu-detail', ['id' => $dish->id]) }}"><i
                                                class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('subcontent')
    <section class="team mt_100 xs_mt_70 pt_95 xs_pt_65 pb_95 xs_pb_65">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-duration="1s">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <div class="section_heading mb_25">
                        <h4>our team</h4>
                        <h2>meet our expert chefs</h2>
                    </div>
                </div>
            </div>

            <div class="row team_slider">
                <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                    <div class="single_team">
                        <div class="single_team_img">
                            <img src="images/chef_1.jpg" alt="team" class="img-fluid w-100">
                        </div>
                        <div class="single_team_text">
                            <h4>ismat joha</h4>
                            <p>senior chef</p>
                            <ul class="d-flex flex-wrap">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                    <div class="single_team">
                        <div class="single_team_img">
                            <img src="images/chef_2.jpg" alt="team" class="img-fluid w-100">
                        </div>
                        <div class="single_team_text">
                            <h4>arun chandra</h4>
                            <p>senior chef</p>
                            <ul class="d-flex flex-wrap">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                    <div class="single_team">
                        <div class="single_team_img">
                            <img src="images/chef_3.jpg" alt="team" class="img-fluid w-100">
                        </div>
                        <div class="single_team_text">
                            <h4>isita rahman</h4>
                            <p>senior chef</p>
                            <ul class="d-flex flex-wrap">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                    <div class="single_team">
                        <div class="single_team_img">
                            <img src="images/chef_4.jpg" alt="team" class="img-fluid w-100">
                        </div>
                        <div class="single_team_text">
                            <h4>khandakar rashed</h4>
                            <p>senior chef</p>
                            <ul class="d-flex flex-wrap">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                    <div class="single_team">
                        <div class="single_team_img">
                            <img src="images/chef_5.jpg" alt="team" class="img-fluid w-100">
                        </div>
                        <div class="single_team_text">
                            <h4>naurin nipu</h4>
                            <p>senior chef</p>
                            <ul class="d-flex flex-wrap ">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="counter_part my-3" style="background: url({{ asset('client/images/counter_bg.jpg') }});">
        <div class="counter_overlay pt_120 xs_pt_90 pb_100 xs_pb_0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s">
                        <div class="single_counter">
                            <div class="text">
                                <h2 class="counter">85,000</h2>
                                <span><i class="fas fa-user"></i></span>
                            </div>
                            <p>customer serve</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s">
                        <div class="single_counter">
                            <div class="text">
                                <h2 class="counter">120</h2>
                                <span><i class="fas fa-hat-chef"></i></span>
                            </div>
                            <p>experience chef</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s">
                        <div class="single_counter">
                            <div class="text">
                                <h2 class="counter">72,000</h2>
                                <span><i class="fas fa-users"></i></span>
                            </div>
                            <p>happy customer</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s">
                        <div class="single_counter">
                            <div class="text">
                                <h2 class="counter">30</h2>
                                <span><i class="fas fa-trophy"></i></span>
                            </div>
                            <p>winning award</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
