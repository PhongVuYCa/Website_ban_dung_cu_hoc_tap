<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use App\Models\DungCu;
use App\Models\GioHang;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use Illuminate\Http\Request;

class GioHangControllers extends Controller
{


    public function ChoXacNhan()
    {
        
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();
        if(session()->has('user')) {
            $user = session('user');
            if ($user->role === 'KH') {
                $id_user = session('user')->id;
                $DonHangItems = DonHang::where('id_user', $id_user)
                                        ->where('TinhTrang', 'Chờ xét duyệt')
                                        ->get();
                
                return view('GioHang.ChoXacNhan',compact('loaiSPs','DonHangItems'))->with('alert', 'Không tìm thấy đơn hàng chờ xác nhận.');
            } else {
                return redirect('/DangNhap',compact('loaiSPs'))->with('alert', 'Bạn không có quyền truy cập.');
            }
        } else {
            return redirect('/DangNhap',compact('loaiSPs'))->with('alert', 'Vui lòng đăng nhập để tiếp tục.');
        }
    }
    public function DangVanChuyen()
    {
        
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();
        if(session()->has('user')) {
            $user = session('user');
            if ($user->role === 'KH') {
                $id_user = session('user')->id;
                $DonHangItems = DonHang::where('id_user', $id_user)
                                        ->where('TinhTrang', 'Đang vận chuyển')
                                        ->get();

                return view('GioHang.DangVanChuyen',compact('loaiSPs','DonHangItems'))->with('alert', 'Không tìm thấy đơn hàng chờ xác nhận.');
            } else {
                return redirect('/DangNhap',compact('loaiSPs'))->with('alert', 'Bạn không có quyền truy cập.');
            }
        } else {
            return redirect('/DangNhap',compact('loaiSPs'))->with('alert', 'Vui lòng đăng nhập để tiếp tục.');
        }
    }
    public function DaVanChuyen()
    {
        
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();
        if(session()->has('user')) {
            $user = session('user');
            if ($user->role === 'KH') {
                $id_user = session('user')->id;
                $DonHangItems = DonHang::where('id_user', $id_user)
                                        ->where('TinhTrang', 'Đã vận chuyển')
                                        ->get();
                return view('GioHang.DaVanChuyen',compact('loaiSPs','DonHangItems'))->with('alert', 'Không tìm thấy đơn hàng chờ xác nhận.');
            } else {
                return redirect('/DangNhap',compact('loaiSPs'))->with('alert', 'Bạn không có quyền truy cập.');
            }
        } else {
            return redirect('/DangNhap',compact('loaiSPs'))->with('alert', 'Vui lòng đăng nhập để tiếp tục.');
        }
    }
    public function DaHuy()
    {
        
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();
        if(session()->has('user')) {
            $user = session('user');
            if ($user->role === 'KH') {
                $id_user = session('user')->id;
                $DonHangItems = DonHang::where('id_user', $id_user)
                                        ->where('TinhTrang', 'Đã hủy')
                                        ->get();
                return view('GioHang.DaHuy',compact('loaiSPs','DonHangItems'))->with('alert', 'Không tìm thấy đơn hàng chờ xác nhận.');
            } else {
                return redirect('/DangNhap',compact('loaiSPs'))->with('alert', 'Bạn không có quyền truy cập.');
            }
        } else {
            return redirect('/DangNhap',compact('loaiSPs'))->with('alert', 'Vui lòng đăng nhập để tiếp tục.');
        }
    }


    public function ChiTietDonHang($id){
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();
        $CTDonHangItems = ChiTietDonHang::where('id_DonHang', $id)
                                        ->get();
        return view('GioHang.ChiTietDonHang', compact( 'CTDonHangItems','loaiSPs'));
    
    }
    public function HuyDonHang($id){
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();
        $TinhTrang = "Đã hủy";
        $DonHang = DonHang::where('id', $id)->first();
        $DonHang->TinhTrang=$TinhTrang;
        $DonHang->save();
        $id_user = session('user')->id;
        $DonHangItems = DonHang::where('id_user', $id_user)
                                ->where('TinhTrang', 'Chờ xét duyệt')
                                ->get();

        return view('GioHang.ChoXacNhan',compact('loaiSPs','DonHangItems','TinhTrang'));

    }

