<?php

namespace App\Http\Controllers;
use App\Job;
use App\JobCV;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use App\Mail\DropCVMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class JobCVController extends Controller
{
    public function getJobData($id){
        $product = Job::find($id);
        return response()->json($product);
    }

    public function cvSubmitForJob(Request $request){

        if($request->hasFile('cover_letter')){
            $cover_letter = $request->file('cover_letter');
            $extension = $cover_letter->getClientOriginalExtension();
            if($extension != "pdf"){
                return redirect('/')->with('msg2', 'Your Cover Letter is not in pdf format. Please Submit Cover letter with .pdf extension');
            }
        }

        if($request->hasFile('cv')){
            $cover_letter = $request->file('cv');
            $extension = $cover_letter->getClientOriginalExtension();
            if($extension != "pdf"){
                return redirect('/')->with('msg2', 'Your CV is not in pdf format. Please Submit CV with .pdf extension');
            }
        }

        $last_insert_id = JobCV::insertGetId([
            'job_id' => $request->job_id,
            'user_id' => $request->user_id,
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'address' => $request->address,
            'created_at' => Carbon::now()
        ]);

        // cover letter upload start
        if($cover_letter = $request->file('cover_letter')){
            $destinationPath = public_path().'/cv_for_job/';
            $profileImage = str::random(10) . "-" . time() . "." . $cover_letter->getClientOriginalExtension();
            $cover_letter->move($destinationPath, $profileImage);
            JobCV::where('id',$last_insert_id)->update([
                'cover_letter' => 'cv_for_job/'.$profileImage,
            ]);
        }
        // cover letter upload end

        // cover letter upload start
        if($cv = $request->file('cv')){
            $destinationPath2 = public_path().'/cv_for_job/';
            $profileImage2 = str::random(10) . "-" . time() . "." . $cv->getClientOriginalExtension();
            $cv->move($destinationPath2, $profileImage2);
            JobCV::where('id',$last_insert_id)->update([
                'cv' => 'cv_for_job/'.$profileImage2,
            ]);
        }
        // cover letter upload end

        $data = array();
        $data = Job::where('id',$request->job_id)->first();
        $data['applicant_name'] = $request->name;
        Mail::to($data->company_email)->send(new DropCVMail($data));

        return redirect('/')->with('msg', 'Your application for the Job has been submiited. Thank You.');
    }
}
