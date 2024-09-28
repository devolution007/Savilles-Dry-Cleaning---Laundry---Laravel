@extends('layouts.master')

@section('title', 'Our Services - Savilles')

@section('body')
<section id="hero">
    <div class="bg-primary py-8 md:py-16 lg:py-24">
        <div class="container">
            <div class="page-title text-center">
                <h1 class="font-cf font-bold text-white text-3xl leading-[34px] md:text-[54px] md:leading-[60px] lg:text-6xl lg:leading-[70px] xl:text-[80px] xl:leading-[92px] mb-2 md:mb-4">
                    Cleaning Services</h1>
                <h5 class="text-white/70 text-xs sm:text-sm md:text-xl lg:text-2xl xl:text-2xl">Ihateironing provides an
                    extensive, ever-growing list of services.
                </h5>
            </div>
        </div>
    </div>
</section>

<div id="info">
    <div class="bg-secondary/10 pt-5 pb-3 md:pt-8 md:pb-6 lg:pt-12 lg:pb-9">
        <div class="container">
            <div class="flex flex-wrap justify-center -mx-4">
                <div class="w-full md:w-1/3 xl:w-1/4 px-4">
                    <div class="serv-info">
                        <div class="serv-info-icon">
                            <img src="{{ asset('public/front/images/service-info/1.png') }}">
                        </div>
                        <div class="serv-info-text">
                            <p>Free 24 Delivery</p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 xl:w-1/4 px-4">
                    <div class="serv-info">
                        <div class="serv-info-icon">
                            <img src="{{ asset('public/front/images/service-info/2.png') }}">
                        </div>
                        <div class="serv-info-text">
                            <p>Minimum Order &#163;20</p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 xl:w-1/4 px-4">
                    <div class="serv-info">
                        <div class="serv-info-icon">
                            <img src="{{ asset('public/front/images/service-info/3.png') }}">
                        </div>
                        <div class="serv-info-text">
                            <p>5$ Cancellation Fee</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Orders Display  -->


<section class="mt-4">


    <div class="flex justify-between px-10 mb-4 sm:py-8 sm:px-10">

        <div class="flex flex-col justify-center items-center">
            <h1 class="font-bold text-lg sm:text-2xl md:text-3xl  ">My Orders</h1>
        </div>
        <div class="flex sm:gap-6 md:gap-5 lg:gap-8 gap-3">
            <!-- <button class="border rounded py-3 px-3 outline-none border-none bg-transparent bg-third">My Account</button> -->
            <button class="font-bold py-2 px-4 text-xs sm:px-8  border border-none  rounded bg-third text-primary font-mon text-bold">
                My Account
            </button>
            <button class=" rounded text-xs    sm:text-3xl text-white bg-primary  sm:py-3  py-3 border px-4 sm:px-10 outline-none border-none  font-mon text-bold">Logout</button>
        </div>

    </div>
    <p class="px-10  font-semibold text-sm">You Don't Have Any Orders. <span class="text-secondary">Book Now</span></p>

</section>




<!-- Orders Details  -->



<section class="flex width flex-col mt-5 pr-10">
    <div class="container w-full">
        <div class="lg:px-20 sm:px-10 md:px-20">
            <div class="mb-7 mt-3 border form-control">
                <h1 class=" text-2xl sm:text-3xl text-secondary font-mon font-semibold">07/01/2023</h1>
                <p class="font-mono font-semibold mt-2 text-xs sm:text-xs">Dry Cleaning,Bed Linen,Alterations & Repairs</p>
                <button class="sm:mt-4 mt-2 rounded text-xs sm:text-3xl text-white bg-secondary sm:py-3 border px-7 py-2 m:px-12 outline-none border-none font-mon text-bold">Pending</button>
                <div class="text-right pr-10">
                    <p class="font-bold  font-mon text-2xl  sm:text-2xl text-primary">&#163;100</p>
                </div>
            </div>
            <div class="lg:px-20 sm:px-10 md:px-20">
                <div class="mb-7 mt-3 border form-control ">
                    <h1 class="text-2xl sm:text-3xl text-secondary font-mon font-semibold">07/01/2023</h1>
                    <p class="font-mono font-semibold mt-2 text-xs sm:text-xs">Dry Cleaning,Bed Linen,Alterations & Repairs</p>
                    <button class="sm:mt-4 mt-2 rounded text-xs sm:text-3xl text-white bg-primary  sm:py-3  border px-7 py-2   sm:px-12 outline-none border-none  font-mon text-bold">Complete</button>
                    <div class="text-right pr-10">
                        <p class="font-bold  font-mon text-2xl  sm:text-2xl text-primary">&#163;100</p>
                    </div>
                </div>

            </div>
</section>













<!-- Servives  -->
<section id="services">
    <div class="md:py-16">
        <div class="container">
            <div class="services-list">


            </div>
        </div>
    </div>
</section>

<div>
</div>















@include('inc.cta')
@endsection