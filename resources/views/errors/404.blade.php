@extends('layouts.main')

@section('meta_tag')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="404 Page Not Found - Alfa5 Aviation">
    <meta name="keywords" content="404, Page Not Found, Error">
    <meta name="author" content="Zachran Razendra">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">
    <meta name="theme-color" content="#2A6F97">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="404 - Page Not Found">
    <meta property="og:description" content="Sorry, the page you are looking for cannot be found.">
    <meta property="og:image" content="{{ asset('images/404.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Alfa5 Aviation">
    <meta property="og:locale" content="en_US">
    <meta property="og:logo" content="{{ asset('images/logo.png') }}" />
    <meta property="og:locale:alternate" content="id_ID">
    <meta property="og:updated_time" content="{{ now()->toIso8601String() }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="alfa5aviation.com">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="404 - Page Not Found">
    <meta name="twitter:description" content="Sorry, the page you are looking for cannot be found.">
    <meta name="twitter:image" content="{{ asset('images/404.png') }}">
    <meta name="twitter:site" content="">
    <meta name="twitter:creator" content="">

    <meta name="DC.title" content="404 - Page Not Found">
    <meta name="DC.creator" content="Zachran Razendra">
    <meta name="DC.description" content="Sorry, the page you are looking for cannot be found.">
    <meta name="DC.publisher" content="Alfa5 Aviation">
    <meta name="DC.date" content="{{ now()->toIso8601String() }}">
    <meta name="DC.type" content="text">
    <meta name="DC.format" content="text/html">
    <meta name="DC.identifier" content="{{ url()->current() }}">
    <meta name="DC.language" content="en">
    <meta name="DC.coverage" content="Worldwide">
    <meta name="DC.rights" content="© Alfa5 Aviation">

    <link rel="canonical" href="{{ url()->current() }}">

    <title>404 - Page Not Found | Alfa5 Aviation</title>
@endsection

@section('content')
    <!-- 404 Hero Section -->
    <section class="relative bg-cover bg-center bg-no-repeat h-screen flex justify-center items-center"
        style="background-image: url({{ asset('images/404.png') }})">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 flex flex-col text-center">
            <!-- Title -->
            <h1 class="text-white text-6xl font-bold mb-4">404</h1>

            <!-- Subtitle -->
            <h2 class="text-white text-2xl font-semibold mb-8">Oops! The page you're looking for doesn't exist.</h2>

            <!-- Buttons -->
            <div class="flex justify-center space-x-4">
                <!-- Back to Home Button -->
                <a href="{{ url('/') }}"
                    class="border border-gray-400 text-white font-semibold py-3 px-6 rounded-full hover:border-white transition">
                    Go to Homepage
                    <i class="fa-solid fa-arrow-right ms-2"></i>
                </a>

                <!-- Contact Us Button -->
                <a href="{{ url('/contact') }}"
                    class="border border-gray-400 text-white font-semibold py-3 px-6 rounded-full hover:border-white transition">
                    Contact Us
                    <i class="fa-solid fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    @stack('before-scripts')

    @stack('after-scripts')
@endsection
