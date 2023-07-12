<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $table = 'hoadon';
    protected $fillable = [
        'mahoadon',
        'makh',
        'ngaymua',
        'damua',
    ];
    protected $primaryKey = 'mahoadon';
    const CREATED_AT = 'ngaymua';
    const UPDATED_AT = null;


    public function khachhang() {
        return $this->belongsTo(Customer::class, 'makh');
    }

    public function chitiethoadon() {
        return $this->hasMany(BillDetail::class, 'mahoadon');
    }

}
