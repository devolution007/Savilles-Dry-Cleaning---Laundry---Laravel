<x-app-layout>
    <x-slot name="header">
        {{ __('Order #' . $order->id . ' Details') }}
    </x-slot>
    <x-slot name="button">
    </x-slot>

    <div class="dashboard">
        <div class="space-y-6">

            <div class="dashboard-section">
                <div class="dashboard-section-header">
                    <div class="dsh-left">
                        <h4>Customer Details</h4>
                    </div>
                    <div class="dsh-right">
                        <a href="{{ route('customers.edit', $order->customer->id) }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                            <span>Edit</span>
                        </a>
                    </div>
                </div>
                <div class="dashboard-section-body">
                    <div class="dashboard-section-table">
                        <table>
                            <tr>
                                <th class="w-60">Email</th>
                                <td>{{ $order->customer->email ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>User Type</th>
                                <td>{{ Str::ucfirst($order->customer->user_type ?? '') }}</td>
                            </tr>
                            <tr>
                                <th>First Name</th>
                                <td>{{ $order->customer->first_name ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <td>{{ $order->customer->last_name ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>{{ $order->customer->phone_no ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>1st line of Address</th>
                                <td>{{ $order->customer->address ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>2nd line of Address</th>
                                <td>{{ $order->customer->address_1 ?? '' }}</td>
                            </tr>
                            {{-- <tr>
                                <th>City</th>
                                <td>{{ $order->customer->city ?? '' }}</td>
                            </tr> --}}
                            <tr>
                                <th>Postcode</th>
                                <td>{{ $order->customer->postcode ?? '' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="dashboard-section">
                <div class="dashboard-section-header">
                    <div class="dsh-left">
                        <h4>Reservation Details</h4>
                    </div>
                    <div class="dsh-right">
                        <a href="{{ route('orders.edit', $order->id) }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                            <span>Edit</span>
                        </a>
                    </div>
                </div>
                <div class="dashboard-section-body">
                    <div class="dashboard-section-table">
                        <table>
                            <tr>
                                <th class="w-60">Collection Date</th>
                                <td>{{ $order->collection_date ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Collection Time</th>
                                <td>{{ $order->collection_time ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Delivery Date</th>
                                <td>{{ $order->delivery_date ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Delivery Time</th>
                                <td>{{ $order->delivery_time ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Instruction</th>
                                <td>{{ $order->instruction ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Infomation</th>
                                <td>{{ $order->infomation ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Frequency</th>
                                <td>
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
                                </td>
                            </tr>
                            <tr>
                                <th>Total Amount</th>
                                <td>&#163;{{ number_format($order->amount ?? '0', 2) }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ Str::ucfirst($order->status ?? '') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="dashboard-section">
                <div class="dashboard-section-header">
                    <div class="dsh-left">
                        <h4>Ordered Services</h4>
                    </div>
                    <div class="dsh-right">
                        <a href="{{ route('order-services.edit', $order->id) }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                            <span>Edit</span>
                        </a>
                    </div>
                </div>
                <div class="dashboard-section-body">
                    @if ($order->orderServices)
                        <div class="dashboard-section-table">
                            <table>
                                @foreach ($order->orderServices as $service)
                                    <tr>
                                        <th class="w-60">{{ $service->product->title }}</th>
                                        <td>&#163;{{ $service->product->price }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    @endif
                </div>
            </div>

            <div class="dashboard-section">
                <div class="dashboard-section-header">
                    <div class="dsh-left">
                        <h4>Payment Details</h4>
                    </div>
                </div>
                <div class="dashboard-section-body">
                    <div class="dashboard-section-table">
                        <table>
                            <tr>
                                <th class="w-60">Charge ID</th>
                                <td>{{ $order->payment->charge_id ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Transaction ID</th>
                                <td>{{ $order->payment->transaction_id ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Customer ID</th>
                                <td>{{ $order->payment->customer ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Amount in Cents</th>
                                <td>{{ $order->payment->amount ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Currency</th>
                                <td>{{ $order->payment->currency ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Payment Method</th>
                                <td>{{ $order->payment->payment_method ?? '' }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ Str::ucfirst($order->payment->status ?? '') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
