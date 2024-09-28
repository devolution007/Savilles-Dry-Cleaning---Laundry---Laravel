<x-app-layout>
    <x-slot name="header">
        {{ __('Update Service Details') }}
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

        <div class="alert-info">
            <p>Please fill the entire html code of the icon.</p>
            <p>Get Icons from <a href="https://fontawesome.com/search" class="font-semibold underline">FontAwesome</a>.</p>
            <p>Example: &#x3C;i class=&#x22;fa-solid fa-house&#x22;&#x3E;&#x3C;/i&#x3E;</p>
        </div>

        <form action="{{ route('services.detailsPost', $service->id) }}" method="POST" autocomplete="off"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="service_id" value="{{ $service->id }}">

            <div class="detailsList space-y-4 mb-6">
                @if (count($serviceDetails))
                    @foreach ($serviceDetails as $key => $detail)
                        <div class="detailsItem" data-step="{{ $key }}">
                            <div class="detailItemDelete elementDelete" data-delete="{{ route('services.detailsDelete', $detail->id) }}">
                                <i class="fa-solid fa-trash"></i>
                            </div>
                            <input type="hidden" name="detail[{{ $key }}][id]" value="{{ $detail->id }}">
                            <fieldset>
                                <label>Detail Icon</label>
                                <input name="detail[{{ $key }}][icon]" class="input-field" placeholder="Service Detail Icon"
                                    type="text" value="{{ old('detail[' . $key . '][icon]', $detail->icon ?? '') }}">
                            </fieldset>
                            <fieldset>
                                <label>Detail Title</label>
                                <input name="detail[{{ $key }}][title]" class="input-field" placeholder="Service Detail Title"
                                    type="text" value="{{ old('detail[' . $key . '][title]', $detail->title ?? '') }}">
                            </fieldset>
                            <fieldset>
                                <label>Detail Description</label>
                                <textarea name="detail[{{ $key }}][content]" class="input-field" placeholder="Service Detail Description" type="text">{{ old('detail[' . $key . '][content]', $detail->content ?? '') }}</textarea>
                            </fieldset>
                        </div>
                    @endforeach
                @else
                    <div class="detailsItem" data-step="0">
                        <fieldset>
                            <label>Detail Icon</label>
                            <input name="detail[0][icon]" class="input-field" placeholder="Service Icon" type="text"
                                value="{{ old('detail[0][icon]') }}">
                        </fieldset>
                        <fieldset>
                            <label>Detail Title</label>
                            <input name="detail[0][title]" class="input-field" placeholder="Service Title"
                                type="text" value="{{ old('detail[0][title]') }}">
                        </fieldset>
                        <fieldset>
                            <label>Detail Description</label>
                            <textarea name="detail[0][content]" class="input-field" placeholder="Detail Description" type="text">{{ old('detail[0][content]') }}</textarea>
                        </fieldset>
                    </div>
                @endif
            </div>



            <div class="mb-8">
                <div class="addDetailsRow rowButton" data-target="0">Add Details Item</div>
            </div>

            <button class="btn btn-dark">
                <i class="fa-solid fa-sliders"></i>
                <span>{{ __('Update') }}</span>
            </button>
        </form>
    </div>
</x-app-layout>
