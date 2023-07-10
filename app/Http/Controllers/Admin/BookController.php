<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    const PAGE_SIZE = 10;



    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request)
    {
        $searchValue = $request->input('searchValue') ?? '';
        $list = Book::where('tensach', 'LIKE', '%'.$searchValue.'%')
                    ->orWhere('masach', 'LIKE', '%'.$searchValue.'%')
                    ->orWhere('maloai', 'LIKE', '%'.$searchValue.'%')
                    ->orWhere('tacgia', 'LIKE', '%'.$searchValue.'%')
                    ->paginate(BookController::PAGE_SIZE);
        return view('Admin.book.index', compact('list', 'searchValue'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $categories = Category::get();
        return view('Admin.book.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBookRequest $request
     * @return RedirectResponse
     */
    public function store(StoreBookRequest $request)
    {
        $book = $request->validated();
        $book['anh'] = $request->file('anh')->store('image_sach', 'public');
        Book::insert($book);
        return back()->with('success', 'Đã thêm mới sách');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function show($id)
    {
        $book = Book::join('loai', 'sach.maloai', '=', 'loai.maloai')->find($id);
        return view('Admin.book.delete', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $categories = Category::get();
        return view('Admin.book.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBookRequest  $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(UpdateBookRequest $request, $id)
    {
        $newBook = $request->validated();
        $newBook['anh'] = $request->file('anh')->store('image_sach', 'public');
        Book::where('masach' , $id)->update($newBook);
        return back()->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        Book::destroy($id);
        return redirect()->route('book.index');
    }
}
