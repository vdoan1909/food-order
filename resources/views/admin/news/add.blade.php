@extends('layout.admin.index')
@section('content')
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">Danh sách tin tức</li>
            <li class="breadcrumb-item"><a href="#">Thêm tin tức</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form class="tile" action="{{ route('admin.news.store') }}" method="post" enctype="multipart/form-data"
                novalidate>
                @csrf
                <h3 class="tile-title">Tạo mới tin tức</h3>

                <a href="{{ url()->previous() }}" class="btn btn-save btn-sm"><i class="fas fa-chevron-left"></i> Quay lại</a>
                
                <div class="tile-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="control-label">Tên tin tức</label>
                            <input class="form-control" type="text" name="news_name">
                            @error('news_name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">Mô tả</label>
                            <input class="form-control" type="text" name="news_des">
                            @error('news_des')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">Ảnh tin tức</label>
                            <input class="form-control" type="file" name="news_img">
                            @error('news_img')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">Thể loại</label>
                            <select class="form-control" name="news_ctg">
                                <option value="">-- Chọn thể loại --</option>
                                @foreach ($list_new_ctg as $news_ctg)
                                    <option value="{{$news_ctg->id}}">
                                        {{$news_ctg->ten_danhmuc_tintuc}}
                                    </option>
                                @endforeach
                            </select>
                            @error('news_ctg')
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
