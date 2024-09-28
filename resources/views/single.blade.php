@extends('layouts.master')

@section('title', $section->name . ' - Savilles')
@section('keywords')
<meta name="keywords" content="{{$section->keywords}}">
@endsection

@section('body')

   
    <section class="wrapper-services" id="single">
        <div class="sidebar"> 
            @include('inc.services')
        </div>
        <div class="services-content py-4 md:py-6 lg:py-12">
            <div class="container"> 
                <div class="service-single"> 
                    <div class="cf-back !mb-1 sm:!mb-2 lg:!mb-4">
                        <a href="{{ route('services') }}">
                            <img alt="arrow back" class="pb-0.5" src="{{ asset('public/front/images/icons/back.svg') }}">
                        </a>
                        <h4>Service List</h4>
                    </div>

                    <div class="flex flex-wrap items-center gap-4">
                        <div class="flex-1">
                            <div class="sing-title">
                                <h2>{{ $section->name }}</h2>
                                <p>{{ $section->description }}</p>



                                <div class="services-block-tags !mb-0">
                                    <ul>
                                        @foreach ($section->tags as $item)
                                            <li><span>{{ $item->name }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="flex-initial w-[72px] md:hidden">
                            <img src="{{ asset($section->icon->icon) }}">
                        </div>
                    </div>

                    <div class="tabs">
                        
                        <div class="tabs_header">
                            <ul>
                                @if (count($services) > 0)
                                    <li class="active" data-target="pricelist">
                                        <span>Pricelist</span>
                                    </li>
                                @endif                               
                                   {{-- <li data-target="details">
                                        <span>Service Details</span>
                                    </li>     --}}                           
                            </ul>
                        </div>
                        
                        <div class="tabs_body">
                            @if (count($services) > 0)
                                <div class="tabs_item active" data-value="pricelist">
                                    <div class="panels">
                                        <div class="panels_header">
                                            <ul id="categories">
                                               @foreach($categories as $category)
                                                        <li data-target="{{$category->id}}" class="@if($selectedCategory->id == $category->id) active @endif service-item" data-id="{{$category->id}}">
                                                            <span>{{$category->name}}</span>
                                                        </li>                                                        
                                                @endforeach                                                      
                                            </ul> 
                                        </div>
                                        <div class="panels_body">                                          
                                            <div class="panels_item active" data-value="1">
                                                <div class="prc-list" id="serviceItems">                                                   
                                                    @foreach($services as $service)
                                                    <div class="prc-item">                                                      
                                                        <div class="left">
                                                            <h4>{{$service->title}}</h4>
                                                            <h5>{{$service->description}}</h5>
                                                        </div>
                                                        <div class="right">
                                                            <p>&#163;{{$service->price}}</p>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <input hidden name="section_id" id="secitonId" value="{{$section->id}}" />
                            <input hidden name="_tokenn" id="token" value="{{csrf_token()}}" />
                            <div class="tabs_item" data-value="details">
                                <div class="details-list">
                                    @if(!empty($section->service_overview))
                                    <div class="details-item">
                                        <div class="details-heading">                                            
                                            <img src="{{asset('public/front/images/details/info.png')}}" height="50px" width="50px">
                                            <h4>Service Overview</h4>
                                        </div>
                                        <p>{{$section->service_overview}}</p>
                                    </div>
                                    @endif
                                    @if(!empty($section->suitable_for))
                                    <div class="details-item">
                                        <div class="details-heading">                                            
                                        <img src="{{asset('public/front/images/details/check.png')}}" height="50px" width="50px">
                                            <h4>Suitable For</h4>
                                        </div>
                                        <p>{{$section->suitable_for}}</p>
                                    </div>
                                    @endif
                                    @if(!empty($section->not_include))
                                    <div class="details-item">
                                        <div class="details-heading">                                            
                                        <img src="{{asset('public/front/images/details/banned.png')}}" height="50px" width="50px">
                                            <h4>Do not Include</h4>
                                        </div>
                                        <p>{{$section->not_include}}</p>
                                    </div>
                                    @endif
                                    @if(!empty($section->prepare_collection))
                                    <div class="details-item">
                                        <div class="details-heading">                                            
                                        <img src="{{asset('public/front/images/details/car.png')}}" height="50px" width="50px">
                                            <h4>How To Prepare For Collection</h4>
                                        </div>
                                        <p>{{$section->prepare_collection}}</p>
                                    </div>
                                    @endif
                                    @if(!empty($section->items_back))
                                    <div class="details-item">
                                        <div class="details-heading">                                            
                                        <img src="{{asset('public/front/images/details/hanger.png')}}" height="50px" width="50px">
                                            <h4>How You'll Recieve The Items Back</h4>
                                        </div>
                                        <p>{{$section->items_back}}</p>
                                    </div>
                                    @endif                                  


                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <div class="hidden md:block">
        @include('inc.cta')
    </div>

    <div class="md:hidden">
        <div class="floating-menu">
            <a href="{{ route('checkout') }}" class="btn btn-secondary hover:scale-110">
                <img src="{{ asset('public/front/images/icons/logo-button.svg') }}" class="inline-block w-4 lg:w-11 mr-2">
                <span>Schedule Your Pickup</span>
            </a>
        </div>
    </div>
@endsection
