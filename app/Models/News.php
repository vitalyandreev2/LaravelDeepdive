<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    protected $table = "news";

    protected $fillable = [
        'category_id',
        'title',
        'author',
        'image',
        'status',
        'description',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'ACTIVE');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
