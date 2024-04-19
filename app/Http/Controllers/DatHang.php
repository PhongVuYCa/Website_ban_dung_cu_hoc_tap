<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use Illuminate\Http\Request;
use App\Models\GioHang;

class DatHang extends Controller
{
    public function XuLyDonHang()
    {
        if(session()->has('user')) {
            $user = session('user');
            if ($user->role === 'KH') {
                $id_user = $user->id;
                $gioHangItems = GioHang::where('id_user', $id_user)->get();
                if ($gioHangItems->isEmpty()) {
                    return redirect('/GioHang')->with('warning', 'Giỏ hàng của bạn đang trống.');
                }
                $Tong = 0;
                foreach ($gioHangItems as $item) {
                    $Tong += ($item->SoLuong*$item->SanPham->Gia*((100-$item->SanPham->GiamGia)/100));
                }
                return view('/ThanhToan.HienThiTrangThanhtoan', compact('gioHangItems','Tong'));
            } else {
                return redirect('/DangNhap')->with('alert', 'Bạn không có quyền truy cập.');
            }
        } else {
            return redirect('/DangNhap')->with('alert', 'Vui lòng đăng nhập để tiếp tục.');
        }
    }
    public function XuLyDatHang(Request $request)
    {
        if(session()->has('user')) {
            $user = session('user');
            if ($user->role === 'KH') {
                $id_user = $user->id;
                $gioHangItems = GioHang::where('id_user', $id_user)->get();
                if ($gioHangItems->isEmpty()) {
                    return redirect('/GioHang')->with('warning', 'Giỏ hàng của bạn đang trống.');
                }
                $Tong = 0;
                foreach ($gioHangItems as $item) {
                    $Tong += ($item->SoLuong*$item->SanPham->Gia*((100-$item->SanPham->GiamGia)/100));
                }
                $count = DonHang::count();
                if ($count > 0) {
                    $lastid = DonHang::latest()->first();
                    $new_id = $lastid->id + 1;
                } else {
                    $new_id = 40000001; 
                }
                if(!$request->input('payment_option')){
                    return redirect('/ThanhToan')->with('status', 'Yêu cầu chọn phương thức thanh toán!');
                }
                $DonHang= new DonHang([
                    'id'=>$new_id,
                    'id_user'=> $id_user,
                    'ThanhTien'=>$Tong+30000,
                    'PhuongThucThanhToan'=>$request->input('payment_option'),
                    'LuuY'=>'',
                    'TinhTrang'=>'Chờ xét duyệt',
                    'DanhGia'=>'',
                ]);
                $DonHang->save();
                foreach ($gioHangItems as $item) {
                    $ChiTietDonHang= new ChiTietDonHang([
                        'id_SanPham'=>$item->id_SanPham,
                        'id_DonHang'=> $new_id,
                        'Gia'=>$item->SanPham->Gia,
                        'GiamGia'=>$item->SanPham->GiamGia,
                        'SoLuong'=>$item->SoLuong,
                        'TongGia' => $item->SoLuong * $item->SanPham->Gia * (100 - $item->SanPham->GiamGia) / 100,
                    ]);
                    $ChiTietDonHang->save();
                    GioHang::where('id_user', $id_user)->where('id_SanPham', $item->id_SanPham)->delete();

                }
                return redirect('/');
            } else {
                return redirect('/DangNhap')->with('alert', 'Bạn không có quyền truy cập.');
            }
        } else {
            return redirect('/DangNhap')->with('alert', 'Vui lòng đăng nhập để tiếp tục.');
        }
    }
}
