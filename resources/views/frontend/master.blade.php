<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="{{url('/')}}/frontend_assets/images/preview.webp">
	<title>ITJobsBD</title>
	<link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,600,700,800|Fira+Sans:300,400,500,600,700,800,900|Lato:300,400,700,900|Open+Sans+Condensed:300,700|Open+Sans:400,600,700,800|Oswald:400,500,600,700|Raleway:300,400,500,600,700,800,900|Roboto:300,400,500,700,900|Rubik:400,500,700,900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Courgette&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{url('/')}}/frontend_assets/css/all.min.css">
	<link rel="stylesheet" href="{{url('/')}}/frontend_assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{url('/')}}/frontend_assets/css/animate.css">
	<link rel="stylesheet" href="{{url('/')}}/frontend_assets/css/slick.css">
    <link rel="stylesheet" href="{{url('/')}}/frontend_assets/css/style.css">
    <link rel="stylesheet" href="{{url('/')}}/frontend_assets/css/responsive.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-164972099-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-164972099-1');
    </script>


    @yield('header_css')
</head>

<body data-spy="scroll" data-target=".header" data-offset="150">

	<!--Preloader Start-->
	{{--  <div class="preloader">
		<div class="loader-classic">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>  --}}
	<!--Preloader End-->

	<!--header part start-->
	<section id="header">
		<div class="header wow bounceInDown" data-wow-duration="1.5s">
			<div class="container">
				<nav class="navbar navbar-expand-lg bg-transparent">
					{{--  <a class="navbar-brand" href="{{url('/')}}">
						<h1><i class="fas fa-briefcase"></i> SoftWhere</h1>
					</a>  --}}
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon">
                            <i class="fas fa-bars" style="color:white"></i>
                        </span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item home">
								<a class="nav-link active" href="{{url('/')}}">Home</a>
                            </li>
                            <li class="nav-item">
								<a class="nav-link" href="{{url('/add/job/page')}}">Post A Job</a>
                            </li>
                            <li class="nav-item">
								<a class="nav-link" href="{{url('/cv/maker/page')}}">CV Maker</a>
                            </li>
							{{-- <li class="nav-item">
								<a class="nav-link" href="about.html">Remote Jobs</a>
							</li> --}}
							{{-- <li class="nav-item">
								<a class="nav-link" href="#">Companies</a>
							</li> --}}
							{{-- <li class="nav-item">
								<a class="nav-link" href="{{url('/register')}}">Sign Up</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{url('/login')}}">Log In</a>
							</li> --}}
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</section>
    <!--header part end-->

    <div class="section">
		<div class="row">
			<div class="col-lg-12">
				<div class="banner" style="background-image:url({{url('/')}}/frontend_assets/images/banner1.jpg);">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="banner_text text-center">
                                    <h2><a href="{{url('/')}}" style="color:ghostwhite"><span>||</span> ITJobsBD <span>.</span></a></h2>
                                    <form action="{{url('search/by/Job/title')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="text" name="job_title" id="typed4">
                                        <button type="submit"><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>

    @yield('content')



<!--footer css start-->
<section>
    <div class="footer" style="background-image:url({{url('/')}}/frontend_assets/images/banner1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer_1">
                        <h1><span class="brand_name">||</span> ITJobsBD <span class="brand_name">.</span></h1>
                        <p>Jobs provides the best remote job service, for Companies, Job seekers and Recruiters.</p>


                        <span>©2020 Decode Lab. All rights reserved</span>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer_2">
                        <h5 class="pb-3"><b>Job Categories</b></h5>
                        <?php $job_categories = DB::table('job_categories')->take(5)->get(); ?>
                        <?php $job_remaining_categories = DB::table('job_categories')->get()->skip(5); ?>
                        <div class="row">
                            <div class="col-lg-4">
                                @foreach ($job_categories as $category)
                                    <a href="{{url('category/wise/jobs')}}/{{$category->id}}">{{$category->category_name}}</a>
                                @endforeach
                            </div>
                            <div class="col-lg-8">
                                @foreach ($job_remaining_categories as $category)
                                    <a href="{{url('category/wise/jobs')}}/{{$category->id}}">{{$category->category_name}}</a>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer_2">

                        <h5 class="pb-3"><b>Learn More</b></h5>
                        <a href="{{url('terms')}}">Terms & Conditions</a>
                        <a href="{{url('privacy')}}">Privacy policy</a>
                        <a href="{{url('contact')}}">Contact Us</a>

                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer_1">

                        <h5 class="pb-3"><b>Important Links</b></h5>
                        <a href="#">About</a>
                        <a href="#">Privacy</a>
                        <a href="#">policy</a>
                        <div class="footer_icon">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-skype"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>

                        {{-- <h5 class="pb-3"><b>Available Countries</b></h5>
                        @foreach ($countries as $country)
                            <a href="{{url('country/wise/jobs')}}/{{$country->id}}">{{$country->name}}</a>
                        @endforeach --}}

                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
<!--footer css end-->


	<!--Top Button Start-->
	<div class="top_btn wow bounceInRight">
		<i class="fas fa-arrow-up"></i>
	</div>
	<!--Top button End-->



	<script src="{{url('/')}}/frontend_assets/js/jquery-1.12.4.min.js"></script>
	<script src="{{url('/')}}/frontend_assets/js/popper.min.js"></script>
	<script src="{{url('/')}}/frontend_assets/js/bootstrap.min.js"></script>
	<script src="{{url('/')}}/frontend_assets/js/slick.min.js"></script>
	<script src="{{url('/')}}/frontend_assets/js/waypoints.min.js"></script>
	<script src="{{url('/')}}/frontend_assets/js/wow.min.js"></script>
    <script src="{{url('/')}}/frontend_assets/js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
    <script src="https://kit.fontawesome.com/c218529370.js"></script>

    <script>
          var typed4 = new Typed('#typed4', {
            strings: ['Web Developer','Software Engineer', 'Frontend Developer', 'Backend Developer'],
            typeSpeed: 20,
            backSpeed: 30,
            attr: 'placeholder',
            bindInputFocusEvents: true,
            loop: true,
            loopCount: Infinity,
        });
    </script>


    @yield('footer_js')

</body>

</html>
