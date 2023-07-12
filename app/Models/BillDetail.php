<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;

    protected $table = 'chitiethoadon';
    protected $primaryKey = 'macthd';
    protected $fillable = [
        'macthd',
        'masach',
        'soluongmua',
        'mahoadon',
    ];
    public $timestamps = false;



    public function hoadon() {
        return $this->belongsTo(Bill::class, 'mahoadon');
    }

    public function sach() {
        return $this->belongsTo(Book::class, 'masach');
    }
}
