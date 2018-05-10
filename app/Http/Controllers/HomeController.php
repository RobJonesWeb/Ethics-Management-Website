<?php

namespace App\Http\Controllers;

use App\Proposals;
use App\User;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()) {
            $userinfo = Auth::user();
            $proposals = Proposals::where('author_id', Auth::user()->id)->first();
            return view('home', array('proposals' => $proposals));
        }

        return view('home');

    }
}
