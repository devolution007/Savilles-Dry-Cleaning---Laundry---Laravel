@if (count($sections) > 0)
    <section id="services">
        <div class="bg-primary py-8 md:py-12 lg:py-16">
            <div class="container">
                <div class="-mx-4 px-4 overflow-auto lg:mx-0 lg:px-0 lg:overflow-visible">
                    <div class="services-row viewport">
                        <div class="services-item-div flex gap-2 md:gap-4"> <!--draggable-->

                            @foreach ($sections as $section)
                                <a href="{{ route('services.show', $section->slug) }}"
                                    class="serh-item {{ request()->routeIs('services.show') && request()->route('slug') == $section->slug ? 'active' : '' }}">
                                    <div class="serh-img">
                                        <img src="{{ asset('public/front/'.$section->icon->icon) }}">
                                    </div>
                                    <h4>{{ $section->name }}</h4>
                                </a>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif