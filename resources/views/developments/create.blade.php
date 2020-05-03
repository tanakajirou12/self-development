@extends('layouts.app')

@section('content')

<h1>本に関する投稿作成ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($development, ['route' => 'developments.store']) !!}
              　
              　<div class="form-group">
                    {!! Form::label('title', 'タイトル:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
        
                <div class="form-group">
                    {!! Form::label('content1', 'この本の役にたった内容:') !!}
                    {!! Form::text('content1', null, ['class' => 'form-control']) !!}
                </div>
        
                <div class="form-group">
                    {!! Form::label('content2', '具体的にどう役立てたか:') !!}
                    {!! Form::text('content2', null, ['class' => 'form-control']) !!}
                </div>
        
                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>

@endsection