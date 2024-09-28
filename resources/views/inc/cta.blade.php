<section id="book">
    <div class="bg-cover md:bg-[length:0%] bg-no-repeat bg-left-bottom py-6 md:py-0"
        style="background-image: url('{{ asset('public/front/images/bg/home.jpg') }}');">
        <div class="flex flex-wrap px-4 md:px-0">
            <div class="w-9/12 sm:w-3/5 md:w-full mx-auto">
                <div class="bg-primary md:bg-secondary py-8 md:py-14 lg:py-[68px] xl:py-24">
                    <div class="container">
                        <div class="text-center">
                            <h3 class="text-base sm:text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-semibold sm:text-blue text-white mb-3 md:mb-5 lg:mb-6 xl:mb-8">Take a Load Off Your Shoulders
                            </h3>
                            <a href="{{ route('checkout') }}"
                                class="btn btn-secondary cta-btn md:btn-primary !text-[8px] md:!text-base hover:!bg-primary hover:!text-white hover:scale-110">
                                <img src="{{ asset('public/front/images/icons/logo-button.png') }}" class="inline-block w-4 lg:w-11 mr-2">
                                <span>Schedule Your Pickup</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
