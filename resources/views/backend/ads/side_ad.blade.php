@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mt-3">
                <div class="card-header bg-info text-white rounded">
                    <b><i class="far fa-newspaper"></i> Add New Side Add</b>
                </div>
                <div class="card-body">
                    <form action="{{url('add/new/side/add')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Chose Side :</label>
                            <select class="form-control" name="side" required>
                                <option value="">Select Side</option>
                                <option value="left">Left Side</option>
                                <option value="right">Right Side</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Add URL :</label>
                            <input type="text" name="link" class="form-control" placeholder="https:\\">
                        </div>
                        <div class="form-group">
                            <label>Add Image :</label>
                            <input type="file" id="image" class="form-control" name="image" required onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <img id="blah" class="img-fluid">
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="Post Add" class="mt-4 btn btn-sm btn-success rounded">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mt-3">
                <div class="card-header text-white bg-info">
                    <b>View All Ads</b>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Side</th>
                                <th scope="col">Image</th>
                                <th scope="col">Link</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ads as $ad)
                            <tr>
                                <th scope="row">{{$ad->id}}</th>
                                <td>{{$ad->side}}</td>
                                <td>
                                    @if($ad->image != null)
                                        <img src="{{url($ad->image)}}" height="50" width="30">
                                    @endif
                                </td>
                                <td> {{$ad->link}}</td>
                                <td>
                                    <a href="{{url('delete/side/ad')}}/{{$ad->id}}" class="btn btn-danger btn-sm rounded"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>

                      {{ $ads->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

