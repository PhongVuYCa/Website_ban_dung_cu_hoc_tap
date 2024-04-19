<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/logo.png"/>
    <title>Danh sách đơn hàng</title>
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
            <div style="text-align: center; margin-top: 20px;">
                <a style="text-decoration: none; padding: 8px 0 0 8px; color: #fff;"  href="{{url('/ChoXacNhan')}}" ><button style="border-radius: 7px;color: #fff; background-color: #000;border: none;padding:8px;">Chờ xác nhận</button></a>
                <a style="text-decoration: none; padding: 8px 0 0 8px; color: #fff;"  href="{{url('/DangVanChuyen')}}" ><button style="border-radius: 7px;color: #fff; background-color: #000;border: none;padding:8px;">Đang vận chuyển</button></a>
                <a style="text-decoration: none; padding: 8px 0 0 8px; color: #fff;"  href="{{url('/DaVanChuyen')}}" ><button style="border-radius: 7px;color: #fff; background-color: #000;border: none;padding:8px;">Đã vận chuyển</button></a>
                <a style="text-decoration: none; padding: 8px 0 0 8px; color: #fff;"  href="{{url('/DaHuy')}}" ><button style="border-radius: 7px;color: #fff; background-color: #000;border: none;padding:8px;">Đã hủy</button></a>
            </div>  
            <b><h2 style="text-align: center; padding-top: 30px">Danh Sách Đơn Hàng Chờ xét Duyệt</h2></b>
            
            <div class="DSSanPham">
            <table class="table table-hover">
                <tr class="table-dark">
                    <td style="width: 100px;">Mã DH</td>
                    <td style="width: 100px;">Mã KH</td>
                    <td style="width: 200px; ">Phương thức thanh toán</td>
                    <td style="width: 150px;">Tổng tiền</td>
                    <td style="min-width: 50px; max-width: 70px;">Tình trạng</td>
                    <td style="min-width: 90px; max-width: 90px;">Hành động</td>
                </tr>
                
                @foreach($DonHangs as $DonHangs)
                    <tr>
                        <td style="width: 60px;">{{$DonHangs->id}}</td>
                        <td>
                            <a style="text-decoration:none; color:black; width: 60px; " href="{{ url('/XemChiTietKhachHang/'. $DonHangs->id_user) }}">
                                {{$DonHangs->id_user}}
                            </a>
                        </td>
                        <td style="max-width: 200px; ;overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{$DonHangs->PhuongThucThanhToan}}</td>
                        <td style="min-width: 50px; max-width: 50px;">{{$DonHangs->ThanhTien}}</td>
                        <td style="min-width: 50px; max-width: 50px;">{{$DonHangs->TinhTrang}}</td>
                        <td style="min-width: 110px; max-width: 110px;">
                            <div style="display: flex; justify-content: center;">
                            <form style="float: left; margin-left:5px; " action="/XemChiTietDonHang/{{$DonHangs->id}}" method="post" >
                                @csrf
                                <button style="border-radius: 5px;color: #fff; background-color: #211a86;border: none;padding:5px;" type="submit" style="width: 50px" >Chi tiết</button>
                            </form>
                            @if($DonHangs->TinhTrang=='Chờ xét duyệt')
                                <form style="float: left; margin-left:5px; " action="/CapNhatDonHang/{{$DonHangs->id}}" method="post" >
                                    @csrf
                                    <button style="border-radius: 5px;color: #fff; background-color: #d2960c;border: none;padding:5px;" type="submit" style="width: 100px" >Đang vận chuyển</button>
                                </form>
                            @elseif($DonHangs->TinhTrang=='Đang vận chuyển')
                                <form style="float: left; margin-left:5px; " action="/CapNhatDonHang/{{$DonHangs->id}}" method="post" >
                                    @csrf
                                    <button style="border-radius: 5px;color: #fff; background-color: #d2960c;border: none;padding:5px;" type="submit" style="width: 100px" >Đã vận chuyển</button>
                                </form>
                            @endif
                            </div>
                        </td>
       
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
</html>

