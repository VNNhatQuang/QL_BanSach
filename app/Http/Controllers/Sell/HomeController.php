<?php

namespace App\Http\Controllers\Sell;

use App\Http\Controllers\Controller;
use App\Repositories\BookRepository;
use App\Repositories\CategoryRepository;
use App\Services\CartService;
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



    public function showCart() {
        $categories = $this->categoryRepository->getAll();
        return view('Sell.cart.index', compact('categories'));
    }



    public function handelCart(Request $request) {
        if($request->input('update') != null) {
            $masach = $request->input('masach');
            $soluong = $request->input('soluong');
            $carts = session('carts');
            $newCarts = CartService::updateQuality($carts, $masach, $soluong);
            session()->put('carts', $newCarts);
            return back();
        }
        if($request->input('delete') != null) {
            $masach = $request->input('masach');
            $carts = session('carts');
            $newCarts = CartService::deleteProduct($carts, $masach);
            session()->put('carts', array_values($newCarts));
            return back();
        }
        if($request->input('deleteAll') != null) {
            session()->forget('carts');
            return back();
        }
    }
}
