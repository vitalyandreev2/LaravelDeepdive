<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', [
            'categoryList' => $this->getCategory()
        ]);
    }

    public function category(int $idCategory)
    {
        return view('news.category', [
            'newsList' => $this->getCategory($idCategory)
        ]);
    }

    public function show(int $idCategory, int $id)
    {
        return view('news.show', [
            'newsItem' => $this->getNews($idCategory, $id)
        ]);
    }
}
