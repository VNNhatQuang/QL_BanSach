<?php

namespace App\Http\Controllers\Sell;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBillRequest;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Book;
use App\Repositories\BookRepository;
use App\Repositories\CategoryRepository;
use App\Services\CartService;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $bookRepository;
    private $categoryRepository;

    public function __construct(BookRepository $bookRepository, CategoryRepository $categoryRepository)
    {
        $this->bookRepository = $bookRepository;
        $this->categoryRepository = $categoryRepository;
    }



    public function index(Request $request, $idLoai = null)
    {
        $searchValue = $request->input('searchValue') ?? '';
        $categories = $this->categoryRepository->getAll();
        if ($idLoai != null)
            $books = $this->bookRepository->getByCategoryId($idLoai, $searchValue);
        else
            $books = $this->bookRepository->getAll($searchValue);
        return view('Sell.home.index', compact('books', 'categories'));
    }



    public function addToCart(Request $request)
    {
        $productData = $request->all();
        $product = (object) $productData;
        $product->soluong = 1;
        // Lấy thông tin giỏ hàng
        $carts = (array) session()->get('carts');
        if (count($carts) == 0)
            $carts[] = $product;
        else
            $carts = CartService::addToCart($carts, $product);
        session()->put('carts', $carts);
        return redirect()->route('cart.index');
    }



    public function showCart()
    {
        $categories = $this->categoryRepository->getAll();
        return view('Sell.cart.index', compact('categories'));
    }



    public function handelCart(Request $request)
    {
        if ($request->input('update') != null) {
            $masach = $request->input('masach');
            $soluong = $request->input('soluong');
            $carts = session('carts');
            $newCarts = CartService::updateQuality($carts, $masach, $soluong);
            session()->put('carts', $newCarts);
            return back();
        }
        if ($request->input('delete') != null) {
            $masach = $request->input('masach');
            $carts = session('carts');
            $newCarts = CartService::deleteProduct($carts, $masach);
            session()->put('carts', array_values($newCarts));
            return back();
        }
        if ($request->input('deleteAll') != null) {
            session()->forget('carts');
            return back();
        }
    }


    public function pay()
    {
        return view('Sell.pay.index');
    }


    public function payStore(StoreBillRequest $request)
    {
        $carts = session('carts');
        $account = (object) session('account');
        $info = $request->validated();
        $damua = 1;
        if($request->input('cod'))
            $damua = 0;
        Bill::insert([
            'makh' => $account->makh,
            'ngaymua' => Carbon::now(),
            'damua' => $damua,
            'diachi' => $info['diachi'],
            'sodienthoai' => $info['sodienthoai'],
        ]);
        $mahoadon = Bill::latest()->value('mahoadon');
        foreach ($carts as $product) {
            BillDetail::create([
                'masach' => $product->masach,
                'soluongmua' => $product->soluong,
                'mahoadon' => $mahoadon,
            ]);
        }
        session()->forget('carts');
        return back()->with('success', 'Thanh toán thành công!');
    }


    public function history()
    {
        $account = (object) session('account');
        $list = Bill::with('chitiethoadon')->where('makh', $account->makh)->where('damua', 1)->get();
        foreach ($list as $billDetail) {
            foreach ($billDetail->chitiethoadon as $sach)
                $sach->sach = Book::where('masach', $sach->masach)->first();
        }
        return view('Sell.history.index', compact('list'));
    }
}
