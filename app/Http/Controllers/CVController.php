<?php

namespace App\Http\Controllers;
use App\CV;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Image;
use PDF;
use App\JobCV;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\CVPayment;
use App\Mail\SendGeneratedCV;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class CVController extends Controller
{
    public function CVmakePage(){
        return view('frontend.cvForm');
    }

    public function addNewCV(Request $request){

        if ($request->hasFile('image')){

            $get_image = $request->file('image');
            $image_name = time() . str::random(5) . '.' . $get_image->getClientOriginalExtension();
            Image::make($get_image)->save('cv_images/' . $image_name, 100);

            $cv_id = CV::insertGetId([
                'image'          => 'cv_images/' . $image_name,
                'name'           => $request->name,
                'profession'     => $request->profession,
                'contact'        => $request->contact,
                'email'          => $request->email,
                'facebook_link'  => $request->facebook_link,
                'linkedin_link'  => $request->linkedin_link,
                'position'       => $request->position,
                'experiance'     => $request->experiance,
                'project'        => $request->project,
                'training'       => $request->training,
                'education'      => $request->education,
                'reference'      => $request->reference,
                'active'         => 0,
                'created_at'     => Carbon::now(),
            ]);

            session(['cv_id' => $cv_id]);
            session(['total_cost' => $request->total_cost]);
            session(['level' => $request->level]);

            $cv_details = CV::where('id',$cv_id)->first();

            return view('frontend.cv_preview',compact('cv_details'));
        }
        else{
            $cv_id = CV::insertGetId([
                'name'           => $request->name,
                'profession'     => $request->profession,
                'contact'        => $request->contact,
                'email'          => $request->email,
                'facebook_link'  => $request->facebook_link,
                'linkedin_link'  => $request->linkedin_link,
                'position'       => $request->position,
                'experiance'     => $request->experiance,
                'project'        => $request->project,
                'training'       => $request->training,
                'education'      => $request->education,
                'reference'      => $request->reference,
                'active'         => 0,
                'created_at'     => Carbon::now(),
            ]);

            session(['cv_id' => $cv_id]);
            session(['total_cost' => $request->total_cost]);
            session(['level' => $request->level]);

            $cv_details = CV::where('id',$cv_id)->first();

            return view('frontend.cv_preview',compact('cv_details'));
        }
    }

    public function addCVPayment(Request $request){
        $cv_id = session('cv_id');
        $level = session('level');

        if($level == "pro"){
            CV::where('id',$cv_id)->update([
                'payment_type' => $request->payment_type,
                'transaction_id' => $request->transaction_id,
                'total_cost'   => 500,
                'updated_at'   => Carbon::now(),
            ]);

            $email = $request->email;
            $data = CV::where('id',$cv_id)->first();
            Mail::to($email)->send(new CVPayment($data));

            session()->forget('cv_id');
            session()->forget('level');
            session()->forget('total_cost');

            return redirect('/')->with('msg', 'Congratulation, Your Payment is Successfull. Your CV Information has been submitted for review');
        }
        else{
            CV::where('id',$cv_id)->update([
                'payment_type' => $request->payment_type,
                'transaction_id' => $request->transaction_id,
                'total_cost'   => 200,
                'updated_at'   => Carbon::now(),
            ]);

            // auto generate the cv
            $cv_name = time().str::random(10);
            $info = CV::where('id',$cv_id)->first();
            PDF::loadView('frontend.cv_format', compact('info'))->save('online_generated_cv/'.$cv_name.'.pdf');

            // send the cv link to email
            $email = $request->email;
            $data = $cv_name;
            Mail::to($email)->send(new SendGeneratedCV($data));

            session()->forget('cv_id');
            session()->forget('level');
            session()->forget('total_cost');

            return redirect('/')->with('msg', 'Congratulation, Your Payment is Successfull. Your CV has been send to your email');
        }


    }

    public function CVBackendPage(){
        $cv_lists = CV::paginate(15);
        return view('backend.cv_list',compact('cv_lists'));
    }

    public function deliveredCV($id){
        CV::where('id',$id)->update([
            'active' => 1,
        ]);

        Toastr::success('This CV has Successfully Delivered', 'Success');
        return redirect()->back();
    }

    public function deleteCV($id){
        $data = CV::where('id',$id)->first();
        if($data->image != null){
            unlink($data->image);
        }
        CV::where('id',$id)->delete();
        Toastr::error('CV has Successfully Deleted', 'Deleted');
        return redirect()->back();
    }

    public function detailViewCV($id){
        $cv_details = CV::where('id',$id)->first();
        return view('backend.cvDetails',compact('cv_details'));
    }

    public function viewCVForJobs(){
        $cv_jobs = JobCV::where('user_id',Auth::user()->id)->paginate(15);
        return view('backend.cv_for_jobs',compact('cv_jobs'));
    }

    public function deleteCVForJob($id){
        $info = JobCV::where('id',$id)->first();
        if($info->cover_letter != null){
            unlink($info->cover_letter);
        }
        if($info->cv != null){
            unlink($info->cv);
        }
        JobCV::where('id',$id)->delete();
        Toastr::error('Application has Successfully Deleted', 'Deleted');
        return redirect()->back();
    }
}
