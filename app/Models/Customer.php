<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model implements Authenticatable
{
    use HasFactory;

    protected $table = 'khachhang';

    protected $fillable = [
        'makh',
        'hoten',
        'diachi',
        'sodt',
        'email',
        'tendn',
        'password',
    ];

    protected $primaryKey = 'makh';

    public $timestamps = false;

    protected $hidden = [
        'password'
    ];


    public function hoadon() {
        return $this->hasMany(Bill::class);
    }



    public function getAuthIdentifierName()
    {
        return 'tendn';
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

}
