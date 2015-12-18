@extends('app')

@section('content')
    <h1>Edit: {!! $article->title !!}</h1>
    
    <hr/>

    <?php /*{!! Form::open(['method' => 'PATCH', 'url' => 'articles/'.$article->id]) !!}*/ ?>
    {!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}
        @include('articles/form', ['submitButtonText' => 'Update Article'])
    {!! Form::close() !!}
    
    <?php /*{{ var_dump($errors) }}*/ ?>
    
    @include('errors/list')
@stop