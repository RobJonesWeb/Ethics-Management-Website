@extends('layouts.master')
@section('title')
    <h2>Create a new proposal</h2>
@endsection
@section('content')
    <article>
        <div class="box-container">
            <div class="tab">
                <button class="tab-link" onclick="changeForm(event, 'create')">Create from form</button>
                <button class="tab-link" onclick="changeForm(event, 'upload')">Upload PDF</button><br/><br/>
            </div>

            <div id="create" class="tab-child">
                <h3>Create proposal from form</h3>
                <!-- Create Form -->
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
                {!! Form::text('studentno', $student_details, ['class'=>'proposal-field', 'readonly']) !!}
                {!! Form::label('proposal', 'Upload Proposal (.pdf)', ['class'=>'proposal-field'])  !!}
                {{ Form::file('proposal', ['class' => 'proposal-field']) }}
                {!! Form::button('Save as draft', ['class'=>'submit proposal-field', 'name'=>'action', 'value'=>'draft-upload', 'type'=>'submit']) !!}
                {!! Form::button('Submit', ['class'=>'submit proposal-field', 'name'=>'action', 'value'=>'submit-upload', 'type'=>'submit']) !!}
                {{ Form::close() }}
            </div>
        </div>
    </article>
<!--<div class="box-container">
    <footer>
        Footer Content
    </footer>
</div>-->
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
