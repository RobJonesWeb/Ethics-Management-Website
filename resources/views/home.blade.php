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
                            @if($newregistration == true)
                                <p class="red">Registration successful, you can now log in</p>
                            @elseif($reviewed == 0)
                                <p class="red">You currently have a proposal waiting for review, please wait until it has been reviewed before submitting a new one. Check the status of the review <a href="/proposals/live">here</a></p>
                            @endif
                            @if(Auth::check() == true)
                                    <p>Welcome {{Auth::user()->name}} to the ethics management software</p>
                                    @if(Auth::user()->role_id == 1)
                                        @if(!is_null($proposals))
                                            <a href="/proposals/live">View your current proposals</a>
                                        @elseif(is_null($proposals))
                                            <p>I can see you have not currently uploaded a proposal: <a href="/upload">Upload a proposal</a></p>
                                        @endif
                                    @elseif(Auth::user()->role_id == 2)
                                            <a href="/proposals/live">View all proposals you manage</a>
                                    @endif
                                @elseif(Auth::check() == false)
                                    <p>Welcome to the ethics management software</p>
                                    <p>I can see you are not currently logged in, you should <a href="/register/student">Register</a> or if you have an account then why don't you <a href="/login">login</a></p>
                                @endif
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection