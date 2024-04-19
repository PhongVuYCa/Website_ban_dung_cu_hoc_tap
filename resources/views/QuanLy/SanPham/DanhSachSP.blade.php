<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/logo.png"/>
    <title>Danh sách sản phẩm</title>
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
            
            {{-- <div style="margin-top: 20px; text-align: center; overflow-x: auto;">
                <div style="display: inline-block; max-width: 500px;">
                @foreach($loaiSPs as $loaiSP)
                    <a style="text-decoration: none; padding: 8px 0 0 8px; color: #fff;"  href="{{url('/LoaiSanPham', $loaiSP->id)}}" >
                        <button style="border-radius: 7px;color: #fff; background-color: #000;border: none;padding:8px;">{{ $loaiSP->TenLoaiSP }}</button></a>
                @endforeach
            </div>
            </div> --}}
            <div style="margin-top: 20px; text-align: center; overflow-x: auto; white-space: nowrap;">
                <div style="display: inline-block; margin: 0 auto;">
                    @foreach($loaiSPs as $loaiSP)
                        <a style="text-decoration: none; padding: 8px 8px; color: #fff; " href="{{url('/DanhSachSanPhamTheoLoai', $loaiSP->id)}}">
                            <button style="border-radius: 6px; color: #fff; background-color: #000; border: none; padding: 8px;">{{ $loaiSP->TenLoaiSP }}</button>
                        </a>
                    @endforeach
                </div>
            </div>
            
            
       
        <b><h2 style="text-align: center; padding-top: 30px">Danh Sách Sản Phẩm</h2></b>
        <div >
            <ul style="list-style-type: none;margin-left:76%">
                <li ><a href="{{url('/ThemSP')}}"><button style="border-radius: 5px;color: #fff; background-color: #000;border: none;padding:5px;">Thêm mới sản phẩm</button></a>
                </li>
            </ul>
        </div>
        <div class="DSSanPham">
            <table class="table table-hover">
                <tr class="table-dark">
                    <td style="min-width: 40px; max-width: 50px;">Mã SP</td>
                    <td style="min-width: 70px; max-width: 70px;">Hình ảnh</td>
                    <td style="min-width: 100px; max-width: 100px;">Tên sản phẩm </td>
                    <td style="min-width: 50px; max-width: 80px;">Giá (VND)</td>
                    <td style="min-width: 80px; max-width: 100px;">Loại sản phẩm</td>
                    <td style="min-width: 50px; max-width: 70px;">Số lượng</td>
                    <td style="min-width: 90px; max-width: 90px;">Hành động</td>
                </tr>
                
                @foreach($products as $product)
                    <tr>
                        <td style="min-width: 10px; max-width: 10px;">{{$product->id}}</td>
                        <td><img src="{!! asset($product->id_HinhAnh) !!}" alt="" width="50px" height="50px"></td>
                        <td style="min-width: 50px; max-width: 50px;overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{$product->TenSP}}</td>
                        <td style="min-width: 50px; max-width: 50px;">{{$product->Gia}}</td>
                        <td style="min-width: 50px; max-width: 50px;">{{$product->LoaiSanPham->TenLoaiSP}}</td>
                        <td style="min-width: 50px; max-width: 50px;">{{$product->SoLuong}}</td>
                        <td style="min-width: 110px; max-width: 110px;">
                            <div style="display: flex;">
                            <form style="float: left; margin-left:5px; " action="/XemChiTietSanPham/{{$product->id}}" method="post" >
                                @csrf
                                <button style="border-radius: 5px;color: #fff; background-color: #211a86;border: none;padding:5px 8px;" type="submit" style="width: 50px" >Xem</button>
                            </form>
                            <form style="float: left; margin-left:5px; " action="/SuaSanPham/{{$product->id}}" method="post" >
                                @csrf
                                <button style="border-radius: 5px;color: #fff; background-color: #d2960c;border: none;padding:5px 8px;" type="submit" style="width: 50px" >Sửa</button>
                            </form>
                            <form style="float: left; margin-left:5px;" action="/XoaSanPham/{{$product->id}}" method="post" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm {{$product->TenSP}}?')">
                                @csrf
                                <button style="border-radius: 5px;color: #fff; background-color: #fa0707;border: none;padding:5px 8px;" type="submit" style="width: 50px" >Xóa</button>
                            </form>
                            </div>
                        </td>
       
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
</html>

