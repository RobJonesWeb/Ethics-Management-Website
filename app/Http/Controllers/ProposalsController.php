<?php

namespace App\Http\Controllers;

use App\Proposals;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Storage;

class ProposalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {

        $users = User::where('id', Auth::user()->id)->get();
        $filteredstudents = [];

        if (Auth::user()->role_id == 1) {
            $proposals = Proposals::where('author_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
            $users = User::where('id', Auth::user()->id)->get();
        } elseif (Auth::user()->role_id == 2){
            $users = User::where('supervisor_id', Auth::user()->id)->get();
            $proposals = Proposals::all();
        }

        if ($type == 'live') {
            return view('proposals.list', array('users' => $users, 'proposals' => $proposals));
        } elseif ($type == 'archive') {
            return view('proposals.archive', array('users' => $users, 'proposals' => $proposals));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proposals = Proposals::create(
            $request->all()
        );
        $proposals->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proposal = Proposals::findOrFail($id);
        $users = User::all();
        return view('proposals.view', array('proposal' => $proposal, 'users' => $users));

    }

    public function downloadProposal($id) {
        $proposal = Proposals::findOrFail($id);

        $path = $proposal->file_address;

        return response()->download($path);

    }

    public function downloadFeedback($id) {
        $proposal = Proposals::findOrFail($id);

        $path = $proposal->feedback;

        return response()->download($path);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
