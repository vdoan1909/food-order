@extends('layout.admin.index')
@section('content')
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Danh sách tin tức</b></a></li>
        </ul>
        <div id="clock"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">
                            <a class="btn btn-add btn-sm" href="{{ route('admin.news.add') }}" title="Thêm">
                                <i class="fas fa-plus"></i>
                                Tạo mới tin tức
                            </a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Mã tin tức</th>
                                <th>Tên tin tức</th>
                                <th>Mô tả</th>
                                <th>Ảnh tin tức</th>
                                <th>Thể loại</th>
                                <th width="120">Chức năng</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($list_news as $news)
                                <tr>
                                    <td>
                                        {{ $news->id }}
                                    </td>
                                    <td>
                                        {{ $news->ten_tin_tuc }}
                                    </td>
                                    <td>
                                        @if (str_word_count($news->mo_ta_tin_tuc) > 22)
                                            {{ substr($news->mo_ta_tin_tuc, 0, 22) }}...
                                        @else
                                            {{ $news->mo_ta_tin_tuc }}
                                        @endif
                                    </td>
                                    <td>
                                        <img style="object-fit: cover" width="100" height="100"
                                            src="{{ asset('storage/' . $news->anh) }}" alt="{{ $news->ten }}">
                                    </td>
                                    <td>
                                        @foreach ($list_new_ctg as $new_ctg)
                                            @if ($new_ctg->id == $news->id_danh_muc_tin_tuc)
                                                {{ $new_ctg->ten_danhmuc_tintuc }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm trash"
                                            onclick="confirmDelete({{ $news->id }}, '{{ route('admin.news.delete', ['id' => $news->id]) }}')"
                                            title="Xóa">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <a href="{{ route('admin.news.detail', ['id' => $news->id]) }}"
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
