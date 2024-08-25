<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Book extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'title',
        'author_name',
        'price',
        'description',
        'quantity',
        'book_img',
        'author_img',
        'category_id'

    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
