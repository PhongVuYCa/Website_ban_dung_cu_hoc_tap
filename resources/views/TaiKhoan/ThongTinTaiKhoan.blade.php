<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin cá nhân</title>
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
    <a>Trang chủ / </a><a>Thông tin cá nhân / </a><a style="color:#2d08e9d8">{{ session('user')->username }}</a>
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
        <div class="personal-info" style="margin-top: 50px;">
            <h2 style="text-align: center">Thông Tin Cá Nhân</h2>
            <div style="margin: 50px 0 0 80px">
                <div class="row mb-3" style="width:100%">
                    <div class="col-md-3" style="width:20%">
                        <label for="fullname" class="form-label">Họ và tên:</label>
                    </div>
                    <div class="col-md-9" style="width:70%">
                        <input type="text" readonly class="form-control" id="fullname" value="{{ session('user')->fullname }}">
                    </div>
                </div>
                <div class="row mb-3" style="width:100%">
                    <div class="col-md-3" style="width:20%">
                        <label for="username" class="form-label">Tên đăng nhập:</label>
                    </div>
                    <div class="col-md-9" style="width:70%">
                        <input type="text" readonly class="form-control" id="username" value="{{ session('user')->username }}">
                    </div>
                </div>
                <div class="row mb-3" style="width:100%">
                    <div class="col-md-3" style="width:20%">
                        <label for="password" class="form-label">Mật khẩu:</label>
                    </div>
                    <div class="col-md-9" style="width:70%">
                        <input type="text" readonly class="form-control" id="password" value="{{ session('user')->password }}">
                    </div>
                </div>
                <div class="row mb-3" style="width:100%">
                    <div class="col-md-3" style="width:20%">
                        <label for="email" class="form-label">Email:</label>
                    </div>
                    <div class="col-md-9" style="width:70%">
                        <input type="email" readonly class="form-control" id="email" value="{{ session('user')->email }}">
                    </div>
                </div>
                <div class="row mb-3" style="width:100%">
                    <div class="col-md-3" style="width:20%">
                        <label for="address" class="form-label">Địa chỉ:</label>
                    </div>
                    <div class="col-md-9" style="width:70%">
                        <input type="text" readonly class="form-control" id="address" value="{{ session('user')->address }}">
                    </div>
                </div>
                <div class="row mb-3" style="width:100%">
                    <div class="col-md-3" style="width:20%">
                        <label for="phone" class="form-label">Số điện thoại:</label>
                    </div>
                    <div class="col-md-9" style="width:70%">
                        <input type="text" readonly class="form-control" id="phone" value="{{ session('user')->phone }}">
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
                    <a href="{{url('/FormChinhSuaTaiKhoan')}}" ><button style="margin-left:76%; margin-top:20px;margin-bottom: 50px; color:white;background-color: #2d08e9d8; padding:8px 12px; border-radius: 5px ;border: 1.5px solid #2d08e9d8;">Cập nhật</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')
</body>
</html>