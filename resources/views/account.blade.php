@extends('layouts.master') @section('title', 'Our Services - Savilles') @section('body')

<form id="card">
    <div class="modal hidden" id="payment">
        <div class="modal-content w-1/2 py-0">
            <div class="flex justify-end items-center sm:px-3 sm:">
                <span class="close-modal"><i class=" hover:cu fa-regular fa-circle-xmark fa-1x md:text-2xl sm:text-2xl"></i></span>
            </div>
            <div class="flex flex-col gap-4">
                <h1 class="text-left lg:text-3xl md:text-2xl text-xl font-semibold text-primary pl-2">Add Payment method</h1>
                <div class="">
                    <div class="cf-inside space-y-3 md:space-y-6">
                        <div class="cf-fieldset">
                            <div class="cf-alerts"></div>
                            <div class="grid grid-cols-2 gap-3 md:gap-6">
                                <div class="col-span-2">
                                    <div class="cf-field">
                                        <label>Card Number</label>
                                        <div id="card_number" class="form-control border-gray-200"></div>

                                    </div>
                                </div>
                                <div class="cf-field">
                                    <label>Expiry Date</label>
                                    <div id="card_expiry" class="form-control border-gray-200"></div>

                                </div>
                                <div class="cf-field">
                                    <label>CVC</label>
                                    <div id="card_cvc" class="form-control border-gray-200"></div>

                                </div>
                            </div>
                            <div class="cf-credit mt-4 md:mt-8">
                                <div class="flex flex-wrap justify-between items-center">
                                    <div class="cf-credit-icons">
                                        <img class="h-5 md:h-8" src="{{ asset('public/front/images/pay/payment.png') }}">
                                    </div>
                                    <div class="cf-credit-text">
                                        <span class="text-xs md:text-sm font-semibold text-gray-70 inline-block align-middle">Secured
                                        By Stripe</span>
                                        <img class="inline-block" src="{{ asset('public/front/images/pay/lock.svg') }}">
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <button type="submit" class="total-button block lg:w-80 lg:px-72 md:px-24 lg:py-2 px-20 br-30 py-3 text-white text-center bg-primary" style="width:17rem">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="justify-center message text-center mt-3"></div>
            </div>
        </div>
    </div>
</form>

