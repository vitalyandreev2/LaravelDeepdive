<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    public function index()
    {
        $category = app(Category::class);
        return view('news.index', [
            'categoryList' => $category->getCategories()
        ]);
    }

    public function category(int $idCategory)
    {
        $news = app(News::class);
        return view('news.category', [
            'newsList' => $news->getNewsList($idCategory)
        ]);
    }

    public function show(int $idCategory, int $id)
    {
        $news = app(News::class);
        return view('news.show', [
            'newsItem' => $news->getNews($id)
        ]);
    }
}
