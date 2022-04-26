<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', [
            'categoryList' => Category::active()->paginate(10)
        ]);
    }

    public function category(int $idCategory)
    {
        return view('news.category', [
            'newsList' => News::where('category_id', $idCategory)->active()->paginate(9)
        ]);
    }

    public function show(int $idCategory, int $id)
    {
        return view('news.show', [
            'newsItem' => News::find($id)
        ]);
    }
}
