<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Job Post Panel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{url('/')}}/backend_assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{url('/')}}/backend_assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{url('/')}}/backend_assets/css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="{{url('/')}}/backend_assets/css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="{{url('/')}}/backend_assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{url('/')}}/backend_assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{url('/')}}/backend_assets/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{url('/')}}/backend_assets/img/icon1.png">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    @yield('header_css')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

</head>
  <body>


    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header  -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="{{url('/')}}/frontend_assets/images/scsl308.png" alt="Post Your Job in" class="img-fluid">
            <h2 class="h6 mb-3">
                @if(!Auth::guest())
                    @if(Auth::user()->name != null)
                        {{Auth::user()->name}}
                    @endif
                @else
                    SoftWhere
                @endif
            </h2>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="#" class="brand-small text-center"><strong class="text-primary">Jobs</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">
            @if(!Auth::guest())
              Control Panel
              @else
              {{-- Total Cost :
              <div class="text-white pl-3 pt-3 mr-2 mt-3" style="border:2px solid red">
                    <h3><input type="text" name="total_cost" id="total_cost" style="border-style:none;background:transparent;color: white;width:100%; margin-bottom: 5px;" value="100" readonly> Euro</h3>
              </div> --}}
            @endif
        </h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">
            @if(!Auth::guest())
                @if(Auth::user()->status == "user")
                    <li><a href="{{url('profile/view')}}"> <i class="far fa-user"></i> My Profile</a></li>
                    <li><a href="{{url('view/cv/for/jobs')}}"> <i class="far fa-file-alt"></i> View CV for jobs</a></li>
                @endif
                @if(Auth::user()->status == "admin")
                    <li><a href="{{url('job/category/page')}}"> <i class="fas fa-layer-group"></i> Job Category</a></li>
                    <li><a href="{{url('side/ad/page')}}"> <i class="far fa-newspaper"></i> Manage Ads</a></li>
                    <li><a href="{{url('free/job/post/page')}}"> <i class="fas fa-layer-group"></i> Free Job Post</a></li>
                    <li><a href="{{url('view/cv/for/jobs')}}"> <i class="far fa-file-alt"></i> View CV for jobs</a></li>
                    <li><a href="{{url('cv/backend/page')}}"> <i class="far fa-file-alt"></i> View All CV</a></li>
                    <li><a href="#exampledropdownDropdown2" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-briefcase"></i> Post a Job</a>
                        <ul id="exampledropdownDropdown2" class="collapse list-unstyled ">
                            <li><a href="{{url('add/job/page')}}"> Add New Jobs</a></li>
                            <li><a href="{{url('job/view/page')}}"> View All Jobs</a></li>
                        </ul>
                    </li>
                    <li><a href="#exampledropdownDropdown3" aria-expanded="false" data-toggle="collapse"> <i class="far fa-file"></i> Footer Page</a>
                        <ul id="exampledropdownDropdown3" class="collapse list-unstyled ">
                            <li><a href="{{url('terms/backend/page')}}"> Terms & Condition</a></li>
                            <li><a href="{{url('privacy/backend/page')}}"> Privacy Policy</a></li>
                            <li><a href="{{url('contact/backend/page')}}"> Contact Us</a></li>
                        </ul>
                    </li>
                @endif
            @else
            @endif
          </ul>
        </div>
      </div>
    </nav>
    <div class="page">
      <!-- navbar-->

      @if(!Auth::guest())
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="{{url('/home')}}" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><strong class="text-primary">Dashboard</strong></div></a></div>
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Notifications dropdown-->

                <!-- Log out-->
                @if(!Auth::guest())
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endif
                </ul>
            </div>
          </div>
        </nav>
      </header>
      @else

      @endif





      @yield('content')




      <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>ITJobsBD &copy; 2020</p>
                </div>
                <div class="col-sm-6 text-right">
                    <p>Developed By Decode Lab</p>
                  </div>
              </div>
            </div>
          </footer>
        </div>


        <!-- JavaScript files-->
        <script src="{{url('/')}}/backend_assets/vendor/jquery/jquery.min.js"></script>
        <script src="{{url('/')}}/backend_assets/vendor/popper.js/umd/popper.min.js"> </script>
        <script src="{{url('/')}}/backend_assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="{{url('/')}}/backend_assets/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
        <script src="{{url('/')}}/backend_assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
        <script src="{{url('/')}}/backend_assets/vendor/chart.js/Chart.min.js"></script>
        <script src="{{url('/')}}/backend_assets/vendor/jquery-validation/jquery.validate.min.js"></script>
        <script src="{{url('/')}}/backend_assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="{{url('/')}}/backend_assets/js/charts-home.js"></script>
        <!-- Main File-->
        <script src="{{url('/')}}/backend_assets/js/front.js"></script>
        <script src="//kit.fontawesome.com/c218529370.js"></script>


        @yield('footer_js')


        <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}


      </body>
    </html>