    public function DanhGiaSanPham($id){
        
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();
        $DonHang = DonHang::where('id', $id)->first();
        return view('GioHang.DanhGiaSanPham',compact('loaiSPs','DonHang'));
    }

    public function XuLyDanhGia(Request $request ,$id){
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();
        $DonHang = DonHang::where('id', $id)->first();
        $id_user = session('user')->id;
        $DonHangItems = DonHang::where('id_user', $id_user)
                                        ->where('TinhTrang', 'Đã vận chuyển')
                                        ->get();
        $DonHang->DanhGia=$request->get('DanhGia');
        $DonHang->save();
        return view('GioHang.DaVanChuyen',compact('loaiSPs','DonHangItems'));

    }











    public function HienThiGioHang(){
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();
        if(session()->has('user')) {
            $user = session('user');
            if ($user->role === 'KH') {
                $id_user = session('user')->id;
                $gioHangItems = GioHang::where('id_user', $id_user)->get();
            
                return view('/giohang.hienthigiohang', compact('gioHangItems','loaiSPs'));
            } else {
            return redirect('/DangNhap')->with('alert', 'Bạn không có quyền truy cập.');
            }
        } else {
            return redirect('/DangNhap')->with('alert', 'Vui lòng đăng nhập để tiếp tục.');
        }
    }


    
    public function ThemSPVaoGioHang(Request $request)
    {

        $id = GioHang::orderby('id', 'desc')->first();
       
        if ($id) {
            $new_id = $id->id + 1;
        } else {
            $new_id = 50000001; // Hoặc bất kỳ giá trị mặc định nào bạn muốn đặt
        }



        $id_SanPham = $request->get('id_SanPham');
        $SoLuong = $request->get('SoLuong');
        
        // Lấy ID người dùng từ session mà không cần kiểm tra đăng nhập
        $id_user = session('user')->id;
        
        // Tìm kiếm mục trong giỏ hàng có sản phẩm tương ứng
        $GioHang = GioHang::where('id_user', $id_user)
                        ->where('id_SanPham', $id_SanPham)
                        ->first();
        
        if ($GioHang) {
            $sl=$GioHang->SoLuong;
            $GioHang->SoLuong = $SoLuong+$sl;
            $GioHang->save();
        } else { 
            $GioHang = new GioHang();
            $GioHang->id = $new_id;
            $GioHang->id_user = $id_user;
            $GioHang->id_SanPham = $id_SanPham;
            $GioHang->SoLuong = $SoLuong;
            $GioHang->save();
        }
        
        return redirect('/GioHang');
    }

    public function CapNhatGioHang($id){
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();
        $GioHang = GioHang::where('id_user', session('user')->id)
                        ->where('id_SanPham', $id)
                        ->get();
        return view('GioHang.ChinhSuaGioHang', compact('GioHang', 'loaiSPs'));
    }
    
    public function XuLyCapNhatGioHang(Request $request, $id)
    {
        $GioHang = GioHang::where('id_user', session('user')->id)
                        ->where('id_SanPham', $id)
                        ->first();

        if ($GioHang) {
            $GioHang->SoLuong = (int)$request->get('SoLuong');
            $GioHang->save();
        }
        return redirect('/GioHang');
    }


    public function SuaGioHang($id)
    {
        $iduser = session('user')->id;
        $idud = GioHang::where('id',(string)$id)->first();
        $cart = GioHang::where('users_id', "$iduser")->get();;
        return view('GioHang.ChinhSuaGioHang', compact('cart'))->with('i', (request()->input('page', 1) - 1) * 5)->with('idud',$idud);
    }

    public function XoaGioHang($id)
    {
        $id_user=session('user')->id;
        GioHang::where('id_user', $id_user)
            ->where('id_SanPham', $id)->delete();
        return redirect('GioHang');
    }
}
