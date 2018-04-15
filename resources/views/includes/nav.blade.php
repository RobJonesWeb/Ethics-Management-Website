<div>
    <ul>
        <li><a href="/">Home</a></li>
        @if(Auth::check())
            @if (auth()->user()->role_id == 1)
                <li><a href="/upload">Upload</a></li>
                <li><a href="/proposals/live">My Proposal</a></li>
                <li><a href="/logout">Logout</a></li>
            @elseif (auth()->user()->role_id == 2)
                <li><a href="/proposals/live">Proposals</a></li>
                <li><a href="/register/supervisor">Register Staff Member</a></li>
                <li><a href="/logout">Logout</a></li>
            @endif
        @else
            <li><a href="/register/student">Register</a></li>
            <li><a href="/login">Login</a></li>
        @endif
    </ul>
</div>
