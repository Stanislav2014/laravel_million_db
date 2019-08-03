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

class AuthorController extends BaseController
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request, $id)
    {
        $author = User::find($id);
        $authorArticles = Article::where('author_id', $id)
            ->orderBy('updated_at', 'desc')
            ->paginate(5);

        if ($request->ajax()) {
            return view('load_articles', ['authorArticles' => $authorArticles])->render();
        }

        return view('author', [
            'author' => $author,
            'authorArticles' => $authorArticles,
        ]);
    }
}
