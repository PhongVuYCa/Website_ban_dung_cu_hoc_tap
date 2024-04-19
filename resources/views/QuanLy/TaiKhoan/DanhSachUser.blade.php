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
            
            
            <div class="home_content">
                <section>
                    @if($role === 'KH')
                        <b><h2 style="text-align: center; padding-top: 50px">Danh Sách Tài Khoản Khách Hàng</h2></b>
                    @else
                        <b><h2 style="text-align: center; padding-top: 50px">Danh Sách Tài Khoản Nhân viên</h2></b>
                        <div >
                            <ul style="list-style-type: none;margin-left:76%">
                                <li ><a href="{{url('/ThemNV')}}"><button style="border-radius: 5px;color: #fff; background-color: #000;border: none;padding:5px;">Thêm mới nhân viên</button></a>
                                </li>
                            </ul>
                        </div>
                    @endif

                    
                    <div class="DSSanPham">
                        <table class="table table-hover">
                            <tr class="table-dark">
                                <td style="min-width: 40px; max-width: 50px;">Mã US</td>
                                <td style="min-width: 90px; max-width: 90px;">Họ & tên</td>
                                <td style="min-width: 80px; max-width: 80px;">Tên đăng nhập</td>
                                <td style="min-width: 50px; max-width: 80px;">Số điện thoai</td>
                                <td style="min-width: 80px; max-width: 100px;">Email</td>
                                <td style="min-width: 50px; max-width: 50px;">Vai trò</td>
                                <td style="min-width: 90px; max-width: 90px;">Hành động</td>
                            </tr>
                            
                            @foreach($users as $user)
                                <tr>
                                    <td >{{$user->id}}</td>
                                    <td style="min-width: 50px; max-width: 50px;overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{$user->fullname}}</td>
                                    <td style="min-width: 50px; max-width: 50px;overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{$user->username}}</td>
                                    <td style="min-width: 50px; max-width: 50px;overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{$user->phone}}</td>
                                    <td style="min-width: 50px; max-width: 50px;overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{$user->email}}</td>
                                    <td>{{$user->role}}</td>
                                    <td style="min-width: 110px; max-width: 110px; ">
                                
                                        <div style="display: flex;">
                            
                                        <form style="float: left; margin-left:5px; " action="/XemChiTietNguoiDung/{{$user->id}}" method="post" >
                                            @csrf
                                            <button style="border-radius: 5px;color: #fff; background-color: #211a86;border: none;padding:5px 8px;" type="submit" style="width: 50px" >Xem</button>
                                        </form>
                                        @if(session('user')->role== 'QL')
                                            @if($user->role != 'QL')
                                                <form style="float: left; margin-left:5px; " action="/SuaNguoiDung/{{$user->id}}" method="post" >
                                                    @csrf
                                                    <button style="border-radius: 5px;color: #fff; background-color: #d2960c;border: none;padding:5px 8px;" type="submit" style="width: 50px" >Sửa</button>
                                                </form>
                                            @else
                                                <button style=" margin-left:5px;border-radius: 5px;color: #fff; background-color: #575757;border: none;padding:5px 8px;" style="width: 50px" >Sửa</button>
                                            @endif
                                                <form style="float: left; margin-left:5px; " action="/XoaNguoiDung/{{$user->id}}" method="post" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng {{$user->username}}?')">
                                                    @csrf
                                                    <button style="border-radius: 5px;color: #fff; background-color: #fa0707;border: none;padding:5px 8px;" type="submit" style="width: 50px" >Xóa</button>
                                                </form>
                                        @else
                                            @if($user->role == 'QL' ||$user->role == 'NV')
                                                <button style="margin-left:5px; border-radius: 5px;color: #fff; background-color: #575757;border: none;padding:5px 8px;" style="width: 50px" >Sửa</button>
                                                <button style="margin-left:5px; border-radius: 5px;color: #fff; background-color: #575757;border: none;padding:5px 8px;" type="submit" style="width: 50px" >Xóa</button>
                                            @else
                                                <form style="float: left; margin-left:5px; " action="/SuaNguoiDung/{{$user->id}}" method="post" >
                                                    @csrf
                                                    <button style="border-radius: 5px;color: #fff; background-color: #d2960c;border: none;padding:5px 8px;" type="submit" style="width: 50px" >Sửa</button>
                                                </form>
                                                <form style="float: left; margin-left:5px; " action="/XoaNguoiDung/{{$user->id}}" method="post" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng {{$user->username}}?')">
                                                    @csrf
                                                    <button style="border-radius: 5px;color: #fff; background-color: #fa0707;border: none;padding:5px 8px;" type="submit" style="width: 50px" >Xóa</button>
                                                </form>
                                             @endif

                                        @endif
                                        </div>
                                    </td>
                
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </section>

  
    </div>
        </div>

</body>
</html>

