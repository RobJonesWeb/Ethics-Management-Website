@extends('layouts.master')
@section('title')
    <h2>Proposals</h2>
@endsection
@section('content')
<div class="box-container">
    <article>
        @foreach($users as $user)
            @if($user->role_id == "1")
                @foreach($proposals as $proposal)
                    <div class="proposal">
                        <a href="/proposals/{{$proposal->id}}">{{$proposal->title}}</a>
                    </div>
                @endforeach
            @elseif($user->role_id == "2")
                @foreach($proposals as $proposal)
                    supervisor
                @endforeach
            @endif
        @endforeach
{{--        @foreach($users as $user)
            @if ($user->role_id == "1")
                @foreach ($proposals as $proposal)
                    @if ($proposal->author_id == $user->id)
                        echo '<a href="/.{{$proposal->id}}" class="proposal-container">;
                            @endif
                            @endforeach
                            @elseif($user->role_id == "2")
                                @foreach($proposals as $proposal)
                echo '<a href="/.{{$proposal->id}}" class="proposal-container">;
            @endforeach
                    @endif
                @endforeach--}}
    </article>
@endsection