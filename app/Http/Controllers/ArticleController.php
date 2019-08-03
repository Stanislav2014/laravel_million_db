<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\User as User;
use App\Article as Article;
use App\Comment as Comment;
use Illuminate\Http\Request;

class ArticleController extends BaseController
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request, $id)
    {
        $article = Article::with('user')->find($id);
        $articleComments = Comment::with('user')
            ->where('article_id', $id)
            ->orderBy('updated_at', 'desc')
            ->paginate(5);

        if ($request->ajax()) {
            return view('load_comments', ['articleComments' => $articleComments])->render();
        }

        return view('article', [
            'article' => $article,
            'articleComments' => $articleComments,
        ]);
    }

    public function store(Request $request, $id)
    {   
        $comment = $request['comment'];
        $newComment = new Comment ;
        $newComment->author_id = 1;
        $newComment->article_id = $id;
        $newComment->body = $comment;
        $newComment->save();
        
        return redirect()->route('articles.show', ['id' => $id]);
    }
}
