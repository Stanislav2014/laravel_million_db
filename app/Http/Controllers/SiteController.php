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
             $topArticles = DB::table('articles')
            ->whereIn(
                'id',
                (DB::table('comments')
                    ->select('article_id')
                    ->groupBy('article_id')
                    ->orderByRaw('count(article_id) desc')
                    ->limit(5))
            )->get();

        $topAuthors = DB::table('users')
        ->whereIn(
            'id',
            (DB::table('articles')
                ->select('author_id')
                ->groupBy('author_id')
                ->orderByRaw('count(author_id) desc')
                ->limit(5))
        )->get();
        
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
