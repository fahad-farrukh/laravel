@extends('app')

@section('content')
    <h1>Write a New Article</h1>
    
    <hr/>

    {!! Form::model($article = new \App\Article, ['url' => 'articles']) !!}
    <?php /*{!! Form::open(['url' => 'articles']) !!}*/ ?>
        @include('articles/form', ['submitButtonText' => 'Add Article'])
    {!! Form::close() !!}
    
    <?php /*{{ var_dump($errors) }}*/ ?>
    
    @include('errors/list')
@stop