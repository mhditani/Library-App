<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Borrow extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'status'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function  user()
    {
        return $this->belongsTo(User::class);
    }
}
