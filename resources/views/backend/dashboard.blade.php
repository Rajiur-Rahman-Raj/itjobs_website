@extends('backend.master')

@section('content')
<section>
    <div class="container-fluid">
        @if(Auth::user()->status == "admin")
        <h4 class="mt-4">Overview of Jobs :</h4>
        <div class="row mt-3">
            <div class="col-lg-3 pt-4 pb-4 pl-5 pr-5 rounded text-white" style="background: #52c234;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #061700, #52c234);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #061700, #52c234); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            ">
                <a href="{{url('recent/approved/appoinment/for/admin')}}" style="color:white;text-decoration:none">
                <div class="row">
                    <div class="col-lg-12 pt-2">
                        @php
                            $today_jobs = 0;
                            $total_jobs = 0;
                            $date = date('Y-m-d');
                            $jobs = DB::table('jobs')->get();
                            foreach ($jobs as $job) {
                                $current_date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $job->created_at)->format('Y-m-d');
                                if($current_date == $date){
                                    $today_jobs++;
                                    $total_jobs++;
                                }
                                else{
                                    $total_jobs++;
                                }
                            }
                        @endphp
                        <h4>Today Jobs : {{$today_jobs}}<h4>
                        <h4>Total Jobs : {{$total_jobs}}<h4>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 pt-4 pb-4 pl-5 pr-5 rounded text-white" style="background: #73C8A9;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #373B44, #73C8A9);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #373B44, #73C8A9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            ">
                <a href="{{url('pending/list/appoinment/for/admin')}}" style="color:white;text-decoration:none">
                <div class="row">
                    <div class="col-lg-12 pt-2">
                        @php
                            $today_paid = 0;
                            $total_paid = 0;
                            $date = date('Y-m-d');
                            $jobs = DB::table('jobs')->get();
                            foreach ($jobs as $job) {
                                $current_date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $job->created_at)->format('Y-m-d');
                                if($current_date == $date && $job->total_cost != 0){
                                    $today_paid++;
                                }
                                if($job->total_cost != 0){
                                    $total_paid++;
                                }
                            }
                        @endphp
                        <h4>Today Paid Jobs : {{$today_paid}}<h4>
                        <h4>Total Paid Jobs : {{$total_paid}}<h4>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 pt-4 pb-4 pl-5 pr-5 rounded text-white" style="background: #636363;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #a2ab58, #636363);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #a2ab58, #636363); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            ">
                <a href="{{url('previous/approved/appoinment/by/admin')}}" style="color:white;text-decoration:none">
                <div class="row">
                    <div class="col-lg-12 pt-2">
                        @php
                            $new_company = 0;
                            $total_company = 0;
                            $date = date('Y-m-d');
                            $users = APP\User::where('status','user')->get();
                            foreach ($users as $user) {
                                $current_date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->format('Y-m-d');
                                if($current_date == $date){
                                    $new_company++;
                                    $total_company++;
                                }
                                if($current_date != $date){
                                    $total_company++;
                                }
                            }
                        @endphp
                        <h4>New Company : {{$new_company}}<h4>
                        <h4>Total Company : {{$total_company}}<h4>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 pt-4 pb-4 pl-5 pr-5 rounded text-white" style="background: #333333; background: -webkit-linear-gradient(to left, #dd1818, #333333);
            background: linear-gradient(to left, #dd1818, #333333);">
                <a href="{{url('cancelled/appoinment/by/admin')}}" style="color:white;text-decoration:none">
                <div class="row">
                    <div class="col-lg-12 pt-2">
                        @php
                            $today_income = 0;
                            $total_income = 0;
                            $date = date('Y-m-d');
                            $jobs = DB::table('jobs')->get();
                            foreach ($jobs as $job) {
                                $current_date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $job->created_at)->format('Y-m-d');
                                if($current_date == $date && $job->total_cost != 0){
                                    $today_income=$today_income+$job->total_cost;
                                    $total_income=$total_income+$job->total_cost;
                                }
                                if($job->total_cost != 0){
                                    $total_income=$total_income+$job->total_cost;
                                }
                            }
                        @endphp
                        <h4>Today Income-{{$today_income}} ৳<h4>
                        <h4>Total Income-{{$total_income}} ৳<h4>
                    </div>
                </div>
                </a>
            </div>
        </div>

        <h4 class="mt-4">Overview of CV :</h4>
        <div class="row mt-3">
            <div class="col-lg-3 pt-4 pb-4 pl-5 pr-5 rounded text-white" style="background: #52c234;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #061700, #52c234);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #061700, #52c234); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            ">
                <a href="{{url('recent/approved/appoinment/for/admin')}}" style="color:white;text-decoration:none">
                <div class="row">
                    <div class="col-lg-12 pt-2">
                        @php
                            $today_cv = 0;
                            $total_cv = 0;
                            $date = date('Y-m-d');
                            $cvs = DB::table('c_v_s')->get();
                            foreach ($cvs as $cv) {
                                $current_date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $cv->created_at)->format('Y-m-d');
                                if($current_date == $date){
                                    $today_cv++;
                                    $total_cv++;
                                }
                                if($current_date != $date){
                                    $total_cv++;
                                }
                            }
                        @endphp
                        <h4>Today CV Req.-{{$today_cv}}<h4>
                        <h4>Total CV Req.-{{$total_cv}}<h4>
                    </div>

                </div>
                </a>
            </div>
            <div class="col-lg-3 pt-4 pb-4 pl-5 pr-5 rounded text-white" style="background: #73C8A9;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #373B44, #73C8A9);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #373B44, #73C8A9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            ">
                <a href="{{url('pending/list/appoinment/for/admin')}}" style="color:white;text-decoration:none">
                <div class="row">
                    <div class="col-lg-12 pt-2">
                        @php
                            $mid = 0;
                            $pro = 0;
                            $date = date('Y-m-d');
                            $cvs = DB::table('c_v_s')->get();
                            foreach ($cvs as $cv) {
                                if($cv->total_cost == 200){
                                    $mid++;
                                }
                                if($cv->total_cost == 500){
                                    $pro++;
                                }
                            }
                        @endphp
                        <h4>Mid Level CV : {{$mid}}<h4>
                        <h4>Pro Level CV : {{$pro}}<h4>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 pt-4 pb-4 pl-5 pr-5 rounded text-white" style="background: #636363;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #a2ab58, #636363);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #a2ab58, #636363); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            ">
                <a href="{{url('previous/approved/appoinment/by/admin')}}" style="color:white;text-decoration:none">
                <div class="row">
                    <div class="col-lg-12 pt-2">
                        @php
                            $today_dropped = 0;
                            $total_dropped = 0;
                            $date = date('Y-m-d');
                            $cv_jobs = DB::table('job_c_v_s')->get();
                            foreach ($cv_jobs as $cv_job) {
                                $current_date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $cv_job->created_at)->format('Y-m-d');
                                if($current_date == $date){
                                    $today_dropped++;
                                    $total_dropped++;
                                }
                                if($current_date != $date){
                                    $total_dropped++;
                                }
                            }
                        @endphp
                        <h4>Today CV Drop : {{$today_dropped}}<h4>
                        <h4>Total CV Drop : {{$total_dropped}}<h4>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 pt-4 pb-4 pl-5 pr-5 rounded text-white" style="background: #333333; background: -webkit-linear-gradient(to left, #dd1818, #333333);
            background: linear-gradient(to left, #dd1818, #333333);">
                <a href="{{url('cancelled/appoinment/by/admin')}}" style="color:white;text-decoration:none">
                <div class="row">
                    <div class="col-lg-12 pt-2">
                        @php
                            $today_gain = 0;
                            $total_gain = 0;
                            $date = date('Y-m-d');
                            $cvs = DB::table('c_v_s')->get();
                            foreach ($cvs as $cv) {
                                $current_date = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $cv->created_at)->format('Y-m-d');
                                if($current_date == $date && $cv->total_cost != 0){
                                    $today_gain=$today_gain+$cv->total_cost;
                                    $total_gain=$total_gain+$cv->total_cost;
                                }
                                if($job->total_cost != 0){
                                    $total_gain=$total_gain+$cv->total_cost;
                                }
                            }
                        @endphp
                        <h4>Today Income-{{$today_gain}} ৳<h4>
                        <h4>Total Income-{{$total_gain}} ৳<h4>
                    </div>
                </div>
                </a>
            </div>
        </div>


        <div class="row mt-5">

            <div class="col-lg-6">
                <div class="card bar-chart-example">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-9">
                                <h4>Job Posted over the year</h4>
                            </div>
                            <div class="col-lg-3 text-right">
                                <h4><?php echo date('Y') ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="barChartExample"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card line-chart-example">
                  <div class="card-header">
                    <div class="row">
                      <div class="col-lg-9">
                          <h4>CV Dropped over the year</h4>
                      </div>
                      <div class="col-lg-3 text-right">
                          <h4><?php echo date('Y') ?></h4>
                      </div>
                  </div>
                  </div>
                  <div class="card-body">
                    <canvas id="lineChartExample"></canvas>
                  </div>
                </div>
              </div>

        </div>

        @endif
    </div>
