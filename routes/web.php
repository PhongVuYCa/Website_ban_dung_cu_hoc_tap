<?php

use App\Http\Controllers\QuanLy;
use App\Http\Controllers\TaiKhoan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;




Route::get('/', 'App\Http\Controllers\SanPhamController@TrangChu');
//Dăng ký, Đăng nhập, Đăng xuất
//Đăng Ký
Route::get('/LoaiSanPham', 'App\Http\Controllers\SanPhamController@HienThiLoaiSanPham');
Route::get('/DangKi', function () {
    return view('TaiKhoan/DangKiTaiKhoan');
});
Route::post('/XuLyDangKi', 'App\Http\Controllers\TaiKhoan@DangKiTaiKhoan');
//Dang Nhap
Route::get('/DangNhap', function () {
    return view('TaiKhoan/DangNhapTaiKhoan');
});
Route::post('/XuLyDangNhap', 'App\Http\Controllers\TaiKhoan@DangNhapTaiKhoan');
//Đăng xuất
Route::get('/DangXuat', 'App\Http\Controllers\TaiKhoan@DangXuatTaiKhoan');
Route::get('/QuenMatKhau', function () {
    return view('TaiKhoan/QuenMatKhau');
});
Route::post('/XuLyQuenMatKhau', 'App\Http\Controllers\TaiKhoan@XuLyQuenMatKhau');



// Tài khoản

Route::get('/TaiKhoan', 'App\Http\Controllers\TaiKhoan@ThongTinCaNhan');
Route::get('/FormChinhSuaTaiKhoan','App\Http\Controllers\TaiKhoan@FormChinhSuaTaiKhoan');
Route::post('/ChinhSuaTaiKhoan', 'App\Http\Controllers\TaiKhoan@CSThongTinTaiKhoan');


//Danh sách sản phẩm theo loại
Route::get('/LoaiSanPham/{id}', 'App\Http\Controllers\SanPhamController@HienThiSanPhamTheoLoai');
//Danh sách sản phẩm giảm giá
Route::get('/SanPhamHot', 'App\Http\Controllers\SanPhamController@HienThiSanPhamHot');

//Danh sách sản phẩm giảm giá
Route::get('/SanPhamGiamGia', 'App\Http\Controllers\SanPhamController@HienThiSanPhamGiamGia');

//Danh sách sản phẩm
Route::get('/HienThiSP', 'App\Http\Controllers\SanPhamController@HienThiSanPham');
//Chi tiết sản phẩm
Route::get('/ChiTietSP/{id}', 'App\Http\Controllers\SanPhamController@ChiTietSanPham');

//giỏ hàng
Route::post('/ThemVaoGioHang', 'App\Http\Controllers\GioHangControllers@ThemSPVaoGioHang');
Route::get('/GioHang', 'App\Http\Controllers\GioHangControllers@HienThiGioHang');
Route::get('/CapNhatGioHang/{id}', 'App\Http\Controllers\GioHangControllers@CapNhatGioHang');
Route::post('/XuLyCapNhatGioHang/{id}', 'App\Http\Controllers\GioHangControllers@XuLyCapNhatGioHang');
Route::get('/XoaGioHang/{id}', 'App\Http\Controllers\GioHangControllers@XoaGioHang')->name('xoa_gio_hang');

Route::get('/DonHangChoXacNhan', 'App\Http\Controllers\GioHangControllers@ChoXacNhan');
Route::get('/DonHangDangVanChuyen', 'App\Http\Controllers\GioHangControllers@DangVanChuyen');
Route::get('/DonHangDaVanChuyen', 'App\Http\Controllers\GioHangControllers@DaVanChuyen');
Route::get('/DonHangDaHuy', 'App\Http\Controllers\GioHangControllers@DaHuy');

Route::get('/ChiTietDonHang/{id}', 'App\Http\Controllers\GioHangControllers@ChiTietDonHang');
Route::get('/HuyDonHang/{id}', 'App\Http\Controllers\GioHangControllers@HuyDonHang');
Route::get('/DanhGiaSanPham/{id}', 'App\Http\Controllers\GioHangControllers@DanhGiaSanPham');
Route::post('/XuLyDanhGia/{id}', 'App\Http\Controllers\GioHangControllers@XuLyDanhGia');



//Thanh toán
Route::get('/ThanhToan', 'App\Http\Controllers\DatHang@XuLyDonHang');
Route::post('/XuLyDatHang', 'App\Http\Controllers\DatHang@XuLyDatHang');
Route::post('/TimKiemSanPham', 'App\Http\Controllers\SanPhamController@TimKiemSanPham');


