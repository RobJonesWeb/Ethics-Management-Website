@extends('layouts.master')
@section('title')
    <h2>Proposals</h2>
@endsection
@section('content')
    <div class="box-container">
        <article>
            @foreach($users as $user)
                @if(Auth::user()->role_id == "2")
                    @foreach($proposals as $proposal)
                        @if($user->id == $proposal->author_id)
                            @if($proposal->status_id == 5)
                                <div class="proposal">
                                    <h4>{{$proposal->title}}</h4>
                                    <p>Status: Archived</p>
                                    <p>Student Number: {{$user->student_no}}</p>
                                    <p>Created on: {{$proposal->created_at}}</p>
                                    <p>Last Modified: {{$proposal->updated_at}}</p>
                                    <a href="{{asset($proposal->file_address)}}">View Proposal</a><br/>
                                    @if(!is_null($proposal->feedback))
                                    <a href="{{asset($proposal->feedback)}}">View Feedback</a>
                                    @endif
                                </div>
                            @endif
                        @endif
                    @endforeach
                @endif
            @endforeach
            <div class="proposal">
                    <p>End of proposals, view <a href="/proposals/live">live proposals</a></p>
                </div>
        </article>
    </div>
@endsection