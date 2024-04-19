<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật tài khoản</title>
    <link rel="icon" href="image/logo.png"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
</head>
<body>
@include('header')
<div style="padding: 20px;  width: 100%; border: 2px solid #c3b9f4d8">
    <a style="margin: 10px 0px; color: #777777">SHOP</a><br>
    <a>Trang chủ / </a><a>Thông tin tài khoản / </a><a>Chỉnh sửa / </a><a style="color:#2d08e9d8">{{ session('user')->username }}</a>
</div>
 
<div style="width:100%;min-height:200px;" class="home">
    <div class="home_left">
        
        <div >
            
            <a style="font-weight: bold;size:20px;text-decoration: none;    color: #000;;" href="{{url('/')}}" >Trang chủ</a><br>
            <a style="font-weight: bold;size:20px;text-decoration: none;    color: #000;;" href="{{url('/LoaiSanPham')}}" >Loại sản phẩm</a><br>
                @foreach($loaiSPs as $loaiSP)
                    <a style="text-decoration: none; padding: 8px 0 0 8px; color: #000;"  href="{{url('/LoaiSanPham', $loaiSP->id)}}" >{{ $loaiSP->TenLoaiSP }}</a><br>
                @endforeach
                <a style="font-weight: bold;size:20px;text-decoration: none;    color: #000;;" href="{{url('/SanPhamHot')}}" >Hot <img src="https://fptcity.vn/wp-content/uploads/hot-icon.gif" alt="" width="50px" height="50px"></a><br>
            <a style="font-weight: bold;size:20px;text-decoration: none;    color: #000;;" href="{{url('/HienThiSP')}}" >Giảm giá  <img src="https://img.lovepik.com/element/40174/0171.png_860.png" alt="" width="50px" height="50px"></a><br>
        </div>
    </div>
    <div class="home_right" >
        <div class="personal-info" style="margin-top: 50px;">
            <h2 style="text-align: center">Cập Nhật Thông Tin Cá Nhân</h2>
            <div style="margin: 50px 0 50px 80px;">
            
            <form  action = "/ChinhSuaTaiKhoan" method="post" >
                @csrf
                <div class="row mb-3" style="width:100%">
                    <div class="col-md-3" style="width:20%">
                        <label for="fullname" class="form-label">Họ và tên:</label>
                    </div>
                    <div class="col-md-9" style="width:70%">
                        <input type="text"  name="fullname" class="form-control" value="{{ session('user')->fullname }}">
                    </div>
                </div>
                <div class="row mb-3" style="width:100%">
                    <div class="col-md-3" style="width:20%">
                        <label for="username" class="form-label">Tên đăng nhập:</label>
                    </div>
                    <div class="col-md-9" style="width:70%">
                        <input type="text" name="username" class="form-control" value="{{ session('user')->username }}">
                    </div>
                </div>
                <div class="row mb-3" style="width:100%">
                    <div class="col-md-3" style="width:20%">
                        <label for="password" class="form-label">Mật khẩu:</label>
                    </div>
                    <div class="col-md-9" style="width:70%">
                        <input type="password" name="password" class="form-control" value="{{ session('user')->password }}">
                    </div>
                </div>
                <div class="row mb-3" style="width:100%">
                    <div class="col-md-3" style="width:20%">
                        <label for="email" class="form-label">Email:</label>
                    </div>
                    <div class="col-md-9" style="width:70%">
                        <input type="email"  name="email" class="form-control" value="{{ session('user')->email }}">
                    </div>
                </div>
                <div class="row mb-3" style="width:100%">
                    <div class="col-md-3" style="width:20%">
                        <label for="address" class="form-label">Địa chỉ:</label>
                    </div>
                    <div class="col-md-9" style="width:70%">
                        <input type="text"  name="address" class="form-control" value="{{ session('user')->address }}">
                    </div>
                </div>
                <div class="row mb-3" style="width:100%">
                    <div class="col-md-3" style="width:20%">
                        <label for="phone" class="form-label">Số điện thoại:</label>
                    </div>
                    <div class="col-md-9" style="width:70%">
                        <input type="number"  name="phone" class="form-control" value="{{ session('user')->phone }}">
                    </div>
                </div>
                <div class="row mb-3" style="width:100%">
                    <div class="col-md-3" style="width:20%">
                        <label for="role" class="form-label">Vai trò:</label>
                    </div>
                    <div class="col-md-9" style="width:70%">
                        <input type="text" readonly class="form-control" id="role" value="{{ session('user')->role }}">
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-success" style="margin-left: 150px;border: none; background-color: #2d08e9d8; width: 170px;margin-top: 25px;">Cập nhật</button>
                    <a style="border: none; background-color: white; width: 170px; color: #2d08e9d8; border: 1.5px solid #2d08e9d8; margin-top: 25px; margin-left: 150px;marrgin-bottom:50px;" class="btn btn-primary" href="{{url('/ThongTinCaNhan')}}" role="button">Quay lại</a>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

    @include('footer')
</body>
</html>

