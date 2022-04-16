@extends('frontend.master')

@section('content')
    <div class="container-fluid pt-3 mt-3">
        <div class="row">
            <div class="col-lg-1 col-md-1">

            </div>
            <div class="col-lg-10 col-md-10">
                <div class="card mt-3">
                    <div class="card-header text-center text-white bg-success">
                        <b>Preview of the CV</span>
                    </div>
                    <div class="card-body" style="background:#b8e994">
                        <div class="alert alert-danger mb-4">
                            <p style="font-weight:400" class="mb-2"><i class="fas fa-quote-left"></i> Attention Please...!!!</p>
                            <p style="font-weight:400">This is not the final CV, it's just a preview of the information that you have provided. Complete your payment and submit the details. The information will be submitted to an it specialist to get your cv ready. We will send the CV to your email when it is ready. Thank You. <i class="fas fa-quote-right"></i></p>
                        </div>

                        <div>
                            <p>Name : <span style="font-weight:400">{{$cv_details->name}}</span></p>
                            <p>Profession : <span style="font-weight:400">{{$cv_details->profession}}</span></p>
                            <p>Contact : <span style="font-weight:400">{{$cv_details->contact}}</span></p>
                            <p>Email : <span style="font-weight:400">{{$cv_details->email}}</span></p>
                            <p>Facebook Profile : <span style="font-weight:400">@if($cv_details->facebook_link != null){{$cv_details->facebook_link}}@endif</span></p>
                            <p>Linkedin Profile : <span style="font-weight:400">@if($cv_details->linkedin_link != null){{$cv_details->linkedin_link}}@endif</span></p>
                            <p>Area of Interest  : <span style="font-weight:400">{{$cv_details->position}}</span></p>

                            <hr>

                            <p><u>Experiances</u>  : </p>
                            <span style="font-weight:400">
                                @if($cv_details->experiance != null){!! $cv_details->experiance !!}@else No Experiance @endif
                            </span>

                            <hr>

                            <p><u>Projects</u>  : </p>
                            <span style="font-weight:400">
                                @if($cv_details->project != null){!! $cv_details->project !!}@else No Projects @endif
                            </span>

                            <hr>

                            <p><u>Training</u> : </p>
                            <span style="font-weight:400">
                                @if($cv_details->training != null){!! $cv_details->training !!}@else No Training @endif
                            </span>

                            <hr>

                            <p><u>Eduaction</u>  : </p>
                            <span style="font-weight:400">
                                @if($cv_details->project != null){!!$cv_details->education !!}@else No Eduaction @endif
                            </span>

                            <hr>

                            <p><u>Reference</u>  : </p>
                            <span style="font-weight:400">
                                @if($cv_details->reference != null){!! $cv_details->reference !!}@else No Reference @endif
                            </span>

                            <hr>

                        </div>

                        <br><br>
                        <b><h3><u>Payment Section</u> :</h3></b>
                        <br>
                        <p class="alert alert-info">
                            Complete your payment through this number 01000000000. And Provide your payment method and transaction ID. You can pay using Bkash or Rocket. Thank You.
                        </p>

                        <form action="{{url('add/cv/payment')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input type="text" name="email" class="form-control" placeholder="example@example.com" required>
                                            <p style="font-size: 12px; text-align:justify;color:gray; padding-left: 3px;">Write the email that you provided in your cv. This email will be used to send payment confirmation message and your final CV</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                            <label>Payment Method <span class="text-danger">*</span></label>
                                                <select class="form-control" name="payment_type">
                                                    <option value="">Select One</option>
                                                    <option value="Rocket">Rocket</option>
                                                    <option value="Bkash">Bkash</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                            <label>Transaction ID <span class="text-danger">*</span></label>
                                            <input type="text" name="transaction_id" class="form-control" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            {{--  Cost and Submit section  --}}
                            <div class="row">
                                <div class="col-lg-5 text-center">

                                    <div class="text-dark pt-3">
                                        <b style="font-weight: 600; font-size: 24px;">Total Cost :</b> <span style="font-weight: 700;font-size: 25px;">{{session('total_cost')}} </span> <b style="font-weight: 600; font-size: 24px;">Taka</b>
                                    </div>
                                </div>
                                <div class="col-lg-7 pt-4 text-center">
                                    <input type="submit" value="Confirm Payment" class="btn btn-success rounded mr-3">
                                    <input type="reset" value="Clear All" class="btn btn-danger rounded">
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-lg-1 col-md-1">

            </div>


        </div>
    </div>
@endsection
