<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('keywords')
    @yield('descripton')
    <link rel="canonical" href="@yield('canonical_url')">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Savilles Dry Cleaners">
    <link rel="icon" type="image/x-icon" href="{{ asset('public/front/images/favicon.ico') }}" />
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet"
    type="text/css" />
    <link rel="stylesheet" href="{{ asset('public/front/css/app.css') }}">
</head>
<body>
    <div class="sticky-icon-2">
        <a href="https://wa.me/+447862214917?text=Hi,%20I%20have%20a%20question.%20Let's%20chat%20on%20WhatsApp!" target="_blank">
            <img src="{{ asset('public/whatsapp.png') }}" alt="WhatsApp" style="width: 50px;">
        </a>
    </div>
    <nav class="bg-primary py-5 md:py-4 border-b border-white/10 custom-header">
        <div class="container">
            <div class="flex items-center -mx-2 sm:-mx-4">
                <div class="flex-initial md:w-auto lg:hidden px-2 sm:px-4">
                    <button id="showMenu" class="align-middle">
                        <img src="{{ asset('public/front/images/icons/bars.svg') }}">
                    </button>
                </div>
                <div class="flex-initial px-2 sm:px-4">
                    <a href="{{ route('home') }}" class="block">
                        <img alt="Savilles Icon" src="{{ asset('public/front/images/logo-white.svg') }}"
                        class="main-logo-img w-auto h-auto sm:max-h-10 md:max-h-12 lg:max-h-14">
                    </a>
                </div>
                <div class="flex-initial ml-auto hidden lg:block px-2 sm:px-4">
                    @include('inc.navLinks')
                </div>
                <div class="flex-initial ml-auto px-2 sm:px-4">
                    <div class="flex flex-wrap items-center ml-auto nav-buttons justify-end">
                        @if (!auth()->check())
                        <div class="md:pl-6">
                            <a
                            class="hover:cursor-pointer  flex   items-center gap-2 rounded-2xl trigger text-white mx-5 trigger-modal-signup sm:text-base text-xs">
                            Login
                        </a>
                    </div>
                    <div class="md:pl-6">
                        <a href="{{ route('checkout') }}" class="btn-nav trigger-modal-signup trigger"
                        data-id="">Book Now</a>
                    </div>
                    @else
                    <div class="md:pl-6">
                        <a href="{{ route('account') }}" class="text-white mx-5">My Account</a>
                    </div>
                    <div class="md:pl-6">
                        <a href="javascript:void(0)" onclick="logout()" class="text-white mx-5">Logout</a>
                    </div>
                    <div class="md:pl-6">
                        <a href="{{ route('checkout') }}" class="btn-nav">Book Now</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="mobile-bg bg-black/50 fixed top-0 left-0 w-full h-full min-h-screen z-40 hidden"></div>
<div class="mobile-menu fixed bg-white top-0 -left-full w-[calc(100%_-_4rem)] max-w-xs h-full min-h-screen" style="z-index: 100">
    <div class="mobile-menu-inner">
        <div class="mobile-menu-top bg-primary px-4 pt-3 pb-5">
            <div class="mobile-close text-right mb-4">
                <button class="align-middle inline-block">
                    <img src="{{ asset('public/front/images/mobile/close.svg') }}" class="w-5">
                </button>
            </div>
            <div class="mobile-top-inner text-center">
                <img src="{{ asset('public/front/images/logo-white.svg') }}" class="px-6 mb-5">
                <a href="{{ route('checkout') }}" class="btn btn-secondary">Book Now</a>
            </div>
        </div>
        <div class="mobile-menu-bottom px-6 py-5">
            <div class="mobile-menu-nav">
                @include('inc.navLinks')
            </div>
            <div class="mobile-menu-social text-center mt-8">
            </div>
        </div>
    </div>
