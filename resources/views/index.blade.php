@extends('layouts.master')

@section('title', 'Savilles - Dry Cleaning & Laundry')

@section('body')
    <style>
        .review {
            font-family: sans-serif;
        }

        .review .avatar {
            float: left;
            width: 75px;
            padding-right: 20px;
            padding-bottom: 10px;
        }
        
        .testi-google-icon{
            position: absolute;
            top: -43px;  
            right: 0;
            left: 0;
            z-index: 1;
            margin: auto;
            width: fit-content;
            width: -moz-fit-content;
            padding: 14px;
            background: #fff;
            border-radius: 100%;
        }
        
        .testi-google-icon a {
            display: block;
            max-width: max-content;
        }
        
        .testi-google-icon img{
            height: 50px;
            width: 50px;
            max-width: 50px;
        }
        .section-title {
        text-align: center; /* Center align the content by default */
    }

    @media only screen and (max-width: 768px) {
        /* Media query for screens smaller than 768px (typically mobile devices) */
        .section-title {
            text-align: center; /* Center align the content in mobile view */
        }
    }
    </style>
    <section id="hero">
        <div class="bg-primary bg-[length:0%] md:bg-cover bg-no-repeat bg-right-top"
            style="background-image: url('{{ asset('public/front/images/bg/home.jpg') }}');">
            <div class="container">
                <div class="flex flex-wrap">
                    <div class="flex-initial w-full md:w-1/2">
                        <div
                            class="relative bg-primary py-8 md:py-16 lg:py-24 md:pr-4 lg:pr-8 before:content-[''] before:bg-primary before:block before:absolute before:top-0 before:-left-full before:w-full before:h-full">
                            <div class="text-center md:text-left">
                                <div class="hero-title mb-3 md:mb-5 lg:mb-10">
                                    <h1
                                        class="font-cf font-bold text-white text-3xl leading-[34px] md:text-[54px] md:leading-[60px] lg:text-6xl lg:leading-[70px] xl:text-[80px] xl:leading-[92px] uppercase mb-2 md:mb-4">
                                        <span>Dry Cleaning</span>
                                        <span class="block md:inline-block">&</span>
                                        <span>Laundry</span>
                                    </h1>
                                    <h5 class="text-white/70 text-sm md:text-xl lg:text-2xl">
                                        <span class="block md:inline-block">Collected and delivered</span>
                                        <span>to your door</span>
                                    </h5>
                                </div>
                                {{-- @if (!auth()->check())
                                    <a href="javascript:void(0)" class="btn btn-secondary trigger-modal"
                                        data-id="show-login">Schedule Your Pickup</a>
                                @else --}}
                                    <a href="{{ route('checkout') }}" class="btn btn-secondary">Schedule Your Pickup</a>
                                {{-- @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="bg-white bg-[length:0%] lg:bg-cover bg-no-repeat bg-left py-8 md:py-12 lg:py-16"
            style="background-image: url('{{ asset('public/front/images/bg/linear.svg') }}');">
            <div class="container">
                <div class="section-title">
                    <h5>Dry Cleaning & Laundry</h5>
                    <h2>Our Services</h2>
                </div>
                <div class="-mr-4 overflow-hidden lg:mr-0">
                    <div class="section-body mobile-viewport">
                        <div id="homeServices" class="flex lg:flex-wrap -mx-2 lg:-mx-4 mobile-draggable">
                            @forelse($sections as $section)
                                <div class="service-col">
                                    <div class="service-box">
                                        <img src="{{ asset('public/front/' . $section->icon->icon) }}">
                                        <h4>{{ $section->name }}</h4>
                                        <p>{{ $section->description }}</p>
                                    </div>
                                </div>
                            @empty
                                <div class="service-col">
                                    <div class="service-box">
                                        <h4>No Services Available </h4>
                                        <p>Services will be added soon</p>
                                    </div>
                                </div>
                            @endforelse
                            {{--  <div class="service-col">
                                <div class="service-box">
                                    <img src="{{ asset('public/front/images/services/shirt.png') }}">
                                    <h4>Shirt Laundry</h4>
                                    <p>Work Shirts Pre Treated, Washed & Pressed for a Crisp Finish.</p>
                                </div>
                            </div>
                            <div class="service-col">
                                <div class="service-box">
                                    <img src="{{ asset('public/front/images/services/bed.png') }}">
                                    <h4>Bed Linen</h4>
                                    <p>Hotel Quality Finished Bed Linen.</p>
                                </div>
                            </div>
                            <div class="service-col">
                                <div class="service-box">
                                    <img src="{{ asset('public/front/images/services/scissors.png') }}">
                                    <h4>Alterations & Repairs</h4>
                                    <p>Trouser Shortening, Dress Alterations, Jackets & More.</p>
                                </div>
                            </div>
                            --}}
                        </div>
                    </div>
                </div>
                <div class="section-footer">
                    <a href="{{ route('services') }}" class="btn btn-lg btn-secondary">See Full Pricing</a>
                </div>
            </div>
        </div>
    </section>

    <section class="container how-it-work mt-8 mb-8">
        <div class="row">
            <div class="section-title ">
                <h5 class="section-heading">DRY CLEANING & LAUNDRY</h5>
                <h2 class="section-heading">How it works</h2>
            </div>
        </div>

        <!-- <div class="row">
                        <div class="column">
                          <div class="card">
                            <div class="icon-wrapper">
                            <i class="fa-solid fa-clock"></i>
                            </div>
                            <h3>Schedule your collection</h3>
                            <p>Plan your day with ease. Choose a collection and delivery time at your convenience.</p>
                          </div>
                        </div>
                        <div class="column">
                          <div class="card">
                            <div class="icon-wrapper">
                            <i class="fa-solid fa-box-open"></i>
                            </div>
                            <h3>Pack your laundry</h3>
                            <p>Pack your items in a disposable bag. Use one bag per service. Our driver will transfer them to reusable Laundryheap bags which you can keep for your next order.  consequatur necessitatibus eaque.
                            </p>
                          </div>
                        </div>
                        <div class="column">
                          <div class="card">
                            <div class="icon-wrapper">
                            <i class="fa-solid fa-truck-fast"></i>
                            </div>
                            <h3>Wait for our driver</h3>
                            <p>You’ll receive a notification when our driver is nearby. They will collect your bags and take them to your local cleaning facility.</p>
                          </div>
                        </div>
                        <div class="column">
                          <div class="card">
                            <div class="icon-wrapper">
                            <i class="fa-solid fa-couch"></i>
                            </div>
                            <h3>Relax while we take care of your laundry</h3>
                            <p>Your local partner facility will clean your items with utmost care. Our driver will then deliver them back to you whenever you like. You’re in full control of your delivery and can always reschedule if not at home. </p>
                          </div>
                        </div>
                      </div> -->


        <div class="row howitworks">

            <div class="column howitworks-cols howitworks-col-1">
                <div class="my-card-custom">
                    <div class="image-wrapper">
                        <img src="https://savillesdrycleaners.co.uk/newsite/public/front/images/howitworks/asset6.png"
                            alt="">
                    </div>
                    <div class="content-box-howit">
                        <h3>Book</h3>
                        <p>Choose a convenient date, time, and location for pickup.</p>
                    </div>
                </div>
            </div>

            <span class="border-how"><img
                    src="https://savillesdrycleaners.co.uk/newsite/public/front/images/howitworks/arrow.png"
                    alt=""></span>

            <div class="column howitworks-cols howitworks-col-2">
                <div class="my-card-custom">
                    <div class="image-wrapper">
                        <img src="https://savillesdrycleaners.co.uk/newsite/public/front/images/howitworks/asset3.png"
                            alt="">
                    </div>
                    <div class="content-box-howit">
                        <h3>Collect</h3>
                        <p>We will collect your bag, clean your garments in house and invoice you.</p>
                    </div>
                </div>
            </div>

            <span class="border-how"><img
                    src="https://savillesdrycleaners.co.uk/newsite/public/front/images/howitworks/arrow.png"
                    alt=""></span>

            <div class="column howitworks-cols howitworks-col-3">
                <div class="my-card-custom">
                    <div class="image-wrapper">
                        <img src="https://savillesdrycleaners.co.uk/newsite/public/front/images/howitworks/asset5.png"
                            alt="">
                    </div>
                    <div class="content-box-howit">
                        <h3>Deliver</h3>
                        <p>Your cleaning will be delivered back on the scheduled date & time.</p>
                    </div>
                </div>
            </div>

        </div>




    </section>

    <section class="container testimonials-section mb-8 mt-8">
        <div class="row"> 
            <div class="section-title ">
                <h5 class="section-heading">DRY CLEANING & LAUNDRY</h5>
                <h2 class="section-heading">Testimonials</h2>
            </div> 
        </div>
        <div class="testimonial-content owl-carousel">
            <!-- Single Testimonial -->
            @if(isset($reviews) && count($reviews) > 0)
                @foreach($reviews as $key => $values)
                    <div class="single-testimonial">
                        <div class="round-1 round"></div>
                        <div class="round-2 round"></div>
                        <div class="testi-google-icon"><a href="https://www.google.com/search?q=Savilles+Dry+Cleaners+Cobham" href="_blank"><img src="https://static-00.iconduck.com/assets.00/google-icon-2048x2048-czn3g8x8.png"></a></div>
                        <p>{{ $values['text'] }} </p>
                        <div class="client-info">
                            <div class="client-video">
                                <img src="{{ $values['profile_photo_url'] }}">
                            </div>
                            <div class="client-details">
                                <h6>{{ $values['author_name'] }}</h6>
                                <!--<span>SHIRT SERVICE</span>-->
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- Modal -->
        {{-- <div class="cookie d-none" id="exampleModal"
            style=" bottom: 0;z-index: 1000;padding: 25px;
                        background-color: black;position: fixed; width: 100%;">
            <div class="col-md-12" style=";bottom: 0px;z-index: 999;;width: 100%;">
                <h4 style="color: white;">Cookie Policy </h4>
                <p style="color: white;"> Our website uses cookies to improve your experience. Learn more: <a
                        style="color: orangered;" href="">cookies policy</a></p>
                <button type="submit" class="btn login" onclick="onSaveClick()">Accept</button>
                <style>
                    .login {
                        text-align: center;
                        background: orangered;
                        color: white;
                    }
                </style>
            </div>
        </div> --}}



    </section>
    

    {{-- <div class="cookie" id="exampleModal" style="bottom: 0; z-index: 1000; padding: 25px; background-color: black; position: fixed; width: 100%; display: none;">
        <div class="col-md-12" style="bottom: 0px; z-index: 999; width: 100%;">
            <h4 style="color: white;">Cookie Policy</h4>
            <p style="color: white;">Our website uses cookies to improve your experience. Learn more: <a style="color: orangered;" href="https://yourwebsite.com/cookies-policy">cookies policy</a></p>
            <button type="button" class="btn login" onclick="onSaveClick()">Accept</button>
            <button type="button" class="btn close" onclick="closeCookie()" aria-label="Close" style="color: white; background: transparent; border: none; margin-left: 10px;">Close</button>
        </div>
    </div>
    
    <style>
        .login {
            text-align: center;
            background: orangered;
            color: white;
            margin-top: 10px;
        }
    
        .close {
            text-align: center;
        }
    </style>
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    <script>
        $(document).ready(function() {
         
            if (!getCookieConsent()) {
                $('#exampleModal').show();
            }
        });
    
        function onSaveClick() {
            setCookieConsent(true);
            closeModal();
        }
    
        function closeCookie() {
            setCookieConsent(false);
            closeModal();
        }
    
        function closeModal() {
            $('#exampleModal').hide();
        }
    
        function getCookieConsent() {
           
            return localStorage.getItem('cookieConsent') === 'true';
        }
    
        function setCookieConsent(consent) {
            localStorage.setItem('cookieConsent', consent);
        }
    </script> --}}

   
    
    @include('inc.cta')
@endsection
