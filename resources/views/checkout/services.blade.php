@extends('layouts.master')

@section('title', 'Checkout: Services - Savilles')

@section('body')
    <div class="progress shadow shadow-gray-200">
        <div class="progress-bar" style="width: 60%;"></div>
    </div>
    <section id="checkout-select-services">
        <div class="pt-5 pb-6 md:pt-10 md:pb-12">
            <div class="container">
                <div class="flex flex-wrap -mx-4">
                    <div class="flex-initial w-full md:w-7/12 lg:w-8/12 px-4">
                        <div class="checkout-services-form">

                            <div class="cf-back">
                                <a href="{{ route('checkout.get.step02') }}">
                                    <img alt="arrow back" class="pb-0.5" src="{{ asset('public/front/images/icons/back.svg') }}">
                                </a>
                                <h4>What Services Do You Need?</h4>
                            </div>

                            @if ($errors->any())
                                <div class="alert-danger">
                                    <ul class="list-disc pl-5">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                            <form action="{{ route('checkout.post.step03') }}" method="POST">
                                @csrf
                                <div class="checkout-services-list grid grid-cols-2 lg:grid-cols-1 gap-3 md:gap-6">

                                    @if (count($sections))
                                        @foreach ($sections as $section)
                                            <div class="selc-item @if(!empty($services) && in_array($section->id,$services)) active @endif">
                                                 <input type="checkbox" name="services[]" value="{{ $section->id }}"
                                                    data-price="{{ $section->services_sum_price }}" @if(!empty($services) && in_array($section->id,$services)) checked @endif> 
                                                <div class="selc-inner">
                                                    <div class="selc-img">
                                                        <img src="{{ asset('public/front/'.$section->icon->icon)}}">
                                                    </div>
                                                    <div class="selc-content">
                                                        <h4>{{ $section->name }}</h4>                                                        
                                                            <h5>Service Details</h5>
                                                            <div class="services-block-tags">
                                                                <ul>
                                                                    @foreach ($section->tags as $tag)
                                                                        <li><span>{{ $tag->name }}</span></li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="selc-button">
                                                        <div class="action @if(!empty($services) && in_array($section->id,$services)) remove @endif">@if(!empty($services) && in_array($section->id,$services)) Remove @else Add @endif</div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>

                                {{-- <div class="bg-primary px-6 py-3 rounded-md mt-6">
                                    <div class="flex flex-wrap items-center justify-between">
                                        <div class="left">
                                            <h5 class="text-white font-semibold text-lg">Total</h5>
                                        </div>
                                        <div class="right">
                                            <p id="totalService" class="text-white font-normal text-lg">&#163;<span>0.00</span></p>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="cf-button mt-8 hidden md:block">
                                    <button type="submit" class="btn btn-secondary">Next Step</button>
                                </div>

                                <div class="md:hidden">
                                    <div class="floating-menu">
                                        <button type="submit" class="btn btn-secondary hover:scale-110">Next Step</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="flex-initial w-full md:w-5/12 lg:w-4/12 px-4 mt-6 md:mt-0">
                        @include('inc.checkout')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
