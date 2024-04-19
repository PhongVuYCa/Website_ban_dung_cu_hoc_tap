<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'SanPham';

    protected $fillable = [
        'id',
        'TenSP',
        'id_HinhAnh',
        'Gia',
        'GiamGia',
        'SoLuong',
        'DonVi',
        'NgaySX',
        'NhaSX',
        'BaoHanh',
        'MoTa',
        'id_LoaiSP',
        'id_NguoiThemSP',
        'id_NguoiChinhSua',
        'created_at',
        'updated_at'
    ];
    public function LoaiSanPham()
    {
        return $this->belongsTo(LoaiSanPham::class, 'id_LoaiSP');
    }

    public function NguoiThemSP()
    {
        return $this->belongsTo(Users::class, 'id_NguoiThemSP');
    }
    public function NguoiSuaSP()
    {
        return $this->belongsTo(Users::class, 'id_NguoiChinhSua');
    }
}
