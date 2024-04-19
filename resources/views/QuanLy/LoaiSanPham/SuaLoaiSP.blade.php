<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/logo.png"/>
    <title>Cập nhật loại sản phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
</head>
<body>
    
    <div class="admin">

        @include('left')

        <div class="admin_right">

            <div style="width:100%;" >
                <b><h2 style="text-align: center; padding-top: 30px">Cập Nhật Loại Sản Phẩm</h2></b>
                <form style="width: 70%; margin-left: 280px; margin-top: 50px" action="/XuLySuaLoaiSP/{{$loaiSP->id}}" method = "POST">
                @csrf
                <div style="width:60% ;" >
                        <div  style="margin:10px 0;">
                            <label  class="form-label">Tên loại sản phẩm</label>
                            <input type="text" placeholder="Tên loại sản phẩm....." class="form-control" name="TenLoaiSP" value="{{$loaiSP->TenLoaiSP}}" required>
                        </div>
                    <div class="btn_content" style="margin-left: -500px; margin-top: 30px;margin-bottom: 50px;">
                        <button type="submit" class="btn btn-success" style="padding:9px 0;border: none; background-color: #2d08e9d8; width: 170px; margin-left: 500px; float: left; margin-top: 22px">cập nhật</button>
                        <a style="border: none; background-color: white; width: 170px; color: #2d08e9d8; border: 1.5px solid #2d08e9d8; margin-top: 25px; margin-left: 80px" class="btn btn-primary" href="{{url('/DanhSachLoaiSP')}}" role="button">Quay lại</a>
                    </div>
                        </div>
                </form>
            </div>

        </div>
    </div>

</body>
</html>