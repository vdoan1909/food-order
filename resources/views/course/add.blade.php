@extends('layout.main')
@section('title')
    Thêm khoá học
@endsection

@section('function')
    <a class="btn btn-primary" href="{{ url()->previous() }}">
        Quay lại
    </a>
@endsection


@section('table')
    @if ($errors->any())
        <div class="btn btn-danger">
            Input is invalid
        </div>
    @endif

    <form class="row" action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group col-md-4">
            <label class="control-label">Tên</label>
            <input class="form-control" type="text" name="name">
            @error('name')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-4">
            <label class="control-label">Giá</label>
            <input class="form-control" type="text" name="price">
            @error('price')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group col-md-12">
            <label class="control-label">Ảnh</label>
            <div id="myfileupload">
                <input type="file" name="image" />
            </div>
            @error('image')
                <span style="color: red">{{ $message }}</span>
            @enderror
        </div>


        <button class="btn btn-save ml-3" type="submit">Lưu lại</button>
    </form>

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
