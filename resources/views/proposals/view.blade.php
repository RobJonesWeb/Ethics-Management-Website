@extends('layouts.master')
@section('title')
    <h2>Proposal Name: {{$proposal->title}}</h2>
@endsection
@section('content')
        @if($proposal->author_id == Auth::user()->id)
    <article>
        <div class="proposal text-center">
            <a href="{{asset($proposal->file_address)}}" target="_blank">Open Proposal</a>
        </div>
        <div class="proposal text-center">
            <a href="/download/proposal/{{$proposal->id}}" target="_blank">Download Proposal</a>
        </div>
            @if(!is_null($proposal->feedback))
            <div class="proposal text-center">
                <a href="/download/feedback/{{$proposal->id}}" target="_blank">Download Feedback</a>
            </div>
            @endif
        @elseif(Auth::user()->role_id == 2 && $proposal->status_id == 2)
            <div class="proposal text-center">
                <a href="{{asset($proposal->file_address)}}" target="_blank">Open Proposal</a>
            </div>
            <div class="proposal text-center">
                <a href="/download/proposal/{{$proposal->id}}" target="_blank">Download Proposal</a>
            </div>
        <div class="proposal text-center">
            <a href="/feedback/{{$proposal->id}}">Upload Feedback</a>
        </div>
    </article>
        @endif
@endsection