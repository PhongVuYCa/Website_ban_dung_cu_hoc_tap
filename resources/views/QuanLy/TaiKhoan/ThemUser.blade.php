<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/logo.png"/>
    <title>Thêm nhân viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
</head>
<body>
    <div class="admin">

        @include('left')
        
        <div class="admin_right">
            @if(session('email'))
                <div class="alert alert-danger">
                    {{ session('email') }}
                </div>
            @endif
            <b><h2 style="text-align: center; padding-top: 30px">Thêm nhân viên</h2></b>

            <form style="width: 80%; margin-left: 220px; margin-top: 50px" action ="{{url('/XuLyThemNV')}}" method="post" class="row g-3">
                @csrf
                <div class="col-md-6" style="float: left;  margin-left: 100px">
                    <label class="form-label">Họ và tên</label>
                    <input type="text" name = "Fullname"  class="form-control" required>
                </div>
                <div class="col-md-6" style="float: left; margin-left: 100px" >
                    <label class="form-label">Tên đăng nhập</label>
                    <input type="text" name ="Username" class="form-control" required>
                </div>
                <div class="col-md-6" style="float: left; margin-left: 100px">
                    <label class="form-label">Mật khẩu</label>
                    <input type="password" name = "Password"  class="form-control" required>
                </div>
                <div class="col-md-6" style="float: left;margin-left: 100px">
                    <label  class="form-label">Địa chỉ</label>
                    <input type="text" name = "Address"  class="form-control" required>
                </div>
                <div class="col-md-6" style="float: left; margin-left: 100px">
                    <label class="form-label">Số điện thoại</label>
                    <input type="number" name = "Phone"  class="form-control" required>
                </div>
                <div class="col-md-6" style="float: left; margin-left: 100px">
                    <label  class="form-label">Email</label>
                    <input type="email" name = "Email"  class="form-control" required>
                </div>
                @if(session('user')->role== 'QL')
                <div class="col-md-6" style="float: left; margin-left: 100px">
                    <label class="form-label">Vai trò</label>
                    <select  name="Role" class="form-control">
                        <option>NV</option>
                        <option>QL</option>
                    </select>
                </div>
                @else
                <div class="col-md-6" style="float: left; margin-left: 100px">
                    <label class="form-label">Vai trò</label>
                    <select  name="Role" class="form-control">
                        <option>NV</option>
                    </select>
                </div>
                @endif
                <div class="submit_btn" style="margin-left: 100px; margin-bottom: 100px">
                    <button type="submit" class="btn btn-success" style="border: 1.5px solid #2d08e9d8; background-color: #2d08e9d8; width: 140px;margin-top: 25px;">Thêm mới</button>
                    <a style="border: none; background-color: white; width: 140px; color: #2d08e9d8; border: 1.5px solid #2d08e9d8; margin-top: 25px; margin-left: 50px" class="btn btn-primary" href="{{url('/DanhSachNhanVien')}}" role="button">Quay lại</a>
                </div>
                
            </form>
        </div>
    </div>
</body>
</html>