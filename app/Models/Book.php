<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'sach';

    protected $fillable = [
        'masach',
        'tensach',
        'soluong',
        'gia',
        'maloai',
        'sotap',
        'anh',
        'ngaynhap',
        'tacgia',
    ];

    public $timestamps = false;
}
