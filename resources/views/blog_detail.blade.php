@extends('layouts.master')
@section('title', $page->title.' - Savilles Dry Cleaners')
@section('canonical_url', route('blog.show', ['slug' => $page->slug]))
@section('body')
<section id="contact">
    <div class="contact py-8 md:py-12 lg:py-16">
        <div class="container">
            <div class="flex flex-wrap -mx-4">
                <div class="flex-initial w-full px-4 mb-12 md:mb-12 lg:mb-0">
                    <div class="contact-title mb-6 md:mb-8 lg:mb-12">
                        <h1 class="font-cf text-2xl md:text-4xl lg:text-5xl font-semibold text-gray-800 mb-1 md:mb-2 lg:mb-3">
                            {{ $page->title }}
                        </h1>
                        <p class="mb-5">
                            Published on {{ date('d.m.Y', strtotime($page->created_at)) }} by Admin
                        </p>
                        <!-- @if(!empty($page->thumbnail))
                        <img src="{{ asset('public/thumbnails/'.$page->thumbnail) }}" alt="{{ $page->title }}" class="w-full object-cover" style="width: 100%; height: 450px;">
                        @endif -->
                    </div>
                </div>
                <div class="flex-initial w-full px-4 mb-12 md:mb-12 lg:mb-0">
                    {!! $page->main_text_body !!}
                </div>
                @if(count($page->faqs) > 0)
                <div class="flex-initial w-full px-4 mb-6 md:mb-8 lg:mb-0">
                    <h2 class="text-3xl font-bold mb-8">Frequently Asked Questions</h2>
                    @foreach ($page->faqs as $faq)
                    <div class="border-t border-gray-200 py-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold">{{ $faq->question }}</h3>
                        </div>
                        <p class="mt-4">{{ $faq->answer }}</p>
                    </div>
                    @endforeach
                </div>
                @endif

            </div>
        </div>
    </div>
</section>
@include('inc.cta')
@endsection