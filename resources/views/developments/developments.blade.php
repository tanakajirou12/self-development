<ul class="list-unstyled">
    @foreach ($developments as $development)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($development->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $development->user->name, ['id' => $development->user->id]) !!} <span class="text-muted">posted at {{ $development->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">{!! nl2br(e($development->content)) !!}</p>
                </div>
                <div>
                    @if (Auth::id() == $development->user_id)
                        {!! Form::open(['route' => ['developments.destroy', $development->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $developments->links('pagination::bootstrap-4') }}