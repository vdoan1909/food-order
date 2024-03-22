@extends('layout.admin.index')
@section('content')
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách danh mục</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
                            <a class="btn btn-add btn-sm" href="{{ route('admin.category.add') }}" title="Thêm">
                                <i class="fas fa-plus"></i>
                                Tạo mới danh mục
                            </a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Mã danh mục</th>
                                <th>Tên danh mục</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($list_ctg as $ctg)
                                <tr>
                                    <td>
                                        {{ $ctg->id }}
                                    </td>
                                    <td>
                                        {{ $ctg->ten_danh_muc }}
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm trash" onclick="confirmDelete({{ $ctg->id }}, '{{ route('admin.category.delete', ['id' => $ctg->id]) }}')"
                                            title="Xóa">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <a href="{{ route('admin.category.detail', ['id' => $ctg->id]) }}"
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
