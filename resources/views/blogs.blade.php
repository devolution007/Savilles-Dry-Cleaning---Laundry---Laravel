@extends('layouts.master')
@section('title', 'Blogs - Savilles')
@section('body')
<section id="hero">
    <div class="bg-primary py-8 md:py-16">
        <div class="container">
            <div class="page-title text-center">
                <h1 class="font-cf font-bold text-white text-3xl leading-[34px] md:text-[54px] md:leading-[60px] lg:text-6xl lg:leading-[70px] xl:text-[80px] xl:leading-[92px] mb-2 md:mb-4">
                    Blog
                </h1>
            </div>
        </div>
    </div>
</section>
<section id="services">
    <div class="md:py-16">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                @foreach ($blogs as $page)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <a href="{{ route('blog.show', ['slug' => $page->slug]) }}" class="block">
                        @if ($page->thumbnail)
                        <img src="{{ asset('public/thumbnails/'.$page->thumbnail) }}" alt="{{ $page->title }}" class="w-full h-32 object-cover object-center">
                        @else
                        <img src="{{ asset('public/thumbnails/no-thumbnail.jpg') }}" alt="{{ $page->title }}" class="w-full h-32 object-cover object-center">
                        @endif
                    </a>
                    <div class="p-4">
                        <a href="{{ route('blog.show', ['slug' => $page->slug]) }}" class="text-lg font-semibold mb-2 hover:text-blue-500 block">{{ $page->title }}</a>
                        <p class="text-gray-700 text-sm">{{ $page->excerpt }}</p>
                        <a href="{{ route('blog.show', ['slug' => $page->slug]) }}" class="text-blue-500 hover:underline block mt-2">Read more</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@include('inc.cta')

@endsection