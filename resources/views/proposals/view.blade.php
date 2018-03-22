<?php
$studentview = false;
?>
        <!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ethics Management Software</title>

    <link type="text/css" rel="stylesheet" href="{{ asset('css/app.min.css')}}">
</head>
<body>
<div class="box-container">
    @include('includes.nav)
</div>
<div class="box-container">
    <article>
        @foreach($users as $user)
            @if($user->role_id == "1")
                @foreach($proposals as $proposal)
                    @if($proposal->author_id == $user->id)
                        echo 'something';
                    @endif
                @endforeach
            @elseif($user->role_id == "2")
                @foreach($proposals as $proposal)
                    echo 'something';

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
</div>
<!--<div class="box-container">
    <footer>
        Footer Content
    </footer>
</div>-->
</body>
</html>
