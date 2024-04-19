<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/logo.png"/>
    <title>Cập nhật người dùng</title>
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

            b><h2 style="text-align: center; padding-top: 30px">Cập Nhật Người Dùng</h2></b>

            <form style="width: 80%; margin-left: 220px; margin-top: 50px" action ="/XuLySuaUser/{{$User->id}}" method="post" class="row g-3">
                @csrf
                <div class="col-md-6" style="float: left; width: 45%; margin-left: 100px">
                    <label class="form-label">Họ và tên</label>
                    <input type="text" name = "Fullname"  class="form-control" value="{{$User->fullname}}">
                </div>
                <div class="col-md-6" style="float: left; width: 45%; margin-left: 100px" >
                    <label class="form-label">Tên Dăng nhập</label>
                    <input type="text" name ="Username" class="form-control" value="{{$User->username}}">
                </div>
                <div class="col-md-6" style="float: left; width: 45%; margin-left: 100px">
                    <label class="form-label">Mật khẩu</label>
                    <input type="password" name = "Password"  class="form-control" value="{{$User->password}}">
                </div>
                <div class="col-md-6" style="float: left; width: 45%; margin-left: 100px">
                    <label  class="form-label">Địa chỉ</label>
                    <input type="text" name = "Address"  class="form-control" value="{{$User->address}}">
                </div>
                <div class="col-md-6" style="float: left; width: 45%; margin-left: 100px">
                    <label class="form-label">Số điện thoại</label>
                    <input type="number" name = "Phone"  class="form-control" value="{{$User->phone}}">
                </div>
                <div class="col-md-6" style="float: left; width: 45%; margin-left: 100px">
                    <label  class="form-label">Email</label>
                    <input type="email" name = "Email"  class="form-control" value="{{$User->email}}">
                </div>
                <div class="col-md-6" style="float: left; width: 45%; margin-left: 100px">
                    <label class="form-label">Vai trò</label>
                    <select name="Role" class="form-control">
                        <option value="NV" {{$User->role === 'NV' ? 'selected' : ''}}>NV</option>
                        <option value="QL" {{$User->role === 'QL' ? 'selected' : ''}}>QL</option>
                    </select>
                    
                </div>

                <div class="submit_btn" style="margin-left: 100px; margin-bottom: 100px">
                    <button type="submit" class="btn btn-success" style="border: none; background-color: #2d08e9d8; width: 170px;margin-top: 25px;">Cập nhật</button>
                    @if($User->role ==='KH')
                        <a style="border: none; background-color: white; width: 170px; color: #2d08e9d8; border: 1.5px solid #2d08e9d8; margin-top: 25px; margin-left: 50px" class="btn btn-primary" href="{{url('/DanhSachKhachHang')}}" role="button">Quay lại</a>
                    @else
                        <a style="border: none; background-color: white; width: 170px; color: #2d08e9d8; border: 1.5px solid #2d08e9d8; margin-top: 25px; margin-left: 50px" class="btn btn-primary" href="{{url('/DanhSachNhanVien')}}" role="button">Quay lại</a>
                    @endif
                </div>
            </form>

        </div>
    </div>
</body>
</html>