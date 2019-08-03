@include('head')
@include('header')

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <div class="title-name">
                    <h2>Имя автора</h2>
                    <p>{{ $author->name}}</p>
                </div>
                <div class="title-age">
                    <h2>Возраст автора</h2>
                    <p>{{ $author->age}}</p>
                </div>
            </div>

            <div class="col-lg-12">
                <h3>Статьи</h3>                
                @if (count($authorArticles) > 0)
                <section class="data">
                    @include('load_articles')
                </section>
                @endif

            </div>



        </div>

    </div>
</body>

@include('footer')