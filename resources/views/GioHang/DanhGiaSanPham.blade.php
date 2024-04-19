<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="image/logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <title>Đánh giá sản phẩm</title>
</head>
<body>
@include('header')


<div style="padding: 20px;  width: 100%; border: 2px solid #c3b9f4d8">
    <a style="margin: 10px 0px; color: #777777">SHOP</a><br>
    <a>Trang chủ / </a><a style="color:#2d08e9d8">Đánh giá sản phẩm</a>
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

        <div style="width: 100%; text-align: center; margin-top: 20px;">
            <button style="margin:0 20px; background-color: #2d08e9d8; "onclick="window.location.href='{{url('/GioHang')}}'" class="btn btn-primary">Giỏ hàng</button>
            <button style="margin:0 20px; background-color: #2d08e9d8; "onclick="window.location.href='{{url('/DonHangChoXacNhan')}}'" class="btn btn-primary">Chờ xác nhận</button>
            <button style="margin:0 20px; background-color: #2d08e9d8; "onclick="window.location.href='{{url('/DonHangDangVanChuyen')}}'" class="btn btn-primary">Đang vận chuyển</button>
            <button style="margin:0 20px; background-color: #2d08e9d8; "onclick="window.location.href='{{url('/DonHangDaVanChuyen')}}'" class="btn btn-primary">Đã vận chuyển</button>

        </div>
        <h3 style="text-align: center; margin-top: 40px"><b>Đánh Giá Sản Phẩm</b></h3>
        
        <form  style=" margin-left: 120px; margin-top: 50px" action="/XuLyDanhGia/{{$DonHang->id}}" method="POST">
            @csrf
            <div style="width:90% ;" >
            <div  style="margin:10px 0;">
                <label  class="form-label">Đánh giá</label>
                <textarea class="form-control" placeholder="Đánh giá ....." name="DanhGia" required></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-success" style="padding:9px 0;border: none; background-color: #2d08e9d8; width: 170px; margin-left: 630px; float: left; margin-top: 22px">Xác nhận</button>
            </div>
            </div>
        </form>
        <div class="Giohangtt">
    </div>

    
</div></div>
@include('footer')
</body>
</html>
