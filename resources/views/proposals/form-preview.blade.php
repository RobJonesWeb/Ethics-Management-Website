@extends('layouts.master')
@section('title')
    <h2>Preview my proposal</h2>
@endsection
@section('content')
    <article>
        <div class="box-container">
            {!! Form::open(array('route'=>'upload.store', 'class'=>'proposal-creation')) !!}
            {!! Form::label('studentno', 'Student Number', ['class'=>'proposal-field'])  !!}
            {!! Form::text('studentno', $proposalpreview->studentno, ['class'=>'proposal-field', 'readonly']) !!}
            <h2>{{$proposalpreview->title}}</h2>
            <p>{{$proposalpreview->sub_title}}</p>
            {!! Form::button('Submit', ['class'=>'submit proposal-field', 'name'=>'action', 'value'=>'submit-create', 'type'=>'submit']) !!}
            {{ Form::close() }}
        </div>
    </article>
@endsection