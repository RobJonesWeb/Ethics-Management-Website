@extends('layouts.master')
@section('title')
    <h2>Proposals</h2>
@endsection
@section('content')
<div class="box-container">
    <article>
            @if(Auth::user()->role_id == "1")
                @foreach($proposals as $proposal)
                    @if($proposal->status_id == 1)
                        <div class="proposal">
                            <a href="/proposal/{{$proposal->id}}">{{$proposal->title}}</a>
                            <p>Status: Draft</p>
                            <p>Date Created: {{$proposal->created_at}}</p>
                        </div>
                    @elseif($proposal->status_id == 2)
                        <div class="proposal">
                            <a href="/proposal/{{$proposal->id}}">{{$proposal->title}}</a>
                            <p>Status: Submitted</p>
                            <p>Date Created: {{$proposal->created_at}}</p>
                        </div>
                    @elseif($proposal->status_id == 3)
                        <div class="proposal">
                            <a href="/proposal/{{$proposal->id}}">{{$proposal->title}}</a>
                            <p>Status: Reviewed - Needs Modification</p>
                            <p>Date Created: {{$proposal->created_at}}</p>
                        </div>
                    @elseif($proposal->status_id == 4)
                        <div class="proposal">
                            <a href="/proposal/{{$proposal->id}}">{{$proposal->title}}</a>
                            <p>Status: Reviewed - Accepted</p>
                            <p>Date Created: {{$proposal->created_at}}</p>
                        </div>
                    @elseif($proposal->status_id == 5)
                        <div class="proposal">
                        <p>The proposal {{$proposal->title}}, created on {{$proposal->created_at}} has been archived.</p>
                        </div>
                    @endif
                @endforeach
            @elseif(Auth::user()->role_id == "2")
                <div class="proposal">
                    <p>All retrieved proposals that are live will be displayed below, view <a href="/proposals/archive">archived proposal</a></p>
                </div>
                @foreach($proposals as $proposal)
                    @foreach($users as $user)
                        @if($user->id == $proposal->author_id)
                            @if($user->supervisor_id == Auth::user()->id)
                                @if($proposal->status_id == 2)
                                    <div class="proposal">
                                        <p>{{$proposal->title}}</p>
                                        <p>Status: Submitted</p>
                                        <p>Author: {{$user->name .' ('.$user->student_no.')'}}</p>
                                        <p>Date: {{$proposal->created_at}}</p>
                                        <a href="/proposal/{{$proposal->id}}">View</a>
                                    </div>
                                @elseif($proposal->status_id == 4)
                                    <div class="proposal">
                                        <p>{{$proposal->title}}</p>
                                        <p>Status: Reviewed - Accepted</p>
                                        <p>Author: {{$user->name .' ('.$user->student_no.')'}}</p>
                                        <p>Date: {{$proposal->created_at}}</p>
                                        <a href="/proposal/{{$proposal->id}}">View</a>
                                        {!! Form::open(array('route'=>'upload.store', 'class'=>'proposal-creation')) !!}
                                        {!! Form::hidden('proposalID', $proposal->id) !!}
                                        {!! Form::button('Archive', ['class'=>'submit proposal-field', 'name'=>'action', 'value'=>'archive', 'type'=>'submit']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                @endif
                            @endif
                        @endif
                    @endforeach
                @endforeach
            @endif
    </article>
</div>
@endsection