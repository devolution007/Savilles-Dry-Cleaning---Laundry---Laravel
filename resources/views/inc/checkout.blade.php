<aside id="sidebar">
    <div class="checkout-list bg-shade divide-y md:divide-y-2 border-gray-100 rounded-xl">

        <div class="ckl-section">
            <div class="ckl-item">
                <div class="ckl-icon">
                    <img src="{{ asset('public/front/images/icons/checkbox.svg') }}">
                </div>
                <div class="ckl-text">
                    <h4>Contact</h4>
                  
                        <p>
                            <span>@if(isset(auth()->user()->name)){{auth()->user()->name}}@endif</span>
                         
                            <span>@if(isset(auth()->user()->customer->phone)){{auth()->user()->customer->phone ?? null}}@endif</span>
                        </p>
                    
                </div>
            </div>
        </div>

        <div class="ckl-section space-y-3">
            <div class="ckl-item">
                <div class="ckl-icon {{ $order ?? '' ? '' : 'inactive' }}">
                    <img src="{{ asset('public/front/images/icons/checkbox.svg') }}">
                </div>
                <div class="ckl-text">
                    <h4>Collection</h4>
                    @if (isset($order) && !empty($order))
                        <p>
                            <span>{{ date("d.m.Y", strtotime($order->collection_date)) }}</span>
                            <span>,</span>
                            <span>{{ $order->collection_time }}</span>
                        </p>
                    @endif
                </div>
            </div>
            <div class="ckl-item">
                <div class="ckl-icon {{ $order ?? '' ? '' : 'inactive' }}">
                    <img src="{{ asset('public/front/images/icons/checkbox.svg') }}">
                </div>
                <div class="ckl-text">
                    <h4>Delivery</h4>
                    @if (isset($order) && !empty($order))
                        <p>
                            <span>{{ date("d.m.Y", strtotime($order->delivery_date)) }}</span>
                            <span>,</span>
                            <span>{{ $order->delivery_time }}</span>
                        </p>
                        <p>{{ $order->instruction }}</p>
                    @endif
                </div>
            </div>
            <div class="ckl-item">
                <div class="ckl-icon">
                </div>
                <div class="ckl-text">
                    <h4>Frequency</h4>
                    @if (isset($order) && !empty($order))
                        @switch($order->frequency)
                            @case('once')
                                <h5>{{ __('Just Once') }}</h5>
                            @break

                            @case('weekly')
                                <h5>{{ __('Weekly') }}</h5>
                            @break

                            @case('two_weeks')
                                <h5>{{ __('Every Two Weeks') }}</h5>
                            @break

                            @case('four_weeks')
                                <h5>{{ __('Every Four Weeks') }}</h5>
                            @break

                            @default
                                <h5>{{ __('Just Once') }}</h5>
                        @endswitch
                    @endif
                </div>
            </div>
        </div>

        {{-- <div class="ckl-section">
            <div class="ckl-item">
                <div class="ckl-icon {{ ($services ?? '') ? '' : 'inactive' }}">
                    <img src="{{ asset('public/front/images/icons/checkbox.svg') }}">
                </div>
                <div class="ckl-text">
                    <h4>Selected Services</h4>
                    @if (isset($products) && !empty($products))
                        <div class="sser-list space-y-1 lg:space-y-1.5">
                            @foreach ($products as $product)
                                <div class="sser-item">
                                    <div class="sser-icon">
                                        <img src="{{ asset('public/front/'.$product->icon->icon) }}">
                                    </div>
                                    <div class="sser-text">
                                        <p>{{ $product->name }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div> --}}

        <div class="ckl-section">
            <div class="ckl-item">
                <div class="ckl-icon inactive">
                    <img src="{{ asset('public/front/images/icons/checkbox.svg') }}">
                </div>
                <div class="ckl-text">
                    <h4>Payment</h4>
                </div>
            </div>
        </div>

    </div>
</aside>
