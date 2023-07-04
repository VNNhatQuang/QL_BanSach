<?php

namespace App\Http\Controllers\Sell;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(Request $request) {
        $searchValue = $request->input('searchValue') ?? '';
        $categories = Category::get();
        $books = Book::where('tensach', 'like', '%' . $searchValue . '%')->get();
        return view('Sell.home.index', compact('books', 'categories'));
    }

}
