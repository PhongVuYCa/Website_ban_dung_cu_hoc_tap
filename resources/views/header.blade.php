<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/logo.png"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
</head>
<body>
<div class="header" style="width:100%">
    <div class="header1">
        <ul>
            <li>
                @if(!session('user'))
                <li style="margin-left: -50px">
                    <div class="col-4 nav" style="width: 100%;">
                        <div class="logo">
                            <i style="margin-top: 10px" class="fa fa-star icon-star"></i>
                            <a style="margin-top: 17px" href="{{url('/')}}" class="mobile">PRODUCT</a>
                            <a style="margin-top: 17px" href="{{url('/')}}" class="store">STORE</a>
                            <div class = "search" style="margin-top: 20px; margin-bottom: 0px;">
                                <form action="/TimKiemSanPham" class="d-flex" role="search" method="post">
                                    @csrf
                                    <input style="height: 40px" class="form-control me-2" name="search" aria-label="Search">
                                    <button style="border:none; background-color: #2d08e9d8; height: 40px" class="btn btn-outline-success" type="submit"><i style="color: white; font-size: 20px; " class="bi bi-search"></i></button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </li>
                <li>
                <div class = "headerTitle">
                    <i style="color: #2d08e9d8; font-size: 25px;margin-left: 150px " class="bi bi-list"></i>
                </div>
                <a style="color:black;float: left; margin-left: 165px" href="{{url('/DangNhap')}}">Đăng nhập</a>
                @endif
                
            </li>
            <li style="margin-left: -50px">
                @if(session('user'))
                <div class="col-4 nav" style="width: 100%;">
                    <div class="logo">
                        <i style="margin-top: 10px" class="fa fa-star icon-star"></i>
                        <a style="margin-top: 17px" href="{{url('/')}}" class="mobile">PRODUCT STORE</a>

                        <div class = "search" style="margin-top: 20px; margin-bottom: 0px;">
                            <form action="/TimKiemSanPham" class="d-flex" role="search" method="post">
                                @csrf
                                <input style="height: 40px" class="form-control me-2" name="search" aria-label="Search">
                                <button style="border:none; background-color: #2d08e9d8; height: 40px" class="btn btn-outline-success" type="submit"><i style="color: white; font-size: 20px; " class="bi bi-search"></i></button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </li>
            <li>
                <div class = "headerTitle">
                    <i style="color: #2d08e9d8; font-size: 25px; " class="bi bi-cart"></i>
                </div>
                <a style="float: left; margin-left: 15px; color:black;margin-top:23px" href="/GioHang">Giỏ hàng</a>
            </li>
            <li style="margin-left: 40px">
                    <div class = "headerTitle">
                        <i style="color: #2d08e9d8; font-size: 25px; " class="bi bi-person"></i>
                    </div>
                    <a href="{{url('/TaiKhoan')}}" style="float: left; margin-left: 15px; color: black; margin-top: 23px; max-width: 80px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"> {{session('user')->username}}</a>

                @endif
            </li>
            <li style="margin-left: 40px">
                @if(session('user'))
                <div class = "headerTitle">
                    <i style="color: #2d08e9d8; font-size: 25px;" class="bi bi-lock"></i>
                </div>
                <a style="float: left; margin-left: 15px; color:black;margin-top:23px" href="/DangXuat">Đăng xuất</a>
                @endif
            </li>
        </ul>
    </div>

</div>
</body>
</html>
