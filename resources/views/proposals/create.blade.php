@extends('layouts.master')
@section('title')
    @if(Auth::user()->role_id == 1)
    <h2>Create a new proposal</h2>
    @elseif(Auth::user()->role_id == 2)
    <h2>Upload Feedback</h2>
    @endif
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <article>
                        @if(Auth::user()->role_id == 1)
                        <div class="tab panel-heading">
                            <button class="tab-link" onclick="changeForm(event, 'create')"><s>Create from form</s></button>
                            <button class="tab-link" onclick="changeForm(event, 'upload')">Upload PDF</button><br/><br/>
                        </div>
                        @endif
                        <div class="panel-body">
                            @if(Auth::user()->role_id == 1)
                            <div id="create" class="tab-child">
                                <h3>Create proposal from form</h3>
                                <p>Removed feature due to lack of time</p>
    {{--                        {!! Form::open(array('route'=>'upload.store', 'class'=>'proposal-creation', 'files' => false)) !!}
                                {!! Form::label('studentno', 'Student Number', ['class'=>'proposal-field'])  !!}
                                {!! Form::text('studentno', $student_details->student_no, ['class'=>'proposal-field', 'readonly']) !!}
                                {!! Form::label('title', 'Proposal Title', ['class'=>'proposal-field'])  !!}
                                {!! Form::text('title', '', ['class'=>'proposal-field']) !!}
                                {!! Form::label('sub_title', 'Proposal Sub-title', ['class'=>'proposal-field'])  !!}
                                {!! Form::text('sub_title', '', ['class'=>'proposal-field']) !!}
                                {!! Form::button('Save as draft', ['class'=>'submit proposal-field', 'name'=>'action', 'value'=>'draft-preview', 'type'=>'submit']) !!}
                                {!! Form::button('Submit', ['class'=>'submit proposal-field', 'name'=>'action', 'value'=>'submit-preview', 'type'=>'submit']) !!}
                                {{ Form::close() }}--}}
                            </div>

                            <div id="upload" class="tab-child">
                                <h3>Upload proposal (PDF)</h3>
                                {!! Form::open(array('route'=>'upload.store', 'class'=>'proposal-creation', 'files' => true)) !!}
                                @if ($errors->any())
                                    <p style="color:#F00;">Please ensure all inputs are filled out and the file format for upload is .pdf</p><br/>
                                @endif
                                {!! Form::label('title', 'Proposal Title', ['class'=>'proposal-field'])  !!}
                                {!! Form::text('title', '', ['class'=>'proposal-field']) !!}
                                {!! Form::label('studentno', 'Student Number', ['class'=>'proposal-field'])  !!}
                                {!! Form::text('studentno', $student_details->student_no, ['class'=>'proposal-field', 'readonly']) !!}
                                {!! Form::label('proposal', 'Upload Proposal (.pdf)', ['class'=>'proposal-field'])  !!}
                                {{ Form::file('proposal', ['class' => 'proposal-field']) }}
                                {!! Form::button('Submit', ['class'=>'submit proposal-field', 'name'=>'action', 'value'=>'submit-upload', 'type'=>'submit']) !!}
                                {{ Form::close() }}
                            </div>
                            @elseif(Auth::user()->role_id == 2)
                                {!! Form::open(array('route'=>'upload.store', 'class'=>'proposal-creation', 'files' => true)) !!}
                                {!! Form::hidden('proposalID', $proposal->id) !!}
                                {!! Form::label('feedback', 'Upload Feedback (.pdf)', ['class'=>'proposal-field'])  !!}
                                {!! Form::file('feedback', ['class' => 'proposal-field']) !!}
                                {!! Form::label('passed', 'Proposal Passed?', ['class'=>'proposal-field']) !!}
                                Yes    {!! Form::radio('passed', 'yes', 'false', ['class' => 'proposal-field']) !!}
                                No    {!! Form::radio('passed', 'no', 'false', ['class' => 'proposal-field']) !!}
                                {!! Form::button('Submit feedback', ['class'=>'submit proposal-field', 'name'=>'action', 'value'=>'submit-feedback', 'type'=>'submit']) !!}
                                {!! Form::close() !!}
                            @endif
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function changeForm(evt, formType) {
        var i;
        var tabchild;
        var tablink;

        tabchild = document.getElementsByClassName("tab-child");
        for (i = 0; i < tabchild.length; i++) {
            tabchild[i].style.display = "none";
        }

        tablink = document.getElementsByClassName("tab-link");
        for (i = 0; i < tablink.length; i++) {
            tablink[i].className = tablink[i].className.replace(" active", "");
        }

        document.getElementById(formType).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>
