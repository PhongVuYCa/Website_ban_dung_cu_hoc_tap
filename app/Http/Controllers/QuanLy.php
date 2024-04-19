<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SanPham as ControllersSanPham;
use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use App\Models\DungCu;
use App\Models\GioHang;
use App\Models\LoaiDungCu;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use App\Models\Users;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuanLy extends Controller
{

    public function TrangChu(){
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();
        $sp1 = SanPham::join('LoaiSanPham', 'SanPham.id_LoaiSP', '=', 'LoaiSanPham.id')
            ->where('LoaiSanPham.TenLoaiSP', 'Bút')
            ->orderBy('SanPham.id', 'desc') 
            ->take(1)
            ->get();
        $sp2 = SanPham::join('LoaiSanPham', 'SanPham.id_LoaiSP', '=', 'LoaiSanPham.id')
            ->where('LoaiSanPham.TenLoaiSP', 'Bút')
            ->orderBy('SanPham.id', 'desc') 
            ->take(1)
            ->get();
        $sp3 = SanPham::join('LoaiSanPham', 'SanPham.id_LoaiSP', '=', 'LoaiSanPham.id')
            ->where('LoaiSanPham.TenLoaiSP', 'Thước')
            ->orderBy('SanPham.id', 'desc') 
            ->take(1)
            ->get();
        //blog
        $blog = SanPham::join('LoaiSanPham', 'SanPham.id_LoaiSP', '=', 'LoaiSanPham.id')
            ->where('LoaiSanPham.TenLoaiSP', 'Sách giáo khoa')
            ->orderBy('SanPham.id', 'desc') 
            ->take(3)
            ->get();

        //SẢN PHẨM HOT
        $topSoldProducts = ChiTietDonHang::select('id_SanPham', DB::raw('COUNT(SoLuong) as total'))
        ->join('DonHang', 'ChiTietDonHang.id_DonHang', '=', 'DonHang.id')
        ->where('DonHang.TinhTrang', '<>', 'Chờ xét duyệt')
        ->groupBy('id_SanPham')
        ->orderByDesc('total')
        ->take(4)
        ->get();
        $topSoldProductsIds = $topSoldProducts->pluck('id_SanPham')->toArray();

        // Lấy thông tin sản phẩm từ bảng SanPham
        $sphot = SanPham::whereIn('id', $topSoldProductsIds)->get();
        return view ('Admin', compact('loaiSPs','sp1','sp2','sp3','sphot','blog'));
    }


    public function HienThiDanhSachUser()
    {
        $users = Users::where('role','KH')->get();
        $role='KH';
        return view('QuanLy.TaiKhoan.DanhSachUser', compact('users','role'));
    }
    public function HienThiDanhSachNV()
    {
        
        $users = Users::where('role', '!=', 'KH')->get();
        $role='QL';
        return view('QuanLy.TaiKhoan.DanhSachUser', compact('users','role'));
    }
    public function ThemUser(Request $request){
        $user = new Users();
        $count = Users::where('email', $request->get('Email'))->count();
    
        if ($count > 0) {
            return redirect('/ThemNV')->with('email', 'Email đã sử dụng!');
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
            $user->id = $userId;
            $user->fullname = $request->get('Fullname');
            $user->username = $request->get('Username');
            $user->password = $request->get('Password');
            $user->address = $request->get('Address');
            $user->phone = $request->get('Phone');
            $user->email = $request->get('Email');
            $user->role = $request->get('Role');
            $user->save();

            $role=$request->get('Role');
            $users = Users::where('role','!=' ,'KH')->get();
            
            session()->flash('ThongBaoThanhCong', 'Thêm người dùng thành công!');
            return view('QuanLy.TaiKhoan.DanhSachUser', compact('users','role'));
        }

    }
    public function SuaUser ($id){
        $User= Users::where('id',$id)->first();
        return view('/QuanLy.TaiKhoan.SuaUser', compact('User'));
    }
    public function XuLySuaUser(Request $request, $id){
        $count= Users::where('id','!=', $id)->where('email',$request->get('Email'))->count();
        if($count>0){
            $kt= Users::where('id', $id)->first();
            $role=$kt->role;
            if($role=='KH'){
                $users = Users::where('role', $role)->get();
            }
            else{
                $users = Users::where('role','!=', $role)->get();
            }
            session()->flash('ThongBaoThatBai', 'Cập nhật tài khoản người dùng không thành công vì email đã được sử dụng!');
            return view('QuanLy.TaiKhoan.DanhSachUser', compact('users','role'));
        }
        else{
            $user = Users::where('id', $id)->first();
            $user->username = $request->get('Username');
            $user->fullname = $request->get('Fullname');
            $user->password = $request->get('Password');
            $user->email = $request->get('Email');
            $user->phone = $request->get('Phone');
            $user->address = $request->get('Address');
            $user->role = $request->get('Role');
            $user->save();

            $role=$request->get('Role');
            if($role=='KH'){
                $users = Users::where('role', $role)->get();
            }
            else{
                $users = Users::where('role','!=', $role)->get();
            }
            session()->flash('ThongBaoThanhCong', 'Thêm người dùng thành công!');
            return view('QuanLy.TaiKhoan.DanhSachUser', compact('users','role'));
        }

    }
    public function XoaUser($id){
        
        // Kiểm tra xem người dùng có giỏ hàng không
        $countGioHang = GioHang::where('id_user', $id)->count();
    
        // Kiểm tra xem người dùng có đơn hàng không
        $countDonHang = DonHang::where('id_user', $id)->count();
        $kt=Users::where('id', $id)->first();
        $role=$kt->role;
    
        // Nếu có giỏ hàng hoặc đơn hàng liên kết, thông báo không thể xóa
        if($countGioHang > 0 || $countDonHang > 0) {
            $users = Users::where('role', $role)->get();
            session()->flash('ThongBaoThatBai', 'Không thể xóa người dùng vì có giỏ hàng hoặc đơn hàng liên kết.');
            return view('QuanLy.TaiKhoan.DanhSachUser', compact('users','role'));
        }
        else{
            $user = Users::where('id', $id)->first();
           
            if(session('user')->role=="QL"){
                if($user->role=="QL"){
                    $users = Users::where('role', $role)->get();
                    session()->flash('ThongBaoThatBai', 'Không thể xóa quản lý!');
                    return view('QuanLy.TaiKhoan.DanhSachUser', compact('users','role'));
                }
                else{
                    Users::where('id', $id)->delete();
                    $users = Users::where('role', $role)->get();
                    session()->flash('ThongBaoThanhCong', 'Xóa người dùng thành công!');
                    return view('QuanLy.TaiKhoan.DanhSachUser', compact('users','role'));
                }
            }
            else{
                if($user->role=="QL"){
                    $users = Users::where('role', $role)->get();
                    session()->flash('ThongBaoThatBai', 'Không thể xóa quản lý!');
                    return view('QuanLy.TaiKhoan.DanhSachUser', compact('users','role'));
                }
                if($user->role=="NV"){
                    $users = Users::where('role', $role)->get();
                    session()->flash('ThongBaoThatBai', 'Tài khoản bạn không đủ quyền hạn!');
                    return view('QuanLy.TaiKhoan.DanhSachUser', compact('users','role'));
                }
                else{
                    
                    Users::where('id', $id)->delete();
                    $users = Users::where('role', $role)->get();
                    session()->flash('ThongBaoThanhCong', 'Xóa người dùng thành công!');
                    return view('QuanLy.TaiKhoan.DanhSachUser', compact('users','role'));
                }
            }
             
        }
    }
    public function XemChiTietND ($id){
        $user =User::where('id',$id)->first();
        return view('/QuanLy.TaiKhoan.ChiTietND', compact('user'));
    }
    

    


//Sản phẩm

    public function DanhSachSP()
    {
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();
        $products = SanPham::join('LoaiSanPham', 'SanPham.id_LoaiSP', '=', 'LoaiSanPham.id')
                    ->select('SanPham.*', 'LoaiSanPham.TenLoaiSP')
                    ->get();
        return view('QuanLy.SanPham.DanhSachSP', compact('loaiSPs','products'));
    }
    //DanhSachSanPhamTheoLoai
    public function DanhSachSanPhamTheoLoai($id){
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();
        $products = SanPham::join('LoaiSanPham', 'SanPham.id_LoaiSP', '=', 'LoaiSanPham.id')
                    ->select('SanPham.*', 'LoaiSanPham.TenLoaiSP')
                    ->where('LoaiSanPham.id',$id)
                    ->get();
        return view('QuanLy.SanPham.DanhSachSP', compact('loaiSPs','products'));
    }
    
    public function ThemSP(Request $request){
        $idl=$request->input('id_LoaiSP');
        $id = SanPham::orderby('id', 'desc')->first();
        $count = SanPham::where('TenSP', $request->input('TenSP'),)->count();
        if ($count > 0) {
            return redirect('/ThemSP')->with('ThongBaoThatBai', 'Tên sản phẩm đã sử dụng!');
        } else {
            if ($id) {
                $new_id = $id->id + 1;
            } else {
                $new_id = 20000001; // Hoặc bất kỳ giá trị mặc định nào bạn muốn đặt
            }
        

            $products = new SanPham([
                'id' => $new_id,
                'TenSP' => $request->input('TenSP'),
                'id_HinhAnh' => $request->input('id_HinhAnh'),
                'Gia' => $request->input('Gia'),
                'GiamGia' => $request->input('GiamGia'),
                'SoLuong' => $request->input('SoLuong'),
                'DonVi' => $request->input('DonVi'),
                'GiamGia' => $request->input('GiamGia'),
                'NgaySX' => $request->input('NgaySX'),
                'NhaSX' => $request->input('NhaSX'),
                'BaoHanh' => $request->input('BaoHanh1'). ' ' .$request->input('BaoHanh2'),
                'MoTa' => $request->input('MoTa'),
                'id_LoaiSP' => $idl,
                'id_NguoiThemSP' =>  session('user')->id,
                'id_NguoiChinhSua' => session('user')->id
            ]);

            
            $products->save();
            session()->flash('ThongBaoThanhCong', 'Thêm sản phẩm thành công!');
            return redirect('/DanhSachSP');
        }

    }
    public function LoaiSanPham()
    {
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();

        return view('/QuanLy.SanPham.ThemSP', compact('loaiSPs'));
    }

    public function XemChiTietSP ($id){
        $SanPham =SanPham::where('id',$id)->first();
        $value=$SanPham->HanSD;
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();
        return view('/QuanLy.SanPham.ChiTietSP', compact('SanPham','loaiSPs'));
    }
    public function SuaSP ($id){
        $SanPham =SanPham::where('id',$id)->first();
        $value=$SanPham->BaoHanh;
        $number=intval($value);
        $text=preg_replace('/[0-9]+/', '', $value); 
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();
        return view('/QuanLy.SanPham.SuaSP', compact('SanPham','number','text','loaiSPs'));
    }
    public function XuLySuaSP(Request $request, $id){
        $count = SanPham::where('TenSP', $request->input('TenSP'),)->where('id','!=', $id)->count();
        if ($count > 0) {
            session()->flash('ThongBaoThatBai', 'Cập nhật sản phẩm không thành công vì tên sản phẩm đã tồn tại!');
            return redirect('/DanhSachSP');
        }
        else{
            $product = SanPham::where('id',(int)$id)->first();
            $product->TenSP = $request->input('TenSP');
            $product->id_HinhAnh = $request->input('id_HinhAnh');
            $product->Gia = $request->input('Gia');
            $product->GiamGia = $request->input('GiamGia');
            $product->SoLuong = $request->input('SoLuong');
            $product->DonVi = $request->input('DonVi');
            $product->GiamGia = $request->input('GiamGia');
            $product->NgaySX = $request->input('NgaySX');
            $product->NhaSX = $request->input('NhaSX');
            $product->BaoHanh = $request->input('BaoHanh1'). ' ' .$request->input('BaoHanh2');
            $product->MoTa = $request->input('MoTa');
            $product->id_LoaiSP = $request->input('id_LoaiSP');
            $product->id_NguoiChinhSua = session('user')->id;
            $product->save();
            session()->flash('ThongBaoThanhCong', 'Sản phẩm được cập nhật thành công!');
            return redirect('/DanhSachSP');
        }
    }
    public function XoaSP($id){
        $CTSP= ChiTietDonHang::where('id_SanPham',$id)->count();
        if($CTSP>0){
            session()->flash('ThongBaoThatBai', 'Sản phẩm này không thể xóa!');
            return redirect('/DanhSachSP');
        }
        else{
            SanPham::where('id',$id)->delete();
            session()->flash('ThongBaoThanhCong', 'Xóa sản phẩm thành công!');
            return redirect('/DanhSachSP');
            
        }
    }



    //Loai sản phẩm admin
    public function HienThiDanhSnhachLoaiSanPham()
    {
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();
        return view('/QuanLy.LoaiSanPham.HienThiDanhSachLoaiSanPham', compact('loaiSPs'));
    }
    public function ThemLoaiSP(Request $request){
        $id = LoaiSanPham::orderby('id', 'desc')->first();
        $count = LoaiSanPham::where('TenLoaiSP', $request->input('TenLoaiSP'),)->count();
        if ($count > 0) {
            return redirect('/DanhSachLoaiSP')->with('ThongBaoThatBai', 'Tên loại sản phẩm đã sử dụng!');
        } else {
            if ($id) {
                $new_id = $id->id + 1;
            } else {
                $new_id = 30000001; // Hoặc bất kỳ giá trị mặc định nào bạn muốn đặt
            }
            $LoaiSP = new LoaiSanPham([
                'id' => $new_id,
                'TenLoaiSP' => $request->input('TenLoaiSP'),
            ]);

            
            $LoaiSP->save();
            session()->flash('ThongBaoThanhCong', 'Thêm loại sản phẩm thành công!');
            return redirect('/DanhSachLoaiSP');
        }
    }


    public function SuaLSP ($id){
        $loaiSP = LoaiSanPham::where('id',$id)->first();
        return view('/QuanLy.LoaiSanPham.SuaLoaiSP', compact('loaiSP'));
    }
    public function XuLySuaLoaiSP(Request $request, $id){
        $count = LoaiSanPham::where('TenLoaiSP', $request->input('TenLoaiSP'),)->where('id','!=', $id)->count();
        if ($count > 0) {
            session()->flash('ThongBaoThatBai', 'Cập nhật loại sản phẩm không thành công vì tên loại sản phẩm đã tồn tại!');
            return redirect('/DanhSachLoaiSP');
        }
        else{
            $LoaiSP = LoaiSanPham::where('id',$id)->first();
            $LoaiSP->TenLoaiSP = $request->input('TenLoaiSP');
            $LoaiSP->save();
            session()->flash('ThongBaoThanhCong', 'Loại sản phẩm được cập nhật thành công!');
            return redirect('/DanhSachLoaiSP');
        }
    }

    public function XoaLoaiSP($id){
        $CTSP= SanPham::where('id_LoaiSP',$id)->count();
        if($CTSP>0){
            session()->flash('ThongBaoThatBai', 'Loại sản phẩm này không thể xóa!');
            return redirect('/DanhSachLoaiSP');
        }
        else{
            LoaiSanPham::where('id',$id)->delete();
            session()->flash('ThongBaoThanhCong', 'Xóa loại sản phẩm thành công!');
            return redirect('/DanhSachLoaiSP');
            
        }
    }

    public function HienThiSanPham()
    {
        $products = SanPham::all();
        return view('/admin', compact('products'));
    }
}
