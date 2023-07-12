<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Hiển thị form đăng nhập Admin
     *
     * @return View
     */
    public function showLogin()
    {
        if(Auth::guard('admin')->check())
            return redirect()->route('admin.home.index');
        else
            return view('Admin.auth.login');
    }


    /**
     * Thực hiện đăng nhập cho Admin
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request) {
        $account = $request->validated();
        if (Auth::guard('admin')->attempt($account)) {
            session()->regenerate();
            $account = Admin::where('tendn', $account['tendn'])->first();
            session()->put('account', $account);
            return redirect()->route('admin.home.index');
        } else
            return back()->withErrors(['error' => 'Wrong username or password!'])->withInput();
    }


    /**
     * Thực hiện đăng xuất
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request) {
        Auth::guard('admin')->logout(); // Đăng xuất người dùng
        $request->session()->invalidate(); // Xóa hết dữ liệu session
        $request->session()->regenerateToken(); // Tạo lại CSRF token mới
        return redirect('/admin');
    }
}
