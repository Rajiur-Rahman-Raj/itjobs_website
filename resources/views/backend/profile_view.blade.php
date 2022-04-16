@extends('backend.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-5">
            <div class="card mt-3">
                <div class="card-header bg-success text-white">
                    <b><i class="fas fa-user-alt"></i> My Profile</b>
                </div>
                <div class="card-body">
                    <form action="{{url('/')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group text-center">
                            @if($user_info->image != null)
                            <img src="{{url($user_info->image)}}" alt="image here" height="60" width="60" class="mb-4">
                            @endif
                            <label>Upload New Image :</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Name :</label>
                            <input type="text" name="name" value="{{$user_info->name}}" class="form-control">
                        </div>
                        <input type="submit" value="Update" class="btn btn-info btn-sm rounded mt-4">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
