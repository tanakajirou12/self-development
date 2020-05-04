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
            
            
        
        　　<h2>タイムライン</h2>
        　　<div class="row">
            
            　　<div class="col-sm-6">
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
    　　<div class="jumbotron">
        　　<div class="">
            　　<h2>このサイトでできること</h2>
            　　<ul>
                    <li>本を検索してその本について投稿を作成</li>
                    <li>フォロー機能で他の人と本に関する情報を共有</li>
                    <li>本の情報を具体的にどう活かしたかを共有</li>
            　　</ul>
            　　<h2>このサイトでの目的（例）</h2>
            　　<ul>
            　　  　  <li>役に立ちそうな本についての情報共有をして、今後読む本の選択の参考にする。</li>
                    <li>他の人の本の活かし方を参考にし自分の行動につなげること。本を読んだだけで満足しないで行動に活かす。</li>
                </ul>
        　　</div>
    　　</div>
    @endif
@endsection