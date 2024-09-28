@php
    $data = [];
    if (isset($item) && !empty($item)) {
        $data = json_decode($item['child'], false);
    }
@endphp

<div class="priceItem" data-step="{{ $key ?? '0' }}">
    <input type="hidden" name="data[{{ $key ?? '0' }}][id]" value="{{ $item['id'] ?? '' }}">

    @if (isset($item) && !empty($item))
        <div class="priceItemDelete elementDelete" data-delete="{{ route('services.pricesDelete', $item['id']) }}">
            <i class="fa-solid fa-trash"></i>
        </div>
    @else
        <div class="priceItemDelete elementDelete">
            <i class="fa-solid fa-trash"></i>
        </div>
    @endif

    <div class="priceRow">
        <div class="priceTitle">
            <fieldset>
                <label>Title</label>
                <input name="data[{{ $key ?? '0' }}][title]" class="input-field" placeholder="Sub Service Title"
                    type="text" value="{{ old('data[' . ($key ?? '0') . '][title]', $item['title'] ?? '') }}"
                    required>
            </fieldset>
            <div class="addChildRow rowButton" data-target="{{ $key ?? '0' }}">Add Sub Service Child</div>
        </div>
        <div class="priceSub">
            @if (isset($data) && !empty($data))
                @foreach ($data as $k => $sub)
                    <div class="subItem" data-item="{{ $k ?? '0' }}">
                        <div class="priceSubDelete elementDelete">
                            <i class="fa-solid fa-trash"></i>
                        </div>
                        <div class="grid grid-cols-3 gap-x-3">
                            <fieldset>
                                <input name="data[{{ $key ?? '0' }}][child][{{ $k }}][title]"
                                    class="input-field" placeholder="Sub Service Child Title" type="text"
                                    value="{{ old('data[' . ($key ?? '0') . '][child][' . ($k ?? '0') . '][title]', $sub->title ?? '') }}"
                                    required>
                            </fieldset>
                            <fieldset>
                                <input name="data[{{ $key ?? '0' }}][child][{{ $k }}][desc]"
                                    class="input-field" placeholder="Sub Service Child Description" type="text"
                                    value="{{ old('data[' . ($key ?? '0') . '][child][' . ($k ?? '0') . '][desc]', $sub->desc ?? '') }}">
                            </fieldset>
                            <fieldset>
                                <input name="data[{{ $key ?? '0' }}][child][{{ $k }}][price]"
                                    class="input-field" placeholder="Sub Service Child Price (ex: 42.75)" type="text"
                                    value="{{ old('data[' . ($key ?? '0') . '][child][' . ($k ?? '0') . '][price]', $sub->price ?? '') }}"
                                    required>
                            </fieldset>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="subItem" data-item="0">
                    <div class="priceSubDelete elementDelete">
                        <i class="fa-solid fa-trash"></i>
                    </div>
                    <div class="grid grid-cols-3 gap-x-3">
                        <fieldset>
                            <input name="data[{{ $key ?? '0' }}][child][0][title]" class="input-field"
                                placeholder="Sub Service Child Title" type="text"
                                value="{{ old('data[' . ($key ?? '0') . '][child][0][title]') }}" required>
                        </fieldset>
                        <fieldset>
                            <input name="data[{{ $key ?? '0' }}][child][0][desc]" class="input-field"
                                placeholder="Sub Service Child Description" type="text"
                                value="{{ old('data[' . ($key ?? '0') . '][child][0][desc]') }}">
                        </fieldset>
                        <fieldset>
                            <input name="data[0][child][0][price]" class="input-field"
                                placeholder="Sub Service Child Price (ex: 42.75)" type="text"
                                value="{{ old('data[' . ($key ?? '0') . '][child][0][price]') }}" required>
                        </fieldset>
                    </div>
                </div>
            @endif


        </div>
    </div>
</div>
