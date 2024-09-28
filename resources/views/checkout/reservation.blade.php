@extends('layouts.master')

@section('title', 'Checkout: Reservation - Savilles')

@section('body')
    <div class="progress shadow shadow-gray-200">
        <div class="progress-bar" style="width: 40%;"></div>
    </div>
    <section id="checkout-reservation">
        <div class="pt-5 pb-6 md:pt-10 md:pb-12">
            <div class="container">
                <div class="flex flex-wrap -mx-4">
                    <div class="flex-initial w-full md:w-7/12 lg:w-8/12 px-4">
                        <div class="checkout-reservation-form">
                            <div class="cf-back">
                                <a href="{{ route('checkout') }}">
                                    <img alt="arrow back" class="pb-0.5"
                                        src="{{ asset('public/front/images/icons/back.svg') }}">
                                </a>
                                <h4>Reservation</h4>
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
                            <form action="{{ route('checkout.post.step02') }}" method="POST">
                                @csrf
                                <div class="cf-inside space-y-3 md:space-y-6">
                                    <div class="cf-fieldset">
                                        <div class="cf-label">
                                            <h5>Collection Time</h5>
                                        </div>
                                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 md:gap-6">
                                            <div class="cf-field">
                                                <label>Select Day</label>
                                                <div class="relative">
                                                    <img src="{{ asset('public/front/images/icons/calendar.svg') }}"
                                                        class="cf-field-icon">
                                                    <select name="collection_date" id="collection_date"
                                                        class="form-control with-icon">
                                                        <option value="">select</option>
                                                        {{-- @if (!in_array(now()->format('D'), $offdays) && !in_array(now()->format('D'), $offdates))
                                                            <option value="{{ now()->toDateString() }}">Today</option>
                                                        @endif --}}
                                                        @if (
                                                            !in_array(now()->addDays(1)->format('D'),
                                                                $offdays) &&
                                                                !in_array(now()->addDays(1)->format('D'),
                                                                    $offdates))
                                                            <option value="{{ now()->addDays(1)->toDateString() }}">Tomorow
                                                            </option>
                                                        @endif
                                                        @php
                                                            $date = now()->addDays(2);
                                                        @endphp
                                                        @for ($i = 1; $i <= 30; $i++)
                                                            @if (count($offdays) > 0)
                                                                @if (!in_array($date->format('D'), $offdays) && !in_array($date->format('Y-m-d'), $offdates))
                                                                    <option value="{{ $date->toDateString() }}"
                                                                        @if (!empty($order) && $order->collection_date == $date->toDateString()) selected @endif>
                                                                        {{ $date->format('D, d M') }}</option>
                                                                @endif
                                                            @else
                                                                <option value="{{ $date->toDateString() }}"
                                                                    @if (!empty($order) && $order->delivery_date == $date->toDateString()) selected @endif>
                                                                    {{ $date->format('D, d M') }}</option>
                                                            @endif
                                                            @php
                                                                $date = $date->addDays(1);
                                                            @endphp
                                                        @endfor
                                                    </select>
                                                    {{-- <input type="date" name="collection_date" placeholder="Select Date" class="form-control with-icon" value="{{ old('collection_date', $order->collection_date ?? '') }}" min="{{ date('d.m.Y') }}"> --}}
                                                </div>
                                            </div>
                                            @if (!empty($switchTimings) && $switchTimings->switch == 'no')
                                            @else
                                                <div class="cf-field">
                                                    <label>Select Time</label>
                                                    <div class="relative">
                                                        <img src="{{ asset('public/front/images/icons/clock.svg') }}"
                                                            class="cf-field-icon">
                                                        <select name="collection_time" class="form-control with-icon">

                                                            @if (!empty($timings))
                                                                @foreach ($timings as $timing)
                                                                    <option value="{{ $timing->timing }}"
                                                                        {{ old('collection_time', $order->collection_time ?? '') == $timing->timing ? 'selected' : '' }}>
                                                                        {{ $timing->timing }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="cf-fieldset">
                                        <div class="cf-label">
                                            <h5>Delivery Time</h5>
                                        </div>
                                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 md:gap-6">
                                            <div class="cf-field">
                                                <label>Select Day</label>
                                                <div class="relative">
                                                    <img src="{{ asset('public/front/images/icons/calendar.svg') }}"
                                                        class="cf-field-icon">

                                                    <select name="delivery_date" id="delivery_date"
                                                        class="form-control with-icon">
                                                        <option value="">select</option>
                                                        {{-- @if (!in_array(now()->format('D'), $offdays) && !in_array($date->format('Y-m-d'), $offdates))
                                                            <option value="{{ now()->toDateString() }}">Today</option>
                                                        @endif --}}
                                                        @if (
                                                            !in_array(now()->addDays(1)->format('D'),
                                                                $offdays) && !in_array($date->format('Y-m-d'), $offdates))
                                                            <option value="{{ now()->addDays(1)->toDateString() }}">Tomorow
                                                            </option>
                                                        @endif
                                                        @php
                                                            $date = now()->addDays(2);
                                                        @endphp

                                                        @for ($i = 1; $i <= 30; $i++)
                                                            @if (count($offdays) > 0)
                                                                @if (!in_array($date->format('D'), $offdays) && !in_array($date->format('Y-m-d'), $offdates))
                                                                    <option value="{{ $date->toDateString() }}"
                                                                        @if (!empty($order) && $order->delivery_date == $date->toDateString()) selected @endif>
                                                                        {{ $date->format('D, d M') }}</option>
                                                                @endif
                                                            @else
                                                                <option value="{{ $date->toDateString() }}"
                                                                    @if (!empty($order) && $order->delivery_date == $date->toDateString()) selected @endif>
                                                                    {{ $date->format('D, d M') }}</option>
                                                            @endif
                                                            @php
                                                                $date = $date->addDays(1);
                                                            @endphp
                                                        @endfor
                                                    </select>
                                                    {{-- <input type="date" name="delivery_date" placeholder="Select Date"
                                                        class="form-control with-icon"
                                                        value="{{ old('delivery_date', $order->delivery_date ?? '') }}"
                                                min="{{ date('d.m.Y') }}"> --}}
                                                </div>
                                            </div>
                                            @if (!empty($switchTimings) && $switchTimings->switch == 'no')
                                            @else
                                                <div class="cf-field">
                                                    <label>Select Time</label>
                                                    <div class="relative">
                                                        <img src="{{ asset('public/front/images/icons/clock.svg') }}"
                                                            class="cf-field-icon">
                                                        <select name="delivery_time" class="form-control with-icon">
                                                            @if (!empty($timings))
                                                                @foreach ($timings as $timing)
                                                                    <option value="{{ $timing->timing }}"
                                                                        {{ old('delivery_time', $order->delivery_time ?? '') == $timing->timing ? 'selected' : '' }}>
                                                                        {{ $timing->timing }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="cf-fieldset">
                                        <div class="cf-label">
                                            <h5>Driver Instruction</h5>
                                        </div>
                                        <div class="grid grid-cols-1 gap-3 md:gap-6">
                                            <div class="relative">
                                                <img src="{{ asset('public/front/images/icons/package.svg') }}"
                                                    class="cf-field-icon">
                                                <select name="instruction" class="form-control with-icon">
                                                    <option value="Driver Drops, Rings & Wait"
                                                        {{ ($order->instruction ?? '') == 'Driver Drops, Rings & Wait' ? 'selected' : '' }}>
                                                        Driver Drops, Rings & Wait
                                                    </option>
                                                    <option value="Leave it at The Door"
                                                        {{ ($order->instruction ?? '') == 'Leave it at The Door' ? 'selected' : '' }}>
                                                        Leave it at The Door</option>
                                                </select>
                                            </div>
                                            <div class="cf-field">
                                                <textarea name="infomation" class="form-control h-36 resize-none" placeholder="Add any special instructions for driver">{{ old('infomation', $order->infomation ?? '') }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cf-fieldset">
                                        <div class="cf-label">
                                            <h5>Frequency</h5>
                                        </div>
                                        <div class="grid grid-cols-2 gap-3 md:gap-x-6 md:gap-y-4">
                                            <div class="cf-checking">
                                                <input name="frequency" type="radio" value="once"
                                                    {{ ($order->frequency ?? 'once') == 'once' ? 'checked' : '' }}>
                                                <div class="cf-checking-label">
                                                    <span>Just Once</span>
                                                </div>
                                            </div>
                                            <div class="cf-checking">
                                                <input name="frequency" type="radio" value="weekly"
                                                    {{ ($order->frequency ?? '') == 'weekly' ? 'checked' : '' }}>
                                                <div class="cf-checking-label">
                                                    <span>Weekly</span>
                                                </div>
                                            </div>
                                            <div class="cf-checking">
                                                <input name="frequency" type="radio" value="two_weeks"
                                                    {{ ($order->frequency ?? '') == 'two_weeks' ? 'checked' : '' }}>
                                                <div class="cf-checking-label">
                                                    <span>Every Two Weeks</span>
                                                </div>
                                            </div>
                                            <div class="cf-checking">
                                                <input name="frequency" type="radio" value="four_weeks"
                                                    {{ ($order->frequency ?? '') == 'four_weeks' ? 'checked' : '' }}>
                                                <div class="cf-checking-label">
                                                    <span>Every Four Weeks</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="cf-button mt-8 hidden md:block">
                                    <button type="submit" class="btn btn-secondary">Next Step</button>
                                </div>

                                <div class="md:hidden">
                                    <div class="floating-menu">
                                        <button type="submit" class="btn btn-secondary hover:scale-110">Next
                                            Step</button>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Event listener for the collection_date select
            $("#collection_date").on("change", function () {
                var selectedDate = $(this).val();
                
                if (selectedDate) {
                    // Calculate 48 hours later
                    var deliveryDate = new Date(selectedDate);
                    deliveryDate.setHours(deliveryDate.getHours() + 48);
    
                    // Set the options for delivery_date select
                    $("#delivery_date").empty();
    
                    // Get the current date and time
                    var currentDate = new Date();
    
                    // Loop to add dates at least 48 hours in the future
                    for (var i = 0; i < 30; i++) { // You can adjust the range as needed
                        var nextDeliveryDate = new Date(deliveryDate);
                        nextDeliveryDate.setDate(nextDeliveryDate.getDate() + i);
    
                        // Format the date to match your desired format
                        var formattedDeliveryDate = nextDeliveryDate.toISOString().slice(0, 10);
    
                        // Check if the calculated delivery date is at least 48 hours in the future
                        if (nextDeliveryDate > currentDate) {
                            // $("#delivery_date").append('<option value="' + formattedDeliveryDate + '">' + formattedDeliveryDate + '</option>');
                            $("#delivery_date").append('<option value="' + formattedDeliveryDate + '">' + nextDeliveryDate.toLocaleString('en-US', { weekday: 'short', day: '2-digit', month: 'short' }) + '</option>');

                        }
                    }
                } else {
                    // Clear options if no collection date is selected
                    $("#delivery_date").empty();
                    $("#delivery_date").append('<option value="">Select a collection date first</option>');
                }
            });
        });
    </script>
    
@endsection