<div class="container">
    <div class="box-border mt-8 w-full flex flex-col">
        <div class="flex flex-col font-mon">
            <div class="flex justify-between py-4">
                <h1 class="text-xl lg:mb-6 lg:text-5xl text-left pl-3 sm:text-3xl font-bold">
                    My Account
                </h1>
                <button class="font-bold md:text-sm md-px-4 py-2 px-6 text-xxs sm:px-8 border border-none lg:px-10 lg:py-2 lg:text-lg rounded-xl border-0 bg-third text-primary text-bold font-mon trigger-modal" data-id="password">
                    Change Password
                </button>
            </div>
            <!-- Change Password MOdal  -->
            <form id="change-password">
                <div class="modal hidden" id="password">
                    <div class="modal-content .w-4\/12" style="max-width: 40rem">
                        <div class="flex justify-end items-center">
                            <button type="button" class="close-modal hover:cursor-pointer"><i class="fa-regular fa-circle-xmark   fa-1x md:text-2xl sm:text-2xl"></i></button>
                        </div>
                        <div class="mb-8 ">
                            <h1 class="text-center lg:text-3xl md:text-2xl text-xl font-semibold text-primary pl-2">Change password</h1>
                        </div>
                        <div class="mb-5">
                            <input type="password" id="old_password" name="old_password" class="font-semibold bg-shade w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline border-gray-200" placeholder="Old Password" />
                        </div>
                        <div class="mb-5">
                            <input type="password" id="new_password" name="new_password" class="font-semibold bg-shade w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline border-gray-200" placeholder="New Password" />
                        </div>
                        <div class="mb-5">
                            <input type="password" id="confirm_password" name="confirm_password" class="font-semibold bg-shade w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline border-gray-200" placeholder="Re-Type New Password" />
                        </div>
                        <div class="flex items-center justify-center">
                            <button type="submit" class=" w-1\/2 btn btn-secondary capatilize ">Update Password</button>
                        </div>
                        <div class="justify-center message text-center mt-3"></div>

                    </div>
                </div>
            </form>

            <nav class="tabs flex items-center justify-between md:gap-4 sm:gap-0 gap-1 flex-wrap px-1 py-2 seventy-five">
                <div class="flex-1">
                    <button data-target="panel-1" class="tab w-full hover:cursor-pointer block border py-4 bg-shade sm:text-lg custom-active   text-xxs sm:px-8 font-semibold px-1 rounded-xl  text-black text-center md:text-sm lg:text-lg border-0 tab-bg">Address</button>
                </div>

                <div class="flex-1">
                    <button data-target="panel-2" class="tab w-full block border sm:text-m px-1 py-4 text-xxs font-semibold bg-shade rounded-xl text-center lg:text-lg md:text-sm border-0 tab-bg">Payment</button>
                </div>
                <div class="flex-1">
                    <button data-target="contact-panel" class="tab w-full text-center block border py-4 sm:text-lg sm:px-0 text-[10px] px-1 font-semibold bg-shade rounded-xl lg:text-lg lg:text-bold md:text-sm border-0 tab-bg">Contact Details</button>
                </div>
                <div class="flex-1">
                    <button data-target="my-order" class="tab w-full text-center block border py-4 sm:text-lg sm:px-0 text-[10px] px-1 font-semibold bg-shade rounded-xl lg:text-lg lg:text-bold md:text-sm border-0 tab-bg">My Orders</button>
                </div>
            </nav>
        </div>
        <div id="panels">
            <div class="panel-1 tab-content active py-5">
            {{-- <p class="mt-5 pl-3 mb-5 text-sm md:text-sm sm:text-xs">Default Address</p>
            <div class="justify-between px-3 :lg-3 lg:px-5 seventy-five border rounded-lg flex bg-current custom">
                <div class="flex py-5 items-center justify-between gap-1 lg:gap-5">
                    <div class="flex items-center mb-3 px-2">
                        <input checked id="teal-checkbox" type="checkbox" value="" class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 rounded focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                    </div>
                    <div class="flex flex-col">
                        <h1 class="font-semibold font-mon lg:text-xl text-sm md:text-sm">Address (Home)</h1>
                        <p class="font-mon text-xxs lg:text-sm lg:font-semibold">4 Battle Bridge Ln,London SEI 2HX,UK</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <button class="font-bold py-2 px-4 text-xxs sm:px-8 border border-none lg:px-8 lg:py-7 lg:text-lg rounded bg-third text-primary font-mon text-bold">
                        Edit
                    </button>
                </div>
            </div>
            <div class="flex items-center pl-3 justify-between seventy-five mt-5">
                <p class="font-semibold md:text-xs text-xxs sm:text-xxs lg:text-lg lg:font-bold">Other Addresses</p>
                <div class="flex items-center gap-2">
                    <div class="py-1 lg:text-lg lg:px-3 px-2 border rounded-lg text-xxs md:text-xs bg-third border-none outline-none">
                        <i class="fa-regular fa-circle-plus"></i>
                    </div>
                    <p class="sm:font-semibold lg:text-lg lg:font-bold text-xxs md:text-xs sm:text-xxs">Add Address</p>
                </div>
            </div>
            <div class="justify-between px-3 mt-5 :lg-3 lg:px-5 seventy-five border rounded-lg flex custom1">
                <div class="flex py-5 items-center justify-between gap-1 lg:gap-5">
                    <div class="flex items-center mb-3 px-2">
                        <input checked id="teal-checkbox" type="checkbox" value="" class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 rounded focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                    </div>
                    <div class="flex flex-col">
                        <h1 class="font-semibold font-mon lg:text-xl text-sm md:text-sm">Address (Home)</h1>
                        <p class="font-mon text-xxs lg:text-sm lg:font-semibold">4 Battle Bridge Ln,London SEI 2HX,UK</p>
                    </div>
                </div>
                <div class="flex items-center">
                    <button class="font-bold py-2 px-4 text-xxs sm:px-8 border border-none lg:px-8 lg:py-7 lg:text-lg rounded bg-third text-primary font-mon text-bold">
                        Edit
                    </button>
                </div>
            </div>
            <div class="flex justify-center items-center pr-5">
                <div class="flex justify-center w-1/2 mt-8 items-center">
                    <div class="flex justify-center border rounded-full px-4 py-4 text-white bg-primary w-full">
                        <button class="text-sm md:text:lg sm:text-sm lg:text-xl font-mon">Make Default</button>
                    </div>
                </div>
            </div> --}}
            <div class="py-4">
                <form id="address">
                    @csrf
                    <div class="mb-5">
                        <input type="text" name="postcode" id="postcode" class="font-semibold bg-shade w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline" placeholder="POST CODE" value="{{auth()->user()->customer->postcode ?? null}}" />
                    </div>
                    <div class="mb-5">
                        <input type="text" name="address" id="address" class="font-semibold bg-shade w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline" placeholder="Address" value="{{auth()->user()->customer->address ?? null}}" />
                    </div>
                    <div class="mb-5">
                        <input type="text" name="address1" id="address1" class="font-semibold bg-shade w-full px-4 py-3 rounded-lg shadow-sm focus:outline-none focus:shadow-outline" placeholder="Address 1" value="{{auth()->user()->customer->address_1 ?? null}}" />
                    </div>
                    <div class="flex justify-center">
                        <div class="flex w-1/2 border rounded-lg bg-primary justify-center text-white"><button type="submit" class="px-10 border-0 outline-0 py-3">Save</button></div>
                    </div>
                    <div class="justify-center message text-center mt-3"></div>

                    <!-- <div class="py-8 gap-3 lg:font-mon lg:font-semibold">
                        <p class="text-xs md:text-lg font-semibold">Default Address</p>
                        <div class="flex items-center justify-between">
                            <h3 class="font-extrabold">Other Adresses</h5>
                            <div class="flex items-center gap-2">
                                <button id="show-login" class="py-1 lg:text-lg lg:px-3 px-2 border rounded-lg text-xxs md:text-xs bg-third border-none outline-none">
                                    <i class="fa-regular fa-circle-plus trigger-modal" data-id="payment"></i>
                                </button>
                                <p class="ml-8 sm:font-semibold lg:text-lg lg:font-bold text-xxs md:text-xs sm:text-xxs">Add Payment </p>
                            </div>
                        </div>

                    </div> -->

                </form>
            </div>
        </div>

        <!-- Payment  -->
        <div class="panel-2 tab-content">
            <div class="px-5 py-8 gap-3 lg:font-mon lg:font-semibold">

                @if(empty($card))
                <p class="text-xs md:text-lg font-semibold">You Don't Have Any Payment Methods Yet</p>
                @else
                <div class="w-full border border-0 rounded-xl payment-box flex items-center py-6 px-5">
                    <div class="flex w-1/2 justify-around items-center">
                        <div class="mr-5"> <input type="checkbox" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"></div>
                        <!-- <div> <img class="h-5 md:h-8" src="{{ asset('public/front/images/pay/payment.png') }}"></div> -->
                        <p class="ml-5 font-semibold"> XXXX XXXX XXXX {{$cardNumber->last4 ?? null }}</p>
                    </div>
                </div>
                @endif
                <div class="flex items-center gap-2 mt-3">

                    <button id="show-login" class="py-1 lg:text-lg lg:px-3 px-2 border rounded-lg text-xxs md:text-xs bg-third border-none outline-none">
                        <i class="fa-regular fa-circle-plus trigger-modal" data-id="payment"></i>
                    </button>

                    <p class="ml-8 sm:font-semibold lg:text-lg lg:font-bold text-xxs md:text-xs sm:text-xxs">Add Payment </p>
                </div>
            </div>
        </div>



        <div class="contact-panel tab-content">
            <!-- Contact Form  -->
            <div class="py-4">
                <form id="contact">
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-5">
                        <div class="flex items-center px-3">
                            <input name="user_type" id="individual" type="radio" value="individual" class="w-8 h-8 md:w-6 md:h-6 rounded-full text-secondary" {{ (!empty(auth()->user()->customer->user_type) && auth()->user()->customer->user_type == 'individual') ? 'checked' : '' }} />
                            <label for="individual" class="text-sm md:text-base lg:text-lg text-gray-700 pl-8 md:pl-4">Individual</label>
                        </div>
                        <div class="flex items-center px-3">
                            <input name="user_type" id="company" type="radio" value="company" class="w-8 h-8 md:w-6 md:h-6 rounded-full text-secondary" {{(!empty(auth()->user()->customer->user_type) && auth()->user()->customer->user_type == 'company') ? 'checked' : '' }} />
                            <label for="company" class="text-sm md:text-base lg:text-lg text-gray-700 pl-8 md:pl-4">Company</label>
                        </div>



                    </div>
                    <div class="items-center">
                        <div id="user_type"></div>
                    </div>
                    <div class="mb-5">
                        <input type="text" name="name" id="name" class="font-semibold bg-shade w-full px-4 py-4 rounded-lg shadow-sm focus:outline-none focus:shadow-outline border-gray-200" placeholder="Name" value="{{auth()->user()->name ?? null}}" />
                    </div>
                    <!-- <div class="mb-5">
                        <input type="text" name="name" id="name" class="font-semibold bg-shade w-full px-4 py-4 rounded-lg shadow-sm focus:outline-none focus:shadow-outline border-gray-200 placeholder="Last Name" value="" />
                    </div> -->
                    <div class="mb-5">
                        <input type="tel" name="phone" id="phone" class="font-semibold bg-shade w-full px-4 py-4 rounded-lg shadow-sm focus:outline-none focus:shadow-outline border-gray-200" placeholder="Mobile Number" value="{{auth()->user()->customer->phone_no ?? null}}" />
                    </div>
                    <div class="mb-5">
                        <input type="email" name="email" id="email" class="font-semibold bg-shade w-full px-4 py-4 rounded-lg shadow-sm focus:outline-none focus:shadow-outline border-gray-200" placeholder="Email" value="{{auth()->user()->email ?? null}}" />
                    </div>
                    <div class="flex justify-center">
                        <div class="flex w-1/2 border br-30 mt-5 bg-primary justify-center text-white"><button type="submit" class="px-10 border-0 outline-0 py-3">Save Contact</button></div>
                    </div>
                    <div class="justify-center message text-center mt-3"></div>
                </form>
            </div>
        </div>



        <div class="my-order tab-content">
            <!-- Contact Form  -->
            <div class="py-4">

                @if(isset($orders) && count($orders) > 0)
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
                    @elseif($order->status == 'cancelled')
                    <button class="sm:mt-4 mt-2 rounded-lg text-xs sm:text-3xl text-white bg-danger sm:py-3 border px-7 py-2 sm:px-12 outline-none border-none  font-mon text-bold" style="background: red !important;">Cancelled</button>
                    @endif

                    @if( $order->collection_date > date('Y-m-d') && $order->status !== 'cancelled')
                    <button class="sm:mt-4 mt-2 rounded-lg text-xs sm:text-3xl text-white bg-primary sm:py-3 border px-7 py-2 sm:px-12 outline-none border-none  font-mon text-bold cancel-btn" data-order-id="{{ $order->id }}">Cancel</button>
                    @endif

                    <div class="text-right pr-10">
                        <p class="font-bold font-mon text-2xl sm:text-2xl text-primary">&#163;{{ number_format($order->amount, 2); }}</p>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
