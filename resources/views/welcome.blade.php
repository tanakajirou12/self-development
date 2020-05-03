@extends('layouts.app')

@section('content')
　　@if (Auth::check())
        <body class="mt-4">
        <div class="container">
            <h2>本を検索してコメントを投稿してください</h2>
            
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
            
            
        
        
        　　<div class="row">
            
            　　<div class="col-sm-12">
                　　@if (count($developments) > 0)
                    　　@include('developments.developments', ['developments' => $developments])
                　　@endif
            　　</div>
        　　</div>
        </div>
    @else
    　　<div class="center jumbotron">
        　　<div class="text-center">
            　　<h1>実生活で役に立った本について共有するサイト</h1>
            　　{!! link_to_route('signup.get', 'サインアップ', [], ['class' => 'btn btn-lg btn-primary']) !!}
        　　</div>
    　　</div>
    @endif
@endsection