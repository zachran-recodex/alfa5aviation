@extends('layouts.main')

@section('meta_tag')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Alfa5 Aviation">
    <meta name="keywords" content="Private Jet Charter">
    <meta name="author" content="Zachran Razendra">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#2A6F97">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Alfa5 Aviation">
    <meta property="og:description" content="Private Jet Charter">
    <meta property="og:image" content="{{ asset('images/logo-sagala.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Alfa5 Aviation">
    <meta property="og:locale" content="en_US">
    <meta property="og:logo" content="{{ asset('images/logo-sagala.png') }}" />
    <meta property="og:locale:alternate" content="id_ID">
    <meta property="og:updated_time" content="{{ now()->toIso8601String() }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="alfa5aviation.com">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="Alfa5 Aviation">
    <meta name="twitter:description" content="Private Jet Charter">
    <meta name="twitter:image" content="{{ asset('images/logo-sagala.png') }}">
    <meta name="twitter:site" content="">
    <meta name="twitter:creator" content="">

    <meta name="DC.title" content="Alfa5 Aviation">
    <meta name="DC.creator" content="Zachran Razendra">
    <meta name="DC.description" content="Private Jet Charter">
    <meta name="DC.publisher" content="Alfa5 Aviation">
    <meta name="DC.contributor" content="Zachran Razendra">
    <meta name="DC.date" content="{{ now()->toIso8601String() }}">
    <meta name="DC.type" content="text">
    <meta name="DC.format" content="text/html">
    <meta name="DC.identifier" content="{{ url()->current() }}">
    <meta name="DC.language" content="en">
    <meta name="DC.coverage" content="Worldwide">
    <meta name="DC.rights" content="© Alfa5 Aviation">

    <link rel="canonical" href="{{ url()->current() }}">

    <title>Alfa5 Aviation</title>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-cover bg-center bg-no-repeat h-[50vh] flex justify-center items-center"
        style="background-image: url({{ asset('images/hero-section.png') }})">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 flex flex-col text-center">
            <!-- Title -->
            <h2 class="text-white text-4xl font-bold mb-4">Fleets</h2>

            <!-- Breadcrumbs -->
            <div class="flex justify-center">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href="{{ route('home') }}"
                                class="inline-flex items-center text-sm font-medium text-white hover:text-[#1A2D73]">
                                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                </svg>
                                Home
                            </a>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-white mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="ms-1 text-sm font-medium text-white md:ms-2">Fleets</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

    </section>

    <!-- Fleet Section -->
    <section class="py-8 sm:py-12 lg:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Text Section -->
            <div class="flex flex-col justify-center mb-8 text-center">
                <!-- Section Subtitle -->
                <h3 class="text-[#FFDA03] text-lg font-semibold mb-2">OUR FLEETS</h3>

                <!-- Section Title -->
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                    Checkout the Popular Private Jet
                </h2>
            </div>

            <!-- Service Cards -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 justify-center">
                <!-- Card -->
                <div class="flex flex-row items-center border border-gray-300 rounded-lg overflow-hidden shadow-md">
                    <!-- Image Section -->
                    <a href="#" class="w-1/3">
                        <img class="object-cover w-full h-full" src="{{ asset('images/pj.jpg') }}"
                            alt="Private Jet Charter" />
                    </a>

                    <!-- Description Section -->
                    <div class="w-2/3 p-6">
                        <a href="#">
                            <h5 class="text-xl font-bold text-gray-800 mb-2">Embraer Legacy 600</h5>
                        </a>
                        <p class="text-gray-600 text-justify mb-4">
                            At Alfa5 Aviation, we set a new standard for corporate travel with our Private Jet Charter...
                        </p>
                        <a href="#" class="text-[#1A2D73] font-semibold hover:underline">Discover More</a>
                    </div>
                </div>

                <!-- Card -->
                <div class="flex flex-row items-center border border-gray-300 rounded-lg overflow-hidden shadow-md">
                    <!-- Image Section -->
                    <a href="#" class="w-1/3">
                        <img class="object-cover w-full h-full" src="{{ asset('images/pj.jpg') }}"
                            alt="Private Jet Charter" />
                    </a>

                    <!-- Description Section -->
                    <div class="w-2/3 p-6">
                        <a href="#">
                            <h5 class="text-xl font-bold text-gray-800 mb-2">Private Jet Charter</h5>
                        </a>
                        <p class="text-gray-600 text-justify mb-4">
                            At Alfa5 Aviation, we set a new standard for corporate travel with our Private Jet Charter...
                        </p>
                        <a href="#" class="text-[#1A2D73] font-semibold hover:underline">Discover More</a>
                    </div>
                </div>

                <!-- Repeat for other cards -->
            </div>
        </div>
    </section>

    <!-- Request a Quote Section -->
    <section class="relative bg-cover bg-center bg-no-repeat h-[500px]"
        style="background-image: url({{ asset('images/hero-section.png') }})">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <div
            class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center justify-center h-full text-center">
            <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">
                We Fly You To Over 20,000 Destinations Worldwide
            </h2>
            <p class="text-lg text-gray-300 mb-6">
                Alfa5 Aviation proudly raises the bar and exceeds the standard for luxury and corporate private jet charter
                services. We pride ourselves on offering a professional and personalized service.
            </p>
            <a href="#"
                class="bg-[#1A2D73] text-white font-semibold py-3 px-8 rounded-full hover:bg-blue-900 transition">
                Request Quote
            </a>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="py-8 sm:py-12 lg:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Title -->
            <div class="text-center">
                <h3 class="text-lg font-semibold text-[#FFDA03] mb-2">FROM THE NEWS POSTS</h3>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-12">
                    Checkout Our Latest Aviation News and Articles
                </h2>
            </div>

            <!-- News Cards -->
            <div class="overflow-x-auto">
                <div class="flex space-x-8">
                    <!-- Card 1 -->
                    <div class="min-w-[350px] bg-white border border-gray-200 rounded-lg shadow">
                        <a href="#">
                            <img class="rounded-t-lg w-full h-[250px] object-cover" src="{{ asset('images/pj.jpg') }}"
                                alt="Embraer Legacy 600" />
                        </a>
                        <div class="p-5 mb-5">
                            <div class="mb-5 flex justify-between">
                                <p>BY AUTHOR</p>
                                <p>AUGUST 26, 2024</p>
                            </div>
                            <a href="#">
                                <h5 class="mb-5 text-2xl font-bold tracking-tight text-gray-900 text-justify">
                                    All You Need to Know About Ground Handling
                                </h5>
                            </a>
                            <a href="#"
                                class="border border-[#1A2D73] text-[#1A2D73] font-semibold py-3 px-8 rounded-full hover:border-blue-900 hover:text-blue-900 transition">
                                Read More
                            </a>
                        </div>
                    </div>

                    <!-- Card 1 -->
                    <div class="min-w-[350px] bg-white border border-gray-200 rounded-lg shadow">
                        <a href="#">
                            <img class="rounded-t-lg w-full h-[250px] object-cover" src="{{ asset('images/pj.jpg') }}"
                                alt="Embraer Legacy 600" />
                        </a>
                        <div class="p-5 mb-5">
                            <div class="mb-5 flex justify-between">
                                <p>BY AUTHOR</p>
                                <p>AUGUST 26, 2024</p>
                            </div>
                            <a href="#">
                                <h5 class="mb-5 text-2xl font-bold tracking-tight text-gray-900 text-justify">
                                    All You Need to Know About Ground Handling
                                </h5>
                            </a>
                            <a href="#"
                                class="border border-[#1A2D73] text-[#1A2D73] font-semibold py-3 px-8 rounded-full hover:border-blue-900 hover:text-blue-900 transition">
                                Read More
                            </a>
                        </div>
                    </div>

                    <!-- Card 1 -->
                    <div class="min-w-[350px] bg-white border border-gray-200 rounded-lg shadow">
                        <a href="#">
                            <img class="rounded-t-lg w-full h-[250px] object-cover" src="{{ asset('images/pj.jpg') }}"
                                alt="Embraer Legacy 600" />
                        </a>
                        <div class="p-5 mb-5">
                            <div class="mb-5 flex justify-between">
                                <p>BY AUTHOR</p>
                                <p>AUGUST 26, 2024</p>
                            </div>
                            <a href="#">
                                <h5 class="mb-5 text-2xl font-bold tracking-tight text-gray-900 text-justify">
                                    All You Need to Know About Ground Handling
                                </h5>
                            </a>
                            <a href="#"
                                class="border border-[#1A2D73] text-[#1A2D73] font-semibold py-3 px-8 rounded-full hover:border-blue-900 hover:text-blue-900 transition">
                                Read More
                            </a>
                        </div>
                    </div>

                    <!-- Card 1 -->
                    <div class="min-w-[350px] bg-white border border-gray-200 rounded-lg shadow">
                        <a href="#">
                            <img class="rounded-t-lg w-full h-[250px] object-cover" src="{{ asset('images/pj.jpg') }}"
                                alt="Embraer Legacy 600" />
                        </a>
                        <div class="p-5 mb-5">
                            <div class="mb-5 flex justify-between">
                                <p>BY AUTHOR</p>
                                <p>AUGUST 26, 2024</p>
                            </div>
                            <a href="#">
                                <h5 class="mb-5 text-2xl font-bold tracking-tight text-gray-900 text-justify">
                                    All You Need to Know About Ground Handling
                                </h5>
                            </a>
                            <a href="#"
                                class="border border-[#1A2D73] text-[#1A2D73] font-semibold py-3 px-8 rounded-full hover:border-blue-900 hover:text-blue-900 transition">
                                Read More
                            </a>
                        </div>
                    </div>

                    <!-- Card 1 -->
                    <div class="min-w-[350px] bg-white border border-gray-200 rounded-lg shadow">
                        <a href="#">
                            <img class="rounded-t-lg w-full h-[250px] object-cover" src="{{ asset('images/pj.jpg') }}"
                                alt="Embraer Legacy 600" />
                        </a>
                        <div class="p-5 mb-5">
                            <div class="mb-5 flex justify-between">
                                <p>BY AUTHOR</p>
                                <p>AUGUST 26, 2024</p>
                            </div>
                            <a href="#">
                                <h5 class="mb-5 text-2xl font-bold tracking-tight text-gray-900 text-justify">
                                    All You Need to Know About Ground Handling
                                </h5>
                            </a>
                            <a href="#"
                                class="border border-[#1A2D73] text-[#1A2D73] font-semibold py-3 px-8 rounded-full hover:border-blue-900 hover:text-blue-900 transition">
                                Read More
                            </a>
                        </div>
                    </div>

                    <!-- Card 1 -->
                    <div class="min-w-[350px] bg-white border border-gray-200 rounded-lg shadow">
                        <a href="#">
                            <img class="rounded-t-lg w-full h-[250px] object-cover" src="{{ asset('images/pj.jpg') }}"
                                alt="Embraer Legacy 600" />
                        </a>
                        <div class="p-5 mb-5">
                            <div class="mb-5 flex justify-between">
                                <p>BY AUTHOR</p>
                                <p>AUGUST 26, 2024</p>
                            </div>
                            <a href="#">
                                <h5 class="mb-5 text-2xl font-bold tracking-tight text-gray-900 text-justify">
                                    All You Need to Know About Ground Handling
                                </h5>
                            </a>
                            <a href="#"
                                class="border border-[#1A2D73] text-[#1A2D73] font-semibold py-3 px-8 rounded-full hover:border-blue-900 hover:text-blue-900 transition">
                                Read More
                            </a>
                        </div>
                    </div>

                    <!-- Card 1 -->
                    <div class="min-w-[350px] bg-white border border-gray-200 rounded-lg shadow">
                        <a href="#">
                            <img class="rounded-t-lg w-full h-[250px] object-cover" src="{{ asset('images/pj.jpg') }}"
                                alt="Embraer Legacy 600" />
                        </a>
                        <div class="p-5 mb-5">
                            <div class="mb-5 flex justify-between">
                                <p>BY AUTHOR</p>
                                <p>AUGUST 26, 2024</p>
                            </div>
                            <a href="#">
                                <h5 class="mb-5 text-2xl font-bold tracking-tight text-gray-900 text-justify">
                                    All You Need to Know About Ground Handling
                                </h5>
                            </a>
                            <a href="#"
                                class="border border-[#1A2D73] text-[#1A2D73] font-semibold py-3 px-8 rounded-full hover:border-blue-900 hover:text-blue-900 transition">
                                Read More
                            </a>
                        </div>
                    </div>

                    <!-- Card 1 -->
                    <div class="min-w-[350px] bg-white border border-gray-200 rounded-lg shadow">
                        <a href="#">
                            <img class="rounded-t-lg w-full h-[250px] object-cover" src="{{ asset('images/pj.jpg') }}"
                                alt="Embraer Legacy 600" />
                        </a>
                        <div class="p-5 mb-5">
                            <div class="mb-5 flex justify-between">
                                <p>BY AUTHOR</p>
                                <p>AUGUST 26, 2024</p>
                            </div>
                            <a href="#">
                                <h5 class="mb-5 text-2xl font-bold tracking-tight text-gray-900 text-justify">
                                    All You Need to Know About Ground Handling
                                </h5>
                            </a>
                            <a href="#"
                                class="border border-[#1A2D73] text-[#1A2D73] font-semibold py-3 px-8 rounded-full hover:border-blue-900 hover:text-blue-900 transition">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @stack('before-scripts')

    @stack('after-scripts')
@endsection
