@extends('layouts.master')
@section('title')
    <h2>Home</h2>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Home</div>
                    <div class="panel-body">
                        <article>
                            Welcome to the ethics management software
                            @if(Auth::check())
                                @if(!is_null($proposals))
                                <p>Continue with your current proposal: <a href="/proposals/{{$proposals->id}}">{{$proposals->title}}</a></p>
                                @elseif(is_null($proposals))
                                <p>I can see you have not currently uploaded a proposal: <a href="/upload">Upload a proposal</a></p>
                                @endif
                            @elseif(!Auth::check())
                                <p>I can see you are not currently logged in, you should <a href="/register/student">Register</a> or if you have an account then why don't you <a href="/login">login</a></p>
                            @endif
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box-container">
        <footer>
            <p>&copy; Rob Jones 2018</p>
        </footer>
    </div>
@endsection