<form id="updateCardForm">
    <div class="flex flex-col gap-4">
        <h1 class="text-left lg:text-3xl md:text-2xl text-xl font-semibold text-primary pl-2">Update Card</h1>
        <div class="">
            <div class="cf-inside space-y-3 md:space-y-6">
                <div class="cf-fieldset">
                    <div class="cf-update-alerts"></div>
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
                        <div class="flex justify-center mt-3">
                            <button type="submit" class="total-button block lg:w-80 lg:px-72 rounded-md md:rounded-xl lg:py-2 px-20 py-3 text-white text-center bg-primary" style="width:17rem">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="justify-center message text-center mt-3"></div>
    </div>
</form>