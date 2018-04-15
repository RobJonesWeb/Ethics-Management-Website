<?php

namespace App\Http\Controllers;

use App\Proposals;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Auth;
use DB;

class UploadController extends Controller
{

    /*    public function __construct()
        {
            $this->middleware('auth');
        }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $student_details = User::where('student_no', Auth::user()->student_no)->first();
        $supervisors = User::where('role_id', 2)->get();
        $proposals = Proposals::where('author_id', $student_details->id)->orderBy('created_at', 'desc')->first();

        if($proposals != null) {
            if ($proposals->status_id == 2) {
                return view('home', array('student_details' => $student_details, 'supervisors' => $supervisors, 'reviewed' => 0, 'newregistration' => 0, 'proposals' => $proposals));
            }
        } else {
            return view('proposals.create', array('student_details' => $student_details, 'supervisors' => $supervisors));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //set status level
        $submit = $request->input('action', null);

        //submit status level 5
        if ($submit == 'archive') {
            $status = 5;
            $proposal = Proposals::findOrFail($request->proposalID);

            DB::table('proposals')
                ->where('id', $proposal->id)
                ->update([
                    'status_id' => $status
                ]);
            $users = User::where('id', Auth::user()->id)->get();

            if (Auth::user()->role_id == 1)
                $proposals = Proposals::where('author_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
            elseif (Auth::user()->role_id == 2)
                $proposals = Proposals::all();

            return view('home', array('users' => $users, 'proposals' => $proposals, 'newregistration' => false));

        }
        if ($submit == 'submit-feedback' && !is_null($request->file('feedback'))) {

            $proposal = Proposals::findOrFail($request->proposalID);
            $studentdetails = User::where('id', $proposal->author_id)->first();
            if (!file_exists('storage/app/public/feedback/' . $studentdetails->student_no)) {
                \Storage::makeDirectory('feedback/' . $studentdetails->student_no);
            }
            $filepath = 'storage/feedback/' . $studentdetails->student_no . '/feedback.pdf';
            if (!is_null($request->file))
                $path = $request->file('feedback')->storeAs(
                    'public/feedback/' . $studentdetails->student_no, 'feedback.pdf'
                );

            if ($request->passed == 'no') {
                $status = 3;
            } elseif ($request->passed == 'yes') {
                $status = 4;
            }

            DB::table('proposals')
                ->where('id', $proposal->id)
                ->update([
                    'feedback' => $filepath,
                    'status_id' => $status
                ]);

            $users = User::where('id', Auth::user()->id)->get();
            $proposals = Proposals::all();

            return view('home', array('users' => $users, 'proposals' => $proposals, 'newregistration' => false));

        } elseif ($submit == 'submit-feedback' && is_null($request->file('feedback'))) {

            if ($request->passed == 'no') {
                $status = 3;
            } elseif ($request->passed == 'yes') {
                $status = 4;
            }

            DB::table('proposals')
                ->where('id', $request->proposalID)
                ->update([
                    'status_id' => $status
                ]);

            $users = User::where('id', Auth::user()->id)->get();
            $proposals = Proposals::all();

            return view('home', array('users' => $users, 'proposals' => $proposals, 'newregistration' => false));
        }

        //set file naming convention
        $filename = $request->studentno . "-" . $request->title . "-" . date('dmy-H:i:s') . '.pdf';
        //set file path for database
        $filepath = 'storage/proposals/' . $request->studentno . '/' . $filename;
        //set student's ID value for author_ID
        $studentID = User::where('student_no', $request->studentno)->pluck('id')->first();
        //set the students role ID number
        $studentRole = User::where('student_no', $request->studentno)->pluck('role_id')->first();
        //get the version number
        $version = Proposals::where('author_id', Auth::user()->id)->first();


        //set the status level
        if (($submit === 'draft-upload') || ($submit === 'draft-create')) {
            $status = 01;
        } else if (($submit === 'submit-upload') || ($submit === 'submit-create')) {
            $status = 02;
        } else if (($submit === 'submit-preview')) {
            return view('proposals.form-preview', array('proposalpreview' => $request));
        }

        if (($submit === 'draft-create') || ($submit === 'submit-create')) {
            $pdf = PDF::loadview('proposals.create', $request);
            $newpdf = $pdf->download($filename);

            if (!file_exists('storage/app/proposals' . $request->studentno)) {
                \Storage::makeDirectory('proposals/' . $request->studentno);
                if (!is_null($request->File('proposal'))) {

                    $this->validate($request, [
                        'studentno' => 'required|min:8|max:8',
                        'title' => 'required',
                        'sub-title' => 'required',
                    ]);

                    $path = $newpdf->storeAs(
                        'proposals/' . $request->studentno, $filename
                    );
                }
            }
            #Dont touch this code - It works
        } elseif (($submit === 'draft-upload') || ($submit === 'submit-upload')) {
            if (!file_exists('storage/app/public/proposals' . $request->studentno)) {
                \Storage::makeDirectory('/public/proposals/' . $request->studentno);
                if (!is_null($request->File('proposal'))) {

                    $this->validate($request, [
                        'title' => 'required',
                        'studentno' => 'required|min:8|max:8',
                        'proposal' => 'required|max:100000|mimes:pdf'
                    ]);

                    $path = $request->file('proposal')->storeAs(
                        'public/proposals/' . $request->studentno, $filename
                    );
                }

                $proposals = Proposals::create([
                    'author_id' => $studentID,
                    'title' => $request->title,
                    'file_address' => $filepath,
                    'user_level' => $studentRole,
                    'status_id' => $status,
                ]);

                if (!empty($proposals)) {
                    $proposals->save();
                }

                echo 'File successfully uploaded, view uploaded file here: <a href="' . asset($proposals->file_address) . '" target="">' . $request->title . '<//a>';
            }

        }
        #Don't touch above code it works
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proposal = Proposals::findOrFail($id);

        return view('proposals.create', array('proposal' => $proposal));

        /*
        if (!is_null($request->file('feedback'))) {
            $this->validate([
                'proposal_id' => 'required',
                'feedback' => 'required',
            ]);


            $proposal = Proposals::findOrFail($id);
            $studentdetails = User::where('id', $proposal->author_id)->first();
            if (!file_exists('storage/app/proposals' . $request->studentno)) {
                \Storage::makeDirectory('proposals/' . $request->studentno);
            }
            $filepath = 'storage/feedback/'.$studentdetails->student_no.'/'.$filename;
            $path = $newpdf->storeAs(
                'feedback/' . $request->studentno, $filename
            );
            $proposal->feedback($filepath);
            $proposal->save();
        }*/
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
