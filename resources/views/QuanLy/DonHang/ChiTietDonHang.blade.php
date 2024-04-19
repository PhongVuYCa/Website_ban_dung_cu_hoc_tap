<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/logo.png"/>
    <title>Chi Tiết Đơn Hàng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
</head>
<body>
    
    <div class="admin">

        @include('left')
        
        
        <div class="admin_right">
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
            <b><h2 style="text-align: center; padding-top: 30px">Chi Tiết Đơn Hàng</h2></b>
            
            <div class="DSSanPham">
                <table class="table table-hover">
                    <tr class="table-dark">
                        
                        <td style="width: 150px;">Hình ảnh</td>
                        <td style="width: 250px;">Tên sản phẩm</td>
                        <td style="width: 110px;">Giá (VND)</td>
                        <td style="width: 120px;">Giảm giá (%)</td>
                        <td style="width: 100px;">Số lượng</td>
                        <td>Tổng giá(VND)</td>
                    </tr>
                    
                    @foreach($CTDonHangs as $CTDonHang)
                        <tr>
                            
                            <td><img src="{!! asset($CTDonHang->SanPham->id_HinhAnh) !!}" alt="" width="120px" height="120px"></td>
                            <td>
                                <a style="text-decoration:none; color:black; width: 60px; " href="{{ url('/XemChiTietSP/'. $CTDonHang->SanPham->id) }}">
                                    {{$CTDonHang->SanPham->TenSP}}
                                </a>
                            </td>
                            <td style="max-width: 110px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{$CTDonHang->Gia}}</td>
                            <td style="max-width: 120px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{$CTDonHang->GiamGia}}</td>
                            <td style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{$CTDonHang->SoLuong}}</td>
                            <td>{{$CTDonHang->TongGia}}</td>
                        </tr>
                    @endforeach
                </table>
                
        </div>
    </div>
</body>
</html>

