<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/logo.png"/>
    <title>Danh sách người dùng</title>
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
            
            <div class="personal-info" style="margin-top: 50px;">
                <h2 style="text-align: center">Cập Nhật Thông Tin Cá Nhân</h2>
                <div style="margin: 50px 0 0 80px">
                
                <form  action = "/XuLyCapNhatTaiKhoan" method="post" >
                    @csrf
                    <div class="row mb-3" style="width:100%">
                        <div class="col-md-3" style="width:20%">
                            <label for="fullname" class="form-label">Họ và tên:</label>
                        </div>
                        <div class="col-md-9" style="width:70%">
                            <input type="text"  name="fullname" class="form-control" value="{{ session('user')->fullname }}">
                        </div>
                    </div>
                    <div class="row mb-3" style="width:100%">
                        <div class="col-md-3" style="width:20%">
                            <label for="username" class="form-label">Tên đăng nhập:</label>
                        </div>
                        <div class="col-md-9" style="width:70%">
                            <input type="text" name="username" class="form-control" value="{{ session('user')->username }}">
                        </div>
                    </div>
                    <div class="row mb-3" style="width:100%">
                        <div class="col-md-3" style="width:20%">
                            <label for="password" class="form-label">Mật khẩu:</label>
                        </div>
                        <div class="col-md-9" style="width:70%">
                            <input type="password" name="password" class="form-control" value="{{ session('user')->password }}">
                        </div>
                    </div>
                    <div class="row mb-3" style="width:100%">
                        <div class="col-md-3" style="width:20%">
                            <label for="email" class="form-label">Email:</label>
                        </div>
                        <div class="col-md-9" style="width:70%">
                            <input type="email"  name="email" class="form-control" value="{{ session('user')->email }}">
                        </div>
                    </div>
                    <div class="row mb-3" style="width:100%">
                        <div class="col-md-3" style="width:20%">
                            <label for="address" class="form-label">Địa chỉ:</label>
                        </div>
                        <div class="col-md-9" style="width:70%">
                            <input type="text"  name="address" class="form-control" value="{{ session('user')->address }}">
                        </div>
                    </div>
                    <div class="row mb-3" style="width:100%">
                        <div class="col-md-3" style="width:20%">
                            <label for="phone" class="form-label">Số điện thoại:</label>
                        </div>
                        <div class="col-md-9" style="width:70%">
                            <input type="text"  name="phone" class="form-control" value="{{ session('user')->phone }}">
                        </div>
                    </div>
                    <div class="row mb-3" style="width:100%">
                        <div class="col-md-3" style="width:20%">
                            <label for="role" class="form-label">Vai trò:</label>
                        </div>
                        <div class="col-md-9" style="width:70%">
                            <input type="text" readonly class="form-control" id="role" value="{{ session('user')->role }}">
                        </div>
                    </div>
                    <div >
                        <button type="submit" class="btn btn-success" style="margin-left: 150px;border: none; background-color: black; width: 170px;margin-top: 25px;">Cập nhật</button>
                        <a style="border: none; background-color: white; width: 170px; color: black; border: 1.5px solid black; margin-top: 25px; margin-left: 150px" class="btn btn-primary" href="{{url('/ThongTinCaNhan')}}" role="button">Quay lại</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
            
    </div>

</body>
</html>

