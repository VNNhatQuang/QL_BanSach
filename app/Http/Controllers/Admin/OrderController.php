<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    const PAGE_SIZE = 5;


    public function index(Request $request)
    {
        $searchValue = $request->input('searchValue') ?? '';
        $list = Bill::with('chitiethoadon')
            ->with('khachhang')
            ->whereHas('khachhang', function ($query) use ($searchValue) {
                $query->where('hoten', 'LIKE', '%' . $searchValue . '%');
            })
            ->orWhere('sodienthoai', 'LIKE', '%' . $searchValue . '%')
            ->paginate(OrderController::PAGE_SIZE);
        return view('Admin.order.index', compact('list', 'searchValue'));
    }


    public function confirmPay($id)
    {
        Bill::where('mahoadon', $id)
            ->update([
                'damua' => 1
            ]);
        return back();
    }


    public function viewDetail($id)
    {
        $order = Bill::with('chitiethoadon.sach.category')->find($id);

        return view('Admin.order.detail', compact('order'));
    }
}