</div>
<div id="stripeKey" data-value="{{ env('STRIPE_PUBLIC_KEY') }}"></div>
@endsection
@section('scripts')

<script src="https://js.stripe.com/v3/"></script>
<script>
    var addAddress = "{{route('add-address')}}";
    var addCard = "{{route('add-card')}}";
    var addContactUrl ="{{route('contact-details')}}";
</script>
<script>


    $(document).ready(function () {
        $('.cancel-btn').click(function () {
            var orderId = $(this).data('order-id');
            if (confirm("Are you sure you want to cancel this order?")) {
                cancelOrder(orderId);
            }
        });

        function cancelOrder(orderId) {
            $.ajax({
                url: home_url+'/order/' + orderId + '/cancel',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function (response) {
                    alerts.html('<div class="alert-success"><p>' + response.message + '</p></div>');
                    location.reload();
                },
                error: function (xhr, status, error) {
                    var errorMessage = xhr.responseJSON ? xhr.responseJSON.error : 'Something went wrong.';
                    alerts.html('<div class="alert-danger"><p>' + errorMessage + '</p></div>');
                }
            });
        }
    });

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
    if ($(".total-button").length) {
        var checkBTN = $(".total-button");

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

    var form = $("#card");

    form.on('submit', function(e) {
        e.preventDefault();

        stripe.createToken(cardElement).then(function(result) {
            if (result.error) {
                $(".cf-alerts").html('<div class="alert-danger"><p>' + result.error.message +
                    '</p></div>');
            } else {
                $(".cf-alerts").html('');

                // append stripe token
                form.append('<input type="hidden" name="stripeToken" value="' + result.token.id + '">');

                // submit the form
                var parent = form;
                // console.log(parent);
                $.ajax({
                    url: addCard,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $("input[name=_token]").val()
                    },
                    data: $(form).serialize(),

                    success: function(data) {

                        if (data.success) {
                            parent.find('label.error').remove();
                            parent.find('.message').html("<h5 class='green'>" + data.message + "</h5>");
                            parent.find('.modal').removeClass("show-modal");
                            parent.find('.modal').addClass("hidden");
                            window.location.reload(true);
                        } else {
                            parent.find('.message').html("<h5 class='error'>" + data.message + "</h5>");
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
    })
</script>
@endsection
