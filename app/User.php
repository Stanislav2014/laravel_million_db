<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Article;
use App\Comment;

class User extends Model
{
    protected $fillable = ['name', 'age'];

    public $timestamps = false;

    public function articles()
    {
        return $this->hasMany(Article::class, 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
