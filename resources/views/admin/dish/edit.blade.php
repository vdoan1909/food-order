@extends('layout.admin.index')
@section('content')
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Danh sách món ăn</li>
            <li class="breadcrumb-item"><a href="#">Thêm món ăn</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form class="tile" action="{{ route('admin.dish.store') }}" method="post" enctype="multipart/form-data"
                novalidate>
                @csrf
                <h3 class="tile-title">Tạo mới món ăn</h3>

                <div class="tile-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label">Tên món ăn</label>
                            <input class="form-control" type="text" name="dish_name" value="{{old('dish_name') ?? $dish_detail->ten_mon_an}}">
                            @error('dish_name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label">Giá món ăn</label>
                            <input class="form-control" type="text" name="dish_price">
                            @error('dish_price')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label">Ảnh món ăn</label>
                            <input class="form-control" type="file" name="dish_img">
                            @error('dish_img')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label">Mô tả</label>
                            <input class="form-control" type="text" name="dish_des">
                            @error('dish_des')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label">Thể loại</label>
                            <select class="form-control" name="dish_ctg">
                                <option value="">-- Chọn thể loại --</option>
                                @foreach ($list_ctg as $ctg)
                                    <option value="{{$ctg->id}}">
                                        {{$ctg->ten_danh_muc}}
                                    </option>
                                @endforeach
                            </select>
                            @error('dish_ctg')
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
