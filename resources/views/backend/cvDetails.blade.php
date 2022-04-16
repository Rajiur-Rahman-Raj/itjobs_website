@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card text-white mt-3">
                <div class="card-header bg-info rounded">
                    <b>View CV Details</b>
                </div>
                <div class="card-body text-dark" style="background:#b8e994,color:black">

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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
