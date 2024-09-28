<x-app-layout>
    <x-slot name="header">
        {{ __('Manage Orders') }}
    </x-slot>
    <x-slot name="button">
    </x-slot>

    <div class="dashboard">

        @include('components.alerts')

        <table id="dataTables">
            <thead>
                <tr>
                    <th class="w-6">#</th>
                    <td>Name</td>
                    <td class="w-28">Collection Date</td>
                    <td class="w-28">Delivery Date</td>
                    <td class="w-20">Amount</td>
                    <td class="w-16">Status</td>
                    <td class="w-40">Order Time</td>
                    <td class="w-14">Action</td>
                </tr>
            </thead>
            <tbody>
                @if (count($orders))
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->customer ? $order->customer->first_name . ' ' . $order->customer->last_name : '' }}
                            </td>
                            <td>{{ $order->collection_date }}</td>
                            <td>{{ $order->delivery_date }}</td>
                            <td>&#163;{{ number_format($order->amount, 2) }}</td>
                            <td>{{ Str::ucfirst($order->status) }}
                            </td>
                            <td>{{ $order->created_at }}</td>
                            <td>
                                <ul class="actions">
                                    <li><a href="{{ route('orders.show', $order->id) }}"><i
                                                class="fa-solid fa-eye"></i></a></li>
                                    <li>
                                        <form class="deleteForm" action="{{ route('orders.destroy', $order->id) }}"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

</x-app-layout>
