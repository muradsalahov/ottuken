<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets_admin/images/favicon.png')}}">
    <!-- <link rel="stylesheet" href="{{asset('assets_admin/vendor/owl-carousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_admin/vendor/owl-carousel/css/owl.theme.default.min.css')}}">
    <link href="{{asset('assets_admin/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet"> -->
    <link href="{{asset('assets_admin/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets_admin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets_admin/vendor/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets_admin/vendor/select2/css/select2.min.css')}}">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="#" class="brand-logo">
                <img class="logo-abbr" src="{{asset('assets_admin/images/logo.png')}}" alt="">
                <img class="logo-compact" src="{{asset('assets_admin/images/logo-text.png')}}" alt="">
                <img class="brand-title" src="{{asset('assets/img/logo/ottuken_logo.png')}}" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <span class="ml-2">{{$usertype = Auth::user()->name}}</span>
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('profile.show') }}" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li id='home'><a href="{{url('/')}}" aria-expanded="false"><i class="fa fa-home"></i><span
                                class="nav-text">Home</span></a>
                    </li>
                    <li id='company'><a href="{{url('/admin_company')}}" aria-expanded="false"><i class="fa fa-building-o"></i><span
                                class="nav-text">Company</span></a>
                    </li>
                    <li id='category'><a href="{{url('/admin_category')}}" aria-expanded="false"><i class="fa fa-shopping-cart"></i><span
                                class="nav-text">Category</span></a>
                    </li>
                    <li id='sub_company'><a href="{{url('/admin_subcategory')}}" aria-expanded="false"><i class="fa fa-shopping-cart"></i><span
                                class="nav-text">Sub Category</span></a>
                    </li>
                    <li id='product'><a href="widget-basic.html" aria-expanded="false"><i class="fa fa-product-hunt"></i><span
                                class="nav-text">Product</span></a>
                    </li>
                    <li id='users'><a href="{{ url('/admin_users') }}" aria-expanded="false"><i class="fa fa-user"></i><span
                                class="nav-text">Users</span></a>
                    </li>
                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        