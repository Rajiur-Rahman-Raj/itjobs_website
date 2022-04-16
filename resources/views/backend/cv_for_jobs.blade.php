@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card text-white mt-3">
                <div class="card-header bg-success">
                    <b>View CV for your Posted Jobs</b>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-responsive">
                        <thead>
                          <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Date</th>
                            <th scope="col">Job Title</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Cover Letter</th>
                            <th scope="col">CV</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($cv_jobs as $index => $cv_job)
                            <tr>
                                <th scope="row">{{ $index+$cv_jobs->firstItem() }}</th>

                                <?php  $newDate = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $cv_job->created_at)->format('d/m/y'); ?>
                                <td>{{$newDate}}</td>
                                @php
                                    $job = DB::table('jobs')->where('id',$cv_job->job_id)->first();
                                @endphp
                                <td>{{$job->job_name}}</td>
                                <td>{{$cv_job->name}}</td>
                                <td>{{$cv_job->email}}</td>
                                <td>{{$cv_job->contact}}</td>
                                <td><a href="{{url($cv_job->cover_letter)}}" download="{{url($cv_job->cover_letter)}}">{{$cv_job->cover_letter}}</a></td>
                                <td><a href="{{url($cv_job->cv)}}" download="{{url($cv_job->cv)}}">{{$cv_job->cv}}</a></td>
                                <td class="text-center">
                                    <a href="{{url('delete/cv/for/jobs')}}/{{$cv_job->id}}" class="btn btn-sm btn-danger rounded mb-1"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>

                      {{ $cv_jobs->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
