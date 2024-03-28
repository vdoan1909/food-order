@extends('layout.client.index')
@section('banner')
    <section class="page_breadcrumb" style="background: url({{ asset('client/images/counter_bg.jpg') }});">
        <div class="breadcrumb_overlay">
            <div class="container">
                <div class="breadcrumb_text">
                    <h1>Món ăn phổ biến</h1>
                    <ul>
                        <li><a href="index.html">trang chủ</a></li>
                        <li><a href="#">thực đơn</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="menu_page mt_100 xs_mt_70 mb_100 xs_mb_70">
        <div class="container">
            <form class="menu_search_area">
                <div class="row">
                    <div class="col-lg-6 col-md-5">
                        <div class="menu_search">
                            <input type="text" placeholder="Tìm kiếm...">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="menu_search">
                            <div class="select_area">
                                <select class="select_js">
                                    <option value="">Lọc theo giá</option>
                                    <option value="">Cao đến thấp</option>
                                    <option value="">Thấp đến cao</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="menu_search">
                            <button class="common_btn" type="submit">Tìm kiếm</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="row">
                @foreach ($list_dish as $dish)
                    <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
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
                                <h5 class="price">{{ number_format($dish->gia_mon_an, 0, '.', '.') }} VND</h5>
                                <a class="add_to_cart" href="#" data-bs-toggle="modal"
                                    data-bs-target="#cartModal">thêm giỏ hàng</a>
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
            <div class="pagination mt_50">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fas fa-long-arrow-alt-left"></i></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
