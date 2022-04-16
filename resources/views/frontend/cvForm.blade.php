@extends('frontend.master')

@section('content')
    <div class="container-fluid pt-3 mt-3">
        <div class="row">
            <div class="col-lg-1 col-md-1">

            </div>
            <div class="col-lg-10 col-md-10">
                <div class="card mt-3">
                    <div class="card-header text-white" style="background:#283593">
                        <b><i class="far fa-file-alt"></i> Online CV Maker</b> - <span>Provide your information to get a professional CV</span>
                    </div>
                    <div class="card-body" style="background:#E0E0E0">
                        <form action="{{url('add/new/cv')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="title">Upload Your Image <span class="text-danger">*</span></label>
                                        <input type="file" name="image" id="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" class="form-control" required>
                                        <img id="blah" alt="" class="img-fluid">
                                        <p style="font-size: 13px; text-align:justify;color:#2d3436; padding-left: 3px;">Upload a professional potrait Image where your face is in focus.</p>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Your Profession :</label>
                                            <input type="text" name="profession" class="form-control" placeholder="Web Designer / Web Developer">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Contact <span class="text-danger">*</span></label>
                                                <input type="text" name="contact" class="form-control" placeholder="+8801*********" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" class="form-control" placeholder="example@exapmle.com" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Facebook Profile Link :</label>
                                                <input type="text" name="facebook_link" class="form-control" placeholder="https://facebook.com/profile/link">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Linkedin Profile Link :</label>
                                            <input type="text" name="linkedin_link" class="form-control" placeholder="https://linkedin.com/profile/link" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Area of Interest <span class="text-danger">*</span></label>
                                        <input type="text" name="position" class="form-control" placeholder="Job Positions that you think you are fit for" required>
                                        <p style="font-size: 13px; text-align:justify;color:#2d3436; padding-left: 3px;">Write the name of the position that you think you are capable of like "Backend Development using raw PHP or Laravel Framework" or "Front End Development using HTML5, CSS3, Bootstrap 4, JS & JQuery"</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Experiances (if any)</label>
                                        <textarea name="experiance" class="form-control"></textarea>
                                        <p style="font-size: 13px; text-align:justify;color:#2d3436; padding-left: 3px;">The way you write your experiances here will appear in your cv as same. So try to write the experiances in an organized way. Write company name in bold first then your position after that how long you served them and last write your main duty on that company. If you have multiple experiance the separate them by giving spcace between them.</p>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Your Projects (if any)</label>
                                        <textarea name="project" class="form-control"></textarea>
                                        <p style="font-size: 13px; text-align:justify;color:#2d3436; padding-left: 3px;">The way you write your projects here will appear in your cv as same. So try to write the project description in an organized way. Write Project Title in bold first then the language and database that you used to build that project after that the speciality of your project and last provide the live link if your project is in a live server. If you have multiple projects the separate them by giving spcace between them.</p>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Training (if any)</label>
                                        <textarea name="training" class="form-control"></textarea>
                                        <p style="font-size: 13px; text-align:justify;color:#2d3436; padding-left: 3px;">The way you write your training summery here will appear in your cv as same. So try to write the training details in an organized way. Write Training Name in bold first then the institute name from where you have trained after that your training period and ID. If you have multiple training the separate them by giving spcace between them.</p>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Eduaction <span class="text-danger">*</span></label>
                                        <textarea name="education" class="form-control"></textarea>
                                        <p style="font-size: 13px; text-align:justify;color:#2d3436; padding-left: 3px;">The way you write your education  here will appear in your cv as same. Write Name of Degree in bold first then the institute name after that your write your gpa or cgpa. Separate your educations by giving spcace between them.</p>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Reference <span class="text-danger">*</span></label>
                                        <textarea name="reference" class="form-control"></textarea>
                                        <p style="font-size: 13px; text-align:justify;color:#2d3436; padding-left: 3px;">Provide the information of a person as a reference. Write the name in bold first then his designation, after that write the company name and then contact information</p>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label><b>Select Your Level of CV</b><span class="text-danger">*</span></b></label><br>
                                        <input type="radio" name="level" value="mid" id="mid" style="cursor:pointer"> <label for="mid" style="cursor:pointer">Mid Level Content priced at 200 Taka only</label> [ You will immediately get your CV in email in pdf format ] <br>
                                        <input type="radio" name="level" value="pro" id="pro" style="cursor:pointer" checked="checked"> <label for="pro" style="cursor:pointer">Professional Content priced at 500 Taka only</label> [ You will get your CV in email in pdf and word format after it will be made by an IT Specialist ]
                                    </div>
                                </div>
                            </div>

                            <hr>

                            {{--  Cost and Submit section  --}}
                            <div class="row">
                                <div class="col-lg-5 text-center">

                                    <div class="text-dark pt-3">
                                        <b style="font-weight: 600; font-size: 24px;">Total Cost :</b> <input type="text" name="total_cost" id="total_cost" style="border-style:none;background:transparent;color:darkblue;font-weight: 700;font-size: 25px;width: 50px" value="500" readonly> <b style="font-weight: 600; font-size: 24px;">Taka</b>
                                    </div>
                                </div>
                                <div class="col-lg-7 pt-4 text-center">
                                    <input type="submit" value="Get a Preview and Submit" class="btn btn-success rounded mr-3">
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
    $('#mid').change(
        function(){
            if ($(this).is(':checked')) {
                $('#total_cost').val(200);
            }
        }
    );
</script>

<script>
    $('#pro').change(
        function(){
            if ($(this).is(':checked')) {
                $('#total_cost').val(500);
            }
        }
    );
</script>

<script>
    var route_prefix = "/filemanager";
</script>

<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>

<script>
$('textarea[name=experiance]').ckeditor({
    height: 140,
    filebrowserImageBrowseUrl: route_prefix + '?type=Images',
    filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: route_prefix + '?type=Files',
    filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
});
</script>

<script>
$('textarea[name=project]').ckeditor({
    height: 140,
    filebrowserImageBrowseUrl: route_prefix + '?type=Images',
    filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: route_prefix + '?type=Files',
    filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
});
</script>

<script>
$('textarea[name=training]').ckeditor({
    height: 140,
    filebrowserImageBrowseUrl: route_prefix + '?type=Images',
    filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: route_prefix + '?type=Files',
    filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
});
</script>

<script>
$('textarea[name=education]').ckeditor({
    height: 140,
    filebrowserImageBrowseUrl: route_prefix + '?type=Images',
    filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
    filebrowserBrowseUrl: route_prefix + '?type=Files',
    filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
});
</script>

<script>
    $('textarea[name=reference]').ckeditor({
        height: 140,
        filebrowserImageBrowseUrl: route_prefix + '?type=Images',
        filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: route_prefix + '?type=Files',
        filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
    });
</script>

@endsection
