@extends('layout.main')
@section('content')
<a href="{{ route('add') }}">Thêm Sinh viên</a><br> <!-- Đảm bảo route này đã được định nghĩa -->
@if (isset($_GET['msg'])&& isset($_SESSION['success']))
         <span style="color:green">{{ $_SESSION['success'] }}</span><br>
@endif
<table border="1">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>year of birth</th>
        <th>phone number</th>
        <th>Action</th>
    </thead>
    <tbody>
         @foreach($students as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->year_of_birth }}</td>
                <td>{{ $item->phone_number }}</td>
                <th>
                    <a href="{{ route('edit/'.$item->id) }}">Sửa</a>
                    <a href="{{ route('delete/'.$item->id) }}" onclick="return confirm('bạn có muốn xóa không?')">Xóa</a>
                </th>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
