<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use App\Models\SanPham;
use Carbon\Carbon;
use Illuminate\Http\Request;

class QuanLyDonHang extends Controller
{
    public function DHChoXacNhan(){

        $DonHangs = DonHang::where('TinhTrang','Chờ xét duyệt')->get(); 
        return view('QuanLy.DonHang.DanhSachDonHang', compact('DonHangs'));
    }

    public function DHDangVanChuyen(){
        $DonHangs = DonHang::where('TinhTrang','Đang vận chuyển')->get(); 
        return view('QuanLy.DonHang.DangVanChuyen', compact('DonHangs'));
    }
    public function DHDaVanChuyen(){
        $DonHangs = DonHang::where('TinhTrang','Đã vận chuyển')->get(); 
        return view('QuanLy.DonHang.DaVanChuyen', compact('DonHangs'));
    }
    public function DHDaHuy(){
        $DonHangs = DonHang::where('TinhTrang','Đã hủy')->get(); 
        return view('QuanLy.DonHang.DaHuy', compact('DonHangs'));
    }



    public function XemChiTietDH($id){
        $CTDonHangs = ChiTietDonHang::where('id_DonHang',$id)->get();
        return view('QuanLy.DonHang.ChiTietDonHang', compact('CTDonHangs'));
    }
    public function CapNhatDH($id){
        $DonHang = DonHang::where('id', $id)->first();
        if($DonHang->TinhTrang == "Chờ xét duyệt"){
            $CTDonHangs = ChiTietDonHang::where('id_DonHang', $id)->get();
            foreach($CTDonHangs as $CTDonHang){
                $SanPham = SanPham::where('id',$CTDonHang->id_SanPham)->first();
                if($SanPham->SoLuong < $CTDonHang->SoLuong){
                    session()->flash('ThongBaoThatBai', 'Số lượng sản phẩm trong kho không đủ!');
                    $DonHangs = DonHang::where('TinhTrang','Chờ xét duyệt')->get(); 
                    return view('QuanLy.DonHang.DanhSachDonHang', compact('DonHangs'));
                }
                $SanPham->SoLuong = $SanPham->SoLuong - $CTDonHang->SoLuong;
                $SanPham->save();

            }
            $TinhTrang = "Đang vận chuyển";
        }
        if($DonHang->TinhTrang == "Đang vận chuyển"){
            $TinhTrang = "Đã vận chuyển";
        }
        $DonHang->TinhTrang=$TinhTrang;
        $DonHang->save();
        session()->flash('ThongBaoThanhCong', 'Cập nhật đơn hàng thành công!');
        $DonHangs = DonHang::where('TinhTrang','Chờ xét duyệt')->get(); 
        return view('QuanLy.DonHang.DanhSachDonHang', compact('DonHangs'));
    }

    public function ThongKeDoanhThu(Request $request){
        // Lấy năm được chọn từ request
        $nam = $request->input('nam');
    
        // Nếu không có năm được chọn, mặc định hiển thị cho năm hiện tại
        if (!$nam) {
            $nam = Carbon::now()->year;
        }
    
        // Lấy danh sách các đơn hàng từ cơ sở dữ liệu cho năm đã chọn
        $donHangs = DonHang::whereYear('created_at', $nam)->get();
    
        // Khởi tạo mảng để lưu trữ doanh thu theo tháng
        $doanhThuThang = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    
        // Duyệt qua mỗi đơn hàng và tính tổng doanh thu theo tháng
        foreach ($donHangs as $donHang) {
            // Lấy tháng từ ngày tạo đơn hàng
            $thang = date('n', strtotime($donHang->created_at));
            
            // Cộng tổng doanh thu của đơn hàng vào tháng tương ứng
            $doanhThuThang[$thang - 1] += $donHang->ThanhTien;
        }
    
        return view('QuanLy.ThongKe.ThongKeDoanhThu', compact('doanhThuThang', 'nam'));
    }
}



