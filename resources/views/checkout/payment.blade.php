@extends('layouts.master')
@section('title', 'Checkout: Payment - Savilles')
@section('body')
<div class="progress shadow shadow-gray-200">
    <div class="progress-bar" style="width: 80%;"></div>
</div>

<style>
.loader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
    z-index: 9999; /* Ensures it is above all other content */
    display: flex; /* Use flexbox to center the content */
    justify-content: center; /* Horizontally center */
    align-items: center; /* Vertically center */
}

.loader img {
    width: 100px; /* Adjust the size of the spinner */
    height: 100px;
}


</style>
<section id="checkout-payment">
    <div class="pt-5 pb-6 md:pt-10 md:pb-12">
                <input type="hidden" id="csrf-token" value="{{ csrf_token() }}">

        <div class="container">
            <form action="{{ route('checkout.post.step04') }}" method="POST">
                @csrf
                <div class="flex flex-wrap -mx-4">
                    <div class="flex-initial w-full md:w-7/12 lg:w-8/12 px-4">
                        <div class="checkout-details-form">
                            <div class="cf-back">
                                <a href="{{ route('checkout.get.step02') }}">
                                    <img alt="arrow back" class="pb-0.5" src="{{ asset('public/front/images/icons/back.svg') }}">
                                </a>
                                <h4>Payment</h4>
                            </div>
                            <p class="text-danger p-2 mb-2">Payment will only be processed once the items have been collected, counted, and verified, and the price has been confirmed. <br> Free Collection & Delivery.</p>
                            <p>Minimum Order £0.00</p>
                            @if (Session::get('danger'))
                            <div class="alert-danger">{{ Session::get('danger') }}</div>
                            @endif
                            <div class="cf-alerts"></div>
                            @if(!empty($card))
                            <div class="w-full border border-0 rounded-xl payment-box flex items-center py-6 px-5">
                                <div class="flex justify-around items-center">
                                    <div class="mr-5">
                                        <input type="checkbox" id="card" name="card" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                    <p class="font-semibold">XXXX XXXX XXXX {{$card->last4 ?? null }}</p>
                                </div>
                            </div>

                            <button type="button" id="update_card_button" class="bg-primary mt-3 block w-full text-white px-4 py-2 rounded rounded-xl text-base text-lg font-medium transition duration-300 hover:opacity-80">
                                Update Card
                            </button>

                            @else
                            <div class="cf-inside space-y-3 md:space-y-6">
                                <div class="cf-fieldset">
                                    <div class="cf-label">
                                        <h5>Enter Your Card Details</h5>
                                    </div>
                                    <div class="grid grid-cols-2 gap-3 md:gap-6">
                                        <div class="col-span-2">
                                            <div class="cf-field">
                                                <label>Card Number</label>
                                                <div id="card_number" class="form-control"></div>
                                            </div>
                                        </div>
                                        <div class="cf-field">
                                            <label>Expiry Date</label>
                                            <div id="card_expiry" class="form-control"></div>
                                        </div>
                                        <div class="cf-field">
                                            <label>CVC</label>
                                            <div id="card_cvc" class="form-control"></div>
                                        </div>
                                    </div>
                                    <div class="cf-credit mt-4 md:mt-8">
                                        <div class="flex flex-wrap justify-between items-center">
                                            <div class="cf-credit-icons">
                                                <img class="h-5 md:h-8" src="{{ asset('public/front/images/pay/payment.png') }}">
                                            </div>
                                            <div class="cf-credit-text">
                                                <span class="text-xs md:text-sm font-semibold text-gray-70 inline-block align-middle">Secured
                                                by Stripe</span>
                                                <img class="inline-block" src="{{ asset('public/front/images/pay/lock.svg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        
                         <div id="loader" class="loader">
                            <!-- You can use a spinner or any loading animation here -->
                            <img src="{{ asset('public/images/tube-spinner.svg') }}" alt="Loading...">
                        </div>
                        
                        <div id="payment-request-button" style="margin-top:10px"></div>


                    </div>
                    <div class="flex-initial w-full md:w-5/12 lg:w-4/12 px-4 mt-6 md:mt-0">
                        <div class="total mb-8">
                            <div class="bg-shade rounded-xl px-6 py-4">
                                <div class="total-button mb-2 md:mb-4">
                                    <button type="submit" id="place_order" @if(empty($card)) disabled @endif class="bg-secondary text-white px-4 py-2.5 md:px-6 md:py-4 rounded-md md:rounded-xl text-base md:text-lg font-medium block w-full transition duration-300 hover:opacity-80">Place
                                    Order</button>
                                </div>
                            </div>
                        </div>
                        @include('inc.checkout')
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

    <!-- Your form or UI here -->
    <form id="payment-form" action="{{ route('checkout.post.button') }}" method="POST" style="display: none;">
        @csrf
        <!-- Other form inputs -->

        <!-- Hidden CSRF Token Field -->
        <input type="hidden" id="csrf-token" value="{{ csrf_token() }}">
        <input type="hidden" name="paymentId" id="paymentId">
        <input type="hidden" name="paymentMethodId" id="paymentMethodId">
        <!-- Place Order Button -->
        <button type="submit" id="create_order" disabled class="bg-secondary text-white px-4 py-2.5 md:px-6 md:py-4 rounded-md md:rounded-xl text-base md:text-lg font-medium block w-full transition duration-300 hover:opacity-80">
            Place Order
        </button>
    </form>

