@extends('layout.client.index')
@section('banner')
    <section class="page_breadcrumb" style="background: url({{ asset('client/images/counter_bg.jpg);') }}">
        <div class="breadcrumb_overlay">
            <div class="container">
                <div class="breadcrumb_text">
                    <h1>Chi tiết món ăn</h1>
                    <ul>
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="#">Chi tiết món ăn</a></li>
                    </ul>
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

    <section class="menu_details mt_100 xs_mt_75 mb_95 xs_mb_65">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-10 col-md-9 wow fadeInUp" data-wow-duration="1s">
                    <div class="exzoom hidden" id="exzoom">
                        <div class="exzoom_img_box menu_details_images">
                            <ul class='exzoom_img_ul'>
                                <li><img class="zoom ing-fluid w-100"
                                        src="{{ asset('storage/' . $dish_detail->anh_mon_an) }}" alt="product"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInUp" data-wow-duration="1s">
                    <div class="menu_details_text detail_name">
                        <h2>
                            {{ $dish_detail->ten_mon_an }}
                        </h2>
                        <h3 class="price detail_price">
                            {{ number_format($dish_detail->gia_mon_an, 0, '.', '.') }} VND
                        </h3>
                        <p class="short_description detail_des">
                            {{ $dish_detail->mo_ta }}
                        </p>

                        <div class="details_quentity detail_name">
                            <h5>số lượng</h5>
                            <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
                                <div class="quentity_btn">
                                    <button class="btn btn-danger" id="btndanger"><i class="fal fa-minus"></i></button>
                                    <input type="text" placeholder="1" value="1">
                                    <button class="btn btn-success" id="btnsuccess"><i class="fal fa-plus"></i></button>
                                </div>
                                <h3 class="detail_sum_price"></h3>
                            </div>
                        </div>
                        <ul class="details_button_area d-flex flex-wrap">
                            <a class="common_btn add_to_cart" href="#" data-dish-id="{{ $dish_detail->id }}"
                                data-dish-name="{{ $dish_detail->ten_mon_an }}"
                                data-dish-image="{{ asset('storage/' . $dish_detail->anh_mon_an) }}"
                                data-dish-price="{{ number_format($dish_detail->gia_mon_an, 0, '.', '.') }}"
                                data-bs-toggle="modal" data-bs-target="#cartModal">Thêm giỏ hàng</a>
                            <li><a class="common_btn" href="#">yêu thích</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 wow fadeInUp" data-wow-duration="1s">
                    <div class="menu_description_area mt_100 xs_mt_70">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Mô tả về chúng tôi</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">Đánh giá</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab" tabindex="0">
                                <div class="menu_det_description">
                                    <p>Trang web đặt đồ ăn này cung cấp một trải nghiệm thú vị cho người dùng khi tìm kiếm
                                        các món ăn yêu thích của họ. Trang chính hiển thị một danh sách các món ăn và mô tả
                                        chi tiết về chúng, giúp người dùng dễ dàng chọn lựa. Mô tả mỗi món ăn được hiển thị
                                        rõ ràng, bao gồm cả thông tin về hương vị và thành phần.
                                        Ngoài ra, trang còn cung cấp một phần mô tả về các dịch vụ và chính sách của cửa
                                        hàng, giúp người dùng hiểu rõ hơn về quy trình đặt hàng và giao hàng. Các thông tin
                                        được trình bày một cách dễ hiểu và rõ ràng, giúp người dùng có trải nghiệm mua sắm
                                        trực tuyến thuận lợi và tiện lợi.
                                    </p>
                                    <ul>
                                        <li>Tìm kiếm và đặt món ăn yêu thích của bạn trong một cú nhấp chuột.</li>
                                        <li>Đặt đồ ăn tại nhà hàng, quán ăn hoặc cửa hàng gần bạn nhất.</li>
                                        <li>Thực đơn đa dạng với nhiều lựa chọn từ các món ăn.</li>
                                        <li>Giao hàng nhanh chóng và tiện lợi đến địa chỉ của bạn.</li>
                                        <li>Đặt hàng trực tuyến 24/7, không giới hạn thời gian.</li>
                                        <li>Thanh toán an toàn và bảo mật qua các phương thức thanh toán phổ biến.</li>
                                        <li>Đánh giá và nhận xét từ khách hàng để bạn có thể chọn lựa dễ dàng.</li>
                                        <li>Chăm sóc khách hàng 24/7 để giải đáp mọi thắc mắc và hỗ trợ bạn.</li>
                                    </ul>
                                    <p>Trang web đặt đồ ăn của chúng tôi mang đến cho bạn trải nghiệm đơn giản và thuận tiện
                                        để tìm và đặt món ăn yêu thích. Chỉ cần vài cú nhấp chuột, bạn có thể tìm thấy nhà
                                        hàng, quán ăn hoặc cửa hàng gần nhất và đặt hàng ngay tại đây.
                                        Thực đơn của chúng tôi đa dạng và phong phú, đáp ứng mọi sở thích ẩm thực của bạn.
                                        Bạn có thể lựa chọn từ các món ăn truyền thống.
                                        Chúng tôi cam kết mang đến cho bạn những món ăn ngon và chất lượng.
                                    </p>
                                    <ul>
                                        <li>Được xây dựng với sự tận tâm. Tạo ra trải nghiệm tuyệt vời.</li>
                                        <li>Chúng tôi cam kết mang đến sự hài lòng. Đáp ứng mọi nhu cầu của bạn.</li>
                                        <li>Luôn luôn sẵn sàng hỗ trợ. Tạo điều kiện thuận lợi cho bạn.</li>
                                        <li>Luôn luôn sẵn sàng hỗ trợ. Tạo điều kiện thuận lợi cho bạn.</li>
                                    </ul>
                                    <p>Với một loạt các lựa chọn từ các địa điểm khác nhau, từ món ăn nhanh đến các món ẩm
                                        thực đặc trưng, trang web sẽ đảm bảo rằng bạn sẽ có được bữa ăn mà bạn mong muốn một
                                        cách thuận tiện nhất. Đặc biệt, trang web cung cấp các tính năng đặt hàng trực
                                        tuyến, giúp bạn tiết kiệm thời gian và năng lượng, đồng thời đảm bảo rằng bạn nhận
                                        được bữa ăn chất lượng và đúng giờ. Hãy khám phá ngay để trải nghiệm tiện ích của
                                        việc đặt đồ ăn trực tuyến!
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab" tabindex="0">
                                <div class="review_area">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h4>04 đánh giá</h4>
                                            <div class="comment pt-0 mt_20">
                                                <div class="single_comment m-0 border-0">
                                                    <img src="images/client_1.png" alt="review" class="img-fluid">
                                                    <div class="single_comm_text">
                                                        <h3>Michel Holder <span>29 oct 2022 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Sure there isn't anything embarrassing hiidden in the
                                                            middles of text. All erators on the Internet
                                                            tend to repeat predefined chunks</p>
                                                    </div>
                                                </div>
                                                <div class="single_comment">
                                                    <img src="images/client_2.png" alt="review" class="img-fluid">
                                                    <div class="single_comm_text">
                                                        <h3>salina khan <span>29 oct 2022 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Sure there isn't anything embarrassing hiidden in the
                                                            middles of text. All erators on the Internet
                                                            tend to repeat predefined chunks</p>
                                                    </div>
                                                </div>
                                                <div class="single_comment">
                                                    <img src="images/client_3.png" alt="review" class="img-fluid">
                                                    <div class="single_comm_text">
                                                        <h3>Mouna Sthesia <span>29 oct 2022 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Sure there isn't anything embarrassing hiidden in the
                                                            middles of text. All erators on the Internet
                                                            tend to repeat predefined chunks</p>
                                                    </div>
                                                </div>
                                                <div class="single_comment">
                                                    <img src="images/client_4.png" alt="review" class="img-fluid">
                                                    <div class="single_comm_text">
                                                        <h3>marjan janifar <span>29 oct 2022 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Sure there isn't anything embarrassing hiidden in the
                                                            middles of text. All erators on the Internet
                                                            tend to repeat predefined chunks</p>
                                                    </div>
                                                </div>

                                                <div class="pagination mt_30">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <nav aria-label="...">
                                                                <ul class="pagination">
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="#"><i
                                                                                class="fas fa-long-arrow-alt-left"></i></a>
                                                                    </li>
                                                                    <li class="page-item"><a class="page-link"
                                                                            href="#">1</a></li>
                                                                    <li class="page-item active"><a class="page-link"
                                                                            href="#">2</a></li>
                                                                    <li class="page-item"><a class="page-link"
                                                                            href="#">3</a></li>
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="#"><i
                                                                                class="fas fa-long-arrow-alt-right"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </nav>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-4">
                                            <div class="post_review">
                                                <h4>cảm nhận của bạn</h4>
                                                <form>
                                                    <p class="rating">
                                                        <span>select your rating : </span>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </p>
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <input type="text" placeholder="Name">
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <input type="email" placeholder="Email">
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <textarea rows="3" placeholder="Write your review"></textarea>
                                                        </div>
                                                        <div class="col-12">
                                                            <button class="common_btn" type="submit">đánh giá</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="related_menu mt_90 xs_mt_60">
                <h2>món ăn liên quan</h2>
                <div class="row related_product_slider">
                    @foreach ($related_dish as $dish_relate)
                        <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                            <div class="menu_item">
                                <div class="menu_item_img">
                                    <img src="{{ asset('storage/' . $dish_relate->anh_mon_an) }}" alt="menu"
                                        class="img-fluid w-100">
                                </div>
                                <div class="menu_item_text">
                                    <a class="category" href="#">
                                        @foreach ($list_dish_ctg as $dish_ctg)
                                            @if ($dish_ctg->id == $dish_relate->id_the_loai)
                                                {{ $dish_ctg->ten_danh_muc }}
                                            @endif
                                        @endforeach
                                    </a>
                                    <a class="title" title="{{$dish_relate->ten_mon_an}}"
                                        href="{{ route('client.menu-detail', ['id' => $dish_relate->id]) }}">
                                        {{ Str::limit($dish_relate->ten_mon_an, 15) }}
                                    </a>
                                    <h5 class="price"> {{ number_format($dish_relate->gia_mon_an, 0, '.', '.') }} VND
                                    </h5>
                                    <a class="add_to_cart" href="#" data-dish-id="{{ $dish_relate->id }}"
                                        data-dish-name="{{ $dish_relate->ten_mon_an }}"
                                        data-dish-image="{{ asset('storage/' . $dish_relate->anh_mon_an) }}"
                                        data-dish-price="{{ number_format($dish_relate->gia_mon_an, 0, '.', '.') }}"
                                        data-bs-toggle="modal" data-bs-target="#cartModal">Thêm giỏ hàng</a>
                                    <ul class="d-flex flex-wrap justify-content-end">
                                        <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                        <li><a href="{{ route('client.menu-detail', ['id' => $dish_relate->id]) }}"><i
                                                    class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
