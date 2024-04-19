<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    public $timestamps = false;
    protected $table = 'LoaiSanPham';
    protected $fillable = ['id','TenLoaiSP'];
}
