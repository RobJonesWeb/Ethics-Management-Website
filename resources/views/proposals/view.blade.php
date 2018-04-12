@extends('layouts.master')
@section('title')
    <h2>{{$proposal->title}}</h2>
@endsection
@section('content')
    <div class="box-container">
        <article>
            <a href="{{asset($proposal->file_address)}}">open</a>
        </article>
    </div>
@endsection