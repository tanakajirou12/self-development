@extends('layouts.app')

@section('content')
　　@if (Auth::check())
        <body class="mt-4">
        <div class="container">
            <h1>本の検索</h1>
            
            <div class="row">
                <div class="col-6">
                    <form method="GET" action="{{ route('search') }}">
                        <div class="form-group">
                            <label for="title">検索キーワード：</label>
                            <input type="text" name="title" class="form-control" />
                        </div>
                        
                        <button type="submit" class="btn btn-primary">検索する！</button>
                    </form>
                </div>
            </div>
            <hr />
            
            
        </div>
        
        <div class="row">
            
            <div class="col-sm-8">
                @if (Auth::id() == $user->id)
                    {!! Form::open(['route' => 'developments.store']) !!}
                        <div class="form-group">
                            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                            {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                        </div>
                    {!! Form::close() !!}
                @endif
                @if (count($developments) > 0)
                    @include('developments.developments', ['developments' => $developments])
                @endif
            </div>
        </div>
    @else
    　　<div class="center jumbotron">
        　　<div class="text-center">
            　　<h1>Welcome to the Self-development</h1>
            　　{!! link_to_route('signup.get', 'サインアップ', [], ['class' => 'btn btn-lg btn-primary']) !!}
        　　</div>
    　　</div>
    @endif
@endsection