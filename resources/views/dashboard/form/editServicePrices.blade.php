<x-app-layout>
    <x-slot name="header">
        {{ __('Update Service Prices') }}
    </x-slot>
    <x-slot name="button">
        <a href="{{ route('services.index') }}" class="admin-btn">Go Back</a>
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

        <form action="{{ route('services.pricesPost', $service->id) }}" method="POST" autocomplete="off"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="service_id" value="{{ $service->id }}">

            <div class="priceList mb-4">
                
                @if (isset($servicePrices) && count($servicePrices))
                    @foreach ($servicePrices as $key => $item)
                        <x-servicePriceElement :key="$key" :item="$item"></x-servicePriceElement>
                    @endforeach
                @else
                    <x-servicePriceElement></x-servicePriceElement>
                @endif

            </div>

            <div class="mb-8">
                <div class="addSubRow rowButton" data-target="0">Add Sub Service</div>
            </div>

            <button class="btn btn-dark">
                <i class="fa-solid fa-sliders"></i>
                <span>{{ __('Update') }}</span>
            </button>
        </form>
    </div>
</x-app-layout>
