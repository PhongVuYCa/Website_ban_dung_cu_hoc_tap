<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="image/logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <title>Quên mật khẩu</title>
</head>
<body>

@include("header")
@if (session('ThongBaoThanhCong'))
<div class="alert alert-success">
    {{ session('ThongBaoThanhCong') }}
</div>
@endif
@if (session('ThongBaoThatBai'))
<div class="alert alert-danger">
    {{ session('ThongBaoThatBai') }}
</div>
@endif

<div class="form">
<h3 style="text-align: center; margin-top: 50px"><b>QUÊN MẬT KHẨU</b></h3>
<form  action="/XuLyQuenMatKhau" method="post">
    @csrf
    <div class="mb-3">
        <label  class="form-label"><b>Họ và tên:</b></label>
        <input type="text" placeholder="Your fullname..." class="form-control" name="Fullname" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3" style="margin-top: 30px">
        <label for="exampleInputEmail1" class="form-label"><b>Số điện thoại:</b></label>
        <input type="number" placeholder="Your phone number..." class="form-control" name="Phone" required>
    </div>
    <div class="mb-3" style="margin-top: 30px">
        <label  class="form-label"><b>Email:</b></label>
        <input type="email" placeholder="Your email..." class="form-control" name="Email" aria-describedby="emailHelp" required>
    </div>
    
    <div class="mb-3" style="margin-top: 30px">
        <label  class="form-label"><b>Mật khẩu mới:</b></label>
        <input type="password" placeholder="Your password..." class="form-control" name="Password" required>
    </div>
    <button type="submit" class="btn btn-success" style="border: none; background-color: #2d08e9d8; width: 150px; float: left; margin-top: 25px">Tiếp tục</button>
</form>
<button class="btn btn-success" style="background: white; color: #2d08e9d8;border: 1.5px solid #2d08e9d8 ; width: 150px; margin-left: 30px; margin-top: 25px"><a style="text-decoration: none; color: black" href="{{url('/DangNhap')}}">Quay lại</a></button>

</div>

<div style="float: left; height: 301px; width: 100%">
    @include('footer')
</div>
</body>

</html>
