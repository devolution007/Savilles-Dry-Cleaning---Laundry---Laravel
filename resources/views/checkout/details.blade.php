@extends('layouts.master')

@section('title', 'Checkout: Details - Savilles')

@section('body')
<div class="progress shadow shadow-gray-200">
    <div class="progress-bar" style="width: 20%;"></div>
</div>

<section id="checkout-details">
    <div class="pt-5 pb-6 md:pt-10 md:pb-12">
        <div class="container">
            <div class="flex flex-wrap -mx-4">
                <div class="flex-initial w-full md:w-7/12 lg:w-8/12 px-4">
                    <div class="checkout-details-form">

                        <div class="cf-back">
                            {{-- <h4>Contact</h4> --}}
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

                        <form action="{{ route('checkout.post.step01') }}" method="POST">
                            @csrf

                            <div class="cf-inside space-y-3 md:space-y-6">
                                <div class="cf-fieldset">
                                    <div class="cf-label">
                                        <h5>Post Code</h5>
                                        <h6>Please enter your postcode to confirm we service your area.</h6>
                                    </div>
                                    <div class="relative">
                                        <input type="text" name="postcode" id="postcode"
                                            placeholder="Enter Postcode" class="form-control validate-button"  
                                            onblur="checkPostalCodeExistence(this.value)"
                                            value="{{ old('postcode', auth()->user()->customer->postcode ?? '') }}">
                                    </div>
                                    <div id="postcode-error" style="color: red;"></div>
                                </div>

                                <div class="cf-fieldset">
                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 md:gap-6">
                                        <div class="cf-field">
                                            <label>Name</label>
                                            <input type="text" id="name" name="name" placeholder="Name"
                                                class="form-control"
                                                value="{{ old('name', auth()->user()->name ?? '') }}"
                                                @if (isset(auth()->user()->name)) readonly @endif>
                                        </div>
                                    </div>
                                </div>

                                <div class="cf-fieldset">
                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 md:gap-6">
                                        <div class="cf-field">
                                            <label>Email</label>
                                            <input type="email" name="email" id="email"
                                                placeholder="Your E-mail" class="form-control"
                                                value="{{ old('email', auth()->user()->email ?? '') }}"
                                                @if (isset(auth()->user()->email)) readonly @endif>
                                        </div>

                                        <div class="cf-field">
                                            <label>Phone</label>
                                            <input type="text" name="phone_no" id="phone_no"
                                                placeholder="Your Mobile Number" pattern="[0-9]*" inputmode="tel" class="form-control"
                                                value="{{ old('phone_no', auth()->user()->customer->phone_no ?? '') }}"
                                                {{ !empty(auth()->user()->customer->phone_no) ? 'readonly' : '' }}>
                                        </div>
                                    </div>
                                </div>

                                <div class="cf-fieldset">
                                    <div class="cf-label">
                                        <h5>How Can We Contact You?</h5>
                                        <h6>We need your contact information to keep you update about your order.</h6>
                                    </div>
                                    <div class="flex flex-wrap -mx-3">
                                        <div class="flex items-center px-3">
                                            <input name="user_type" id="individual" type="radio" value="individual"
                                                class="w-4 h-4 md:w-6 md:h-6 rounded text-primary"
                                                {{ old('user_type', auth()->user()->customer->user_type ?? '') == 'individual' ? 'checked' : '' }}
                                                {{ !empty(auth()->user()->customer->user_type) ? 'readonly' : '' }}>
                                            <label for="individual"
                                                class="text-sm md:text-base lg:text-lg font-medium text-gray-700 pl-2 md:pl-4">Individual</label>
                                        </div>
                                        <div class="flex items-center px-3">
                                            <input name="user_type" id="company" type="radio" value="company"
                                                class="w-4 h-4 md:w-6 md:h-6 rounded text-primary"
                                                {{ old('user_type', auth()->user()->customer->user_type ?? '') == 'company' ? 'checked' : '' }}
                                                {{ !empty(auth()->user()->customer->user_type) ? 'readonly' : '' }}>
                                            <label for="company"
                                                class="text-sm md:text-base lg:text-lg font-medium text-gray-700 pl-2 md:pl-4">Company</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="cf-fieldset">
                                    <div class="cf-label">
                                        <h5>Address</h5>
                                    </div>
                                    <div class="space-y-3 md:space-y-6">
                                        <div class="grid grid-cols-1 gap-3 md:gap-6">
                                            <input type="text" name="address" id="address"
                                                placeholder="1st line of Address" class="form-control"
                                                value="{{ old('address', auth()->user()->customer->address ?? '') }}">
                                            <input type="text" name="address_1" placeholder="2nd line of Address"
                                                class="form-control" id="address_1"
                                                value="{{ old('address_1', auth()->user()->customer->address_1 ?? '') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="cf-button mt-8 hidden md:block">
                                <button type="submit" class="btn btn-secondary details-button">Next Step</button>
                            </div>

                            <div class="md:hidden">
                                <div class="floating-menu">
                                    <button type="submit" class="btn btn-secondary hover:scale-110 details-button">Next Step</button>
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
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                <script></script>
                <script>
                    var getDetailsUrl = "{{ route('get-details') }}";

                    $('#email').on('change', function() {
                        var email = $(this).val();

                        $.ajax({
                            url: getDetailsUrl,
                            method: 'GET',
                            data: {
                                email: email
                            },
                            success: function(response) {

                                if(response.is_loggedin) {
                                    $('#email').val(response.user.email);
                                    $('#name').val(response.user.name);
                                    $('#phone_no').val(response.customer.phone_no);
                                    $('#postcode').val(response.customer.postcode);
                                    $('#address').val(response.customer.address);
                                    $('#address_1').val(response.customer.address_1);
                                    $('#individual').prop('checked', response.customer.user_type === 'individual');
                                    $('#company').prop('checked', response.customer.user_type === 'company');
                                    $('#email').prop('readonly', true);
                                    $('#name').prop('readonly', true);
                                    $('#phone_no').prop('readonly', true);
                                } else {
                                    $('#show-login').fadeIn();
                                    $('#show-login').removeClass("hidden");
                                    $('#show-login').addClass("show-modal");

                                    $("input[name='email']").val(response.user.email);
                                }

                            },
                            error(data) {
                                console.log('error');
                            }
                        });
                    });


                    function checkPostalCodeExistence(postcode) {

                // Make an AJAX request to your Laravel route to check if the postal code exists
                        $.ajax({
                            url: '{{route('checkout.check-postcode-existence')}}',
                            type: 'POST',
                            data: {
                                postcode: postcode,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                        // Handle the response from the server


                                if (response == 'exists') {
                            // Postal code exists, clear any previous error
                                    $('#postcode-error').text('');
                                } else {

                            // Postal code does not exist, show an error message
                                    $('#postcode-error').text('The provided postal code does not exist.');
                                }
                            },
                            error: function(error) {
                                console.error('Error checking postal code existence:', error);
                            }
                        });
                    }
                </script>
            </section>
            @endsection
