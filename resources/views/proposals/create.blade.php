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
    <header>
        <h2>Create a new proposal</h2>
        <!--<div>
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
        </div>-->
    </header>
</div>
<div class="box-container">
    <article>
        {!! Form::open(array('route'=>'upload.store', 'class'=>'proposal-creation', 'files' => true)) !!}
        @if ($errors->any())
            <p style="color:#F00;">Please ensure all inputs are filled out and the file format for upload is .pdf</p><br/>
        @endif
        {!! Form::label('title', 'Proposal Title', ['class'=>'proposal-field'])  !!}
        {!! Form::text('title', '', ['class'=>'proposal-field']) !!}
        {!! Form::label('studentno', 'Student Number', ['class'=>'proposal-field'])  !!}
        {!! Form::text('studentno', $student_details, ['class'=>'proposal-field', 'readonly']) !!}
        {!! Form::label('proposal', 'Upload Proposal (.pdf)', ['class'=>'proposal-field'])  !!}
        {{ Form::file('proposal', ['class' => 'proposal-field']) }}
        {!! Form::button('Save as draft', ['class'=>'submit proposal-field', 'name'=>'action', 'value'=>'draft', 'type'=>'submit']) !!}
        {!! Form::button('Submit', ['class'=>'submit proposal-field', 'name'=>'action', 'value'=>'submit', 'type'=>'submit']) !!}
        {{ Form::close() }}
    </article>
</div>
<!--<div class="box-container">
    <footer>
        Footer Content
    </footer>
</div>-->
</body>
</html>
