@extends('layout.admin.index')
@section('content')
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Danh sách danh mục</li>
            <li class="breadcrumb-item"><a href="#">Sửa danh mục</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form class="tile" action="{{ route('admin.category.edit') }}" method="post" novalidate>
                @csrf
                @method("PUT")
                <h3 class="tile-title">Sửa danh mục</h3>

                <div class="tile-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="control-label">Tên danh mục</label>
                            <input class="form-control" type="text" name="ctg_name"
                                value="{{ old('ctg_name') ?? $ctg_detail->ten_danh_muc }}">
                            @error('ctg_name')
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
                            icon: "error",
                            button: "Đóng"
                        });
                    @endif
                </script>
            </form>
        </div>
    </div>
@endsection
