<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link rel="icon" href="image/logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
</head>
<body>
    @include('header')
    @if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
    @endif
    <div style="padding: 20px;  width: 100%; border: 2px solid #c3b9f4d8">
        <a style="margin: 10px 0px; color: #777777">SHOP</a><br>
        <a>Trang chủ / </a><a style="color:#2d08e9d8">Thanh toán</a>
    </div>
    <form  action="/XuLyDatHang" method="post">
        @csrf
    <div class="thanhtoan">
        
        <div class="tt-left">
            <h4 style="margin:50px 0 20px 0;"><B>Thông tin mua hàng</B></h4>    
            <table>
                <tr>
                    <td>
                        <p style="color: #c0c0c0;">Tên đăng nhập:</p>
                        <p>{{ session('user')->username }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="color: #c0c0c0;">Họ và tên:</p>
                        <p>{{ session('user')->fullname }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="color: #c0c0c0;">Số điện thoại:</p>
                        <p>{{ session('user')->phone }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="color: #c0c0c0;">Email:</p>
                        <p>{{ session('user')->email }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="color: #c0c0c0;">Địa chỉ nhận hàng:</p>
                        <p>{{ session('user')->address }}</p>
                    </td>
                </tr>
            </table>
        </div>
        <div class="tt-center">
            <h4 style="margin:50px 0 20px 0; "><B>Vận chuyển</B></h4>    
            <table>
                <tr style="padding: 0 30px ;">
                    <td>Phí vận chuyển</td>
                    <td style="padding-left:100px">30000 VND</td>
                </tr>
           
            </table>
            
            <h4 style="margin:20px 0 20px 0;"><B>Thanh toán</B></h4>    
            
            <table>
                <tr >
                    <td style="padding-left: 30px;"><input type="radio" name="payment_option" value="Thanh toán sau khi nhận hàng"> Thanh toán sau khi nhận hàng</td>
                </tr>
                <tr>
                    <td style="padding-left: 30px;"><input type="radio" name="payment_option" value="Ví điện tử Momo"> Ví điện tử Momo</td>
                </tr>
                <tr>
                    <td style="padding-left: 30px;"><input type="radio" name="payment_option" value=" Zalo pay"> Zalo pay</td>
                </tr>
                <tr>
                    <td style="padding-left: 30px;"><input type="radio" name="payment_option" value="Agribank"> Agribank</td>
                </tr>
                <tr>
                    <td style="padding-left: 30px;"><input type="radio" name="payment_option" value="ACB"> ACB</td>
                </tr>
                <tr>
                    <td style="padding-left: 30px;"><input type="radio" name="payment_option" value="VPBank"> VPBank</td>
                </tr>
                <tr>
                    <td style="padding-left: 30px;"><input type="radio" name="payment_option" value="BIDV"> BIDV</td>
                </tr>
                <tr>
                    <td style="padding-left: 30px;"><input type="radio" name="payment_option" value="Vietcombank"> Vietcombank</td>
                </tr>
                <tr>
                    <td style="padding-left: 30px;"><input type="radio" name="payment_option" value="TP Bank"> TP Bank</td>
                </tr>
            </table>
            
        </div>
        <div class="tt-right">
            <h4 style="margin:50px 0 20px 0;"><B>Đơn hàng </B></h4>  
            @foreach ($gioHangItems as $item)
                <table style="max-width:33%">
                    <tr>
                        <td style="max-width: 60px;">
                            <img src="{!! asset($item->SanPham->id_HinhAnh) !!}" alt="" width="50px" height="50px">
                        </td>
                        <td>
                            <table style="max-width:32%">
                                <tr>
                                    <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;  ">
                                        {{ $item->SanPham->TenSP }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold ;min-width:230px; min-width:230px">
                                        {{  $item->SoLuong*$item->SanPham->Gia* (100 - $item->SanPham->GiamGia) / 100}} VND
                                    </td>
                                    
                                    <td style="max-width:20px">
                                         SL:  
                                    </td>
                                    <td style="float: right;">
                                        {{ $item->SoLuong }}
                                    </td>
                                    
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            @endforeach


            <table style="margin-top:20px">
                <tr >
                    <td>Tạm tính</td>
                    <td style="float: right;">{{ $Tong }} VND</td>
                </tr>
                <tr >
                    <td>Vận chuyển</td>
                    <td style="float: right;">30000 VND</td>
                </tr>
                <tr style="border-top:1px solid black; ">
                    <td>Tổng cộng</td>
                    <td style="text-align: right;">
                        <h4>{{ 30000 + $Tong }} VND</h4>
                    </td>
                    
                </tr>
   
            </table>
            <div class="buttondh">
                <a href="{{url('/GioHang')}}">< Quay về giỏ hàng</a>
                <button type="submit"  style="float: right;">Đặt hàng</button>
            
            </div>
            
        </div>
    </div>
    </form>
    @include('footer')
</body>
</html>
