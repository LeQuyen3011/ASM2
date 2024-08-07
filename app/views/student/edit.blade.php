
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
<h1>Sửa thông viên</>
    <form  method="POST">
        <input type="text" name="name" id="" value="{{ $student->name }}"><br>
        <input type="number" name="year_of_birth" id="" value="{{ $student->year_of_birth }}"><br>
        <input type="text" name="phone_number" id="" value="{{ $student->phone_number }}"><br>
        <input type="submit" value="Cập nhật tin sinh viên">
    </form>
@endsection

