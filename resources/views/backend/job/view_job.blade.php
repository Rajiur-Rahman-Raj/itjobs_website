@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card text-white mt-3">
                <div class="card-header bg-success">
                    <b>View All Jobs</b>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Date</th>
                            <th scope="col">Category</th>
                            <th scope="col">Job Title</th>
                            <th scope="col">Company Name</th>
                            <th scope="col">Company Email</th>
                            <th scope="col">DeadLine</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $index => $job)
                            <tr>
                                <th scope="row">{{ $index+$jobs->firstItem() }}</th>

                                <?php  $newDate = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $job->created_at)->format('d M, Y'); ?>
                                <td>{{$newDate}}</td>

                                <td>{{$job->category_name}}</td>
                                <td>{{$job->job_name}}</td>
                                <td>{{$job->company_name}}</td>
                                <td>{{$job->company_email}}</td>

                                @if($job->deadline != null)
                                    <?php  $newDate2 = Carbon\Carbon::createFromFormat('Y-m-d', $job->deadline)->format('d M, Y'); ?>
                                @endif

                                <td>@if($job->deadline != null){{$newDate2}}@endif</td>

                                <td style="font-size:16px;"><b class="text-info">{{$job->total_cost}}</b> Taka</td>

                                @if($job->payment == 1)
                                    <td><p class="btn btn-sm btn-success rounded">Done</p></td>
                                @else
                                    <td><p class="btn btn-sm btn-danger rounded">Denied</p></td>
                                @endif

                                <td class="text-center">

                                    @if($job->active == 1)
                                        <a href="{{url('inactive/job')}}/{{$job->id}}" class="btn btn-success btn-sm rounded"><i class="fas fa-lock"></i></a>
                                    @else
                                        <a href="{{url('active/job')}}/{{$job->id}}" class="btn btn-warning btn-sm rounded"><i class="fas fa-unlock-alt"></i></a>
                                    @endif

                                    <a href="{{url('delete/job')}}/{{$job->id}}" class="btn btn-sm btn-danger rounded mt-1"><i class="fas fa-trash-alt"></i></a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>

                      {{ $jobs->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
