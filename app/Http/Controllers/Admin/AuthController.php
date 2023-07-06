<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Hiển thị form đăng nhập
     *
     * @return View
     */
    public function showLogin()
    {
        return view('Admin.auth.login');
    }
}
