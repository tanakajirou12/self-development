<ul class="list-unstyled">
    @foreach ($developments as $development)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($development->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $development->user->name, ['id' => $development->user->id]) !!} <span class="text-muted">posted at {{ $development->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0">本のタイトル：{!! nl2br(e($development->title)) !!}</p>
                    <p class="mb-0">この本の役にたった内容：{!! nl2br(e($development->content1)) !!}</p>
                    <p class="mb-0">具体的にどう役立てたか：{!! nl2br(e($development->content2)) !!}</p>
                </div>
                <div>
                    @if (Auth::id() == $development->user_id)
                        {!! Form::open(['route' => ['developments.destroy', $development->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                    @include('favorites.favorites_button', ['development' => $development])
                </div>
                <div>
                    {{-- 
                    <td>{!! link_to_route('developments.show', $development->id, ['id' => $development->id]) !!}</td>
                    <td>{{ $development->content }}</td> 
                    --}}
                    @if (Auth::id() == $development->user_id)
                        {!! link_to_route('developments.edit', 'このメッセージを編集', ['id' => $development->id], ['class' => 'btn btn-light']) !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $developments->links('pagination::bootstrap-4') }}