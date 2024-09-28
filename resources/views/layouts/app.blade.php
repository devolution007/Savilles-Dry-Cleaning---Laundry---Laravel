<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $header }} | {{ config('app.name') }} Dashboard</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('public/front/images/favicon.ico') }}" />
    
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.0/css/all.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('public/front/css/admin.css') }}">

    <link rel="stylesheet" href="{{ asset('public/front/css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('public/front/js/app.js') }}" defer></script>
</head>

<body>
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-5 px-4 sm:px-6 lg:px-8">
                <div class="flex flex-wrap justify-between">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ $header }}
                    </h2>
                    <div class="header-right">
                        {{ $button }}
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="px-10 py-8 bg-white">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="{{ asset('public/front/js/jquery.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
    <script src="{{ asset('public/front/js/admin.js') }}"></script>
    <script src="{{ asset('public/front/js/func.js') }}"></script>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

</body>

</html>
