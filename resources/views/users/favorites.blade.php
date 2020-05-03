@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            @include('users.card', ['user' => $user])
        </aside>
        <div class="col-sm-8">
            @include('users.navtabs', ['user' => $user])
            @if (count($developments) > 0)
                @include('developments.developments', ['developments' => $developments])
            @endif
        </div>
    </div>
    
@endsection