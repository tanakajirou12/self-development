@if (Auth::user()->is_favorite($development->id))
    {!! Form::open(['route' => ['favorites.unfavorite', $development->id], 'method' => 'delete']) !!}
        {!! Form::submit('Unfavorite', ['class' => "btn btn-danger btn-block"]) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['favorites.favorite', $development->id]]) !!}
        {!! Form::submit('Favorite', ['class' => "btn btn-primary btn-block"]) !!}
    {!! Form::close() !!}
@endif
