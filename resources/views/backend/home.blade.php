@extends('backend.master')

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-header bg-info text-white">
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Banners</b>
                            </div>
                            <div class="col-lg-6 text-right">
                                <a href="{{url('add/banner/page')}}" class="btn btn-light btn-sm rounded text-info">Add New Banner</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($banners as $banner)
                                <div class="col-md-2 mb-3">
                                    <img src="{{url('/')}}/{{$banner->image}}" class="img-fluid mb-2">
                                    <a href="{{url('edit/banner/page')}}/{{$banner->id}}" class="btn btn-sm btn-info rounded text-white">Edit</a>
                                    <a href="{{url('delete/banner')}}/{{$banner->id}}" class="btn btn-sm btn-danger rounded text-white">Delete</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                <form action="{{url('edit/product/menu')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$product_menus->id}}">
                    <div class="card-header bg-success text-white">
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Product Menu</b>
                            </div>
                            <div class="col-lg-6 text-right">
                                <input type="submit" value="Update" class="btn btn-light btn-sm rounded text-success">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5">
                                <b>Previous Image:</b>
                                @if($product_menus->product_image != null)
                                    <img src="{{url($product_menus->product_image)}}" class="img-fluid w-50">
                                @endif

                                <div class="form-group">
                                    <label for="image">Your Image :</label>
                                    <input type="file" id="image" class="pb-4 form-control @error('image') is-invalid @enderror" name="product_image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <img id="blah" class="img-fluid w-50">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <b>Previous Icon:</b>
                                        @if($product_menus->product_icon != null)
                                            <img src="{{url($product_menus->product_icon)}}" class="img-fluid w-50">
                                        @endif

                                        <div class="form-group">
                                            <label for="image2">Your Icon :</label>
                                            <input type="file" id="image2" class="pb-4 form-control @error('image2') is-invalid @enderror" name="product_icon" onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])">
                                            @error('image2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mt-3">
                                            <img id="blah2" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea name="tm" class="form-control">@if($product_menus->product_text != null){!! $product_menus->product_text !!}@endif</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                <form action="{{url('edit/service/menu')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$service_menus->id}}">
                    <div class="card-header bg-warning text-white">
                        <div class="row">
                            <div class="col-lg-6">
                                <b>Service Menu</b>
                            </div>
                            <div class="col-lg-6 text-right">
                                <input type="submit" value="Update" class="btn btn-light btn-sm rounded text-warning">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5">
                                <b>Previous Image:</b>
                                @if($service_menus->service_image != null)
                                    <img src="{{url($service_menus->service_image)}}" class="img-fluid w-50">
                                @endif

                                <div class="form-group">
                                    <label for="image">Your Image :</label>
                                    <input type="file" id="image" class="pb-4 form-control" name="service_image" onchange="document.getElementById('blah3').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                                <div class="form-group mt-3">
                                    <img id="blah3" class="img-fluid w-50">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <b>Previous Icon:</b>
                                        @if($service_menus->service_icon != null)
                                            <img src="{{url($service_menus->service_icon)}}" class="img-fluid w-50">
                                        @endif

                                        <div class="form-group">
                                            <label for="image2">Your Icon :</label>
                                            <input type="file" id="image2" class="pb-4 form-control" name="service_icon" onchange="document.getElementById('blah4').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mt-3">
                                            <img id="blah4" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea name="tm" class="form-control">@if($service_menus->service_text != null){!! $service_menus->service_text !!}@endif</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">
                <form action="{{url('edit/about/menu')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$about_menus->id}}">
                    <div class="card-header bg-info text-white">
                        <div class="row">
                            <div class="col-lg-6">
                                <b>About Menu</b>
                            </div>
                            <div class="col-lg-6 text-right">
                                <input type="submit" value="Update" class="btn btn-light btn-sm rounded text-info">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5">
                                <b>Previous Image:</b>
                                @if($about_menus->about_image != null)
                                    <img src="{{url($about_menus->about_image)}}" class="img-fluid w-50">
                                @endif

                                <div class="form-group">
                                    <label for="image">Your Image :</label>
                                    <input type="file" id="image" class="pb-4 form-control" name="about_image" onchange="document.getElementById('blah5').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                                <div class="form-group mt-3">
                                    <img id="blah5" class="img-fluid w-50">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <b>Previous Icon:</b>
                                        @if($about_menus->about_icon != null)
                                            <img src="{{url($about_menus->about_icon)}}" class="img-fluid w-50">
                                        @endif

                                        <div class="form-group">
                                            <label for="image2">Your Icon :</label>
                                            <input type="file" id="image2" class="pb-4 form-control" name="about_icon" onchange="document.getElementById('blah6').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mt-3">
                                            <img id="blah6" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea name="tm" class="form-control">@if($about_menus->about_text != null){!! $about_menus->about_text !!}@endif</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('footer_js')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
    var editor_config = {
      path_absolute : "",
      selector: "textarea[name=tm]",
      plugins: [
        "link image"
      ],
      relative_urls: false,
      height: 129,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + route_prefix + '?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
    };

    tinymce.init(editor_config);
  </script>
@endsection
