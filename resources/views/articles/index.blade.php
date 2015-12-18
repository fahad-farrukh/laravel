@extends('app')

@section('content')
    <h1>Articles</h1>
    
    <hr/>

    @foreach($articles as $article)
        <article>
            <h2>
                <!-- a href="/articles/{{ $article->id }}">{{ $article->title }}</a--> <!-- Relative URL not working, need to give absolute URL -->
                <!-- a href="{{ action('ArticlesController@show', [$article->id]) }}">{{ $article->title }}</a--> <!-- It gives absolute URL, works fine -->
                <a href="{{ url('/articles', $article->id) }}">{{ $article->title }}</a> <!-- It also gives absolute URL, works fine -->
            </h2>
            <div class="body">{{ $article->body }}</div>
        </article>
    @endforeach
@stop