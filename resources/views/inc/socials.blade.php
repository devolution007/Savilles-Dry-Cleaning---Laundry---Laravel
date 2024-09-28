<div class="flex flex-row -mx-1 lg:-mx-2 mb-0 md:mb-3 lg:mb-5">
    @foreach (socialLink() as $link)
    <div class="px-1 lg:px-2">
        <a href="{{$link->url}}"><img class="w-7 md:w-12 lg:w-16" alt=""
            src="{{ asset('public/assets/images/logo/'.$link->logo) }}"></a>
    </div>
    @endforeach
</div>