<div class="modal hidden" id="cardModal">
    <div class="modal-content w-1/2 py-0">
        <div class="flex justify-end items-center sm:px-3 sm:">
            <span class="close-modal"><i class=" hover:cu fa-regular fa-circle-xmark fa-1x md:text-2xl sm:text-2xl"></i></span>
        </div>
        <div id="modal-body-content">

        </div>
    </div>
</div>

<div id="stripeKey" data-value="{{ env('STRIPE_PUBLIC_KEY') }}"></div>
@endsection
@section('scripts')
<script src="https://js.stripe.com/v3/"></script>

<script>

    var getform_url = "{{ route('getform') }}";
    var updateCard_url = "{{ route('updatecard') }}";

    if ($("#stripeKey").length) {
        var key = $("#stripeKey").data("value");
        var stripe = Stripe(key);
        var elements = stripe.elements();
        var style = {
            base: {
                fontFamily: '"Montserrat", sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
            }
        };
        var cardElement = elements.create('cardNumber', {
            style: style
        });
        var exp = elements.create('cardExpiry', {
            style: style
        });
        var cvc = elements.create('cardCvc', {
            style: style
        });
    }
    var alerts = $(".cf-alerts");
    if ($(".total-button button").length) {
        var checkBTN = $(".total-button button");
        cardElement.mount('#card_number');
        exp.mount('#card_expiry');
        cvc.mount('#card_cvc');
        cardElement.on("change", function(event) {
            if (event.error) {
                checkBTN.prop("disabled", true);
                alerts.html('<div class="alert-danger"><p>' + event.error.message + '</p></div>');
            } else {
                checkBTN.prop("disabled", false);
                alerts.html('');
            }
        })
    }
    var form = $("#checkout-payment form");
    form.on('submit', function(e) {
        e.preventDefault();
        stripe.createToken(cardElement).then(function(result) {
            if (result.error) {
                $(".cf-alerts").html('<div class="alert-danger"><p>' + result.error.message +
                    '</p></div>');
            } else {
                $(".cf-alerts").html('');

                form.append('<input type="hidden" name="stripeToken" value="' + result.token.id + '">');

                form[0].submit();
            }
        });
    })
</script>
<script>

    $('#card').click(function () {

        if ($(this).is(':checked')) {
            $('#place_order').removeAttr('disabled');
        } else {
            $('#place_order').attr('disabled', true);
        }
    });

    $(document).ready(function() {
        $('#update_card_button').on('click', function() {
            $.ajax({
                url: getform_url,
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#cardModal #modal-body-content').html(response.html);

                    loadStripeForm();

                    $('#cardModal').fadeIn();
                    $('#cardModal').removeClass("hidden");
                    $('#cardModal').addClass("show-modal");

                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });
    });


</script>

<script>

    function loadStripeForm() {


        if ($("#stripeKey").length) {
            var key = $("#stripeKey").data("value");
            var stripe = Stripe(key);
            var elements = stripe.elements();

            var style = {
                base: {
                    fontFamily: '"Montserrat", sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                }
            };

            var cardElement = elements.create('cardNumber', {
                style: style
            });

            var exp = elements.create('cardExpiry', {
                style: style
            });
            var cvc = elements.create('cardCvc', {
                style: style
            });

            cardElement.mount('#card_number');
            exp.mount('#card_expiry');
            cvc.mount('#card_cvc');

        }

        var alerts = $(".cf-update-alerts");
        var updateform = $("#updateCardForm");

        updateform.on('submit', function(e) {
            e.preventDefault();
            stripe.createToken(cardElement).then(function(result) {
                if (result.error) {
                    $(".cf-update-alerts").html('<div class="alert-danger"><p>' + result.error.message +
                        '</p></div>');
                } else {

                    $(".cf-update-alerts").html('');

                    updateform.append('<input type="hidden" name="stripeToken" value="' + result.token.id + '">');


                    $.ajax({
                        url: updateCard_url,
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: $("#updateCardForm").serialize(),
                        success: function(data) {

                            if (data.success) {

                                $('#cardModal').find('label.error').remove();
                                $('#cardModal').find('.message').html("<h5 class='green'>" + data.message + "</h5>");
                                $('#cardModal').removeClass("show-modal");
                                $('#cardModal').addClass("hidden");
                                window.location.reload(true);

                            } else {
                                $('#cardModal').find('.message').html("<h5 class='error'>" + data.message + "</h5>");
                            }
                        },
                        error(data) {
                            var response = JSON.parse(data.responseText);
                            $.each(response.errors, function(key, value) {
                                $('#' + key).after('<label class="error">' + value + '</label>');
                            });
                        }
                    });

                }
            });
        });

    }

</script>

@endsection