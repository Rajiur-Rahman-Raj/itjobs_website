<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Job;
use Illuminate\Support\Facades\DB;
use App\JobCategory;
use App\Mail\ConfirmationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class StripePaymentController extends Controller

{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */

    public function stripe()
    {
        $total_cost = session('total_cost');
        $categories = JobCategory::all();
        $countries = DB::table('country')->get();
        return view('backend.stripe',compact('total_cost','categories','countries'));
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $job_id = session('job_id');
        $total_cost = session('total_cost');
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $total_cost * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com."
        ]);

        Job::where('id',$job_id)->update([
            'payment' => 1,
        ]);

        $email = $request->payment_email;
        $data = Job::where('id',$job_id)->first();
        Mail::to($email)->send(new ConfirmationMail($data));

        return redirect('/')->with('msg', 'Your Payment is Successfull. Job has been submitted for review');
        // Session::flash('success', 'Payment successful!');
        // return back();
    }
}