</div>
@yield('body')
<footer
class="footer bg-white md:bg-primary pt-6 pb-0 md:pt-20 md:pb-14 mt-auto {{ request()->routeIs('service', 'checkout.*') ? 'pt-0 skip-bottom md:mb-0' : '' }}">
<div class="footer-top pb-4 md:pb-0">
    <div class="container">
        <div class="footer-logo mb-3 md:hidden">
            <img class="w-auto max-h-8" alt="Savilles Icon" src="{{ asset('public/front/images/logo.png') }}">
        </div>
        <div class="flex flex-wrap -mx-4">
            <div class="flex-initial w-full md:w-2/5 lg:w-4/12 px-4 mb-6 md:mb-0">
                <div class="footer-info">
                    <div class="footer-logo mb-3 hidden md:block">
                        <img class="w-auto max-h-14" alt="Savilles Icon"
                        src="{{ asset('public/assets/images/logo/' . setting()->logo) }}">
                    </div>
                    <p class="text-xs md:text-sm lg:text-base text-primary md:text-white mb-0 md:mb-5 lg:mb-8">
                        {{ setting()->footer_info }}
                    </p>
                    <div class="hidden md:block">
                        {{-- @include('inc.call')
                        <br> --}}
                        @include('inc.socials')
                    </div>
                </div>
            </div>
            @foreach (sitemaps() as $category)
            <div class="flex-initial w-full md:w-1/5 ml-auto px-4 mb-6 md:mb-0">
                <div class="footer-widget">
                    <h4>{{ $category->catagory_name }}</h4>
                    <ul>
                        @foreach ($category->subcategories as $subcategory)
                        <li><a href="{{ $subcategory->url }}">{{ $subcategory->sub_cat_name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="footer-top bg-primary py-3 md:hidden">
        <div class="container">
            <div class="flex flex-wrap justify-between">
                <div class="left">
                    @include('inc.call')
                </div>
                <div class="right">
                    @include('inc.socials')
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="modal" id="show-login">
    <div class="modal-content login-modal">
        <div class="flex flex-col">
            <div class="flex justify-end items-center px-6 mt-3  sm:px-3 sm:">
                <span class="close-button"><i class="fa-regular fa-circle-xmark  fa-2x"></i></span>
            </div>
            <form class="w-full rounded pb-9 mb-4" id="login">
                @csrf
                <div class="text-center login-modal-logo">
                    <img class=" inline-block h-full text-black"
                    src="{{ asset('public/front/images/logo-big.svg') }}" alt="Saville">
                </div>
                <div class="mb-4  ">
                    <input type="text" name="email" placeholder="Email"
                    class="form-control bg-light font-mon" value="">
                </div>
                <div class="mb-6">
                    <input type="Password" name="password" placeholder="Password"
                    class="font-mon form-control bg-gray-100" value="">

                </div>

                <div class="mt-2" style="margin-top: 23px; text-align: center;">
                    <a href="{{ route('forgot_password') }}" style="" class="ml-1 font-bold text-primary hover:underline dark:text-blue-500 font-mon trigger-modal-signup">
                        Forgot Password?
                    </a>
                </div>

                <div class="flex items-center justify-between mt-2">
                    <button type="submit"
                    class=" w-full btn btn-secondary hover:scale-1000 details-button">Login</button>
                </div>
                <div class="justify-center message text-center mt-3"></div>
                <div class=" text-sm font-medium text-gray-500 dark:text-gray-400">
                    <p class="text-center mt-2"><a
                        class="ml-1 text-center font-bold text-primary
                        hover:underline dark:text-blue-500 font-mon trigger-modal-signup"
                        data-id="show-signup">Sign Up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal" id="show-signup">
        <div class="modal-content">
            <div class="flex flex-col">
                <div class="flex justify-end items-center px-6 mt-3  sm:px-3 sm:">
                    <span class="close-modal"><i class="fa-regular fa-circle-xmark  fa-2x"></i></span>
                </div>
                <div id="signupuser">
                    <form class="w-full rounded pb-9 mb-4" id="signup" method="POST"
                    action="">
                    @csrf
                    <div class="text-center login-modal-logo">
                        <img class="inline-block h-full text-black"
                        src="{{ asset('public/front/images/logo-big.svg') }}" alt="Saville">
                    </div>
                    <div class="mb-4">
                        <input type="text" name="name" id="name" placeholder="Please Enter Your Name"
                        class="form-control bg-light font-mon">
                    </div>
                    <div class="mb-4">
                        <input type="text" name="email" id="email"
                        placeholder="Please Enter Your Email" class="form-control bg-light font-mon">
                    </div>
                    <div class="mb-4">
                        <input type="Password" name="password" placeholder="Password"
                        class="font-mon form-control bg-gray-100" id="password">
                    </div>
                    <div class="mb-4"><span id="optsuccess" style="color:green;"></span></div>
                    <div class="mb-4"><span id="opterror" style="color:red;"></span></div>
                    <div class="flex items-center justify-between">
                        <button type="submit" id="signup-submit"
                        class="w-full btn btn-secondary hover:scale-1000 details-button">Signup</button>
                    </div>
                </form>
            </div>
            <div id="verifyuser" style="display: none;">
                <form class="w-full rounded pb-9 mb-4" id="verifyuserotp" method="POST"
                action="">
                @csrf
                <div class="text-center">
                    <img class="inline-block h-full text-black"
                    src="{{ asset('public/front/images/logo-big.svg') }}" alt="Saville">
                </div>
                <div class="mb-4">
                    <input type="text" name="otp" placeholder="OTP"
                    class="font-mon form-control bg-gray-100" id="otp">
                </div>
                <div class="mb-4"><span id="optverifysuccess" style="color:green;"></span></div>
                <div class="mb-4"><span id="optverifyerror" style="color:red;"></span></div>
                <div class="flex items-center justify-between">
                    <button type="submit" id="signup-submit"
                    class="w-full btn btn-secondary hover:scale-1000 details-button">Verify</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<div class="modal width-30 hidden" id="logout">
    <div class="modal-content  custom_width hidden ">
        <div class="flex py-4 px-10   flex-col gap-4">
            <h1 class="  text-center lg:text-4xl md:text-2xl text-xl font-semibold text-primary pl-2">Logout</h1>
            <p class="text-5xl    text-center"><img style="width:10%; margin: auto;"
                src="{{ asset('public/images/sad-emoji.png') }}"></p>
                <p class="text-center text-2xl ">Are you sure you want</p>
                <p class="text-center text-2xl">to Logout?</p>
                <div class="flex px-4 gap-4 ">
                    <button class=" close-modal  btn  btn-secondary w-1/2    py-2 px-4 rounded-full">
                        No
                    </button>
                    <button onclick="logout()" class=" btn  btn-secondary   py-2 px-4 w-1/2  rounded-full">
                        Yes
                    </button>
                    <form action="{{ route('logout') }}" method="POST" id="logoutform">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('logout') }}" method="POST" id="logout">
        @csrf
    </form>
    <script type="text/javascript" src="{{ asset('public/front/js/app.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('public/front/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/front/js/scrollbooster.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script type="text/javascript" src="{{ asset('public/front/js/script.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/js/apple-pay.js') }}"></script>
    <script>
        var login_url = "{{ route('login_proceed') }}";
        var signup_url = "{{ route('signup') }}";
        var home_url = "{{ route('home') }}";
        var checkout_url = "{{ route('checkout') }}";
        var verifyOtp = "{{ route('verifyOTP') }}";
    </script>
    @include('layouts.cookie')
    <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @if (Session('info'))
    <script>
        toastr.info('{{ Session('info') }}')
    </script>
    @endif
    @if (Session('success'))
    <script>
        toastr.success('{{ Session('success') }}')
    </script>
    @endif
    @if (Session('error'))
    <script>
        toastr.error('{{ Session('error') }}')
    </script>
    @endif
    @yield('scripts')
</body>
</html>