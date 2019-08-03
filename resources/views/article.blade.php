@include('head')
@include('header')

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <div class="title-article">
                    <h2> Статья
                    </h2>
                    <p>{{ $article->title }}</p>
                </div>
                <div class="article-author">
                    <h2> Автор статьи
                        <a
                            href="{{ route('authors.show', ['id' => $article->author_id]) }}">{{ $article->user->name }}</a>

                </div>
                <div class="article-content">
                    <h2> Содержимое статьи
                    </h2>
                    <p>{{ $article->body }}</p>
                </div>

            </div>
            <div class="col-lg-12">
                <h3>Комментарии</h3>
                @if (count($articleComments) > 0)
                <section class="data">
                    @include('load_comments')
                </section>
                @endif
                <form action="{{ route('articles.store', ['id' => $article->id])}}" id="addComment" method="post">
                    {{ csrf_field() }}
                    <textarea name="comment" id="" cols="30" rows="4"></textarea>
                    <p>
                        <button type="submit"> Добавить комментарий</button>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>

@include('footer')