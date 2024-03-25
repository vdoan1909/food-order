@extends('layout.admin.index')
@section('content')
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Danh sách món phụ</li>
            <li class="breadcrumb-item"><a href="#">Thêm món phụ</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form class="tile" action="{{ route('admin.side-dish.store') }}" method="post" enctype="multipart/form-data" novalidate>
                @csrf
                <h3 class="tile-title">Tạo mới món phụ</h3>

                <a href="{{ url()->previous() }}" class="btn btn-save btn-sm"><i class="fas fa-chevron-left"></i> Quay lại</a>
                
                <div class="tile-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label">Tên món phụ</label>
                            <input class="form-control" type="text" name="side_dish_name">
                            @error('side_dish_name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Ảnh món phụ</label>
                            <input class="form-control" type="file" name="side_dish_img">
                            @error('side_dish_img')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Giá món phụ</label>
                            <input class="form-control" type="text" name="side_dish_price">
                            @error('side_dish_price')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button class="btn btn-save" type="submit">Lưu lại</button>
                <button class="btn btn-cancel" type="reset">Hủy bỏ</button>
                <p></p>

                <script>
                    // Kiểm tra nếu có session "success" được thiết lập
                    @if (session('success'))
                        // Hiển thị hộp thoại thông báo thành công
                        swal({
                            title: "Thành công!",
                            text: "{{ session('success') }}",
                            icon: "success",
                            button: "Đóng"
                        });
                    @endif

                    @if (session('error'))
                        // Hiển thị hộp thoại thông báo thành công
                        swal({
                            title: "Thất bại!",
                            text: "{{ session('error') }}",
                            icon: "warning",
                            button: "Đóng"
                        });
                    @endif
                </script>
            </form>
        </div>
    </div>
@endsection
