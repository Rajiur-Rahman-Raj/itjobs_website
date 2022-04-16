@extends('frontend.master')

@section('content')
    <!--category slider start-->
	<section>

            <div class="category pl-4 pr-4" style="background-color:#283593">
                <div class="row">

                    <div class="col category_link"><a href="{{url('/')}}">All Jobs</a></div>
                    @foreach ($categories as $category)
                        <div class="col category_link"><a href="{{url('category/wise/jobs')}}/{{$category->id}}">{{$category->category_name}}</a></div>
                    @endforeach

                </div>
            </div>

	</section>
    <!--category slider end-->

	<!--Jobs part start-->
	<section>
		<div class="container">
			<div class="row">

                <!--left side advertisements start-->
                <div class="col-lg-2 col-sm-2 pt-5 d-none d-md-block d-lg-block">
                    @if($left_ads != null)
                        @foreach($left_ads as $left_ad)
                        <a href="@if($left_ad->link !=null){{$left_ad->link}}@else#@endif" target="_blank"><img src="{{asset($left_ad->image)}}" alt="" class="img-fluid mb-3"></a>
                        @endforeach
                    @endif
                </div>
                <!--left side advertisements end-->

				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pt-3 d-xs-block d-sm-block d-md-block d-lg-block">

                    @if(session('msg'))
                        <div class="alert-info alert mt-4">
                            <p style="color:black;font-size:15px;font-weight:600">{{session('msg')}}</p>
                        </div>
                    @endif
                    @if(session('msg2'))
                        <div class="alert-danger alert mt-4">
                            <p style="color:black;font-size:15px;font-weight:600">{{session('msg2')}}</p>
                        </div>
                    @endif

					<div class="job_details">
						<div class="accordion" id="accordionExample">

                            {{-- todays job with monthly sticky payment  --}}
                            @if(sizeof($today_jobs_month) > 0)
                                <div class="jobs">
                                    <div class="section_header">
                                        <!--<h2><i class="far fa-clock"></i> Today</h2>-->
                                    </div>
                                </div>
                                @foreach ($today_jobs_month as $today_job)

                                @php
                                    $date1 = \Carbon\Carbon::now();
                                    $date2 = $today_job->created_at;
                                    $result = $date1->diff($date2)->format("%d");
                                @endphp

                                    @if($result <= 30)

                                    <div class="card">
                                        <div class="card-header" id="headingOne" style="background:@if($today_job->special_background > 0){{$today_job->background_color}}@elseif($today_job->normal_background > 0) #F4F490 @endif">


                                            <div class="row" data-toggle="collapse" data-target="#collapseOne{{$today_job->id}}" aria-expanded="true" aria-controls="collapseOne">
                                                <div class="col-4 col-lg-2">
                                                    <div class="job_icon">
                                                        @if($today_job->logo != 0 && $today_job->company_logo != null)
                                                            <img src="{{url($today_job->company_logo)}}" class="img-fluid">
                                                        @else
                                                            <img src="{{url('/')}}/frontend_assets/images/1580487028_6543822_logo.apng.png" class="img-fluid">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-8 col-lg-5">
                                                    <div class="job_heading">
                                                        <h3>{{$today_job->job_name}}<img src="{{url('/')}}/frontend_assets/images/154_check_ok_sticker_success-512.png" style=" margin-left: 10px; height: 20px; width: 20px; " title="Verified"></h3>
                                                        <h5>- {{$today_job->company_name}}</h5>
                                                        <p>
                                                            @php
                                                                $newDate = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $today_job->created_at)->format('d M, Y');
                                                            @endphp
                                                            <span>{{$newDate}}</span>
                                                            <?php
                                                                $country = DB::table('divisions')->where('id',$today_job->country_id)->first();
                                                                $city = DB::table('districts')->where('id',$today_job->city_id)->first();
                                                            ?>
                                                            - {{$city->name}}, {{$country->name}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-5 pt-2 pt-lg-0 pt-md-0 pt-sm-0">
                                                    <div class="job_tag">
                                                        @php
                                                            $tags = explode(",",$today_job->tags);
                                                        @endphp

                                                        <?php $tag_number=1 ?>
                                                        @foreach ($tags as $tag)
                                                            @if($tag_number <= 6)
                                                                <a href="#">{{$tag}}</a>
                                                            @endif
                                                            <?php $tag_number++ ?>
                                                        @endforeach
                                                        <img src="{{url('/')}}/frontend_assets/images/rank2.png" width="20">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="collapseOne{{$today_job->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                @if($today_job->details != null)
                                                    <b><u>Job Context :</u></b>
                                                    {!! $today_job->details !!}
                                                @endif
                                                <br>
                                                @if($today_job->response != null)
                                                    <b><u>Job Responsibilities :</u></b>
                                                    {!! $today_job->response !!}
                                                @endif
                                                <br>
                                                @if($today_job->requirements != null)
                                                    <b><u>Educational and Additional Requirements :</u></b>
                                                    {!! $today_job->requirements !!}
                                                @endif
                                                <br>
                                                @if($today_job->apply != null)
                                                    <b><u>What we offer :</u></b>
                                                    {!! $today_job->apply !!}
                                                @endif
                                                <br>


                                                <div class="others pt-3" style="border-top: 1px solid gray; margin-top: 30px;">
                                                    <div class="row">
                                                        <div class="col-lg-5 text-left">
                                                            <p style="font-weight:600">More From : <a href="@if($today_job->website_link != null){{$today_job->website_link}}@endif">
                                                                @if($today_job->company_name != null)
                                                                {{$today_job->company_name}}
                                                                @endif
                                                            </a></p>
                                                        </div>
                                                        <div class="col-lg-7 text-right">
                                                            <div class="site_link">
                                                                <a href="@if($today_job->website_link != null){{$today_job->website_link}}@endif" target="_blank">Website</a>
                                                                <button data-id="{{$today_job->id}}" data-original-title="Edit" class="edit editProduct" type="button" data-toggle="modal" data-target="#exampleModal">Apply</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            @endif



                            {{-- todays job with weekly sticky payment --}}
                            @if(sizeof($today_jobs_week) > 0)
                                <div class="jobs">
                                    <div class="section_header">
                                        <!--<h2><i class="far fa-clock"></i> Today</h2>-->
                                    </div>
                                </div>
                                @foreach ($today_jobs_week as $today_job)

                                @php
                                    $date1 = \Carbon\Carbon::now();
                                    $date2 = $today_job->created_at;
                                    $result = $date1->diff($date2)->format("%d");
                                @endphp

                                    @if($result <= 7)

                                    <div class="card">
                                        <div class="card-header" id="headingOne" style="background:@if($today_job->special_background > 0){{$today_job->background_color}}@elseif($today_job->normal_background > 0) #F4F490 @endif">

                                            <div class="row" data-toggle="collapse" data-target="#collapseOne{{$today_job->id}}" aria-expanded="true" aria-controls="collapseOne">
                                                <div class="col-4 col-lg-2">
                                                    <div class="job_icon">
                                                        @if($today_job->logo != 0 && $today_job->company_logo != null)
                                                            <img src="{{url($today_job->company_logo)}}" class="img-fluid">
                                                        @else
                                                            <img src="{{url('/')}}/frontend_assets/images/1580487028_6543822_logo.apng.png" class="img-fluid">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-8 col-lg-5">
                                                    <div class="job_heading">
                                                        <h3>{{$today_job->job_name}}<img src="{{url('/')}}/frontend_assets/images/154_check_ok_sticker_success-512.png" style=" margin-left: 10px; height: 20px; width: 20px; " title="Verified"></h3>
                                                        <h5>- {{$today_job->company_name}}</h5>
                                                        <p>
                                                            @php
                                                                $newDate = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $today_job->created_at)->format('d M, Y');
                                                            @endphp
                                                            <span>{{$newDate}}</span>
                                                            <?php
                                                               $country = DB::table('divisions')->where('id',$today_job->country_id)->first();
                                                                $city = DB::table('districts')->where('id',$today_job->city_id)->first();
                                                            ?>
                                                            - {{$city->name}}, {{$country->name}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-5 pt-2 pt-lg-0 pt-md-0 pt-sm-0">
                                                    <div class="job_tag">
                                                        @php
                                                            $tags = explode(",",$today_job->tags);
                                                        @endphp

                                                        <?php $tag_number=1 ?>
                                                        @foreach ($tags as $tag)
                                                            @if($tag_number <= 6)
                                                                <a href="#">{{$tag}}</a>
                                                            @endif
                                                            <?php $tag_number++ ?>
                                                        @endforeach
                                                        <img src="{{url('/')}}/frontend_assets/images/rank2.png" width="20">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div id="collapseOne{{$today_job->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                @if($today_job->details != null)
                                                    <b><u>Job Context :</u></b>
                                                    {!! $today_job->details !!}
                                                @endif
                                                <br>
                                                @if($today_job->response != null)
                                                    <b><u>Job Responsibilities :</u></b>
                                                    {!! $today_job->response !!}
                                                @endif
                                                <br>
                                                @if($today_job->requirements != null)
                                                    <b><u>Educational and Additional Requirements :</u></b>
                                                    {!! $today_job->requirements !!}
                                                @endif
                                                <br>
                                                @if($today_job->apply != null)
                                                    <b><u>What we offer :</u></b>
                                                    {!! $today_job->apply !!}
                                                @endif
                                                <br>


                                                <div class="others pt-3" style="border-top: 1px solid gray; margin-top: 30px;">
                                                    <div class="row">
                                                        <div class="col-lg-5 text-left">
                                                            <p style="font-weight:600">More From : <a href="@if($today_job->website_link != null){{$today_job->website_link}}@endif">
                                                                @if($today_job->company_name != null)
                                                                {{$today_job->company_name}}
                                                                @endif
                                                            </a></p>
                                                        </div>
                                                        <div class="col-lg-7 text-right">
                                                            <div class="site_link">
                                                                <a href="@if($today_job->website_link != null){{$today_job->website_link}}@endif" target="_blank">Website</a>
                                                                <button data-id="{{$today_job->id}}" data-original-title="Edit" class="edit editProduct" type="button" data-toggle="modal" data-target="#exampleModal">Apply</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    @endif
                                @endforeach
                            @endif


                            {{-- todays job with no sticky payment  --}}
                            @if(sizeof($today_jobs) > 0)

                                <?php
                                    $i = 0;
                                    $j = 0;
                                    $k = 0;
                                    $l = 0;
                                ?>

                                @php
                                    $today_from = date('Y')."-".date('m')."-".date('d')." 00:00:00";
                                    $today_to = date('Y')."-".date('m')."-".date('d')." 23:59:59";

                                    $seven_date_from = date('Y-m-d 00:00:00', strtotime('-6 days'));
                                    $seven_date_to = date('Y-m-d 23:59:59',strtotime("-1 days"));

                                    $prev_date_from = date('Y-m-d 00:00:00', strtotime('-37 days'));
                                    $prev_date_to = date('Y-m-d 23:59:59',strtotime("-7 days"));

                                    $old_date_from = date('Y-m-d 00:00:00', strtotime('-1000 days'));
                                    $old_date_to = date('Y-m-d 23:59:59',strtotime("-38 days"));
                                @endphp

                                @foreach ($today_jobs as $today_job)

                                    @if($i == 0)
                                        @if($today_job->created_at >= $today_from && $today_job->created_at <= $today_to)
                                            <div class="jobs">
                                                <div class="section_header">
                                                    <h2 style="color:black"><i class="far fa-clock"></i> Today </h2>
                                                </div>
                                            </div>
                                            <?php $i++ ?>
                                        @endif
                                    @endif


                                    @if($j == 0)
                                        @if($today_job->created_at <= $seven_date_to && $today_job->created_at >= $seven_date_from)
                                            <div class="jobs">
                                                <div class="section_header">
                                                    <h2 style="color:black"><i class="far fa-clock"></i> Last 7 Days</h2>
                                                </div>
                                            </div>
                                            <?php $j++ ?>
                                        @endif
                                    @endif


                                    @if($k == 0)
                                        @if($today_job->created_at <= $prev_date_to && $today_job->created_at >= $prev_date_from)
                                            <div class="jobs">
                                                <div class="section_header">
                                                    <h2 style="color:black"><i class="far fa-clock"></i> Last 30 Days</h2>
                                                </div>
                                            </div>
                                            <?php $k++ ?>
                                        @endif
                                    @endif

                                    @if($l == 0)
                                        @if($today_job->created_at <= $old_date_to && $today_job->created_at >= $old_date_from)
                                            <div class="jobs">
                                                <div class="section_header">
                                                    <h2 style="color:black"><i class="far fa-clock"></i> Previous Jobs</h2>
                                                </div>
                                            </div>
                                            <?php $l++ ?>
                                        @endif
                                    @endif

                                    <div class="card">
                                        <div class="card-header" id="headingOne" style="background:@if($today_job->special_background > 0){{$today_job->background_color}}@elseif($today_job->normal_background > 0) #F4F490 @endif">


                                            <div class="row" data-toggle="collapse" data-target="#collapseOne{{$today_job->id}}" aria-expanded="true" aria-controls="collapseOne">
                                                <div class="col-4 col-lg-2">
                                                    <div class="job_icon">
                                                        @if($today_job->logo != 0 && $today_job->company_logo != null)
                                                            <img src="{{url($today_job->company_logo)}}" class="img-fluid">
                                                        @else
                                                            <img src="{{url('/')}}/frontend_assets/images/1580487028_6543822_logo.apng.png" class="img-fluid">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-8 col-lg-5">
                                                    <div class="job_heading">
                                                        <h3>{{$today_job->job_name}}<img src="{{url('/')}}/frontend_assets/images/154_check_ok_sticker_success-512.png" style=" margin-left: 10px; height: 20px; width: 20px; " title="Verified"></h3>
                                                        <h5>- {{$today_job->company_name}}</h5>
                                                        <p>
                                                            @php
                                                                $newDate = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $today_job->created_at)->format('d M, Y');
                                                            @endphp
                                                            <span>{{$newDate}}</span>
                                                            <?php
                                                                $country = DB::table('divisions')->where('id',$today_job->country_id)->first();
                                                                $city = DB::table('districts')->where('id',$today_job->city_id)->first();
                                                            ?>
                                                            - {{$city->name}}, {{$country->name}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-5 pt-2 pt-lg-0 pt-md-0 pt-sm-0">
                                                    <div class="job_tag">
                                                        @php
                                                            $tags = explode(",",$today_job->tags);
                                                        @endphp

                                                        <?php $tag_number=1 ?>
                                                        @foreach ($tags as $tag)
                                                            @if($tag_number <= 6)
                                                                <a href="#">{{$tag}}</a>
                                                            @endif
                                                            <?php $tag_number++ ?>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="collapseOne{{$today_job->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                @if($today_job->details != null)
                                                    <b><u>Job Context :</u></b>
                                                    {!! $today_job->details !!}
                                                @endif
                                                <br>
                                                @if($today_job->response != null)
                                                    <b><u>Job Responsibilities :</u></b>
                                                    {!! $today_job->response !!}
                                                @endif
                                                <br>
                                                @if($today_job->requirements != null)
                                                    <b><u>Educational and Additional Requirements :</u></b>
                                                    {!! $today_job->requirements !!}
                                                @endif
                                                <br>
                                                @if($today_job->apply != null)
                                                    <b><u>What we offer :</u></b>
                                                    {!! $today_job->apply !!}
                                                @endif
                                                <br>


                                                <div class="others pt-3" style="border-top: 1px solid gray; margin-top: 30px;">
                                                    <div class="row">
                                                        <div class="col-lg-5 text-left">
                                                            <p style="font-weight:600">More From : <a href="@if($today_job->website_link != null){{$today_job->website_link}}@endif">
                                                                @if($today_job->company_name != null)
                                                                {{$today_job->company_name}}
                                                                @endif
                                                            </a></p>
                                                        </div>
                                                        <div class="col-lg-7 text-right">
                                                            <div class="site_link">
                                                                <a href="@if($today_job->website_link != null){{$today_job->website_link}}@endif" target="_blank">Website</a>
                                                                <button data-id="{{$today_job->id}}" data-original-title="Edit" class="edit editProduct" type="button" data-toggle="modal" data-target="#exampleModal">Apply</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @else

                                @if(sizeof($today_jobs_week) == 0 && sizeof($today_jobs_month) == 0 && sizeof($today_jobs) == 0)
                                    <h5 class="mt-5" style="font-weight:600"><span class="text-success">Sorry....!!</span> <span class="text-success">No Jobs Found.</span></h5>
                                    <h5 class="mt-1" style="font-weight:600">Please Look for jobs from another category.</h5>
                                @endif

                            @endif
                            <br>
                            {{ $today_jobs->links() }}
						</div>
                    </div>

                </div>

                <!--right side advertisements start-->
                <div class="col-lg-2 col-sm-2 pt-5 d-none d-md-block d-lg-block">
                    @if($right_ads != null)
                        @foreach($right_ads as $right_ad)
                        <a href="@if($right_ad->link !=null){{$right_ad->link}}@else#@endif"><img src="{{asset($right_ad->image)}}" alt="" class="img-fluid mb-3"></a>
                        @endforeach
                    @endif
                </div>
                <!--right side advertisements end-->


                <div class="job_post_link">
                    <a href="{{url('add/job/page')}}"><i class="fas fa-briefcase"></i> Post A Job</a>
                </div>


			</div>
		</div>
	</section>
    <!--Jobs part end-->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLabel">Apply For this Job</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{url('cv/submit/for/job')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="job_id" id="job_id" value="">
                    <input type="hidden" name="user_id" id="user_id" value="">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Contact <span class="text-danger">*</span></label>
                                <input type="text" name="contact" class="form-control" placeholder="Mobile No." required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Address :</label>
                                <textarea class="form-control" name="address" placeholder="Address"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Cover Letter (pdf format) :</label>
                                <input type="file" name="cover_letter" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>CV (pdf format) <span class="text-danger">*</span></label>
                                <input type="file" name="cv" class="form-control" required>
                            </div>
                        </div>
                    </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Apply</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
        </div>
    </div>
  </div>
  <!-- Modal -->

@endsection


@section('footer_js')

<script type="text/javascript">

    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('body').on('click', '.editProduct', function () {
            var product_id = $(this).data('id');
            $.get("{{ url('get/job/data') }}" +'/' + product_id +'/edit', function (data) {
                $('#job_id').val(data.id);
                $('#user_id').val(data.user_id);
            })
        });
    });

</script>
@endsection