// admin
// trang chủ

Route::get('/QuanLy', 'App\Http\Controllers\QuanLy@TrangChu');

//Danh sách users
Route::get('/DanhSachKhachHang', 'App\Http\Controllers\QuanLy@HienThiDanhSachUser');
Route::get('/DanhSachNhanVien', 'App\Http\Controllers\QuanLy@HienThiDanhSachNV');
Route::post('/XoaNguoiDung/{id}', 'App\Http\Controllers\QuanLy@XoaUser');
Route::get('/ThemNV', function () {
    return view('QuanLy.TaiKhoan.ThemUser');
});
Route::post('/XuLyThemNV', 'App\Http\Controllers\QuanLy@ThemUser');
Route::post('/SuaNguoiDung/{id}', 'App\Http\Controllers\QuanLy@SuaUser');
Route::post('/XuLySuaUser/{id}', 'App\Http\Controllers\QuanLy@XuLySuaUser');

Route::post('/XemChiTietNguoiDung/{id}', 'App\Http\Controllers\QuanLy@XemChiTietND');



//Danh sách sản phẩm
Route::get('/DanhSachSP', 'App\Http\Controllers\QuanLy@DanhSachSP');
Route::get('/DanhSachSanPhamTheoLoai/{id}', 'App\Http\Controllers\QuanLy@DanhSachSanPhamTheoLoai');

Route::get('/ThemSP', 'App\Http\Controllers\QuanLy@LoaiSanPham');
Route::post('/XuLyThemSP', 'App\Http\Controllers\QuanLy@ThemSP');
Route::post('/XoaSanPham/{id}', 'App\Http\Controllers\QuanLy@XoaSP');

Route::post('/SuaSanPham/{id}', 'App\Http\Controllers\QuanLy@SuaSP');
Route::post('/XuLySuaSanPham/{id}', 'App\Http\Controllers\QuanLy@XuLySuaSP');

Route::post('/XemChiTietSanPham/{id}', 'App\Http\Controllers\QuanLy@XemChiTietSP');

Route::get('/XemChiTietSP/{id}', 'App\Http\Controllers\QuanLy@XemChiTietSP');


// Loại sản phẩm
Route::get('/DanhSachLoaiSP', 'App\Http\Controllers\QuanLy@HienThiDanhSnhachLoaiSanPham');

Route::post('/XuLyThemLoaiSP', 'App\Http\Controllers\QuanLy@ThemLoaiSP');
Route::post('/XoaLoaiSanPham/{id}', 'App\Http\Controllers\QuanLy@XoaLoaiSP');
Route::post('/SuaLoaiSanPham/{id}', 'App\Http\Controllers\QuanLy@SuaLSP');
Route::post('/XuLySuaLoaiSP/{id}', 'App\Http\Controllers\QuanLy@XuLySuaLoaiSP');


//Dơn hàng
Route::get('/DanhSachDonHang', 'App\Http\Controllers\QuanLyDonHang@DHChoXacNhan');
Route::get('/ChoXacNhan', 'App\Http\Controllers\QuanLyDonHang@DHChoXacNhan');
Route::get('/DangVanChuyen', 'App\Http\Controllers\QuanLyDonHang@DHDangVanChuyen');
Route::get('/DaVanChuyen', 'App\Http\Controllers\QuanLyDonHang@DHDaVanChuyen');
Route::get('/DaHuy', 'App\Http\Controllers\QuanLyDonHang@DHDaHuy');
Route::post('/XemChiTietSanPham/{id}', 'App\Http\Controllers\QuanLy@XemChiTietSP');
Route::post('/XemChiTietDonHang/{id}', 'App\Http\Controllers\QuanLyDonHang@XemChiTietDH');
Route::post('/CapNhatDonHang/{id}', 'App\Http\Controllers\QuanLyDonHang@CapNhatDH');
Route::get('/XemChiTietKhachHang/{id}', 'App\Http\Controllers\QuanLy@XemChiTietND');

//Thông tin cá nhân
Route::get('/ThongTinCaNhan',function () {
    return view('QuanLy/TaiKhoanCaNhan/HienThiThongTin');
});
Route::get('/CapNhatTaiKhoan',function () {
    return view('QuanLy/TaiKhoanCaNhan/CapNhatThongTin');
});
Route::post('/XuLyCapNhatTaiKhoan', 'App\Http\Controllers\TaiKhoan@XuLyCSThongTinTaiKhoan');


//Thống kê
Route::get('/ThongKe', 'App\Http\Controllers\QuanLyDonHang@ThongKeDoanhThu');


