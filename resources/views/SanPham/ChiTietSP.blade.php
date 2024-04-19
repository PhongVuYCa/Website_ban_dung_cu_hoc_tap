<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
    <a>Trang chủ / </a><a>Sản phẩm / </a><a style="color:#2d08e9d8">{{$product->TenSP}}</a>
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
        <form action="/ThemVaoGioHang" method="post">
            @csrf
            <div style="width: 50%; float: left; padding: 65px 0 40px 130px; ">
                <img src="<?php echo asset("$product->id_HinhAnh")?>" alt="" width="300px" height="300px">
            </div>
            <div style="width:50%; float: left; padding: 60px 20px 0 20px; ">
                
                <p>Tên sản phẩm: {{$product->TenSP}}</p>
                <p>Ngày sản xuất: {{$product->NgaySX}}</p>
                @if ($product->GiamGia != 0)
                    <p>Giảm giá: {{$product->GiamGia}} %</p>
                    <p>
                        <span style="color: #333;">Giá bán: {{$product->Gia * (100 - $product->GiamGia) / 100}} VND /</span>
                        <span style="color: #999; text-decoration: line-through;"> {{$product->Gia}} VND</span>
                    </p>
                @else
                
                    <p>Giá bán: {{$product->Gia}} VND</p>
                @endif
                <p>Ngày sản xuất: {{$product->NgaySX}}</p>
                <p>Số lượng: {{$product->SoLuong}} {{$product->DonVi}}</p>
                <p>Ngày sản xuất: {{$product->NgaySX}}</p>
                <p>Nhà sản xuất: {{$product->NhaSX}} </p>
                <p>Bảo hành: {{$product->BaoHanh}} </p>
                @if(session('user'))
                <input class="form-control" style="float: left; height:40px; width:70px; text-align: center;" name="SoLuong" type="number" min="1" max="{{$product->SoLuong}}" value="1">
                <input type="hidden" name="id_SanPham" value="{{$product->id}}">
                <button class="bi bi-cart " style="float: left; margin-left: 10px; border:none; height: 40px; width: 200px; background-color: #ff0000; color: white; font-size: 20px" name="muahang">
                    <a style="color:white; margin-left: 5px">Thêm vào giỏ hàng</a>
                </button>
                @endif
                </form>
            </div>

            <div style="clear:both"></div>

            <div style=" width: 96%; margin: 10px 30px;">
                <button class="btn btn-outline-secondary" style="background-color: #0000002f; border: none; height: 40px;"><a style="text-align: center; color: #333333">Thông tin chi tiết</a></button>
            </div>

            <div style="padding: 20px; width: 96%; border: 1px solid #777777;margin:0 30px 50px 30px;">
                
                <p>{{$product->MoTa}}</p>
            </div>
        </form>

    </div>
</div>
@include('footer')
</body>
</html>