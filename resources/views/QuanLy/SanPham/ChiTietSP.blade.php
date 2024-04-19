<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/logo.png"/>
    <title>Thông tin chi tiết sản phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
</head>
<body>
    
    <div class="admin">

        @include('left')
        <div class="admin_right">
            
            <div style="width: 100%;">
                <div style="width: 40%; float: left; padding: 65px 0 40px 130px; ">
                    <img src="<?php echo asset("$SanPham->id_HinhAnh")?>" alt="" width="250px" height="250px">
                </div>
                <div style="width:50%; float: left; padding: 60px 20px 0 20px; ">
                    
                    <h4 style> {{$SanPham->TenSP}}</h4><br>
                    
                    @if ($SanPham->GiamGia != 0)
                        <p>Giảm giá: {{$SanPham->GiamGia}} %</p>
                        <p>
                            <span style="color: #333;">Giá bán: {{$SanPham->Gia * (100 - $SanPham->GiamGia) / 100}} VND /</span>
                            <span style="color: #999; text-decoration: line-through;"> {{$SanPham->Gia}} VND</span>
                        </p>
                    @else
                        <p>Giá bán: {{$SanPham->Gia}} VND</p>
                    @endif
                    <p>Ngày sản xuất: {{$SanPham->NgaySX}}</p>
                    <p>Số lượng: {{$SanPham->SoLuong}} {{$SanPham->DonVi}}</p>
                    <p>Ngày sản xuất: {{$SanPham->NgaySX}}</p>
                    <p>Nhà sản xuất: {{$SanPham->NhaSX}} </p>
                    <p>Bảo hành: {{$SanPham->BaoHanh}} </p>
                </div>
                <div style="clear:both"></div>

                <div style=" width: 96%; margin: 10px 30px;">
                    <button class="btn btn-outline-secondary" style="background-color: #0000002f; border: none; height: 40px;"><a style="text-align: center; color: #333333">Thông tin chi tiết</a></button>
                </div>
            
                <div style="padding: 20px; width: 96%; border: 1px solid #777777;margin:0 30px;">
                    
                    <p>{{$SanPham->MoTa}}</p>
                </div>
            </div>
            <div  style="width: 100%;">
                <a style="border: none; background-color: white; width: 120px; color: #2d08e9d8; border: 1.5px solid #2d08e9d8; margin-top: 25px; margin-left: 30px" class="btn btn-primary" href="{{url('/DanhSachSP')}}" role="button">< Quay lại</a>
            </div>
        </div>
    </div>
</body>
</html>
