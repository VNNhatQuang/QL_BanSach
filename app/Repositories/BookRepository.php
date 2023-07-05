<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository
{
    public function getByCategoryId($categoryId, $searchValue = '')
    {
        return Book::where('maloai', $categoryId)
            ->where('tensach', 'like', '%' . $searchValue . '%')
            ->orWhere('masach', $searchValue)
            ->orWhere('gia', $searchValue)
            ->get();
    }

    public function getAll($searchValue = '')
    {
        return Book::where('tensach', 'like', '%' . $searchValue . '%')
            ->orWhere('masach', $searchValue)
            ->orWhere('gia', $searchValue)
            ->get();
    }
}
