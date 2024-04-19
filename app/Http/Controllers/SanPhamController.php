<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\LoaiSanPham;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SanPhamController extends Controller
{
    
    public function TrangChu(){
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();
        $sp1 = SanPham::join('LoaiSanPham', 'SanPham.id_LoaiSP', '=', 'LoaiSanPham.id')
            ->where('LoaiSanPham.TenLoaiSP', 'Sách giáo khoa')
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
        return view ('Home', compact('loaiSPs','sp1','sp2','sp3','sphot','blog'));
    }
    //Chi tiết sản phảm
    public function ChiTietSanPham($id)
    {
        
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();
        $product = SanPham::where('id', (int)$id)->first();
        return view ('SanPham.ChiTietSP', compact('loaiSPs','product'));
    }
   
    public function TimKiemSanPham(Request $request)
    {
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();
        $Ten= $request->input('search');
        $products = SanPham::where('TenSP', 'like', '%' . $Ten . '%')->get();
        $SP=$Ten;
        return view ('SanPham.HienThiSP',  compact('loaiSPs','products','SP'));
    }

    //Loại sản phẩm
    public function HienThiLoaiSanPham()
    {
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();
        $products = SanPham::all();
        return view('/SanPham.LoaiSanPham', compact('loaiSPs','products'));
    }
    //Hiển thị sản phẩm(KH)
    public function  HienThiSanPhamTheoLoai($id){
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();
        $products = SanPham::where('id_LoaiSP', (int)$id)->get();
        $TenLoai = LoaiSanPham::where('id', (int)$id)->first();
        $SP=$TenLoai->TenLoaiSP;
        
        return view('/SanPham.HienThiSP', compact('loaiSPs','products','SP'));
    }
    // sản phẩm giảm giá
    public function  HienThiSanPhamGiamGia(){
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();
        $products = SanPham::where('GiamGia', '<>', 0)
                    ->whereNotNull('GiamGia')
                    ->get();

        $SP='Sản phẩm giảm giá';
        return view('/SanPham.HienThiSP', compact('loaiSPs','products','SP'));
    }
    //Sản phẩm hot
    public function  HienThiSanPhamHot(){
        $loaiSPs = LoaiSanPham::select('id', 'TenLoaiSP')->get();
        $topSoldProducts = ChiTietDonHang::select('id_SanPham', DB::raw('COUNT(SoLuong) as total'))
            ->join('DonHang', 'ChiTietDonHang.id_DonHang', '=', 'DonHang.id')
            ->where('DonHang.TinhTrang', '<>', 'Chờ xét duyệt')
            ->groupBy('id_SanPham')
            ->orderByDesc('total')
            ->take(30)
            ->get();
            $topSoldProductsIds = $topSoldProducts->pluck('id_SanPham')->toArray();

            // Lấy thông tin sản phẩm từ bảng SanPham
            $products = SanPham::whereIn('id', $topSoldProductsIds)->get();

        $SP='Sản phẩm hot';
        return view('/SanPham.HienThiSP', compact('loaiSPs','products','SP'));
    }

}
