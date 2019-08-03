<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Comment;

class Article extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
