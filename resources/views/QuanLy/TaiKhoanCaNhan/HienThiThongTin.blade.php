<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/logo.png"/>
    <title>Thông tin cá nhân</title>
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
                <h2 style="text-align: center">Thông Tin Cá Nhân</h2>
                <div style="margin: 50px 0 0 80px">
                    <div class="row mb-3" style="width:100%">
                        <div class="col-md-3" style="width:20%">
                            <label for="fullname" class="form-label">Họ và tên:</label>
                        </div>
                        <div class="col-md-9" style="width:70%">
                            <input type="text" readonly class="form-control" id="fullname" value="{{ session('user')->fullname }}">
                        </div>
                    </div>
                    <div class="row mb-3" style="width:100%">
                        <div class="col-md-3" style="width:20%">
                            <label for="username" class="form-label">Tên đăng nhập:</label>
                        </div>
                        <div class="col-md-9" style="width:70%">
                            <input type="text" readonly class="form-control" id="username" value="{{ session('user')->username }}">
                        </div>
                    </div>
                    <div class="row mb-3" style="width:100%">
                        <div class="col-md-3" style="width:20%">
                            <label for="password" class="form-label">Mật khẩu:</label>
                        </div>
                        <div class="col-md-9" style="width:70%">
                            <input type="text" readonly class="form-control" id="password" value="{{ session('user')->password }}">
                        </div>
                    </div>
                    <div class="row mb-3" style="width:100%">
                        <div class="col-md-3" style="width:20%">
                            <label for="email" class="form-label">Email:</label>
                        </div>
                        <div class="col-md-9" style="width:70%">
                            <input type="email" readonly class="form-control" id="email" value="{{ session('user')->email }}">
                        </div>
                    </div>
                    <div class="row mb-3" style="width:100%">
                        <div class="col-md-3" style="width:20%">
                            <label for="address" class="form-label">Địa chỉ:</label>
                        </div>
                        <div class="col-md-9" style="width:70%">
                            <input type="text" readonly class="form-control" id="address" value="{{ session('user')->address }}">
                        </div>
                    </div>
                    <div class="row mb-3" style="width:100%">
                        <div class="col-md-3" style="width:20%">
                            <label for="phone" class="form-label">Số điện thoại:</label>
                        </div>
                        <div class="col-md-9" style="width:70%">
                            <input type="text" readonly class="form-control" id="phone" value="{{ session('user')->phone }}">
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
                    <div>
                        <a href="{{url('/CapNhatTaiKhoan')}}" ><button style="margin-left:76%; margin-top:20px;margin-bottom: 50px; color:white;background-color: black; padding:8px 12px; border-radius: 5px ;">Cập nhật</button></a>
                    </div>
                </div>
            </div>
        </div>
            
    </div>

</body>
</html>

