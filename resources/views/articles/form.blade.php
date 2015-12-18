<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
    <?php /*{!! Form::text('name', null, ['class' => 'form-control', 'foo' => 'bar']) !!}*/ ?>
</div>
<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('published_at', 'Published On:') !!}
    {!! Form::input('date', 'published_at', $article->published_at, ['class' => 'form-control']) !!}
    <?php /*{!! Form::input('date', 'published_at', $article->published_at->format('Y-m-d'), ['class' => 'form-control']) !!}*/ ?>
    <?php /*{!! Form::input('date', 'published_at', null, ['class' => 'form-control']) !!}*/ ?>
    <?php /*{!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}*/ ?>
    <?php /*{!! Form::input('date', 'published_at', Carbon\Carbon::now()->formate('Y-m-d'), ['class' => 'form-control']) !!}*/ ?>
</div>
<div class="form-group">
    {!! Form::label('tag_list', 'Tags:') !!}
    {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}<?php /* third param represents the item that is to appear selected */ ?>
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>


@section('footer')
    <script>
        $('#tag_list').select2({
            placeholder: 'Choose a tag',
            //tags: true,
            /*ajax: {
                dataType: 'json',
                url: 'api/tags',
                delay: 250,
                data: function(params) {
                    return {
                        q:params.term
                    }
                },
                processResults: function(data){
                    return { results: data }
                }
            }*/
            /*data: [
                {id: 'one', text:'One'},
                {id: 'two', text:'Two'}
            ]*/
        });
    </script>
@endsection()