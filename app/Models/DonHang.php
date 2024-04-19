<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table = 'DonHang';
    protected $fillable=[
        'id',
        'id_user',
        'ThanhTien',
        'PhuongThucThanhToan',
        'LuuY',
        'TinhTrang',
        'DanhGia'
    ];
    public function users()
    {
        return $this->belongsTo(Users::class, 'id_user', 'id');
    }
}
