@extends('layouts.master')

@section('title', 'Our Services - Savilles')

@section('body')
<section id="hero">
    <div class="bg-primary py-8 md:py-16 lg:py-24">
        <div class="container">
            <div class="page-title text-center">
                <h1 class="font-cf font-bold text-white text-3xl leading-[34px] md:text-[54px] md:leading-[60px] lg:text-6xl lg:leading-[70px] xl:text-[80px] xl:leading-[92px] mb-2 md:mb-4">
                    Cleaning Services</h1>
            </div>
        </div>
    </div>
</section>

<div id="info">
    <div class="bg-secondary/10 pt-5 pb-3 md:pt-8 md:pb-6 lg:pt-12 lg:pb-9">
        <div class="container">
            <div class="flex flex-wrap justify-center -mx-4">
                <div class="w-full md:w-1/3 xl:w-1/4 px-4">
                 
                        <div class="serv-info-icon">
                            <img src="{{ asset('public/front/images/service-info/6.png') }}">
                        </div>
                        <div class="serv-info-text">
                            <p class="serv-info-text-first-p">Free 24 Delivery</p>
                        </div>
                    </div> -->
                </div>
                <div class="w-full md:w-1/3 xl:w-1/4 px-4">
                    <div class="serv-info">
                        <div class="serv-info-icon">
                            <img src="{{ asset('public/front/images/service-info/7.png') }}">
                        </div>
                        <div class="serv-info-text">
                            <p>Minimum order &#163;25.00</p>
                        </div>
                    </div>
                </div>
                <!-- <div class="w-full md:w-1/3 xl:w-1/4 px-4">
                    <div class="serv-info">
                        <div class="serv-info-icon">
                            <img src="{{ asset('public/front/images/service-info/7.png') }}">
                        </div>
                        <div class="serv-info-text">
                            <p>5£ Cancellation Fee</p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>


<!-- Orders Display  -->



<!-- Servives  -->

</div>
<section id="services">
    <div class="md:py-16">
        <div class="container">
            <div class="services-list">

                @if (count($sections))
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



@include('inc.cta')
@endsection