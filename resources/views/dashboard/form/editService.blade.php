<x-app-layout>
    <x-slot name="header">
        @if (isset($service))
            {{ __('Update Service') }}
        @else
            {{ __('Add New Service') }}
        @endif
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

        <form action="{{ $path }}" method="POST" autocomplete="off" enctype="multipart/form-data">
            @csrf
            @if (isset($service))
                @method('PUT')
            @endif

            @if (isset($service) && $service->image)
                <div class="rounded-md overflow-hidden w-auto inline-block p-4 mb-4 bg-secondary">
                    <img src="{{ asset('images/products/' . $service->image) }}">
                </div>
            @endif

            <fieldset>
                <label>Image</label>
                <input name="image" class="input-field" type="file" accept="image/*">
            </fieldset>

            <div class="grid grid-cols-2 gap-x-6">
                <fieldset>
                    <label>Service Title</label>
                    <input name="title" class="input-field {{ isset($service->slug) ? '' : 'forSlug' }}" placeholder="Service Title" type="text"
                        value="{{ old('title', $service->title ?? '') }}">
                </fieldset>
                <fieldset>
                    <label>Service Slug</label>
                    <input name="slug" class="input-field slugResult" placeholder="Service Slug" type="text"
                        value="{{ old('slug', $service->slug ?? '') }}">
                </fieldset>
            </div>

            <fieldset>
                <label>Service Description</label>
                <textarea name="content" class="input-field" placeholder="Service Description" type="text">{{ old('content', $service->content ?? '') }}</textarea>
            </fieldset>
            <fieldset>
                <label>Service Details</label>
                <textarea name="details" class="input-field" placeholder="Service Details" type="text">{{ old('details', $service->details ?? '') }}</textarea>
            </fieldset>

            {{-- <div class="grid grid-cols-2 gap-x-6">
                <fieldset>
                    <label>Service Price (&#163;)</label>
                    <input name="price" class="input-field" placeholder="Service Price (ex: 42.75)" type="text"
                        value="{{ old('price', $service->price ?? '') }}">
                </fieldset>
                <fieldset>
                    <label>Service Status</label>
                    <select name="status" class="input-field">
                        <option value="1" {{ old('status', $service->status ?? '') == 1 ? 'selected' : '' }}>Enabled</option>
                        <option value="0" {{ old('status', $service->status ?? '') == 0 ? 'selected' : '' }}>Disabled</option>
                    </select>
                </fieldset>
            </div> --}}

            <fieldset>
                <label>Service Status</label>
                <select name="status" class="input-field">
                    <option value="1" {{ old('status', $service->status ?? '') == 1 ? 'selected' : '' }}>Enabled
                    </option>
                    <option value="0" {{ old('status', $service->status ?? '') == 0 ? 'selected' : '' }}>Disabled
                    </option>
                </select>
            </fieldset>

            <button class="btn btn-dark">
                <i class="fa-solid fa-sliders"></i>
                <span>
                    @if (isset($service))
                        {{ __('Update') }}
                    @else
                        {{ __('Create') }}
                    @endif
                </span>
            </button>
        </form>
    </div>
</x-app-layout>
