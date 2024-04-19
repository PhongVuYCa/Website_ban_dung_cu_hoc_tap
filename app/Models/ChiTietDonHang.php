<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{

    protected $table = 'ChiTietDonHang';
    protected $primaryKey = [ 'id_SanPham','id_DonHang'];
    public $incrementing = false;
    protected $fillable = [
        'id_SanPham',
        'id_DonHang',
        'Gia',
        'GiamGia',
        'SoLuong',
        'TongGia'
        
    ];
    public function SanPham()
    {
        return $this->belongsTo(SanPham::class, 'id_SanPham', 'id');
    }
    public function DonHang()
    {
        return $this->belongsTo(DonHang::class, 'id_DonHang', 'id');
    }
}
