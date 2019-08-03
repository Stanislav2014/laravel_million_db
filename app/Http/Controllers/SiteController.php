<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\User as User;
use App\Article as Article;
use App\Comment as Comment;

class SiteController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topArticles = Article::with('user')
            ->withCount('comments')
            ->orderBy('comments_count', 'desc')
            ->limit(5)

            // ->join('users', 'users.id', '=', 'articles.author_id')
            ->get();
        //var_dump($topArticles);
        $topAuthors = User::withCount('articles')
            ->orderBy('articles_count', 'desc')
            ->limit(5)
            ->get();
        $lastComments = Comment::orderBy('updated_at', 'desc')
            ->limit(5)
            ->get();

        return view('welcome', [
            'topArticles' => $topArticles,
            'topAuthors' => $topAuthors,
            'lastComments' => $lastComments
        ]);
    }
}
