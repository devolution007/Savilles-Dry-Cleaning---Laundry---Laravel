<x-app-layout>
    <x-slot name="header">
        @if (isset($customer))
            {{ __('Update Customer') }}
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
            @if (isset($customer))
                @method('PUT')
            @endif

            <fieldset>
                <label>User Type</label>
                <select name="user_type" class="input-field">
                    <option value="individual"
                        {{ old('user_type', $customer->user_type ?? '') == 'individual' ? 'selected' : '' }}>
                        Individual</option>
                    <option value="company"
                        {{ old('user_type', $customer->user_type ?? '') == 'company' ? 'selected' : '' }}>Company
                    </option>
                </select>
            </fieldset>

            <div class="grid grid-cols-2 gap-x-6">
                <fieldset>
                    <label>First Name</label>
                    <input name="first_name" class="input-field" placeholder="First Name" type="text"
                        value="{{ old('first_name', $customer->first_name ?? '') }}"></input>
                </fieldset>
                <fieldset>
                    <label>Last Name</label>
                    <input name="last_name" class="input-field" placeholder="Last Name" type="text"
                        value="{{ old('last_name', $customer->last_name ?? '') }}"></input>
                </fieldset>
                <fieldset>
                    <label>Email</label>
                    <input name="email" class="input-field" placeholder="Email" type="text"
                        value="{{ old('email', $customer->email ?? '') }}">
                </fieldset>

                <fieldset>
                    <label>Phone Number</label>
                    <input name="phone_no" class="input-field" placeholder="Phone Number" type="text"
                        value="{{ old('phone_no', $customer->phone_no ?? '') }}"></input>
                </fieldset>
            </div>

            <fieldset>
                <label>Address #1</label>
                <textarea name="address" class="input-field" placeholder="Address #1" type="text">{{ old('address', $customer->address ?? '') }}</textarea>
            </fieldset>
            <fieldset>
                <label>Address #2</label>
                <textarea name="address_1" class="input-field" placeholder="Address #2" type="text">{{ old('address_1', $customer->address_1 ?? '') }}</textarea>
            </fieldset>

            <div class="grid grid-cols-2 gap-x-6">
                {{-- <fieldset>
                    <label>City</label>
                    <select name="city" class="input-field">
                        <option value="">-- Select City --</option>
                        <option value="London" {{ old('city', $customer->city ?? '') == 'London' ? 'selected' : '' }}>
                            London</option>
                        <option value="Manchester"
                            {{ old('city', $customer->city ?? '') == 'Manchester' ? 'selected' : '' }}>
                            Manchester</option>
                    </select>
                </fieldset> --}}

                <fieldset>
                    <label>Postcode</label>
                    <input name="postcode" class="input-field" placeholder="Postcode" type="text"
                        value="{{ old('postcode', $customer->postcode ?? '') }}"></input>
                </fieldset>
            </div>

            <button class="btn btn-dark">
                <i class="fa-solid fa-sliders"></i>
                <span>
                    @if (isset($customer))
                        {{ __('Update') }}
                    @endif
                </span>
            </button>
        </form>
    </div>
</x-app-layout>
