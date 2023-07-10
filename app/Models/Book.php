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

    protected $primaryKey = 'masach';

    protected $keyType = 'string';

    public $timestamps = false;



    public function category() {
        return $this->belongsTo(Category::class);
    }


}
