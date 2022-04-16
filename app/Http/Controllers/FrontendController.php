<?php

namespace App\Http\Controllers;
use App\JobCategory;
use App\Job;
use App\Terms;
use App\Privacy;
use App\SideAd;
use App\Contact;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){

        session()->forget(['country_name', 'country_id', 'city_name', 'city_id']);

        $countries = DB::table('country')->get();
        $categories  = JobCategory::all();

        //jobs with monthly sticky payment
        $today_jobs_month = Job::where('active',1)->orderBy('id','desc')->where('month','>',0)->get();

        //jobs with weekly sticky payment
        $today_jobs_week = Job::where('active',1)->orderBy('id','desc')->where('week','>',0)->get();

        //jobs with no sticky payment
        $today_jobs = Job::where('active',1)->orderBy('id','desc')->where('week','=',0)->where('month','=',0)->paginate(20);

        $left_ads = SideAd::where('side','left')->orderBy('id','desc')->get();
        $right_ads = SideAd::where('side','right')->orderBy('id','desc')->get();

        return view('frontend.index',compact('left_ads','right_ads','categories','today_jobs','today_jobs_month','today_jobs_week','countries'));
    }

    public function categoryWiseJobs($id){

        session()->forget(['country_name', 'country_id', 'city_name', 'city_id']);

        $countries = DB::table('country')->get();
        $categories  = JobCategory::all();


        //jobs with monthly sticky payment
        $today_jobs_month = Job::where('active',1)->orderBy('id','desc')->where('month','>',0)->get();

        //jobs with weekly sticky payment
        $today_jobs_week = Job::where('active',1)->orderBy('id','desc')->where('week','>',0)->get();

        //jobs with no sticky payment
        $today_jobs = Job::where('active',1)->where('category_id',$id)->orderBy('id','desc')->where('week','=',0)->where('month','=',0)->paginate(20);

        $left_ads = SideAd::where('side','left')->orderBy('id','desc')->get();
        $right_ads = SideAd::where('side','right')->orderBy('id','desc')->get();

        return view('frontend.index',compact('left_ads','right_ads','categories','today_jobs','today_jobs_month','today_jobs_week','countries'));
    }

    public function searchByName(Request $request){
        $countries = DB::table('country')->get();
        $categories  = JobCategory::all();

        // keeping data in session to show it in the form
        $country = DB::table('country')->where('id',$request->country_id)->first();
        session(['country_name' => $country->name]);
        session(['country_id' => $request->country_id]);

        $city = DB::table('city')->where('id',$request->city)->first();
        session(['city_name' => $city->name]);
        session(['city_id' => $request->city]);
        // keeping data in session to show it in the form

        //jobs with monthly sticky payment
        $today_jobs_month = Job::where('active',1)->where('country_id',$request->country_id)->where('city_id',$request->city)->orderBy('id','desc')->where('month','>',0)->get();

        //jobs with weekly sticky payment
        $today_jobs_week = Job::where('active',1)->where('country_id',$request->country_id)->where('city_id',$request->city)->orderBy('id','desc')->where('week','>',0)->get();

        //jobs with no sticky payment
        $today_jobs = Job::where('active',1)->where('country_id',$request->country_id)->where('city_id',$request->city)->orderBy('id','desc')->where('week','=',0)->where('month','=',0)->paginate(20);

        $left_ads = SideAd::where('side','left')->orderBy('id','desc')->get();
        $right_ads = SideAd::where('side','right')->orderBy('id','desc')->get();

        return view('frontend.index',compact('left_ads','right_ads','categories','today_jobs','today_jobs_month','today_jobs_week','countries'));
    }

    public function searchByJobTitle(Request $request){

        session()->forget(['country_name', 'country_id', 'city_name', 'city_id']);

        $countries = DB::table('country')->get();
        $categories  = JobCategory::all();

        //jobs with monthly sticky payment
        $today_jobs_month = Job::where('active',1)->where('job_name','LIKE','%'.$request->job_title."%")->orderBy('id','desc')->where('month','>',0)->get();

        //jobs with weekly sticky payment
        $today_jobs_week = Job::where('active',1)->where('job_name','LIKE','%'.$request->job_title."%")->orderBy('id','desc')->where('week','>',0)->get();

        //jobs with no sticky payment
        $today_jobs = Job::where('active',1)->where('job_name','LIKE','%'.$request->job_title."%")->orderBy('id','desc')->where('week','=',0)->where('month','=',0)->paginate(20);

        $left_ads = SideAd::where('side','left')->orderBy('id','desc')->get();
        $right_ads = SideAd::where('side','right')->orderBy('id','desc')->get();

        return view('frontend.index',compact('left_ads','right_ads','categories','today_jobs','today_jobs_month','today_jobs_week','countries'));

    }

    public function termsPage(){
        session()->forget(['country_name', 'country_id', 'city_name', 'city_id']);

        $details = Terms::where('id',1)->first();
        $countries = DB::table('country')->get();
        $categories  = JobCategory::all();

        return view('frontend.terms',compact('categories','countries','details'));
    }

    public function privacyPage(){
        session()->forget(['country_name', 'country_id', 'city_name', 'city_id']);

        $details = Privacy::where('id',1)->first();
        $countries = DB::table('country')->get();
        $categories  = JobCategory::all();

        return view('frontend.terms',compact('categories','countries','details'));
    }

    public function contactPage(){
        session()->forget(['country_name', 'country_id', 'city_name', 'city_id']);

        $details = Contact::where('id',1)->first();
        $countries = DB::table('country')->get();
        $categories  = JobCategory::all();

        return view('frontend.contact',compact('categories','countries','details'));
    }
}
