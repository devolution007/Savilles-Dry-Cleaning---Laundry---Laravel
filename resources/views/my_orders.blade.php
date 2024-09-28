@extends('layouts.master')

@section('title', 'My Orders - Savilles')

@section('body')


<!-- Orders Display  -->


<section class="mt-8 container">


    <div class="flex justify-between  mb-4 sm:py-8  sm:px-10 ">

        <div class="flex flex-col justify-center items-center">
            <h1 class="font-bold text-lg  sm:text-2xl  md:text-3xl">My Orders</h1>

        </div>
        <div class="flex sm:gap-6  md:gap-5  lg:gap-8   gap-3">
            <!-- <button class="border rounded py-3 px-3 outline-none border-none bg-transparent bg-third">My Account</button> -->
            <a href="{{route('account')}}"><button class="font-bold py-2 px-4 text-xs sm:px-8 h-full  border border-none my-account-btn rounded bg-third text-primary font-mon text-bold">
                    My Account
                </button>
            </a>
            <!-- <a href="{{ //route('logout') }}" onClick="event.preventDefault();document.getElementById('logout').submit()">
                <button class="rounded logout-btn text-xs sm:text-3xl text-white bg-primary sm:py-3 py-3 border px-4 sm:px-10 outline-none border-none font-mon text-bold">Logout</button>
            </a> -->


            <a href="#" class="trigger-modal" data-id="logout">
                <button class="rounded logout-btn text-xs sm:text-3xl text-white bg-primary sm:py-3 py-3 border px-4 sm:px-10 outline-none border-none font-mon text-bold">Logout</button>
            </a>
            <!-- Logout modal -->
            <div class="modal width-30 hidden" id="logout">
                <div class="modal-content  custom_width hidden ">
                    <div class="flex py-4 px-10   flex-col gap-4">
                        <h1 class="  text-center lg:text-4xl md:text-2xl text-xl font-semibold text-primary pl-2">Logout</h1>
                        <p class="text-5xl    text-center"><img style="width:10%; margin: auto;" src="{{ asset('public/images/sad-emoji.png') }}"></p>
                        <p class="text-center text-2xl ">Are you sure you want</p>
                        <p class="text-center text-2xl">to Logout?</p>
                        <div class="flex px-4 gap-4 ">
                            <button class=" close-modal  btn  btn-secondary w-1/2    py-2 px-4 rounded-full">
                                No
                            </button>
                            <button onclick="logout()" class=" btn  btn-secondary   py-2 px-4 w-1/2  rounded-full">
                                Yes
                            </button> 
                            <form action="{{route('logout')}}" method="POST" id="logoutform">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal end -->

            <form action="{{route('logout')}}" method="POST" id="logout">
                @csrf
            </form>
        </div>

    </div>
    <div class="px-10 font-semibold text-sm">
        @if(count($orders) == 0)
        <p>You Don't Have Any Orders. <a href="{{route('checkout')}}"><span class="text-secondary">Book Now</span></a></p>
        @endif
    </div>
    <section class="flex width flex-col mt-5 pl-0">
        <div class="container w-full pl-0">
            <div class="lg:px-20 sm:px-10 md:px-20">
                @if(count($orders) > 0)
                @foreach($orders as $order)
                <div class="mb-7 mt-3 border-0 form-control">
                    <h1 class="text-2xl sm:text-3xl text-secondary font-mon font-semibold">{{ date("d.m.Y", strtotime($order->created_at)) }}</h1>
                    <p class="font-mono font-semibold mt-2 text-xs sm:text-xs">
                        
                       @if(count($order->sections) > 0)
                        @foreach($order->sections as $section)                       
                           {{$section->sectionName->name.', '}}
                        @endforeach
                        @endif
                    </p>
                    <p class="font-mono font-semibold mt-2 text-xs sm:text-xs">Dry Cleaning Bed Linen, Alterations & Repairs</p>
                    @if($order->status == 'pending')
                        <button type="button" class="sm:mt-4 mt-2 rounded-lg text-xs sm:text-3xl text-white bg-warning sm:py-3 border px-7 py-2 sm:px-12 outline-none border-none  font-mon text-bold" style="background: #ffc107 !important;">Pending</button>
                    @elseif($order->status == 'ongoing')
                        <button class="sm:mt-4 mt-2 rounded-lg text-xs sm:text-3xl text-white bg-dark sm:py-3 border px-7 py-2 sm:px-12 outline-none border-none  font-mon text-bold" style="background: #0dcaf0 !important">On Going</button>
                    @elseif($order->status == 'ontheway')
                        <button class="sm:mt-4 mt-2 rounded-lg text-xs sm:text-3xl text-white bg-secondary sm:py-3 border px-7 py-2 sm:px-12 outline-none border-none  font-mon text-bold" style="background: #6c757d !important;">On The Way</button>
                    @elseif($order->status == 'delivered')
                        <button class="sm:mt-4 mt-2 rounded-lg text-xs sm:text-3xl text-white bg-info sm:py-3 border px-7 py-2 sm:px-12 outline-none border-none  font-mon text-bold" style="background: #212529 !important">Delivered</button>
                    @elseif($order->status == 'completed')
                        <button class="sm:mt-4 mt-2 rounded-lg text-xs sm:text-3xl text-white bg-primary sm:py-3 border px-7 py-2 sm:px-12 outline-none border-none  font-mon text-bold" style="background: #0d6efd !important;">Complete</button>
                    @endif
                    
                    <div class="text-right pr-10">
                        <p class="font-bold font-mon text-2xl sm:text-2xl text-primary">&#163;{{$order->amount}}</p>
                    </div>
                </div>
                @endforeach
                @endif
               
    </section>
</section>

<!-- Servives  -->






<section id="services">
    <div class="md:py-16">
        <div class="container">
            <div class="services-list">

                @if(count($sections) && count($orders) == 0)
                <div class="flex flex-col justify-center items-left">
                    <h2 class="font-bold text-lg  sm:text-1xl  md:text-2xl">Services do you need?</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-7 md:gap-y-8">
                    @foreach ($sections as $section)
                    <div class="service-block">
                        <div class="service-block-inner">
                            <div class="services-block-top">
                                <img src="{{ asset('public/front/'.$section->icon->icon ?? null) }}">
                            </div>
                            <div class="services-block-bottom">
                                <div class="services-block-title">
                                    <h4>{{ $section->name }}</h4>
                                    <p>{{ $section->description }}</p>
                                </div>

                                @if(count($section->tags) > 0)
                                <div class="services-block-tags">
                                    <ul>
                                        @foreach ($section->tags as $tag)
                                        <li><span>{{ $tag->name }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <div class="services-block-button">
                                    <a href="{{route('services.show',$section->slug)}}" class="btn btn-primary">
                                        <span>Info & Pricing</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

            </div>
        </div>
    </div>
</section>

<div>
</div>




@endsection
<script>
    function logout(){
        $("#logoutform").submit();
    }
</script>