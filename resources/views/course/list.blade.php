@extends('layout.main')
@section('title')
    Danh sách khoá học
@endsection

@section('function')
    <a class="btn btn-add btn-sm" href="{{ route('course.add') }}">
        <i class="fas fa-plus"></i> Thêm mới khoá học
    </a>
@endsection
@section('table')
    <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0"
        id="sampleTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th width="150">Tính năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>
                        <img width="200" src="{{ asset('storage/' . $course->image) }}" alt="">
                    </td>
                    <td>{{ $course->price }}</td>
                    <td class="table-td-center">
                        <a onclick="return confirm('Xoa la mat luon ?')"  href="{{ route('course.delete', ['id' => $course->id]) }}" class="btn btn-primary btn-sm">Delete</a>
                        <a href="{{ route('course.detail', ['id' => $course->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif
@endsection
