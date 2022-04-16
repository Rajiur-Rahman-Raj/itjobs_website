@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-header bg-success text-white rounded">
                    <b><i class="fas fa-layer-group"></i> Terms & Condition</b>
                </div>
                <div class="card-body text-center">
                    <form action="{{url('add/contact')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea name="details" class="form-control">{!! $details->details !!}</textarea>
                        </div>
                        <input type="submit" class="btn btn-sm btn-success rounded mt-3" value="Update Terms & Condition">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_js')

<script>
var route_prefix = "/filemanager";
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>

<script>
    $('textarea[name=details]').ckeditor({
        height: 500,
        filebrowserImageBrowseUrl: route_prefix + '?type=Images',
        filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: route_prefix + '?type=Files',
        filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
    });
    </script>
@endsection
