<?php

namespace App\Http\Controllers;
use App\User;
use App\JobCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Image;
use App\Privacy;
use App\Terms;
use App\Contact;
use App\Job;
use App\JobCV;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BackendController extends Controller
{
    public function index(){

        $jan_from = date('Y')."-01-01 00:00:00";
        $jan_to = date('Y')."-01-31 23:59:59";
        $jan_dropped = JobCV::whereBetween('created_at', [$jan_from,$jan_to])->count();
        $jan_jobs = Job::whereBetween('created_at', [$jan_from,$jan_to])->count();

        $feb_from = date('Y')."-02-01 00:00:00";
        $feb_to = date('Y')."-02-29 23:59:59";
        $feb_dropped = JobCV::whereBetween('created_at', [$feb_from,$feb_to])->count();
        $feb_jobs = Job::whereBetween('created_at', [$feb_from,$feb_to])->count();

        $mar_from = date('Y')."-03-01 00:00:00";
        $mar_to = date('Y')."-03-31 23:59:59";
        $mar_dropped = JobCV::whereBetween('created_at', [$mar_from,$mar_to])->count();
        $mar_jobs = Job::whereBetween('created_at', [$mar_from,$mar_to])->count();

        $apr_from = date('Y')."-04-01 00:00:00";
        $apr_to = date('Y')."-04-30 23:59:59";
        $apr_dropped = JobCV::whereBetween('created_at', [$apr_from,$apr_to])->count();
        $apr_jobs = Job::whereBetween('created_at', [$apr_from,$apr_to])->count();

        $may_from = date('Y')."-05-01 00:00:00";
        $may_to = date('Y')."-05-31 23:59:59";
        $may_dropped = JobCV::whereBetween('created_at', [$may_from,$may_to])->count();
        $may_jobs = Job::whereBetween('created_at', [$may_from,$may_to])->count();

        $jun_from = date('Y')."-06-01 00:00:00";
        $jun_to = date('Y')."-06-30 23:59:59";
        $jun_dropped = JobCV::whereBetween('created_at', [$jun_from,$jun_to])->count();
        $jun_jobs = Job::whereBetween('created_at', [$jun_from,$jun_to])->count();

        $jul_from = date('Y')."-07-01 00:00:00";
        $jul_to = date('Y')."-07-31 23:59:59";
        $jul_dropped = JobCV::whereBetween('created_at', [$jun_from,$jun_to])->count();
        $jul_jobs = Job::whereBetween('created_at', [$jun_from,$jun_to])->count();

        $aug_from = date('Y')."-08-01 00:00:00";
        $aug_to = date('Y')."-08-31 23:59:59";
        $aug_dropped = JobCV::whereBetween('created_at', [$aug_from,$aug_to])->count();
        $aug_jobs = Job::whereBetween('created_at', [$aug_from,$aug_to])->count();

        $sep_from = date('Y')."-09-01 00:00:00";
        $sep_to = date('Y')."-09-30 23:59:59";
        $sep_dropped = JobCV::whereBetween('created_at', [$sep_from,$sep_to])->count();
        $sep_jobs = Job::whereBetween('created_at', [$sep_from,$sep_to])->count();

        $oct_from = date('Y')."-10-01 00:00:00";
        $oct_to = date('Y')."-10-31 23:59:59";
        $oct_dropped = JobCV::whereBetween('created_at', [$oct_from,$oct_to])->count();
        $oct_jobs = Job::whereBetween('created_at', [$oct_from,$oct_to])->count();

        $nov_from = date('Y')."-11-01 00:00:00";
        $nov_to = date('Y')."-11-30 23:59:59";
        $nov_dropped = JobCV::whereBetween('created_at', [$nov_from,$nov_to])->count();
        $nov_jobs = Job::whereBetween('created_at', [$nov_from,$nov_to])->count();

        $dec_from = date('Y')."-12-01 00:00:00";
        $dec_to = date('Y')."-12-31 23:59:59";
        $dec_dropped = JobCV::whereBetween('created_at', [$dec_from,$dec_to])->count();
        $dec_jobs = Job::whereBetween('created_at', [$dec_from,$dec_to])->count();


        return view('backend.dashboard',compact('jan_dropped','feb_dropped','mar_dropped','apr_dropped','may_dropped','jun_dropped','jul_dropped','dec_dropped','nov_dropped','oct_dropped','sep_dropped','aug_dropped','jan_jobs','feb_jobs','mar_jobs','apr_jobs','may_jobs','jun_jobs','jul_jobs','aug_jobs','sep_jobs','oct_jobs','nov_jobs','dec_jobs'));

    }
    public function profilePageView(){
        $user_info = User::where('id',Auth::user()->id)->first();
        return view('backend.profile_view',compact('user_info'));
    }

    public function freeJobPostPage(Request $request){
        $categories = JobCategory::all();
        $divisions = DB::table('divisions')->get();
        echo view('backend.free_job_post',compact('categories','divisions'));
    }

    public function addFreeJob(Request $request){
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
                'user_id' => Auth::user()->id,
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
                'active'         => 1,
                'payment'        => 1,
                'total_cost'     => $total_cost,
                'created_at'     => Carbon::now(),
            ]);

            Toastr::success('Job has been Posted', 'Success');
            return redirect()->back();

        }
        else{
            $logo = $request->logo;
            $normal_background = $request->normal_background;
            $special_background = $request->special_background;
            $week = $request->week;
            $month = $request->month;

            $total_cost = 0+$logo+$normal_background+$special_background+$week+$month;

            $job_id = Job::insertGetId([
                'user_id' => Auth::user()->id,
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
                'active'         => 1,
                'payment'        => 1,
                'total_cost'     => $total_cost,
                'created_at'     => Carbon::now(),
            ]);

            Toastr::success('Job has been Posted', 'Success');
            return redirect()->back();
        }
    }

    public function termsBackendPage(){
        $details = Terms::where('id',1)->first();
        return view('backend.footer.terms',compact('details'));
    }

    public function addTerms(Request $request){
        Terms::where('id',1)->update([
            'details' => $request->details,
        ]);

        Toastr::success('Terms & Condition Updated', 'Success');
        return redirect()->back();
    }

    public function privacyBackendPage(){
        $details = Privacy::where('id',1)->first();
        return view('backend.footer.privacy',compact('details'));
    }

    public function addPrivacy(Request $request){
        Privacy::where('id',1)->update([
            'details' => $request->details,
        ]);

        Toastr::success('Terms & Condition Updated', 'Success');
        return redirect()->back();
    }

    public function contactBackendPage(){
        $details = Contact::where('id',1)->first();
        return view('backend.footer.contact',compact('details'));
    }

    public function addContact(Request $request){
        Contact::where('id',1)->update([
            'details' => $request->details,
        ]);

        Toastr::success('Terms & Condition Updated', 'Success');
        return redirect()->back();
    }
}