</section>

@endsection


@section('footer_js')
<script>

    $(document).ready(function () {

    var brandPrimary = 'rgba(51, 179, 90, 1)';

    var BARCHARTEXMPLE    = $('#barChartExample'),
    LINECHARTEXMPLE   = $('#lineChartExample')


    var barChartExample = new Chart(BARCHARTEXMPLE, {
        type: 'bar',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov","Dec"],
            datasets: [
                {
                    label: "Approved Appoinments",
                    backgroundColor: [
                        'rgba(46, 204, 113, 0.7)',
                        'rgba(46, 204, 113, 0.7)',
                        'rgba(46, 204, 113, 0.7)',
                        'rgba(46, 204, 113, 0.7)',
                        'rgba(46, 204, 113, 0.7)',
                        'rgba(46, 204, 113, 0.7)',
                        'rgba(46, 204, 113, 0.7)',
                        'rgba(46, 204, 113, 0.7)',
                        'rgba(46, 204, 113, 0.7)',
                        'rgba(46, 204, 113, 0.7)',
                        'rgba(46, 204, 113, 0.7)',
                        'rgba(46, 204, 113, 0.7)'
                    ],
                    borderColor: [
                        'rgba(46, 204, 113, 1)',
                        'rgba(46, 204, 113, 1)',
                        'rgba(46, 204, 113, 1)',
                        'rgba(46, 204, 113, 1)',
                        'rgba(46, 204, 113, 1)',
                        'rgba(46, 204, 113, 1)',
                        'rgba(46, 204, 113, 1)',
                        'rgba(46, 204, 113, 1)',
                        'rgba(46, 204, 113, 1)',
                        'rgba(46, 204, 113, 1)',
                        'rgba(46, 204, 113, 1)',
                        'rgba(46, 204, 113, 1)'
                    ],
                    borderWidth: 1,
                    data: [{{$jan_jobs}},{{$feb_jobs}},{{$mar_jobs}},{{$apr_jobs}},{{$may_jobs}},{{$jun_jobs}},{{$jul_jobs}},{{$aug_jobs}},{{$sep_jobs}},{{$oct_jobs}},{{$nov_jobs}},{{$dec_jobs}}],
                }
            ]
        }
    });


    var lineChartExample = new Chart(LINECHARTEXMPLE, {
    type: 'line',
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov","Dec"],
        datasets: [
            {
                label: "Approved Appoinments",
                fill: true,
                lineTension: 0.3,
                backgroundColor: "rgba(51, 179, 90, 0.5)",
                borderColor: brandPrimary,
                borderCapStyle: 'butt',
                borderDash: [],
                borderDashOffset: 0.0,
                borderJoinStyle: 'miter',
                borderWidth: 1,
                pointBorderColor: brandPrimary,
                pointBackgroundColor: "#fff",
                pointBorderWidth: 1,
                pointHoverRadius: 5,
                pointHoverBackgroundColor: brandPrimary,
                pointHoverBorderColor: "rgba(220,220,220,1)",
                pointHoverBorderWidth: 2,
                pointRadius: 1,
                pointHitRadius: 10,
                data: [{{$jan_dropped}},{{$feb_dropped}},{{$mar_dropped}},{{$apr_dropped}},{{$may_dropped}},{{$jun_dropped}},{{$jul_dropped}},{{$aug_dropped}},{{$sep_dropped}},{{$oct_dropped}},{{$nov_dropped}},{{$dec_dropped}}],
                spanGaps: false
            },
        ]
    }
});

    });


</script>
@endsection

