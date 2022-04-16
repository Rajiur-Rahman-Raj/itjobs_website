@extends('backend.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mt-3">
                <div class="card-header bg-success text-white rounded">
                    <b><i class="fas fa-layer-group"></i> Add New Job Category</b>
                </div>
                <div class="card-body">
                    <form action="{{url('add/new/job/category')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Category Name :<label>
                            <input type="text" class="form-control mt-2" name="category_name" placeholder="Category Name">
                        </div>
                        <input type="submit" class="btn btn-sm btn-success rounded" value="Add New Category">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mt-3">
                <div class="card-header bg-info rounded text-white">
                    <b>View All Category</b>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{$category->id}}</th>
                                <td><b>{{$category->category_name}}</b></td>
                                <td>
                                    {{-- <a href="javascript:void(0)" data-toggle="tooltip" data-id="{{$category->id}}" data-original-title="Edit" class="edit btn btn-info btn-sm rounded editProduct"><i class="far fa-edit"></i></a> --}}
                                    <a href="{{url('delete/job/category')}}/{{$category->id}}" class="btn btn-sm btn-danger rounded text-white ml-2"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>

            <div class="modal-body">
                <form id="productForm" name="productForm" class="form-horizontal">
                   <input type="hidden" name="product_id" id="product_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" required="">
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
        $.get("{{url('edit/job/category')}}" +'/' + product_id +'/edit', function (data) {
            $('#modelHeading').html("Edit Category Name");
            $('#saveBtn').val("edit-user");
            $('#ajaxModel').modal('show');
            $('#product_id').val(data.id);
            $('#name').val(data.category_name);
        })
     });

      $('#saveBtn').click(function (e) {
          e.preventDefault();
          $(this).html('Sending..');

          $.ajax({
            data: $('#productForm').serialize(),
            url: "{{ url('/') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {

                $('#productForm').trigger("reset");
                $('#ajaxModel').modal('hide');
                table.draw();

            },

            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
            }
        });
      });

    });

  </script>

@endsection
