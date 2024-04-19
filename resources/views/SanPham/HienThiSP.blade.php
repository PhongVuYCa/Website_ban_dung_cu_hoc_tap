<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
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
    <a>Trang chủ / </a><a>Sản phẩm / </a><a style="color:#2d08e9d8">{{$SP}}</a>
</div>
<div style="width:100%;min-height:200px;" class="home">
    <div class="home_left">
        
        <div  >
            <a style="font-weight: bold;size:20px;text-decoration: none;    color: #000;;" href="{{url('/')}}" >Trang chủ</a><br>
            <a style="font-weight: bold;size:20px;text-decoration: none;    color: #000;;" href="{{url('/LoaiSanPham')}}" >Loại sản phẩm</a><br>
                @foreach($loaiSPs as $loaiSP)
                    <a style="text-decoration: none; padding: 8px 0 0 8px; color: #000;"  href="{{url('/LoaiSanPham', $loaiSP->id)}}" >{{ $loaiSP->TenLoaiSP }}</a><br>
                @endforeach
                <a style="font-weight: bold;size:20px;text-decoration: none;    color: #000;;" href="{{url('/SanPhamHot')}}" >Hot <img src="https://fptcity.vn/wp-content/uploads/hot-icon.gif" alt="" width="50px" height="50px"></a><br>
            <a style="font-weight: bold;size:20px;text-decoration: none;    color: #000;;" href="{{url('/SanPhamGiamGia')}}" >Giảm giá  <img src="https://img.lovepik.com/element/40174/0171.png_860.png" alt="" width="50px" height="50px"></a><br>
        </div>
    </div>
    <div class="home_right" >
        <div style="padding: 5px; margin-top: 30px; border-left: 1px solid #777777">
            @foreach ($products as $product)
                <div class="card" style="width: 250px; height:350px;  margin: 0 0 40px 60px; float: left">
                    <img src="<?php echo asset("$product->id_HinhAnh")?>" alt="" width="188px" height="150px">
                    <div class="card-body">
                        <a href="{{url('/ChiTietSP', $product->id)}}" style = "text-decoration: none; color: black; margin-left: 70px"><h6 style = "text-align: center" class="card-title">{{ $product->TenSP }}</h6></a>
                            @if ($product->GiamGia != 0)
                            <p style = "color: #DD4466; text-align: center" class="card-text"><b>
                                <span style="color: #DD4466;"> {{$product->Gia * (100 - $product->GiamGia) / 100}} VND /</span>
                                <span style="color:#f1b4c1; ; text-decoration: line-through;"> {{$product->Gia}} VND</span>
                            </p>
                                @else
                                <p style = "color: #DD4466; text-align: center" class="card-text"><B>{{$product->Gia}} VND</B></p>
                            @endif
                        </b></p>
                    </div>
                </div>
            @endforeach
        </div>


        
    </div>
</div>
@include('footer')
</body>
</html>