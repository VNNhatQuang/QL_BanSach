<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    const PAGE_SIZE = 5;


    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request)
    {
        $searchValue = $request->input('searchValue') ?? '';
        $list = Category::where('tenloai', 'LIKE', '%'.$searchValue.'%')->paginate(CategoryController::PAGE_SIZE);
        return view('Admin.category.index', compact('list', 'searchValue'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('Admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = $request->validated();
        Category::insert($category);
        return back()->with('success', 'Đã thêm mới loại sách');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return View
     */
    public function show(Category $category)
    {
        return view('Admin.category.delete', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return View
     */
    public function edit(Category $category)
    {
        return view('Admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return RedirectResponse
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $newCategory = $request->validated();
        Category::where('maloai' , $category->maloai)->update($newCategory);
        return back()->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return RedirectResponse
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->maloai);
        return redirect()->route('category.index');
    }
}
