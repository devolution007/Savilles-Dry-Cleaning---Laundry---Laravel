@extends('layouts.master')
@section('title', 'Areas - Savilles')
@section('body')
<section id="hero">
    <div class="bg-primary py-8 md:py-16">
        <div class="container">
            <div class="page-title text-center">
                <h1 class="font-cf font-bold text-white text-3xl leading-[34px] md:text-[54px] md:leading-[60px] lg:text-6xl lg:leading-[70px] xl:text-[80px] xl:leading-[92px] mb-2 md:mb-4">
                    Areas
                </h1>
            </div>
        </div>
    </div>
</section>
<section id="services">
    <div class="md:py-16">
        <div class="container mx-auto px-4 py-8">
            <!--<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-8 gap-4">-->
            <!--    @foreach ($areas as $area)-->
            <!--    <div class="bg-primary text-white rounded-lg shadow overflow-hidden flex items-center py-2">-->
            <!--        <img src="{{asset('public/front/images/icons/location.png')}}" width="20px" class="ml-4 mr-4"/>-->
            <!--        {{ $area->area }}-->
            <!--    </div>-->
            <!--    @endforeach-->
            <!--</div>-->
            @php
                $previousLetter = '';
            @endphp
            
            <div class="flex flex-wrap gap-6">
                @foreach ($areas as $area)
                    @php
                        $firstLetter = strtoupper(substr($area->area, 0, 1));
                    @endphp
            
                    @if ($firstLetter !== $previousLetter)
                        @php
                            $previousLetter = $firstLetter;
                        @endphp
                        <!-- Create a new column for each alphabet group -->
                        <div class="flex flex-col w-52 mb-4">
                            <h3 class="text-3xl font-bold mb-4 bg-gradient-to-r from-pink-500 to-orange-500 text-transparent bg-clip-text transition transform hover:scale-110 hover:shadow-lg duration-300 ease-in-out">
                                {{ $firstLetter }}
                            </h3>
                            <!-- Start listing areas for this alphabet -->
                    @endif
            
                    <!-- Area card with a larger width -->
                    <a href="{{route('area.show',$area->slug)}}">
                        <div class="bg-primary text-white rounded-lg shadow-lg overflow-hidden flex items-center py-2 px-3 mb-2 transition transform hover:scale-110 hover:shadow-lg duration-300 ease-in-out">
                            <img src="{{ asset('public/front/images/icons/location.png') }}" width="20px" class="mr-2" />
                            <span class="text-sm">{{ $area->area }}</span>
                        </div>
                    </a>
                    @if ($loop->last || strtoupper(substr($areas[$loop->index + 1]->area, 0, 1)) !== $firstLetter)
                        </div> <!-- Close the column -->
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>

@include('inc.cta')

@endsection