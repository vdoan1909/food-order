<footer style="background: url({{ asset('client/images/footer_bg.jpg);') }}">
    <div class="footer_overlay pt_100 xs_pt_70 pb_100 xs_pb_20">
        <div class="container wow fadeInUp" data-wow-duration="1s">
            <div class="row justify-content-between">
                <div class="col-xxl-4 col-lg-4 col-sm-9 col-md-7">
                    <div class="footer_content">
                        <a class="footer_logo" href="index.html">
                            <img src="{{ asset('client/images/footer_logo.png') }}" alt="RegFood"
                                class="img-fluid w-100">
                        </a>
                        <span>Đặt đồ ăn trực tuyến ngay hôm nay với RegFood. Thực đơn phong phú và dễ dàng đặt hàng từ
                            nhà hàng yêu thích của bạn!</span>
                        <ul class="social_link d-flex flex-wrap">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xxl-2 col-lg-2 col-sm-5 col-md-5">
                    <div class="footer_content">
                        <h3>Liên kết</h3>
                        <ul>
                            <li><a href="#">Trang chủ</a></li>
                            <li><a href="#">Thực đơn</a></li>
                            <li><a href="#">Đầu bếp</a></li>
                            <li><a href="#">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xxl-2 col-lg-2 col-sm-6 col-md-5 order-md-4">
                    <div class="footer_content">
                        <h3>Liên kết Hỗ trợ</h3>
                        <ul>
                            <li><a href="#">Điều khoản & Điều kiện</a></li>
                            <li><a href="#">Chính sách Bảo mật</a></li>
                            <li><a href="#">Chính sách Hoàn trả</a></li>
                            <li><a href="#">Câu hỏi thường gặp</a></li>
                            <li><a href="#">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xxl-3 col-lg-4 col-sm-9 col-md-7 order-lg-4">
                    <div class="footer_content">
                        <h3>Liên hệ</h3>
                        <p class="info"><i class="fas fa-phone-alt"></i> 0333666999</p>
                        <p class="info"><i class="fas fa-envelope"></i> openaivdoan@gmail.com</p>
                        <p class="info"><i class="far fa-map-marker-alt"></i> Cao Đẳng FPT Polytechnic Hà Nội</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer_bottom d-flex flex-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer_bottom_text">
                        <p>Bản quyền © <b>VDoan</b> 2024. Đã đăng ký Bản quyền.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="scroll_btn"><i class="fas fa-hand-pointer"></i></div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.add_to_cart').on('click', function() {
            // Lấy giá trị từ data-* attributes
            let dishId = $(this).data('dish-id');
            let dishName = $(this).data('dish-name');
            let dishImage = $(this).data('dish-image');
            let dishPrice = $(this).data('dish-price');

            // Cập nhật giá trị cho modal
            $('#cartModal .title').text(dishName);
            $('#cartModal .cart_popup_img img').attr('src', dishImage);
            $('#cartModal .price').text(dishPrice + ' VND');

            // Hiển thị modal
            $('#cartModal').modal('show');
        });
        // khi click nút '+'
        $('.quentity_btn .btn-success').on('click', function() {
            // lấy ô input
            let quantityInput = $(this).siblings('input[type="text"]');
            // tăng giá trị của ô input lên 1 nếu hiện tại không phải NaN, nếu không đặt nó về 1
            let oldValue = isNaN(parseInt(quantityInput.val())) ? 0 : parseInt(quantityInput
                .val());
            quantityInput.val(oldValue + 1);
            // gọi hàm để cập nhật lại tổng giá
            calculateSumPrice();
        });

        // khi click nút '-'
        $('.quentity_btn .btn-danger').on('click', function() {
            // lấy ô input
            let quantityInput = $(this).siblings('input[type="text"]');
            // trừ giá trị của ô input đi 1 nếu giá trị hiện tại lớn hơn 1 và không phải NaN, nếu NaN đặt nó về 1
            let oldValue = isNaN(parseInt(quantityInput.val())) ? 0 : parseInt(quantityInput
                .val());
            if (oldValue > 1) {
                quantityInput.val(oldValue - 1);
            }
            // gọi hàm để cập nhật lại tổng giá
            calculateSumPrice();
        });

        $('#cartModal .quentity_btn input').on('input', function() {
            // Gọi hàm để cập nhật lại tổng giá
            calculateSumPrice();
        });

        $('#cartModal').on('hide.bs.modal', function() {
            // Cập nhật giá trị cho modal
            $('#cartModal .title').text("");
            $('#cartModal .cart_popup_img img').attr('src', "");
            $('#cartModal .price').text("");
            $('#cartModal .quentity_btn input').val("1");
            $('#cartModal .sum_price').text("");
        });

        function calculateSumPrice() {
            // lấy giá của món hàng. Chú ý phải convert từ chuỗi sang số.
            let dishPrice = isNaN(parseFloat($('#cartModal .price').text())) ? 0 : parseFloat($(
                '#cartModal .price').text());

            // lấy số lượng trong ô input
            let quantity = isNaN(parseInt($('#cartModal .quentity_btn input').val())) ? 0 :
                parseInt($('#cartModal .quentity_btn input').val());

            // tính và cập nhật tổng giá
            $('#cartModal .sum_price').text((dishPrice * quantity).toFixed(2) + ' VND');
        }
    });
</script>

<!--jquery library js-->
<script src="{{ asset('client/js/jquery-3.6.0.min.js') }}?ver={{ rand() }}"></script>
<!--bootstrap js-->
<script src="{{ asset('client/js/bootstrap.bundle.min.js') }}?ver={{ rand() }}"></script>
<!--font-awesome js-->
<script src="{{ asset('client/js/Font-Awesome.js') }}?ver={{ rand() }}"></script>
<!-- slick slider -->
<script src="{{ asset('client/js/slick.min.js') }}?ver={{ rand() }}"></script>
<!-- isotop js -->
<script src="{{ asset('client/js/isotope.pkgd.min.js') }}?ver={{ rand() }}"></script>
<!-- counter up js -->
<script src="{{ asset('client/js/jquery.waypoints.min.js') }}?ver={{ rand() }}"></script>
<script src="{{ asset('client/js/jquery.countup.min.js') }}?ver={{ rand() }}"></script>
<!-- nice select js -->
<script src="{{ asset('client/js/jquery.nice-select.min.js') }}?ver={{ rand() }}"></script>
<!-- venobox js -->
<script src="{{ asset('client/js/venobox.min.js') }}?ver={{ rand() }}"></script>
<!-- sticky sidebar js -->
<script src="{{ asset('client/js/sticky_sidebar.js') }}?ver={{ rand() }}"></script>
<!-- wow js -->
<script src="{{ asset('client/js/wow.min.js') }}?ver={{ rand() }}"></script>
<!-- ex zoom js -->
<script src="{{ asset('client/js/jquery.exzoom.js') }}?ver={{ rand() }}"></script>

<!--main/custom js-->
<script src="{{ asset('client/js/main.js') }}?ver={{ rand() }}"></script>

</html>
