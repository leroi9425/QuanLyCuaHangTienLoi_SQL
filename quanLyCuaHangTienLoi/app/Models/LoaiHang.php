<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiHang extends Model
{
    use HasFactory;
    
    protected $fillable = ['malh', 'tenlh'];
    protected $table = 'loaihang';
    protected $primaryKey = 'malh';
    protected $keyType = 'string';
}
