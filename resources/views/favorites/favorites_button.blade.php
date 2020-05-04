@if (Auth::user()->is_favorite($development->id))
    {!! Form::open(['route' => ['favorites.unfavorite', $development->id], 'method' => 'delete']) !!}
        {!! Form::submit('お気に入り解除', ['class' => "btn btn-danger btn-block"]) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['favorites.favorite', $development->id]]) !!}
        {!! Form::submit('お気に入り登録', ['class' => "btn btn-primary btn-block"]) !!}
    {!! Form::close() !!}
@endif
