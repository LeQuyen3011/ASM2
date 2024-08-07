@extends('layout.main')
@section('content')
@if (isset($_GET['msg'])&& isset($_SESSION['errors']))
    @foreach ($_SESSION['errors'] as $item)
         <span style="color:red">{{ $item }}</span><br>
    @endforeach
@endif
@if (isset($_GET['msg'])&& isset($_SESSION['success']))
         <span style="color:green">{{ $_SESSION['success'] }}</span><br>
@endif
<h1>Thêm Sinh viên</>
    <form action="" method="POST">
        <input type="text" name="name" id="" placeholder="Nhập tên sinh viên"><br>
        <input type="number" name="year_of_birth" id="" placeholder="Nhập tuổi sinh viên"><br>
        <input type="text" name="phone_number" id="" placeholder="Nhập số điện thoại sinh viên"><br>
        <input type="submit" value="Thêm sinh viên">
    </form>
@endsection