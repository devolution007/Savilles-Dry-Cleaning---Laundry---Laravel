<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<!-- Mirrored from themesbrand.com/Savilles Dry Cleaners/html/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 May 2023 15:05:30 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Savilles Dry Cleaners - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.ico') }}">

    <!-- jsvectormap css -->
    <link href="{{ asset('public/assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="{{ asset('public/assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{ asset('public/assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('public/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('public/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('public/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="index-2.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('public/assets/images/logo-sm.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('public/assets/images/logo-dark.png') }}" alt="" height="17">
                                </span>
                            </a>

                            <a href="index-2.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('public/assets/images/logo-sm.png') }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('public/assets/images/logo-light.png') }}" alt="" height="17">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                    </div>

                    <div class="d-flex align-items-center">
                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user" src="{{ asset('public/assets/images/users/avatar-1.jpg') }}" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ucfirst(auth()->user()->name)}}</span>
                                        <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Founder</span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <h6 class="dropdown-header">Welcome {{ucfirst(auth()->user()->name)}}!</h6>
                                <a class="dropdown-item" href="{{route('admin.profile.edit')}}"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('admin.logout')}}" onClick="event.preventDefault();document.getElementById('logout').submit()"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                                <form action="{{route('admin.logout')}}" method="POST" id="logout">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index-2.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('public/assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('public/assets/images/logo-dark.png') }}" alt="" height="17">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index-2.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('public/assets/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('public/front/images/logo-white.svg') }}" alt="" height="40">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/dashboard*') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                                <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->is('admin/pages*') ? 'active' : '' }}" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                                <i class="ri-file-list-3-line"></i> <span data-key="t-apps">Pages</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarApps">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.pages.index') }}" class="nav-link {{ request()->is('admin/pages') ? 'active' : '' }}" data-key="t-calendar"> List Pages </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.pages.create') }}" class="nav-link {{ request()->is('admin/pages/create') ? 'active' : '' }}" data-key="t-chat"> Add Page </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->is('admin/areas*') ? 'active' : '' }}" href="#sidebarAreas" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                                <i class="ri-map-pin-2-line"></i> <span data-key="t-apps">Areas</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarAreas">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.areas.index') }}" class="nav-link {{ request()->is('admin/areas') ? 'active' : '' }}" data-key="t-calendar"> List Areas </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.areas.create') }}" class="nav-link {{ request()->is('admin/areas/create') ? 'active' : '' }}" data-key="t-chat"> Add Area </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->is('admin/users*') ? 'active' : '' }}" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                                <i class="ri-account-circle-line"></i> <span data-key="t-apps">Users</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarApps">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.user.index') }}" class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}" data-key="t-calendar"> List Users </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.user.create') }}" class="nav-link {{ request()->is('admin/users/create') ? 'active' : '' }}" data-key="t-chat"> Add User </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->is('admin/post-code*') ? 'active' : '' }}" href="#postCodes" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="postCodes">
                                <i class="ri-file-list-3-line"></i> <span data-key="t-apps">Post Codes</span>
                            </a>
                            <div class="collapse menu-dropdown" id="postCodes">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.post_code.index') }}" class="nav-link {{ request()->is('admin/post-code') ? 'active' : '' }}" data-key="t-calendar"> List Post Codes </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.post_code.create') }}" class="nav-link {{ request()->is('admin/post-code/create') ? 'active' : '' }}" data-key="t-chat"> Add Post Code </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->is('admin/section*') ? 'active' : '' }}" href="#sections" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sections">
                                <i class="ri-file-list-line"></i> <span data-key="t-apps">Sections</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sections">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.section.index') }}" class="nav-link {{ request()->is('admin/section') ? 'active' : '' }}" data-key="t-calendar"> List Sections </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.section.create') }}" class="nav-link {{ request()->is('admin/section/create') ? 'active' : '' }}" data-key="t-chat"> Add Section </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->is('admin/timing*') ? 'active' : '' }}" href="#timings" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="timings">
                                <i class=" ri-time-line"></i> <span data-key="t-apps">Timings</span>
                            </a>
                            <div class="collapse menu-dropdown" id="timings">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.timing.index') }}" class="nav-link {{ request()->is('admin/timing') ? 'active' : '' }}" data-key="t-calendar"> List Timings </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.timing.create') }}" class="nav-link {{ request()->is('admin/timing/create') ? 'active' : '' }}" data-key="t-chat"> Add Timing </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->is('admin/category*') ? 'active' : '' }}" href="#categories" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="categories">
                                <i class="ri-article-fill"></i> <span data-key="t-apps">Categories</span>
                            </a>
                            <div class="collapse menu-dropdown" id="categories">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.category.index') }}" class="nav-link {{ request()->is('admin/category') ? 'active' : '' }}" data-key="t-calendar"> List Categories </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.category.create') }}" class="nav-link {{ request()->is('admin/users/category') ? 'active' : '' }}" data-key="t-chat"> Add Category </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->is('admin/service*') ? 'active' : '' }}" href="#services" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="services">
                                <i class="ri-clipboard-fill"></i> <span data-key="t-apps">Services</span>
                            </a>
                            <div class="collapse menu-dropdown" id="services">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.service.index') }}" class="nav-link {{ request()->is('admin/service') ? 'active' : '' }}" data-key="t-calendar"> List Categories </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.service.create') }}" class="nav-link {{ request()->is('admin/service/create') ? 'active' : '' }}" data-key="t-chat"> Add Category </a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->is('admin/orders') ? 'active' : '' }}" href="{{ route('admin.orders') }}">
                                <i class="ri-file-list-fill"></i> <span data-key="t-apps">Orders</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/customers*') ? 'active' : '' }}" href="{{ route('admin.customer.index') }}">
                                <i class="ri-user-3-line"></i> <span data-key="t-dashboards">Customer</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/daysoff*') ? 'active' : '' }}" href="{{ route('admin.offdays.index') }}">
                                <i class="ri-checkbox-multiple-fill "></i> <span data-key="t-dashboards">Days off</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/switch*') ? 'active' : '' }}" href="{{ route('admin.switch.index') }}">
                                <i class="ri-time-line"></i> <span data-key="t-dashboards">Switch Timings</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link menu-link {{ request()->is('admin/service*') ? 'active' : '' }}" href="#settings" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="services">
                                <i class="ri-settings-3-fill"></i> <span data-key="t-apps">Setting</span>
                            </a>
                            <div class="collapse menu-dropdown" id="settings">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.setting.footer') }}" class="nav-link {{ request()->is('admin/setting/footer') ? 'active' : '' }}" data-key="t-chat">Footer</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.setting.list_catagory') }}" class="nav-link {{ request()->is('admin/setting/list-catagory') ? 'active' : '' }}" data-key="t-chat"> List Footer Main Catagory </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.setting.list_sub_catagory') }}" class="nav-link {{ request()->is('admin/setting/list-sub-catagory') ? 'active' : '' }}" data-key="t-chat"> List Footer Sub Catagory </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{route('admin.order.print.today')}}">
                                <i class="ri-file-list-fill"></i> 
                                <span data-key="t-apps">Print Order</span>
                            </a>
                        </li>
                        <!--<li class="nav-item">-->
                        <!--    <form action="{{route('admin.print.order')}}" method="POST" id="printOrderForm">-->
                        <!--        @csrf-->
                        <!--        <input type="date" hidden name="date" value="{{date('Y-m-d',strtotime('+1 day'))}}" />-->
                        <!--        <input type="text" hidden name="status" value="uncompleted" />-->
                        <!--        <a class="nav-link menu-link" href="#" onclick="document.getElementById('printOrderForm').submit(); return false;">-->
                        <!--            <i class="ri-file-list-fill"></i> -->
                        <!--            <span data-key="t-apps">Print Order</span>-->
                        <!--        </a>-->
                        <!--    </form>-->
                        <!--</li>-->
                        
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>
        @yield('content')
    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <!-- JAVASCRIPT -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{ asset('public/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('public/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('public/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/jsvectormap/maps/world-merc.js') }}"></script>
    <script src="{{ asset('public/assets/libs/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>
    <script src="{{ asset('public/assets/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @stack('scripts')
    @if(session()->has('success'))
    @if(session()->get('success'))
    <script>
        toastr.success("{{ session()->get('message') }}");
    </script>
    <!-- @else(!session()->get('success'))
	<script>
		toastr.error("{{session()->get('message')}}");
	</script> -->
    @endif
    @endif
    @if(session()->has('error'))
    @if(session()->get('error'))
    <script>
        toastr.error("{{session()->get('message')}}");
    </script>
    @endif
    @endif
</body>

</html>
