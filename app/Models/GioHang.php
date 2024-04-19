<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class GioHang extends Model
{
    use HasFactory;

    protected $table = 'GioHang';
       // Khóa chính

    // Không sử dụng auto-incrementing cho các khóa chính
    public $incrementing = false;


    protected $fillable = [
        'id',
        'id_user',
        'id_SanPham',
        'SoLuong'
    ];

    // Định nghĩa mối quan hệ với bảng DungCu
    public function SanPham()
    {
        return $this->belongsTo(SanPham::class, 'id_SanPham', 'id');
    }

    // Định nghĩa mối quan hệ với bảng Users
    public function user()
    {
        return $this->belongsTo(Users::class, 'id_user', 'id');
    }
    
}
