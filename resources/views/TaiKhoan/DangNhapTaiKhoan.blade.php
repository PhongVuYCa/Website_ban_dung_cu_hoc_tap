<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="image/logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <title>Đăng Nhập</title>
</head>
<body>

@include("header")
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
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
<h3 style="text-align: center; margin-top: 50px"><b>ĐĂNG NHẬP</b></h3>

<form action="XuLyDangNhap" method="post">
  
    @csrf
    <div class="mb-3" style="margin-top: 30px">
        <label for="exampleInputEmail1" class="form-label"><b>Email:</b></label>
        <input type="text" placeholder="Your email..." class="form-control" name="Email" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3" style="margin-top: 30px">
        <label for="exampleInputPassword1" class="form-label"><b>Mật khẩu:</b></label>
        <input type="password" placeholder="Your password..." class="form-control" name="Password" required>
    </div>

    <button type="submit" class="btn btn-success" style="border: none; background-color: #2d08e9d8; width: 150px; float: left; margin-top: 25px">Đăng nhập</button>
    <button class="btn btn-success" style="background: white; color: #2d08e9d8;border: 1.5px solid #2d08e9d8 ; width: 150px; margin-left: 30px; margin-top: 25px"><a style="text-decoration: none; color: black" href="{{url('/DangKi')}}">Đăng kí</a></button>
                                                
    <a href="/QuenMatKhau">Quên mật khẩu?</a>

</form>
   


</div>
<div style="float: left; height: 301px; width: 100%">
    @include('footer')
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</html>
