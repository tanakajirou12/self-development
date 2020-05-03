@extends('layouts.app')

@section('content')

    <h1>{{ $development->title }} の投稿詳細ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>この本の役にたった内容</th>
            <td>{{ $development->content1 }}</td>
        </tr>
        <tr>
            <th>具体的にどう役立てたか</th>
            <td>{{ $development->content2 }}</td>
        </tr>
    </table>
    
    {!! link_to_route('developments.edit', 'この投稿を編集', ['id' => $development->id], ['class' => 'btn btn-light']) !!}

@endsection