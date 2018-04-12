<?php

namespace App\Http\Controllers;

use App\Proposals;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Auth;

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

        //$student_details = 22984348;
        $student_details = User::where('student_no', Auth::user()->student_no)->first();
        $supervisors = User::where('role_id', 2)->get();

        return \View::make('proposals.create', array('student_details' => $student_details, 'supervisors' => $supervisors));

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

        //set status level
        $submit = $request->input('action', null);
        //set file naming convention
        $filename = date('d-m-y-H:i:s-').$request->title.'.pdf';
        //set file path for database
        $filepath = 'proposals/'.$request->studentno.'/'.$filename;
        //set student's ID value for author_ID
        $studentID = User::where('student_no', $request->studentno)->pluck('id')->first();
        //set the students role ID number
        $studentRole = User::where('student_no', $request->studentno)->pluck('role_id')->first();

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
            if (!file_exists('storage/app/public/proposals'.$request->studentno)) {
                \Storage::makeDirectory('/public/proposals/' . $request->studentno);
                if (!is_null($request->File('proposal'))) {

                    $this->validate($request, [
                        'title' =>'required',
                        'studentno'=>'required|min:8|max:8',
                        'proposal' => 'required|max:100000|mimes:pdf'
                    ]);

                    $path = $request->file('proposal')->storeAs(
                        'public/proposals/'.$request->studentno, $filename
                    );
        }

        $proposals = Proposals::create([
            'author_id' => $studentID,
            'title' => $request->title,
            'file_address' => $filepath,
            'user_level' => $studentRole,
            'status_id' => $status,
            'supervisor_id' => $request->supervisor_id,
        ]);
                if(!empty($proposals)) {
                    $proposals->save();
                }

                echo 'File successfully uploaded, view uploaded file here: <a href="'.Storage::url($filepath).'">'.$request->title.'<//a>';            }

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
