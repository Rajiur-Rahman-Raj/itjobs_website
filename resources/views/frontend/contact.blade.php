@extends('frontend.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                {!! $details->details !!}
            </div>
        </div>
    </div>
@endsection
