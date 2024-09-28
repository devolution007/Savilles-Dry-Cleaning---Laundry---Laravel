<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Savilles - Dry Cleaning & Laundry</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.0/css/all.css">
    <link rel="stylesheet" href="{{ asset('public/front/css/app.css') }}">
</head>

<body class="bg-primary">
    <div class="flex flex-wrap items-center w-full h-full min-h-screen py-12">
        <div class="container">
            <div class="logo text-center mb-8">
                <img src="{{ asset('public/front/images/logo-big.svg') }}" class="w-[200px] md:w-[350px] lg:w-[550px] mx-auto">
            </div>
            <div class="content text-center mb-4 md:mb-6 lg:mb-10">
                <p class="font-regular text-white text-lg sm:text-xl md:text-2xl lg:text-5xl lg:leading-[54px]">We are working on a new website
                    with a booking system for home collection/ delivery for our customers in
                    surrey. enter your email to be notified of when we launch. Thank you.</p>
            </div>

            <div class="flex flex-col">
                <div class="form text-center mb-0 md:mb-12 order-2">
                    <form>
                        <div
                            class="relative bg-[#078b8a] px-2 py-1.5 md:px-6 md:py-3 w-full md:w-[550px] rounded-xl md:rounded-full inline-block">
                            <input type="email"
                                class="border-0 block w-full bg-transparent px-2 py-2 placeholder:text-gray-200 text-white text-sm md:text-lg focus:shadow-none focus:outline-0"
                                placeholder="Enter your email address">
                            <div class="absolute top-1.5 right-1.5 md:top-2 md:right-2">
                                <button type="submit"
                                    class="text-gray-800 font-semibold text-xs md:text-lg bg-white px-2.5 py-2.5 md:px-8 md:py-3 rounded-xl md:rounded-full transition duration-300 hover:bg-gray-800 hover:text-white">Notify
                                    Me</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="socials text-center order-1 md:order-3 mb-6 md:mb-0">
                    <ul>
                        {{-- <li>
                            <a href="#">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        </li> --}}
                        <li>
                            <a href="#">
                                <i class="fa-solid fa-envelope"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</body>

</html>