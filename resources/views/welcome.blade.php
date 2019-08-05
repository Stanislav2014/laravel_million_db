@include('head')
@include('header')

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-xl-6">
                @foreach ($topArticles as $article)
                <h3>Статья</h3>
                <p>
                    {{$article->title }}
                </p>
                <h3>Автор</h3>
                <p>
                    <a href="{{ route('authors.show', [$article->author_id]) }}">{{ '' }}</a>
                </p>
                <h3>Содержание</h3>
                <p>
                    <a href="{{ route('articles.show', [$article->id]) }}">{{$article->body}}</a>
                </p>
                @endforeach

            </div>
            <div class="col-lg-6 col-xl-6">
                <div class="col-lg-12 top5_articles_comments">
                    <div class="title">
                        <h1>ТОП-5 самых комментируемых статей</h1>
                    </div>
                    @foreach ($topArticles as $article)
                    <p>
                        <a href="{{ route('articles.show', [$article->id]) }}">{{$article->title }}</a>
                    </p>
                    @endforeach

                </div>
                <div class="col-lg-12 top5_authors_articles">
                    <div class="title">
                        <h1>ТОП-5 авторов</h1>
                    </div>
                    @foreach ($topAuthors as $author)
                    <p> <a href="{{ route('authors.show', [$author->id]) }}">{{$author->name }}</a></p>
                    @endforeach
                </div>
                <div class="col-lg-12 last5_comments">
                    <div class="title">
                        <h1>5 последних комментириев</h1>
                    </div>
                    @foreach ($lastComments as $comment)
                    <p> <a href="{{ route('articles.show', [$comment->article_id]) }}">{{$comment->body }}</a></p>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
</body>

@include('footer')
