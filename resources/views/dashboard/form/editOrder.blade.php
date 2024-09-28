<x-app-layout>
    <x-slot name="header">
        @if (isset($order))
            {{ __('Update Order') }}
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
            @if (isset($order))
                @method('PUT')
            @endif

            <div class="field-set">
                <h4 class="text-xl font-semibold mb-2">Collection Time</h4>

                <div class="grid grid-cols-2 gap-x-6">
                    <fieldset>
                        <label>Select Day</label>
                        <input type="date" name="collection_date" placeholder="Select Date" class="input-field"
                            value="{{ old('collection_date', $order->collection_date ?? '') }}">
                    </fieldset>
                    <fieldset>
                        <label>Select Time</label>
                        <select name="collection_time" class="input-field">
                            <option value="08.00 - 09.00"
                                {{ old('collection_time', $order->collection_time ?? '') == '08.00 - 09.00' ? 'selected' : '' }}>
                                08.00 - 09.00</option>
                            <option value="09.00 - 10.00"
                                {{ old('collection_time', $order->collection_time ?? '') == '09.00 - 10.00' ? 'selected' : '' }}>
                                09.00 - 10.00</option>
                            <option value="10.00 - 11.00"
                                {{ old('collection_time', $order->collection_time ?? '') == '10.00 - 11.00' ? 'selected' : '' }}>
                                10.00 - 11.00</option>
                        </select>
                    </fieldset>
                </div>
            </div>

            <div class="field-set">
                <h4 class="text-xl font-semibold mb-2">Delivery Time</h4>

                <div class="grid grid-cols-2 gap-x-6">
                    <fieldset>
                        <label>Select Day</label>
                        <input type="date" name="delivery_date" placeholder="Select Date" class="input-field"
                            value="{{ old('delivery_date', $order->delivery_date ?? '') }}">
                    </fieldset>
                    <fieldset>
                        <label>Select Time</label>
                        <select name="delivery_time" class="input-field">
                            <option value="08.00 - 09.00"
                                {{ old('delivery_time', $order->delivery_time ?? '') == '08.00 - 09.00' ? 'selected' : '' }}>
                                08.00 - 09.00</option>
                            <option value="09.00 - 10.00"
                                {{ old('delivery_time', $order->delivery_time ?? '') == '09.00 - 10.00' ? 'selected' : '' }}>
                                09.00 - 10.00</option>
                            <option value="10.00 - 11.00"
                                {{ old('delivery_time', $order->delivery_time ?? '') == '10.00 - 11.00' ? 'selected' : '' }}>
                                10.00 - 11.00</option>
                        </select>
                    </fieldset>
                </div>
            </div>

            <div class="field-set">
                <h4 class="text-xl font-semibold mb-2">Driver Instruction</h4>

                <fieldset>
                    <label>Select Instruction</label>
                    <select name="instruction" class="input-field">
                        <option value="Driver Drops, Rings & Wait"
                            {{ old('instruction', $order->instruction ?? '') == 'Driver Drops, Rings & Wait' ? 'selected' : '' }}>
                            Driver Drops, Rings & Wait
                        </option>
                        <option value="Leave it at The Door"
                            {{ old('instruction', $order->instruction ?? '') == 'Leave it at The Door' ? 'selected' : '' }}>
                            Leave it at The Door</option>
                    </select>
                </fieldset>

                <fieldset>
                    <label>Infomation</label>
                    <textarea name="infomation" class="input-field" placeholder="Add any special instructions for driver">{{ old('infomation', $order->infomation ?? '') }}</textarea>
                </fieldset>
            </div>

            <div class="grid grid-cols-2 gap-x-6">
                <fieldset>
                    <label>Frequency</label>
                    <select name="frequency" class="input-field">
                        <option value="once"
                            {{ old('frequency', $order->frequency ?? '') == 'once' ? 'selected' : '' }}>
                            Just Once</option>
                        <option value="weekly"
                            {{ old('frequency', $order->frequency ?? '') == 'weekly' ? 'selected' : '' }}>Weekly
                        </option>
                        <option value="two_weeks"
                            {{ old('frequency', $order->frequency ?? '') == 'two_weeks' ? 'selected' : '' }}>Every Two
                            Weeks</option>
                        <option value="four_weeks"
                            {{ old('frequency', $order->frequency ?? '') == 'four_weeks' ? 'selected' : '' }}>Every
                            Four
                            Weeks</option>
                    </select>
                </fieldset>
                <fieldset>
                    <label>Status</label>
                    <select name="status" class="input-field">
                        <option value="unpaid" {{ old('status', $order->status ?? '') == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                        <option value="paid" {{ old('status', $order->status ?? '') == 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="completed" {{ old('status', $order->status ?? '') == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ old('status', $order->status ?? '') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </fieldset>
            </div>

            <button class="btn btn-dark">
                <i class="fa-solid fa-sliders"></i>
                <span>
                    @if (isset($order))
                        {{ __('Update') }}
                    @endif
                </span>
            </button>
        </form>
    </div>
</x-app-layout>
