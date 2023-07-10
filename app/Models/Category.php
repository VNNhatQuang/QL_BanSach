<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'loai';

    protected $fillabel = [
        'maloai',
        'tenloai',
    ];

    public $timestamps = false;

    public $primaryKey = 'maloai';
    public $keyType = 'string';



    public function books() {
        return $this->hasMany(Book::class);
    }

}
