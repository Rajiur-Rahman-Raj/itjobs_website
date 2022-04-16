@extends('frontend.master')

@section('content')
    <div class="container-fluid pt-3 mt-3">
        <div class="row">
            <div class="col-lg-1 col-md-1">

            </div>
            <div class="col-lg-10 col-md-10">
                <div class="card mt-3">
                    <div class="card-header text-white" style="background:#FF4742">
                        <b><i class="fas fa-briefcase"></i> Post a New Job</b>
                    </div>
                    <div class="card-body" style="background:#E0E0E0">
                        <form action="{{url('add/new/job')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Job Category <span class="text-danger">*</span></label>
                                        <select class="form-control" name="category_id" required>
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Select Divsision <span class="text-danger">*</span></label>
                                        <select class="form-control" name="country_id" required>
                                            <option value="">Select Divsision</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{$division->id}}">{{$division->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="title">Select District <span class="text-danger">*</span></label>
                                        <select name="city" class="form-control" required>

                                        </select>
                                    </div>
                                </div>

                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Job Position <span class="text-danger">*</span></label>
                                        <input type="text" name="job_name" class="form-control" placeholder="Job Title Here" required>
                                        <p style="font-size: 12px; text-align:justify;color:gray; padding-left: 3px;">Please specify as single job position like "Marketing Manager" or "Node JS Developer", not a sentence like "Looking for PM / Biz Dev / Manager". If posting multiple roles, please create multiple job posts. A job post is limited to a single job. We only allow real jobs, absolutely no MLM-type courses "learn how to work online" please.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Company Name <span class="text-danger">*</span></label>
                                        <input type="text" name="company_name" class="form-control" placeholder="Company Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Company Email <span class="text-danger">*</span></label>
                                        <input type="email" name="company_email" class="form-control" placeholder="Company Email" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Annual Base Salary <span class="text-danger">*</span></label>
                                        <input type="text" name="salary" class="form-control" placeholder="Annual Base Salary" required>
                                        <p style="font-size: 12px; text-align:justify;color:gray; padding-left: 3px;">Write it preferrably in Taka PER YEAR as a single number (without other text), like 75000. If you pay hourly, or monthly, please convert to annual equivalent yourself (hourly * 8h * 22d * 12mo, monthly * 12mo).</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Company Website URL <span class="text-danger">*</span></label>
                                        <input type="text" name="website_link" class="form-control" placeholder="Company Website Link" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <label>Job Context <span class="text-danger">*</span></label>
                                    <textarea name="details" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label>Job Responsibilities  :</label>
                                    <textarea name="respons" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label>Educational and Additional Requirements :</label>
                                    <textarea name="requirements" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <label>What we offer :</label>
                                    <textarea name="apply" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="row pt-4">
                                <div class="col-md-6">
                                    <label>Tags (Maximum 6) :</label>
                                    <input type="text" class="form-control" placeholder="e.g. Java, Python, PHP" name="tags">
                                    <p style="font-size: 12px; text-align:justify;color:gray; padding-left: 3px;">Use tags like industry and tech stack, and separate multiple tags by comma. Maximum 6 Tags will be shown in Front End</p>
                                </div>
                                <div class="col-md-3">
                                    <label>Deadline :</label>
                                    <input type="date" name="deadline" class="form-control">
                                    <p style="font-size: 12px; text-align:justify;color:gray; padding-left: 3px;">After passing the deadline this job will no more be shown to the audiance</p>
                                </div>
                                <div class="col-md-3">
                                    <label style="display:block;margin-bottom:15px"><u>Remote Job :</u></label>
                                    <input type="radio" name="remote" value="yes"> Yes &nbsp;&nbsp;&nbsp; <input type="radio" name="remote" value="no"> No
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Company Logo</label>
                                        <input type="file" id="image" class="form-control" name="company_logo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Extra Feaures :</label><br>
                                        1. Show My Company Logo <span class="text-warning"><i class="far fa-star"></i></span> Beside My Post (+100 Taka) <br>
                                        <input id="company_logo_5" type="radio" name="logo" value="100" style="margin-bottom:15px;" onclick="showImage();"> Yes
                                        <input id="company_logo_0" type="radio" name="logo" value="0" style="margin-bottom:15px;" onclick="hideImage();" checked> No

                                        <script>
                                            function showImage(){
                                                document.getElementById('logo_div').style.display ='block';
                                                document.getElementById('default_logo_div').style.display ='none';
                                            }
                                            function hideImage(){
                                                document.getElementById('logo_div').style.display = 'none';
                                                document.getElementById('default_logo_div').style.display ='block';
                                            }
                                        </script>

                                        <br>

                                        2. Highlight My Post by <mark> Yellow Background </mark>  (+50 Taka)<br>
                                        <input id="company_background_7" type="radio" id="" name="normal_background" value="50" style="margin-bottom:15px;" onclick="showBgcolor();"> Yes
                                        <input id="company_background_0" type="radio" name="normal_background" value="0" style="margin-bottom:15px;" onclick="hideBgcolor();" checked> No

                                        <script>
                                            function showBgcolor(){
                                                document.getElementById('preview_div').style.background ='#f4f490';
                                            }
                                            function hideBgcolor(){
                                                document.getElementById('preview_div').style.background = 'white';
                                            }
                                        </script>

                                        <br>

                                        3. Use My Companies Brand Color (+50 Taka) <input type="color" id="chose_color" name="favcolor" onclick="showDivcolor();"><br>
                                        <input id="company_background_10" type="radio" name="special_background" value="50" style="margin-bottom:15px;" onclick="showDivcolor();"> Yes
                                        <input id="company_background_01" type="radio" name="special_background" value="0" style="margin-bottom:15px;" onclick="hideDivcolor();" checked> No

                                        <script>
                                            function showDivcolor(){
                                                $value = document.getElementById("chose_color").value;
                                                document.getElementById('preview_div').style.background = $value;
                                            }
                                            function hideDivcolor(){
                                                document.getElementById('preview_div').style.background = 'white';
                                            }
                                        </script>

                                        <br>

                                        4. Sticky My Post for 1 weak (+200 Taka)<br>
                                        <input id="post_waek_20" type="radio" name="week" value="200" style="margin-bottom:15px;" onclick="showWeak();"> Yes
                                        <input id="post_waek_0" type="radio" name="week" value="0" style="margin-bottom:15px;" onclick="hideWeak();" checked> No

                                        <script>
                                             function showWeak(){
                                                document.getElementById('week').style.display ='block';
                                                document.getElementById('month').style.display = 'none';
                                            }
                                            function hideWeak(){
                                                document.getElementById('week').style.display = 'none';
                                            }
                                        </script>

                                        <br>

                                        5. Sticky My Post for 1 month (+500 Taka)<br>
                                        <input id="post_month_50" type="radio" name="month" value="500" style="margin-bottom:12px;" onclick="showMonth();"> Yes
                                        <input id="post_month_0" type="radio" name="month" value="0" style="margin-bottom:12px;" onclick="hideMonth();" checked> No

                                        <script>
                                            function showMonth(){
                                               document.getElementById('month').style.display ='block';
                                               document.getElementById('week').style.display = 'none';
                                           }
                                            function hideMonth(){
                                               document.getElementById('month').style.display = 'none';
                                           }
                                       </script>

                                    </div>
                                </div>
                            </div>


                            <p>Preview:</p>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="preview" id="preview_div" style="background-color:transparent;padding-top: 10px;padding-bottom: 10px;">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div id="default_logo_div" style="display:block;text-align:center">
                                                    {{--  <img src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/flower-icon.png" alt=""  width="80px">  --}}
                                                    <img src="{{url('/')}}/frontend_assets/images/Briefcase-icon.png" alt=""  width="80px">
                                                </div>
                                                <div id="logo_div" style="display:none;text-align:center">
                                                    <img id="blah" width="85">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <h5 style="color:grey">Job Title</h5>
                                                <p>Company Name <br>Date & Location</p>
                                            </div>
                                            <div class="col-lg-3">
                                                <span style="line-height: 40px !important;padding:3px 5px; border: 1px solid gray;color:gray; border-radius: 4px; margin-right:3px;">Tags</span>
                                                <span style="line-height: 40px !important;padding:3px 5px; border: 1px solid gray;color:gray; border-radius: 4px; margin-right:3px;">Tags</span>
                                                <span style="line-height: 40px !important;padding:3px 5px; border: 1px solid gray;color:gray; border-radius: 4px; margin-right:3px;">Tags</span>
                                                <span style="line-height: 40px !important;padding:3px 5px; border: 1px solid gray;color:gray; border-radius: 4px; margin-right:3px;">Tags</span>
                                                <span style="line-height: 40px !important;padding:3px 5px; border: 1px solid gray;color:gray; border-radius: 4px; margin-right:3px;">Tags</span>
                                                <span style="line-height: 40px !important;padding:3px 5px; border: 1px solid gray;color:gray; border-radius: 4px; margin-right:3px;">Tags</span>
                                            </div>
                                            <div class="col-lg-1">
                                                <div id="week" class="pt-4" style="display:none">
                                                    <b style="font-size:18px;"><i class="fas fa-arrow-up"></i> 7</b>
                                                </div>
                                                <div id="month" class="pt-4" style="display:none">
                                                    <b><i class="fas fa-level-up-alt"></i> 30</b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            {{--  Cost and Submit section  --}}
                            <div class="row">
                                <div class="col-lg-5 text-center">

                                    <div class="text-dark pt-3">
                                        <b style="font-weight: 600; font-size: 24px;">Total Cost :</b> <input type="text" name="total_cost" id="total_cost" style="border-style:none;background:transparent;color:darkblue;font-weight: 700;font-size: 25px;width: 60px" value="0" readonly> <b style="font-weight: 600; font-size: 24px;">Taka</b>
                                    </div>
                                </div>
                                <div class="col-lg-7 pt-4 text-center">
                                    <input type="submit" value="Go to Payment" class="btn btn-success rounded mr-3">
                                    <input type="reset" value="Clear All" class="btn btn-danger rounded">
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1">

            </div>


        </div>
    </div>
@endsection

@section('footer_js')

<script>
    $('#company_logo_5').change(
        function(){
            if ($(this).is(':checked')) {
                $value = parseFloat(document.getElementById("company_logo_5").value);
                $total_cost = parseFloat(document.getElementById("total_cost").value);

                $total = $total_cost+$value;
                $tt = parseFloat($total);
                $('#total_cost').val($tt);
            }
        }
    );
</script>

<script>
    $('#company_logo_0').change(
        function(){
            if ($(this).is(':checked')) {
                $total_cost = parseFloat(document.getElementById("total_cost").value);

                // if($total_cost > 100){
                    $total = $total_cost-100;
                    $tt = parseFloat($total);
                    $('#total_cost').val($tt);
                // }
            }
        }
    );
</script>

<script>
    $('#company_background_7').change(
        function(){
            if ($(this).is(':checked')) {
                $value = parseFloat(document.getElementById("company_background_7").value);
                $total_cost = parseFloat(document.getElementById("total_cost").value);

                $total = $total_cost+$value;
                $tt = parseFloat($total);
                $('#total_cost').val($tt);
            }
        }
    );
</script>

<script>
    $('#company_background_0').change(
        function(){
            if ($(this).is(':checked')) {
                $total_cost = parseFloat(document.getElementById("total_cost").value);
                $total = $total_cost-50;
                $tt = parseFloat($total);
                $('#total_cost').val($tt);
            }
        }
    );
</script>

<script>
    $('#company_background_10').change(
        function(){
            if ($(this).is(':checked')) {
                $value = parseFloat(document.getElementById("company_background_10").value);
                $total_cost = parseFloat(document.getElementById("total_cost").value);

                $total = $total_cost+$value;
                $tt = parseFloat($total);
                $('#total_cost').val($tt);
            }
        }
    );
</script>

<script>
    $('#company_background_01').change(
        function(){
            if ($(this).is(':checked')) {
                $total_cost = parseFloat(document.getElementById("total_cost").value);
                $total = $total_cost-50;
                $tt = parseFloat($total);
                $('#total_cost').val($tt);
            }
        }
    );
</script>

<script>
    $('#post_waek_20').change(
        function(){
            if ($(this).is(':checked')) {
                $value = parseFloat(document.getElementById("post_waek_20").value);
                $total_cost = parseFloat(document.getElementById("total_cost").value);
                $total = $total_cost+$value;
                $tt = parseFloat($total);
                $('#total_cost').val($tt);
            }
        }
    );
</script>

<script>
    $('#post_waek_0').change(
        function(){
            if ($(this).is(':checked')) {
                $total_cost = parseFloat(document.getElementById("total_cost").value);
                $total = $total_cost-200;
                $tt = parseFloat($total);
                $('#total_cost').val($tt);
            }
        }
    );
</script>

<script>
    $('#post_month_50').change(
        function(){
            if ($(this).is(':checked')) {
                $value = parseFloat(document.getElementById("post_month_50").value);
                $total_cost = parseFloat(document.getElementById("total_cost").value);

                $total = $total_cost+$value;
                $tt = parseFloat($total);
                $('#total_cost').val($tt);
            }
        }
    );
</script>

<script>
    $('#post_month_0').change(
        function(){
            if ($(this).is(':checked')) {
                $total_cost = parseFloat(document.getElementById("total_cost").value);
                $total = $total_cost-500;
                $tt = parseFloat($total);
                $('#total_cost').val($tt);
            }
        }
    );
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="country_id"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '/get/city/by/country/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="city"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="city"]').empty();
            }
        });
    });
</script>


<script>
var route_prefix = "/filemanager";
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
<script>
$('textarea[name=details]').ckeditor({
    height: 140,
    filebrowserImageBrowseUrl: route_prefix + '?type=Images',
    filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: route_prefix + '?type=Files',
    filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
});
</script>

<script>
$('textarea[name=respons]').ckeditor({
    height: 140,
    filebrowserImageBrowseUrl: route_prefix + '?type=Images',
    filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: route_prefix + '?type=Files',
    filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
});
</script>

<script>
$('textarea[name=requirements]').ckeditor({
    height: 140,
    filebrowserImageBrowseUrl: route_prefix + '?type=Images',
    filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: route_prefix + '?type=Files',
    filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
});
</script>

<script>
$('textarea[name=apply]').ckeditor({
    height: 140,
    filebrowserImageBrowseUrl: route_prefix + '?type=Images',
    filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: route_prefix + '?type=Files',
    filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
});
</script>

@endsection
