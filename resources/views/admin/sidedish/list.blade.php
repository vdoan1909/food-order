@extends('layout.admin.index')
@section('content')
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách món ăn phụ</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
                            <a class="btn btn-add btn-sm" href="{{ route('admin.side-dish.add') }}" title="Thêm">
                                <i class="fas fa-plus"></i>
                                Tạo mới món ăn phụ
                            </a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Mã món ăn phụ</th>
                                <th>Tên món ăn phụ</th>
                                <th>Ảnh món ăn phụ</th>
                                <th>Giá món ăn phụ</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($list_side_dish as $side_dish)
                                <tr>
                                    <td>
                                        {{ $side_dish->id }}
                                    </td>
                                    <td>
                                        {{ $side_dish->ten_mon_phu }}
                                    </td>
                                    <td>
                                        <img style="object-fit: cover" width="100" height="100"
                                            src="{{ asset('storage/' . $side_dish->anh_mon_phu) }}"
                                            alt="{{ $side_dish->ten_mon_phu }}">
                                    </td>
                                    <td>
                                        {{ number_format($side_dish->gia_mon_phu, 0, '.', '.') }} VND
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm trash"
                                            onclick="confirmDelete({{ $side_dish->id }}, '{{ route('admin.side-dish.delete', ['id' => $side_dish->id]) }}')"
                                            title="Xóa">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <a href="{{ route('admin.side-dish.detail', ['id' => $side_dish->id]) }}"
                                            class="btn btn-primary btn-sm edit" title="Sửa">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
