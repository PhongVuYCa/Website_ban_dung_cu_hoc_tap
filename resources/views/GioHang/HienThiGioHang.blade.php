<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="image/logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <title>Giỏ hàng</title>
</head>
<body>
@include('header')


<div style="padding: 20px;  width: 100%; border: 2px solid #c3b9f4d8">
    <a style="margin: 10px 0px; color: #777777">SHOP</a><br>
    <a>Trang chủ / </a><a style="color:#2d08e9d8">Giỏ hàng</a>
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
        @if (session('ThongBao'))
        <div class="alert alert-danger">
            {{ session('ThongBao') }}
        </div>
        @endif
        <div style="width: 100%; text-align: center; margin-top: 20px;">
            <button style="margin:0 20px; background-color: #2d08e9d8; "onclick="window.location.href='{{url('/GioHang')}}'" class="btn btn-primary">Giỏ hàng</button>
            <button style="margin:0 20px; background-color: #2d08e9d8; "onclick="window.location.href='{{url('/DonHangChoXacNhan')}}'" class="btn btn-primary">Chờ xác nhận</button>
            <button style="margin:0 20px; background-color: #2d08e9d8; "onclick="window.location.href='{{url('/DonHangDangVanChuyen')}}'" class="btn btn-primary">Đang vận chuyển</button>
            <button style="margin:0 20px; background-color: #2d08e9d8; "onclick="window.location.href='{{url('/DonHangDaVanChuyen')}}'" class="btn btn-primary">Đã vận chuyển</button>
            <button style="margin:0 20px; background-color: #2d08e9d8; "onclick="window.location.href='{{url('/DonHangDaHuy')}}'" class="btn btn-primary">Đã hủy</button>

        </div>
        @if ($gioHangItems->isEmpty())
        <div style="margin:40px 0 300px 0;text-align: center;">Giỏ hàng của bạn đang trống.</div>
        @else
        <h3 style="text-align: center; margin-top: 40px"><b>Giỏ hàng</b></h3>
        <div class="Giohang" >
            <table class="table table-hover" >
                <thead>
                    <tr>
                        <td>STT</td>
                        <td>Hình ảnh</td>
                        <td>Tên dụng cụ</td>
                        <td>Giá</td>
                        <td>Số lượng</td>
                        <td>Tổng giá</td>
                        <td>Hành động</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 1;
                        $tong=0;
                    @endphp
                    
                    @foreach ($gioHangItems as $item)
                        <tr>
                            @php
                                $tong+= $item->SanPham->Gia * $item->SoLuong * (100 - $item->SanPham->GiamGia) / 100 ;
                            @endphp
                            <td ><h6 style="margin-top: 60px;text-align: center;">{{ $counter }}</h6></td>
                            <td style="text-align: center;"><img src="{!! asset($item->SanPham->id_HinhAnh) !!}" alt="" width="150px" height="150px"></td>
                            <td><h6 style="margin-top: 60px; width:150px; text-align: center;">{{ $item->SanPham->TenSP }}</h6></td>
                            <td><h6 style="margin-top: 60px;text-align: center;">{{ $item->SanPham->Gia* (100 - $item->SanPham->GiamGia) / 100}} VND</h6></td>
                            {{-- <td><h6 style="margin-top: 60px;text-align: center; ">{{ $item->SoLuong }}</h6></td> --}}
                            <td><h6 style="margin-top: 60px;text-align: center; "><a style="text-decoration:none;color:black" href="/CapNhatGioHang/{{ $item->id_SanPham}}">&#9998;</a>{{ $item->SoLuong }}</h6></td>
                            <td><h6 style="margin-top: 60px; text-align: center;">{{ $item->SanPham->Gia * $item->SoLuong*(100 - $item->SanPham->GiamGia) / 100}} VND</h6></td>
                            <td>
                                <a style="text-decoration:none; color:black; padding-top: 60px; text-align: center" href="{{ url('/XoaGioHang/' . $item->SanPham->id) }}" onclick="return confirm('Bạn chắc chắn muốn xóa?')">
                                    <h4 style="padding-top: 60px;">X</h4>
                                </a>
                            </td>
                        </tr>
                        @php
                            $counter++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="Giohangtt">
        <table>
            <tr>
                <td colspan="6"><h5>Thành tiền:</h5></td>
                <td style="color:#ffa500; padding-left: 8px;"><h5>{{ $tong }} VND</h5></td>
            </tr>
        </table>
    </div>

        <div class="buttontt" style="margin-bottom: 50px"> 
            <a href="{{url('/ThanhToan')}}"><button >Thanh toán</button></a>
        </div>
        @endif
    
    </div>
    
</div>
@include('footer')
</body>
</html>
