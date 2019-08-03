<div id="loadArticles" style="position: relative;">
    @foreach($authorArticles as $article)
    <div>
        <p>
            <a href="{{ route('articles.show', ['id' => $article->id]) }}">{{$article->title}}</a>
        </p>
    </div>
    @endforeach
</div>
{{ $authorArticles->links() }}