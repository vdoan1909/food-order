@extends('layout.main')
@section('title')
    Danh sách người dùng
@endsection

@section('function')
    <a class="btn btn-add btn-sm" href="{{ route('user.add') }}">
        <i class="fas fa-plus"></i> Thêm mới người dùng
    </a>
@endsection
@section('table')
    <table class="table table-hover table-bordered js-copytextarea" cellpadding="0" cellspacing="0" border="0"
        id="sampleTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Ảnh</th>
                <th>Ngày tạo</th>
                <th>Ngày cập nhật</th>
                <th>Chức vụ</th>
                <th width="150">Tính năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <img width="200" src="{{ asset('storage/' . $user->image) }}" alt="">
                    </td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        @if ($user->role == '1')
                            Admin
                        @else
                            User
                        @endif
                    </td>
                    <td class="table-td-center">
                        <a onclick="return confirm('Xoa la mat luon ?')"  href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-primary btn-sm">Delete</a>
                        <a href="{{ route('user.detail', ['id' => $user->id]) }}" class="btn btn-primary btn-sm">Edit</a>
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
