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
        <header>
            <div class="item mobile">
                <div class="burger-layer"></div>
                <div class="burger-layer"></div>
                <div class="burger-layer"></div>
            </div>
            <div class="item mobile">
            <h2>Proposals</h2>
            </div>
            <div class="item screen">
                <ul>
                    <li><a href="">Home</a></li>
                    <?php
                    /*if ($studentview == True) {
                        echo '<li><a href="">My Proposal</a></li>';
                        echo '<li><a href="">Proposal Versions</a></li>';
                    } else {
                        echo '<li><a href="">Proposals</a></li>';
                      }*/
                    echo 'You are on the home page';
                      ?>
                </ul>
            </div>
        </header>
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
