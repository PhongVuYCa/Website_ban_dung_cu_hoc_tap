<?php

namespace App\Http\Controllers;

use App\Models\LoaiSanPham;
use App\Models\Users;
use Illuminate\Http\Request;

class TaiKhoan extends Controller

{
    public function ThongTinCaNhan() {
        
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();
        return view('/TaiKhoan/ThongTinTaiKhoan', compact('loaiSPs'));
        
    }
    public function FormChinhSuaTaiKhoan(){
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();
        return view('/TaiKhoan/ChinhSuaTaiKhoan', compact('loaiSPs'));
    }
    public function CSThongTinTaiKhoan(Request $request){
        $id = session('user')->id;
        $count= Users::where('id','!=',$id)->where('email',$request->input('email'))->count();
        if($count==0){
            $user = Users::where('id',$id)->first();
            $user->username = $request->input('username');
            $user->fullname = $request->input('fullname');
            $user->password = $request->input('password');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->save();
        
            return redirect('/TaiKhoan')->with('ThongBaoThanhCong', 'Thông tin tài khoản đã được cập nhật thành công');
        }
    
        return redirect('/TaiKhoan')->with('ThongBaoThatBai', 'Email đã được đăng kí!');
    }
            
    
    public function XuLyCSThongTinTaiKhoan(Request $request){
        $id = session('user')->id;
        $count= Users::where('id','!=',$id)->where('email',$request->input('email'))->count();
        if($count==0){
            $user = Users::where('id',$id)->first();
            $user->username = $request->input('username');
            $user->fullname = $request->input('fullname');
            $user->password = $request->input('password');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->save();
        
            return redirect('/ThongTinCaNhan')->with('ThongBaoThanhCong', 'Thông tin tài khoản đã được cập nhật thành công');
        }
    
        return redirect('/ThongTinCaNhan')->with('ThongBaoThatBai', 'Email đã được đăng kí!');
    }
    
    
    public function DangKiTaiKhoan(Request $request)
    {

        $users = new Users();
        $count = Users::where('email', $request->get('Email'))->count();
    
        if ($count > 0) {
            return redirect('/DangKi')->with('email', 'Email đã sử dụng!');
        } else {
            // Lấy số lượng người dùng hiện có
            $userCount = Users::count();
    
            // Đặt ID cho người dùng mới
            if ($userCount == 0) {
                $userId = 10000001;
            } else {
                // Lấy ID của người dùng cuối cùng và tăng thêm 1
                $lastUser = Users::latest()->first();
                $userId = $lastUser->id + 1;
            }
    
            // Lưu thông tin người dùng
            $users->id = $userId;
            $users->fullname = $request->get('Fullname');
            $users->username = $request->get('Username');
            $users->password = $request->get('Password');
            $users->address = $request->get('Address');
            $users->phone = $request->get('Phone');
            $users->email = $request->get('Email');
            $users->role = 'KH';
            $users->save();
    
            return redirect('/DangNhap');
        }
    }


    public function DangNhapTaiKhoan(Request $request)
    {

        $email = $request->input('Email');
        $password = $request->input('Password');
        $user = Users::where('email', $email)->where('password', $password)->first();
        if ($user)
        {
            session(['user' => $user]);
            if ($user->role === "KH")
            {
                return redirect('/');
            }
            else 
            {
                return redirect('/QuanLy');
            }
        }
        else
        {
            return redirect('/DangNhap')->with('error', 'Thông tin đăng nhập không chính xác');
        }         
    }

    public function DangXuatTaiKhoan()
    {
        session()->forget('user');
        return redirect('/DangNhap');
    }

    public function XuLyQuenMatKhau(Request $request){
        $user = Users::where('fullname', $request->get('Fullname'))
                    ->where('email', $request->get('Email'))
                    ->where('phone', $request->get('Phone'))->first();
        if($user){
            $user->password = $request->get('Password');
            $user->save();
            return redirect('/DangNhap')->with('ThongBaoThanhCong', 'Thay đổi mật khẩu thành công!');
        }
        else {
            return redirect('/QuenMatKhau')->with('ThongBaoThatBai', 'Thông tin không chính xác!');
        }
        

    }
}
