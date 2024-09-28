@extends('layouts.master')

@section('title', 'Page Not Found! - Savilles')

@section('body')
    <section id="error">
        <div class="container">
            <div class="py-6 md:py-8 lg:py-12">
                <div class="error-page text-center">
                    <h1 class="text-gray-900 font-extrabold text-2xl md:text-3xl lg:text-4xl mb-1 md:mb-2">Page Not Found!</h1>
                    <p class="text-sm md:text-base md:leading-5 lg:text-lg lg:leading-6 text-gray-400 font-medium mb-3 md:mb-4 lg:mb-5">
                        <span class="block">Page doesn't exist or some other error occured.</span>
                        <span class="block">You can go back to our home page.</span>
                    </p>
                    <a href="{{ route('home') }}" class="btn btn-primary">Go Back to Home</a>
                </div>
            </div>
        </div>
    </section>
@endsection
