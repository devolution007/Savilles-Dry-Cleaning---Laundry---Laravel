<x-app-layout>
    <x-slot name="header">
        @if (isset($services))
            {{ __('Update Order Services') }}
        @endif
    </x-slot>
    <x-slot name="button">
        <a href="{{ route('orders.index') }}" class="admin-btn">Go Back</a>
    </x-slot>

    <div class="dashboard">

        @include('components.alerts')

        @if ($errors->any())
            <div class="alert-danger">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ $path }}" method="POST" autocomplete="off" enctype="multipart/form-data">
            @csrf
            @if (isset($services))
                @method('PUT')
            @endif

            <input type="hidden" name="order_id" value="{{ $orderId ?? '' }}">

            @if (count($services))
                <div class="grid grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-6">
                    @foreach ($services as $service)
                        <fieldset>
                            <img src="{{ asset('images/checkout/' . $service->image) }}" class="w-20">
                            <div class="form-check mt-3">

                                @php
                                    $checked = false;
                                @endphp
                                @if (count($orderServices))
                                    @foreach ($orderServices as $item)
                                        @if ($service->id == $item->service)
                                            @php
                                                $checked = true;
                                            @endphp
                                        @endif
                                    @endforeach
                                @endif

                                <input name="services[]" class="check-input-field" type="checkbox"
                                    value="{{ $service->id }}" {{ isset($checked) && $checked ? 'checked' : '' }}>
                                <label>{{ $service->title }}</label>
                            </div>
                        </fieldset>
                    @endforeach
                </div>
            @endif


            <button class="btn btn-dark">
                <i class="fa-solid fa-sliders"></i>
                <span>
                    @if (isset($services))
                        {{ __('Update') }}
                    @else
                        {{ __('Create') }}
                    @endif
                </span>
            </button>
        </form>
    </div>
</x-app-layout>
