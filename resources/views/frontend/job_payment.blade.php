@extends('frontend.master')

@section('content')
    <div class="container-fluid pt-3 mt-3">
        <div class="row">
            <div class="col-lg-1 col-md-1">

            </div>
            <div class="col-lg-10 col-md-10">
                <div class="card mt-3">
                    <div class="card-header text-white" style="background:#FF4742">
                        <b><i class="fas fa-briefcase"></i> Short Preview of the Posted Job</b>
                    </div>
                    <div class="card-body" style="background:#E0E0E0">
                        <div>
                            <b>Job Category : </b> {{$info->category_name}}
                            <br>
                            <b>Division : </b> {{$info->division_name}}
                            <br>
                            <b>Dicstrict : </b> {{$info->district_name}}
                            <br>
                            <b>Job Position : </b> {{$info->job_name}}
                            <br>
                            <b>Company Name : </b> {{$info->company_name}}
                            <br>
                            <b>Company Email : </b> {{$info->company_email}}
                            <br>
                            <b>Total Cost : </b> {{$info->total_cost}} Taka
                            <br>

                        </div>

                        <br><br>
                        <b><h3><u>Payment Section</u> :</h3></b>
                        <br>
                        <p class="alert alert-info">
                            Complete your payment through this number 01000000000. And Provide your payment method and transaction ID. You can pay using Bkash or Rocket. Thank You.
                        </p>

                        <form action="{{url('update/job/payment')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input type="text" name="email" value="{{$info->company_email}}" class="form-control" placeholder="example@example.com" required readonly>
                                            <p style="font-size: 12px; text-align:justify;color:gray; padding-left: 3px;">Your Cpmpany Email will be used to send payment confirmation message and it will be used as your login email to access the dropped cv for your posted job.</p>
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
                                        <b style="font-weight: 600; font-size: 24px;">Total Cost :</b> <input type="text" name="total_cost" id="total_cost" style="border-style:none;background:transparent;color:darkblue;font-weight: 700;font-size: 25px;width: 60px" value="{{session('total_cost')}}" readonly> <b style="font-weight: 600; font-size: 24px;">Taka</b>
                                    </div>
                                </div>
                                <div class="col-lg-7 pt-4 text-center">
                                    <input type="submit" value="Finish Payment" class="btn btn-success rounded mr-3">
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

