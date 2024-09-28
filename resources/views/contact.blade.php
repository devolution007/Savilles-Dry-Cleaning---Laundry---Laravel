@extends('layouts.master')

@section('title', 'Contact - Savilles')

@section('body')
<section id="contact">
    <div class="contact py-8 md:py-12 lg:py-16">
        <div class="container">
            <div class="flex flex-wrap -mx-4">
                <div class="flex-initial w-full px-4 mb-12 md:mb-12 lg:mb-0">
                    <div class="contact-title mb-6 md:mb-8 lg:mb-12">
                        <h2 class="font-cf text-2xl md:text-4xl lg:text-5xl font-semibold text-gray-800 mb-1 md:mb-2 lg:mb-3">
                            Contact Us
                        </h2>
                    </div>

                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d79774.06331532825!2d-0.411209!3d51.330633!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4875df9a207c553b%3A0xc815a0f60e5bcb70!2sSavilles%20Dry%20Cleaners%20Cobham!5e0!3m2!1sen!2suk!4v1713179284827!5m2!1sen!2suk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>
                <div class="flex-initial w-full lg:w-6/12 xl:w-7/12 px-4 mb-6 md:mb-8 lg:mb-0">
                    <div class="contact-info">
                        <div class="contact-title mb-6 md:mb-8 lg:mb-12">

                        </div>
                        <div class="contact-details divide-y divide-gray-200">
                            <div class="contact-item">
                                <h4>Address</h4>
                                <p>17 Anyards Road, Cobham, KT11 2LW</p>
                            </div>
                            <div class="contact-item">
                                <h4>Contact Number</h4>
                                <p>01932 863 248</p>
                            </div>
                            <div class="contact-item">
                                <h4>Opening Hours</h4>
                                <p>Monday-Friday: 9:00am - 5:00pm, Saturday: 9:00am - 4:30pm</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-initial w-full lg:w-6/12 xl:w-5/12 px-4" style="padding-top: 20px;">
                    <div
                    class="bg-shade rounded-xl px-6 py-4 md:px-8 md:py-6 lg:px-10 lg:py-8">

                    @if ($errors->any())
                    <div class="alert-danger">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('contactForm') }}" method="POST">
                        @csrf
                        <div class="contact-form space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                                <div class="contact-field">
                                    <label>First Name*</label>
                                    <input type="text" name="first_name" value="{{ old('first_name') }}"
                                    required>
                                </div>
                                <div class="contact-field">
                                    <label>Last Name*</label>
                                    <input type="text" name="last_name" value="{{ old('last_name') }}" required>
                                </div>
                            </div>
                            <div class="contact-field">
                                <label>Email*</label>
                                <input type="email" name="email" value="{{ old('email') }}" required>
                            </div>

                            <div class="contact-field">
                                <label>Message*</label>
                                <textarea class="resize-none h-36" name="message" required>{{ old('message') }}</textarea>
                            </div>
                            <div class="contact-field text-center pt-4">
                                <button type="submit" class="btn btn-secondary btn-lg">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@if (Session::get('success'))
<div class="overlay fixed top-0 left-0 w-full h-full min-h-screen bg-black/50 flex items-center justify-center">
    <div class="overlay-inner px-4">
        <div class="contact-alert bg-white px-8 py-6 md:px-12 md:py-10 rounded-xl w-full max-w-[400px] text-center">
            <h2 class="text-xl md:text-2xl lg:text-4xl text-gray-800 font-semibold mb-3 md:mb-6">
            We will contact you shortly.</h2>

            <div class="space-x-1 md:space-x-2">
                <button onclick="window.location.href = '{{ route('home') }}'" class="btn btn-secondary">Okay</button>
                <button onclick="window.location.href = '{{ route('contact') }}'"
                class="btn btn-secondary-outline">Exit</button>
            </div>
        </div>
    </div>
</div>
@endif

@include('inc.cta')
@endsection
