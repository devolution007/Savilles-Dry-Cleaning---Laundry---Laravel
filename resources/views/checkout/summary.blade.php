@extends('layouts.master')

@section('title', 'Checkout: Summary - Savilles')

@section('body')
<div class="progress shadow shadow-gray-200">
    <div class="progress-bar" style="width: 100%;"></div>
</div>

<section id="checkout-summary">
    <div class="pt-5 pb-6 md:pt-10 md:pb-12 bg-white bg-cover bg-no-repeat bg-left" style="background-image: url('{{ asset('public/front/images/bg/linear.svg') }}');">
        <div class="container">
            <div class="flex flex-wrap -mx-4">
                <div class="flex-initial w-full md:w-8/12 px-4">
                    <div class="checkout-summary">

                        @if (Session::get('success'))
                        <div class="alert-success">{{ Session::get('success') }}</div>
                        @endif

                        <div class="cf-back">
                            {{-- <a href="#">
                                    <img alt="arrow back" class="pb-0.5" src="{{ asset('public/front/images/icons/back.svg') }}">
                            </a> --}}
                            <h4>Summary</h4>
                        </div>

                        @if (Session::get('danger'))
                        <div class="alert-danger">{{ Session::get('danger') }}</div>
                        @endif

                        <div class="summary-list space-y-4 md:space-y-8">

                            @if (isset($customer) && !empty($customer))
                            <div class="summary-field">
                                <h5>Enter Postcode</h5>
                                <p>{{ $customer->postcode ?? 'N/A' }}</p>
                            </div>

                            <div class="summary-section">
                                <h3>Contact Information</h3>

                                <div class="summary-type mb-3">
                                    <img src="{{ asset('public/front/images/icons/checkbox.svg') }}" class="inline-block w-4 md:w-6">
                                    <span class="text-base md:text-lg font-medium text-gray-800 pl-2 md:pl-4 inline-block align-middle">{{ Str::ucfirst($customer->user_type) ?? 'N/A' }}</span>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-x-6 md:gap-y-4">

                                    <div class="summary-field">
                                        <h5>Name</h5>
                                        @if(Auth::user() == null)
                                        <p>{{ $user->name ?? 'N/A' }}</p>
                                        @else
                                        <p>{{ auth()->user()->name ?? 'N/A' }}</p>
                                        @endif
                                    </div>
                                    <div class="summary-field">
                                        <h5>Phone</h5>
                                        <p>{{ ($customer->phone_no ?? 'N/A') }}
                                        </p>
                                    </div>
                                    <div class="summary-field">
                                        <h5>Email</h5>
                                        @if(Auth::user() == null)
                                        <p>{{$user->email ?? 'N/A' }}</p>
                                        @else

                                        <p>{{auth()->user()->email ?? 'N/A' }}</p>
                                        @endif
                                    </div>
                                    <div class="summary-field">
                                        <h5>Address</h5>
                                        <p>{{ $customer->address ?? 'N/A' }}</p>
                                        <p>{{ $customer->address_1 ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if (isset($order) && !empty($order))
                            <div class="summary-section">
                                <h3>Collection Time</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-x-6 md:gap-y-4">
                                    <div class="summary-field">
                                        <h5>Select Day</h5>
                                        <div class="summary-field-label">
                                            <img src="{{ asset('public/front/images/icons/calendar.svg') }}">
                                            <span>{{ $order->collection_date ?? 'N/A' }}</span>
                                        </div>
                                    </div>
                                    @if(!empty($switchTimings) && $switchTimings->switch == "no")


                                    @else
                                    <div class="summary-field">
                                        <h5>Select Time</h5>
                                        <div class="summary-field-label">
                                            <img src="{{ asset('public/front/images/icons/clock.svg') }}">
                                            <span>{{ $order->collection_time ?? 'N/A' }}</span>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="summary-section">
                                <h3>Delivery Time</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-x-6 md:gap-y-4">
                                    <div class="summary-field">
                                        <h5>Select Day</h5>
                                        <div class="summary-field-label">
                                            <img src="{{ asset('public/front/images/icons/calendar.svg') }}">
                                            <span>{{ $order->delivery_date ?? 'N/A' }}</span>
                                        </div>
                                    </div>
                                    @if(!empty($switchTimings) && $switchTimings->switch == "no")


                                    @else
                                    <div class="summary-field">
                                        <h5>Select Time</h5>
                                        <div class="summary-field-label">
                                            <img src="{{ asset('public/front/images/icons/clock.svg') }}">
                                            <span>{{ $order->delivery_time ?? 'N/A' }}</span>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="summary-section">
                                <h3>Driver Instructions</h3>
                                <div class="grid grid-cols-1 gap-x-6 gap-y-4">
                                    <div class="summary-field">
                                        <div class="summary-field-label">
                                            <img src="{{ asset('public/front/images/icons/package.svg') }}">
                                            <span>{{ $order->instruction ?? 'N/A' }}</span>
                                        </div>
                                    </div>
                                    <div class="summary-field">
                                        <h5>Special instructions for driver</h5>
                                        <p class="!text-xs md:!text-sm">{{ $order->infomation ?? 'N/A' }}</p>
                                    </div>
                                    <div class="summary-field">
                                        <h5>Frequency</h5>
                                        <div class="bg-third border border-orange-800/10 rounded-full px-4 py-0.5 md:px-8 md:py-1.5 inline-block">
                                            <span class="text-gray-800 font-medium text-xs md:text-sm">
                                                @if (isset($order->frequency) && !empty($order->frequency))
                                                @switch($order->frequency)
                                                @case('once')
                                                {{ __('Just Once') }}
                                                @break

                                                @case('weekly')
                                                {{ __('Weekly') }}
                                                @break

                                                @case('two_weeks')
                                                {{ __('Every Two Weeks') }}
                                                @break

                                                @case('four_weeks')
                                                {{ __('Every Four Weeks') }}
                                                @break

                                                @default
                                                {{ __('Just Once') }}
                                                @endswitch
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if (isset($products) && !empty($products))
                            <div class="summary-section">
                                <h3>Selected Services</h3>
                                <div class="summary-selected">
                                    <div class="flex flex-wrap gap-1.5 md:gap-3">
                                        @foreach ($products as $product)

                                        <div class="sums-item">
                                            <img src="{{ asset('public/front/'.$product->icon->icon) }}">
                                            <span>{{ $product->name }}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="summary-home">
                                <a href="{{ route('home') }}" class="btn btn-secondary">
                                    <span>Go Back to Home Page</span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection