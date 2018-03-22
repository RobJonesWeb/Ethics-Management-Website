<?php
$studentview = false;
?>
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

	<link type="text/css" rel="stylesheet" href="{{ asset('css/app.min.css')}}">
    </head>
    <body>
    <div class="box-container">
        {{--<div class="box-container">
            @include('includes.nav)
        </div>--}}
    </div>
    <div class="box-container">
        <article>
            {!! Form::open(array('route'=>'upload.store', 'class'=>'proposal-creation')) !!}
            {!! Form::label('text', 'proposal-creation', ['class'=>'proposal-creation'])  !!}
            {!! Form::text('text', '', ['class'=>'proposal-creation', 'placeholder'=>'Proposal Title']) !!}
            {{ Form::file('proposal', ['class' => 'proposal-creation']) }}
            {!! Form::button('Save as draft', ['class'=>'submit proposal-creation', 'name'=>'action', 'value'=>'draft', 'type'=>'submit']) !!}
            {!! Form::button('Submit', ['class'=>'submit proposal-creation', 'name'=>'action', 'value'=>'finish', 'type'=>'submit']) !!}
            {{ Form::close() }}
        </article>
    </div>
    <div class="box-container">
        <footer>
            Footer Content
        </footer>
    </div>
    </body>
</html>
