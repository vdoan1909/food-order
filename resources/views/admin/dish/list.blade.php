@extends('layout.admin.index')
@section('content')
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách món ăn</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
                            <a class="btn btn-add btn-sm" href="{{ route('admin.dish.add') }}" title="Thêm">
                                <i class="fas fa-plus"></i>
                                Tạo mới món ăn
                            </a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Mã món ăn</th>
                                <th>Tên món ăn</th>
                                <th>Giá món ăn</th>
                                <th>Ảnh món ăn</th>
                                <th>Mô tả</th>
                                <th>Lượt xem</th>
                                <th>Thể loại</th>
                                <th>Ngày thêm</th>
                                <th width="120">Chức năng</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($list_dish as $dish)
                                <tr>
                                    <td>
                                        {{ $dish->id }}
                                    </td>
                                    <td>
                                        {{ $dish->ten_mon_an }}
                                    </td>
                                    <td>
                                        {{ number_format($dish->gia_mon_an, 0, '.', '.') }}
                                    </td>
                                    <td>
                                        <img style="object-fit: cover" width="100" height="100"
                                            src="{{ asset('storage/' . $dish->anh_mon_an) }}" alt="{{ $dish->ten_mon_an }}">
                                    </td>
                                    <td>
                                        @if (str_word_count($dish->mo_ta) > 22)
                                            {{ substr($dish->mo_ta, 0, 22) }}...
                                        @else
                                            {{ $dish->mo_ta }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ $dish->luot_xem }}
                                    </td>
                                    <td>
                                        @foreach ($list_ctg as $ctg)
                                            @if ($ctg->id == $dish->id_the_loai)
                                                {{ $ctg->ten_danh_muc }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        {{ $dish->ngay_them }}
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm trash"
                                            onclick="confirmDelete({{ $dish->id }}, '{{ route('admin.dish.delete', ['id' => $dish->id]) }}')"
                                            title="Xóa">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <a href="{{ route('admin.dish.detail', ['id' => $dish->id]) }}"
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
