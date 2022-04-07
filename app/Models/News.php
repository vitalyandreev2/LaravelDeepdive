<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = "news";

    public function getNewsList(int $id = null): array
    {
        if($id) {
            return \DB::table($this->table)
                ->join('categories', 'news.category_id', '=', 'categories.id')
                ->select('news.*', 'categories.title as category_title')
                ->where('categories.id', '=', $id)
                ->get()
                ->toArray();
        } else {            
            return \DB::table($this->table)
                ->join('categories', 'news.category_id', '=', 'categories.id')
                ->select('news.*', 'categories.title as category_title')
                ->get()
                ->toArray();
        }
    }

    public function getNews(int $id)
    {
        return \DB::table($this->table)
            ->find($id);
    }
}
