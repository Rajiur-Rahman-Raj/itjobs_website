@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card text-white mt-3">
                <div class="card-header bg-success">
                    <b>View All CV</b>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Date</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Transaction ID</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($cv_lists as $index => $cv_list)
                            <tr>
                                <th scope="row">{{ $index+$cv_lists->firstItem() }}</th>

                                <?php  $newDate = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $cv_list->created_at)->format('d M, Y'); ?>
                                <td>{{$newDate}}</td>

                                <td>{{$cv_list->name}}</td>
                                <td>{{$cv_list->email}}</td>
                                <td>{{$cv_list->contact}}</td>
                                <td>{{$cv_list->payment_type}}</td>
                                <td>{{$cv_list->transaction_id}}</td>
                                <td><b class="text-info">{{$cv_list->total_cost}}</b> Taka</td>

                                @if($cv_list->active == 0)
                                    <td><p class="btn btn-sm btn-danger rounded">Pending</p></td>
                                @else
                                    <td><p class="btn btn-sm btn-success rounded">Delivered</p></td>
                                @endif

                                <td class="text-center">

                                    @if($cv_list->active == 0)
                                        <a href="{{url('delivered/cv')}}/{{$cv_list->id}}" class="btn btn-warning btn-sm rounded mb-1"><i class="fas fa-paper-plane"></i></a>
                                    @else
                                        <a href="#" class="btn btn-success btn-sm rounded mb-1"><i class="far fa-check-square"></i></a>
                                    @endif

                                    <a href="{{url('detail/view/cv')}}/{{$cv_list->id}}" class="btn btn-sm btn-info rounded mb-1"><i class="far fa-edit"></i></a>
                                    <a href="{{url('delete/cv')}}/{{$cv_list->id}}" class="btn btn-sm btn-danger rounded mb-1"><i class="fas fa-trash-alt"></i></a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>

                      {{ $cv_lists->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
