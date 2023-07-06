<?php

namespace App\Http\Controllers\Sell;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Customer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /**
     * Hiển thị form đăng nhập
     *
     * @return View
     */
    public function showLogin()
    {
        return view('Sell.auth.login');
    }


    /**
     * Thực hiện đăng nhập
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        $account = $request->validated();
        if (Auth::attempt($account)) {
            session()->regenerate();
            $account = Customer::where('tendn', $account['tendn'])->first();
            session()->put('account', $account);
            return redirect()->route('home.index');
        } else
            return back()->withErrors(['error' => 'Wrong username or password!'])->withInput();
    }


    /**
     * Hiển thị form đăng ký
     *
     * @return View
     */
    public function showRegister()
    {
        return view('Sell.auth.register');
    }


    /**
     * Thực hiện đăng ký
     *
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function register(RegisterRequest $request)
    {
        $validate = $request->validated();
        if ($validate) {
            $validate['password'] = Hash::make($validate['password']);
            Customer::create($validate);
            return redirect()->route('auth.showLogin')->with('status', 'Đăng ký thành công, xin mời đăng nhập!');
        } else
            return back()->withErrors($validate)->withInput();
    }


    /**
     * Thực hiện đăng xuất
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request) {
        Auth::logout(); // Đăng xuất người dùng
        $request->session()->invalidate(); // Xóa hết dữ liệu session
        $request->session()->regenerateToken(); // Tạo lại CSRF token mới
        return redirect('/'); // Chuyển hướng về trang chủ hoặc trang khác tuỳ ý
    }
}
