@extends('layouts.master')
@section('title', $area?->area.' - Savilles Dry Cleaners')
@section('canonical_url', route('area.show', ['slug' => $area?->slug]))
@section('body')
<section id="contact">
    <div class="contact py-8 md:py-12 lg:py-16">
        <div class="container">
            <div class="flex flex-wrap -mx-4">
                <div class="flex-initial w-full px-4 mb-12 md:mb-12 lg:mb-0">
                    <div class="contact-title mb-6 md:mb-8 lg:mb-12">
                        <h1 class="font-cf text-2xl md:text-4xl lg:text-5xl font-semibold text-gray-800 mb-1 md:mb-2 lg:mb-3">
                            {{ $area?->area }}
                        </h1>
                        @if(!empty($area?->thumbnail))
                        <img src="{{ asset('public/thumbnails/'.$area->thumbnail) }}" alt="{{ $area?->area }}" class="w-full object-cover" style="width: 100%; height: 450px;">
                        @endif
                    </div>
                </div>
                <div class="flex-initial w-full px-4 mb-12 md:mb-12 lg:mb-0">
                    {!! $area?->main_text_body !!}
                </div>
                @if(count($area?->faqs) > 0)
                <!--<div class="flex-initial w-full px-4 mb-6 md:mb-8 lg:mb-0">-->
                <!--    <h2 class="text-3xl font-bold mb-8">Frequently Asked Questions</h2>-->
                <!--    @foreach ($area->faqs as $faq)-->
                <!--    <div class="border-t border-gray-200 py-6">-->
                <!--        <div class="flex items-center justify-between">-->
                <!--            <h3 class="text-lg font-semibold">{{ $faq->question }}</h3>-->
                <!--        </div>-->
                <!--        <p class="mt-4">{{ $faq->answer }}</p>-->
                <!--    </div>-->
                <!--    @endforeach-->
                <!--</div>-->
                <div class="flex-initial w-full px-4 mt-3 mb-6 md:mb-8 lg:mb-0">
                    <h2 class="text-3xl font-bold mb-8">Frequently Asked Questions</h2>
                     @foreach ($area?->faqs as $key => $faq)
                    <div class="border-b border-slate-200">
                         <button onclick="toggleAccordion({{$key}})" class="w-full flex justify-between items-center py-5 text-slate-800">
                            <h3 class="text-lg font-semibold">{{ $faq?->question }}</h3>
                            <span id="icon-{{$key}}" class="text-slate-800 transition-transform duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd" d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </button>
                        <div id="content-{{$key}}" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out" style="{{$key == 0 ?: 'max-height:0px;'}}">
                            <div class="pb-5 text-sm text-slate-500">
                              {{ $faq?->answer }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<script>
  function toggleAccordion(index) {
    const content = document.getElementById(`content-${index}`);
    const icon = document.getElementById(`icon-${index}`);
 
    // SVG for Down icon
    const downSVG = `
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
        <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
      </svg>
    `;
 
    // SVG for Up icon
    const upSVG = `
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
        <path fill-rule="evenodd" d="M11.78 9.78a.75.75 0 0 1-1.06 0L8 7.06 5.28 9.78a.75.75 0 0 1-1.06-1.06l3.25-3.25a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd" />
      </svg>
    `;
 
    // Toggle the content's max-height for smooth opening and closing
    if (content.style.maxHeight && content.style.maxHeight !== '0px') {
      content.style.maxHeight = '0';
      icon.innerHTML = upSVG;
    } else {
      content.style.maxHeight = content.scrollHeight + 'px';
      icon.innerHTML = downSVG;
    }
  }
</script>
@include('inc.cta')
@endsection