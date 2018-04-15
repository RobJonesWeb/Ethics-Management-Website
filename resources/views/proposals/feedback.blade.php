@extends('layouts.master')
@section('title')
    <h2>Create a new proposal</h2>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <article>
                        <div class="panel-body">
                                {!! Form::open(array('route'=>'upload.edit', 'class'=>'proposal-creation', 'files' => true)) !!}
                                {{ Form::hidden('feedback', $proposalID) }}
                                {!! Form::label('proposal', 'Upload Proposal (.pdf)', ['class'=>'proposal-field'])  !!}
                                {{ Form::file('proposal', ['class' => 'proposal-field']) }}
                                {!! Form::button('Submit feedback', ['class'=>'submit proposal-field', 'name'=>'action', 'value'=>'submit-feedback', 'type'=>'submit']) !!}
                                {{ Form::close() }}
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
@endsection
