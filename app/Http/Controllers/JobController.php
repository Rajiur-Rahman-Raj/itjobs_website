<?php

namespace App\Http\Controllers;
use App\Job;
use App\JobCategory;
use Image;
use App\User;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Mail\ConfirmationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{

    public function addJobPage(Request $request){
        $categories = JobCategory::all();
        $divisions = DB::table('divisions')->get();
        return view('backend.job.add_job',compact('categories','divisions'));
    }

    public function getCityByCountry($id){

        $cities = DB::table("districts")
                    ->where("division_id",$id)
                    ->get();

        return json_encode($cities);
    }
    public function addNewJob(Request $request){

        if ($request->hasFile('company_logo')){

            $get_image = $request->file('company_logo');
            $image_name = str::random(5) . '.' . $get_image->getClientOriginalExtension();
            Image::make($get_image)->save('company_logos/' . $image_name, 100);

            $logo = $request->logo;
            $normal_background = $request->normal_background;
            $special_background = $request->special_background;
            $week = $request->week;
            $month = $request->month;

            $total_cost = 0+$logo+$normal_background+$special_background+$week+$month;

            $job_id = Job::insertGetId([
                'category_id'    => $request->category_id,
                'country_id'     => $request->country_id,
                'city_id'        => $request->city,
                'job_name'       => $request->job_name,
                'company_name'   => $request->company_name,
                'company_email'  => $request->company_email,
                'salary'         => $request->salary,
                'website_link'   => $request->website_link,
                'details'        => $request->details,
                'response'        => $request->respons,
                'requirements'   => $request->requirements,
                'apply'          => $request->apply,
                'tags'           => $request->tags,
                'deadline'       => $request->deadline,
                'remote'         => $request->remote,
                'company_logo'   => 'company_logos/' . $image_name,
                'logo'           => $request->logo,
                'normal_background'  => $request->normal_background,
                'special_background' => $request->special_background,
                'background_color'   => $request->favcolor,
                'week'           => $request->week,
                'month'          => $request->month,
                'active'         => 0,
                'total_cost'     => $total_cost,
                'created_at'     => Carbon::now(),
            ]);

            session(['job_id' => $job_id]);
            session(['total_cost' => $total_cost]);

            $info = DB::table('jobs')
                        ->join('job_categories','jobs.category_id','=','job_categories.id')
                        ->join('divisions','jobs.country_id','=','divisions.id')
                        ->join('districts','jobs.city_id','=','districts.id')
                        ->select('jobs.*','job_categories.category_name','divisions.name as division_name','districts.name as district_name')
                        ->where('jobs.id',$job_id)
                        ->first();

            // Toastr::success('Job Added Successfully', 'Success');
            // return redirect()->back();
            // return redirect('stripe');

            return view('frontend.job_payment',compact('info'));

        }
        else{
            $logo = $request->logo;
            $normal_background = $request->normal_background;
            $special_background = $request->special_background;
            $week = $request->week;
            $month = $request->month;

            $total_cost =  0+$logo+$normal_background+$special_background+$week+$month;

            $job_id = Job::insertGetId([
                'category_id'    => $request->category_id,
                'country_id'     => $request->country_id,
                'city_id'        => $request->city,
                'job_name'       => $request->job_name,
                'company_name'   => $request->company_name,
                'company_email'  => $request->company_email,
                'salary'         => $request->salary,
                'website_link'   => $request->website_link,
                'details'        => $request->details,
                'response'        => $request->respons,
                'requirements'   => $request->requirements,
                'apply'          => $request->apply,
                'tags'           => $request->tags,
                'deadline'       => $request->deadline,
                'remote'         => $request->remote,
                'logo'           => $request->logo,
                'normal_background'  => $request->normal_background,
                'special_background' => $request->special_background,
                'background_color'   => $request->favcolor,
                'week'           => $request->week,
                'month'          => $request->month,
                'active'         => 0,
                'payment'        => 0,
                'total_cost'     => $total_cost,
                'created_at'     => Carbon::now(),
            ]);

            session(['job_id' => $job_id]);
            session(['total_cost' => $total_cost]);

            $info = DB::table('jobs')
                        ->join('job_categories','jobs.category_id','=','job_categories.id')
                        ->join('divisions','jobs.country_id','=','divisions.id')
                        ->join('districts','jobs.city_id','=','districts.id')
                        ->select('jobs.*','job_categories.category_name','divisions.name as division_name','districts.name as district_name')
                        ->where('jobs.id',$job_id)
                        ->first();

            // Toastr::success('Job Added Successfully', 'Success');
            // return redirect()->back();
            // return redirect('stripe');

            return view('frontend.job_payment',compact('info'));
        }
    }

    public function updateJobPayment(Request $request){
        if(User::where('email',$request->email)->exists()){
            $job_id = session('job_id');
            session()->forget('job_id');

            $user = User::where('email',$request->email)->first();

            Job::where('id',$job_id)->update([
                'user_id' => $user->id,
                'payment' => 1,
                'payment_type' => $request->payment_type,
                'transaction_id' => $request->transaction_id,
                'updated_at' => Carbon::now()
            ]);

            $email = $request->email;
            $data = array();
            $data = Job::where('id',$job_id)->first();
            $data['password'] = null;
            Mail::to($email)->send(new ConfirmationMail($data));

            return redirect('/')->with('msg', 'Your Payment is Successfull please check your email. Job has been submitted for review');

        }
        else{
            $job_id = session('job_id');
            session()->forget('job_id');

            $job_info = Job::where('id',$job_id)->first();

            $password = time().str::random(5);

            $user_id = User::insertGetId([
                'name' => $job_info->company_name,
                'email' => $job_info->company_email,
                'password' =>Hash::make($password),
                'status' => "user",
                'created_at' => Carbon::now(),
            ]);

            Job::where('id',$job_id)->update([
                'user_id' => $user_id,
                'payment' => 1,
                'payment_type' => $request->payment_type,
                'transaction_id' => $request->transaction_id,
                'updated_at' => Carbon::now()
            ]);

            $email = $request->email;
            $data = array();
            $data = Job::where('id',$job_id)->first();
            $data['password'] = $password;
            Mail::to($email)->send(new ConfirmationMail($data));

            return redirect('/')->with('msg', 'Your Payment is Successfull please check your email. Job has been submitted for review');
        }
    }

    public function viewAllJobs(){
        $jobs = DB::table('jobs')
                    ->join('job_categories','jobs.category_id','=','job_categories.id')
                    ->join('divisions','jobs.country_id','=','divisions.id')
                    ->join('districts','jobs.city_id','=','districts.id')
                    ->select('jobs.*','job_categories.category_name','divisions.name as country_name','districts.name as city_name')
                    ->orderBy('id','desc')
                    ->paginate(25);

        return view('backend.job.view_job',compact('jobs'));
    }

    public function activeJob($id){
        Job::where('id',$id)->update([
            'active' => 1,
        ]);
        Toastr::success('Job is Active Now', 'Activated');
        return redirect()->back();
    }

    public function inactiveJob($id){
        Job::where('id',$id)->update([
            'active' => 0,
        ]);
        Toastr::warning('Job is Deactivated Now', 'Deactivated');
        return redirect()->back();
    }

    public function deleteJob($id){
        Job::where('id',$id)->delete();
        Toastr::error('Job Deleted', 'Success');
        return back();
    }
}
