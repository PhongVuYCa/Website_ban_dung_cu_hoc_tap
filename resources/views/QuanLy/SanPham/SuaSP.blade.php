<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/logo.png"/>
    <title>Cập nhật sản phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
</head>
<body>
    
    <div class="admin">

        @include('left')
        <div class="admin_right">

           
            <div style="width:100% ;" >
                <b><h2 style="text-align: center; padding-top: 30px">Cập Nhật Sản Phẩm</h2></b>
                <form style="width: 70%; margin-left: 280px; margin-top: 50px" action="/XuLySuaSanPham/{{$SanPham->id}}" method = "POST">
                @csrf
                <div style="width:60% ;" >
                        <div  style="margin:10px 0;">
                            <label  class="form-label">Tên sản phẩm</label>
                            <input type="text" placeholder="Tên sản phẩm....." class="form-control" name="TenSP" value="{{$SanPham->TenSP}}" required>
                        </div>
                        <div style="margin:10px 0;">
                            <label  class="form-label">Hình ảnh</label>
                            <input type="text" placeholder="Hình ảnh minh họa sản phẩm....." class="form-control" name="id_HinhAnh" value="{{$SanPham->id_HinhAnh}}" required>
                        <div style="margin:10px 0;">
                            <label for="price" class="form-label">Giá</label>
                            <input type="number" placeholder="Giá sản phẩm....." class="form-control" name="Gia" value="{{$SanPham->Gia}}" required>
                        </div>
                        <div style="margin:10px 0;">
                            <label  class="form-label">Giảm giá</label>
                            <input type="number" placeholder="Giảm giá (nếu có)....." class="form-control" name="GiamGia" value="{{$SanPham->GiamGia}}" required>
                        </div>
                        <div style="margin:10px 0;">
                            <label  class="form-label">Số luợng</label>
                            <input type="number" placeholder="Số lượng....." class="form-control" name="SoLuong" value="{{$SanPham->SoLuong}}" required>
                        </div>
                        <div style="margin:10px 0;">
                            <label  class="form-label">Đơn vị</label>
                            <input type="text" placeholder="Đơn vị....." class="form-control" name="DonVi" value="{{$SanPham->DonVi}}" required>
                        </div>
                        <div >
                            <label class="form-label">Ngày sản xuất</label>
                            <input type="date" placeholder="Ngày sản xuất....." class="form-control" name="NgaySX" value="{{$SanPham->NgaySX}}" required>
                        </div>
                        <div style="margin:10px 0;">
                            <label  class="form-label">Nhà sản xuất</label>
                            <input type="text" placeholder="Nhà sản xuất....." class="form-control" name="NhaSX" value="{{$SanPham->NhaSX}}" required>
                        </div>
                        <div style="margin:10px 0;">
                            <label class="form-label">Bảo hành</label>
                            <select name="BaoHanh1">
                                @for ($i = 1; $i <= 24; $i++)
                                    <option value="{{ $i }}" {{ $number == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                            
                            <select name="BaoHanh2">
                                <option value="tháng" {{$text == 'tháng' ? 'selected' : ''}}>tháng</option>
                                <option value="năm" {{$text == 'năm' ? 'selected' : ''}}>năm</option>
                            </select>
                            
                        </div>
                        
                        <div style="margin:10px 0;">
                            <label style="margin-top: 20px; width: 100%">Loại sản phẩm</label>
                            <select name="id_LoaiSP" class="form-control">
                                @foreach($loaiSPs as $loaiSP)
                                    <option value="{{ $loaiSP->id }}">{{ $loaiSP->TenLoaiSP }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div style="margin:10px 0;">
                            <label class="form-label">Mô tả</label>
                            <textarea class="form-control" placeholder="Mô tả ....." name="MoTa" >{{$SanPham->MoTa}}</textarea>
                        </div>
                    <div class="btn_content" style="margin-left: -500px; margin-top: 30px;margin-bottom: 50px;">
                        <button type="submit" class="btn btn-success" style="padding:9px 0;border: none; background-color: #2d08e9d8; width: 170px; margin-left: 500px; float: left; margin-top: 22px">cập nhật</button>
                        <a style="border: none; background-color: white; width: 170px; color: #2d08e9d8; border: 1.5px solid #2d08e9d8; margin-top: 25px; margin-left: 80px" class="btn btn-primary" href="{{url('/DanhSachSP')}}" role="button">Quay lại</a>
                    </div>
                        </div>
                </form>
            </div>

        </div>
    </div>

</body>
</html>