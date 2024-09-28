<div class="flex flex-wrap items-center">
    <img class="w-5 lg:w-8" alt="Call"
        src="{{ asset('public/front/images/icons/phone-call.svg') }}">
    <div class="pl-2 lg:pl-3">
        <p class="font-normal text-[8px] md:text-xs leading-3 text-white/70">Call</p>
        {{-- <a href="tel:01932863248" class="font-bold text-xxs md:text-base leading-4 text-white">{{setting()->mobile_number}}</a> --}}
        <p class="font-bold text-xxs md:text-base leading-4 text-white">{{setting()->mobile_number}}</p>

    </div>
</div>