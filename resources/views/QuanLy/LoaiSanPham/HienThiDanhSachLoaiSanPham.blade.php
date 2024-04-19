<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/logo.png"/>
    <title>Danh sách loại sản phẩm</title>
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
            
            <b><h2 style="text-align: center; padding-top: 30px">Danh Sách Loại Sản Phẩm</h2></b>
            <div >
                <form action="/XuLyThemLoaiSP" method="POST" style="display: flex; align-items: center;">
                    @csrf
                    <input style="width: 220px; margin: 15px 0 15px 620px; flex: 1; " type="text" placeholder="Nhập tên loại sản phẩm....." class="form-control" name="TenLoaiSP" required>
                    <button type="submit" class="btn btn-success" style="border: none; background-color: black; width: 150px; margin: 0 50px 0 5px;">Thêm mới</button>
                </form>
                
            </div>
        <div class="DSSanPham">
            <table class="table table-hover">
                <tr class="table-dark">
                    <td style="min-width: 40px; max-width: 50px;">Mã SP</td>
                    <td >Tên loại sản phẩm </td>
                    <td style="min-width: 90px; max-width: 90px;">Hành động</td>
                </tr>
                
                @foreach($loaiSPs as $loaiSPs)
                    <tr>
                        <td style="min-width: 10px; max-width: 10px;">{{$loaiSPs->id}}</td>
                        <td style="min-width: 50px; max-width: 50px;overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{$loaiSPs->TenLoaiSP}}</td>
                      
                        <td style="min-width: 110px; max-width: 110px;">
                            <div style="display: flex; justify-content: center;">
                                <form style="margin-left:5px;" action="/SuaLoaiSanPham/{{$loaiSPs->id}}" method="post">
                                    @csrf
                                    <button style="border-radius: 5px;color: #fff; background-color: #d2960c;border: none;padding:5px 8px;" type="submit">Sửa</button>
                                </form>
                                <form style="margin-left:5px;" action="/XoaLoaiSanPham/{{$loaiSPs->id}}" method="post" onclick="return confirm('Bạn có chắc chắn muốn xóa loại sản phẩm {{$loaiSPs->TenLoaiSP}}?')">
                                    @csrf
                                    <button style="border-radius: 5px;color: #fff; background-color: #fa0707;border: none;padding:5px 8px;" type="submit">Xóa</button>
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

