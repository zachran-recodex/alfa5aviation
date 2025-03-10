<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="theme-color" content="#2A6F97">

        @yield('meta_tag')

        <!-- Font -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <link rel="manifest" href="{{ asset('site.webmanifest') }}">

        <!-- Icon (Font Awesome) -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
              integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
              crossorigin="anonymous" referrerpolicy="no-referrer" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @fluxAppearance
    </head>
    <body class="min-h-screen bg-white">
        <nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200" x-data="{ mobileMenuOpen: false, serviceDropdownOpen: false, fleetDropdownOpen: false }">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="{{ asset('images/logo.png') }}" class="h-8 sm:h-10 md:h-12" alt="Logo">
                </a>
                <div class="flex md:order-2 space-x-2 sm:space-x-3 md:space-x-6 items-center">
                    <a href="{{ route('login') }}" class="text-[#1A2D73]">
                        <i class="fa-solid fa-user"></i>
                    </a>
                    <a href="https://wa.me/6281818779955" target="_blank"
                        class="text-white bg-[#1A2D73] font-medium rounded-full text-xs sm:text-sm px-3 sm:px-4 py-1.5 sm:py-2 text-center whitespace-nowrap">
                        Contact Us
                    </a>
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button"
                            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                            aria-controls="navbar-sticky" :aria-expanded="mobileMenuOpen">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>
                <div class="items-center justify-between w-full md:flex md:w-auto md:order-1"
                     id="navbar-sticky"
                     :class="{'hidden': !mobileMenuOpen, 'block': mobileMenuOpen}"
                     @click.outside="mobileMenuOpen = false">
                    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-4 lg:space-x-8 md:flex-row md:mt-0 md:border-0 md:bg-white">
                        <li>
                            <a href="{{ route('home') }}"
                                class="block py-2 px-3 text-white bg-[#1A2D73] rounded md:bg-transparent md:text-[#1A2D73] md:p-0"
                                aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#1A2D73] md:p-0">About</a>
                        </li>
                        <li x-data="{ open: false }" @mouseenter.debounce.50ms="open = true" @mouseleave.debounce.50ms="open = false" class="relative">
                            <div @click="open = !open"
                                 class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#1A2D73] md:p-0 md:w-auto cursor-pointer">
                                Services
                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </div>
                            <!-- Dropdown menu -->
                            <div x-show="open"
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 class="z-10 font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 absolute mt-2 left-0 md:left-auto"
                                 @click.outside="open = false"
                                 style="display: none;">
                                <ul class="py-2 text-sm text-gray-700">
                                    @foreach ($navServices as $navService)
                                        <li>
                                            <a href="{{ route('service.details', $navService->slug) }}"
                                               class="block px-4 py-2 hover:bg-gray-100">{{ $navService->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li x-data="{ open: false }" @mouseenter.debounce.50ms="open = true" @mouseleave.debounce.50ms="open = false" class="relative">
                            <div @click="open = !open"
                                 class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#1A2D73] md:p-0 md:w-auto cursor-pointer">
                                Fleets
                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                     fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </div>
                            <!-- Dropdown menu -->
                            <div x-show="open"
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="opacity-0 scale-95"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 class="z-10 font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 absolute mt-2 left-0 md:left-auto"
                                 @click.outside="open = false"
                                 style="display: none;">
                                <ul class="py-2 text-sm text-gray-700">
                                    @foreach ($navFleets as $navFleet)
                                        <li>
                                            <a href="{{ route('fleet.details', $navFleet->slug) }}"
                                               class="block px-4 py-2 hover:bg-gray-100">{{ $navFleet->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main content with padding to account for fixed navbar -->
        <main class="pt-20 md:pt-24">
            {{ $slot }}
        </main>

        <!-- Footer Section -->
        <footer class="bg-[#111827] py-8 sm:py-12 lg:py-16 text-white">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
                    <!-- About Section -->
                    <div class="col-span-1 sm:col-span-2 flex flex-col gap-4">
                        <img src="{{ asset('images/secondary-logo.png') }}" alt="Alfa5 Aviation Logo" class="w-[80px] sm:w-[100px]">
                        <p class="text-justify text-sm sm:text-base">
                            {{ $setting->footer_text }}
                        </p>
                        <!-- Social Media Icons -->
                        <div class="flex gap-4">
                            <a href="{{ $setting->instagram }}" class="text-lg sm:text-xl hover:text-[#FFDA03] transition-colors">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="{{ $setting->linkedin }}" class="text-lg sm:text-xl hover:text-[#FFDA03] transition-colors">
                                <i class="fa-brands fa-linkedin"></i>
                            </a>
                            <a href="{{ $setting->tiktok }}" class="text-lg sm:text-xl hover:text-[#FFDA03] transition-colors">
                                <i class="fa-brands fa-tiktok"></i>
                            </a>
                            <a href="{{ $setting->facebook }}" class="text-lg sm:text-xl hover:text-[#FFDA03] transition-colors">
                                <i class="fa-brands fa-facebook"></i>
                            </a>
                            <a href="{{ $setting->whatsapp }}" class="text-lg sm:text-xl hover:text-[#FFDA03] transition-colors">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Responsive Footer Columns -->
                    <!-- Explore Section -->
                    <div class="mt-6 sm:mt-0">
                        <h6 class="font-semibold text-[#FFDA03] text-xl sm:text-2xl mb-4">Explore</h6>
                        <ul class="flex flex-col gap-2 sm:gap-4">
                            <li><a href="{{ route('home') }}" class="hover:underline text-sm sm:text-base">Home</a></li>
                            <li><a href="{{ route('about') }}" class="hover:underline text-sm sm:text-base">About Us</a></li>
                            <li><a href="{{ route('service') }}" class="hover:underline text-sm sm:text-base">Services</a></li>
                            <li><a href="{{ route('fleet') }}" class="hover:underline text-sm sm:text-base">Fleets</a></li>
                            <li><a href="{{ route('contact') }}" class="hover:underline text-sm sm:text-base">Contact Us</a></li>
                        </ul>
                    </div>

                    <!-- Services Section -->
                    <div class="mt-6 sm:mt-0">
                        <h6 class="font-semibold text-[#FFDA03] text-xl sm:text-2xl mb-4">Our Services</h6>
                        <ul class="flex flex-col gap-2 sm:gap-4">
                            @foreach ($navServices as $service)
                                <li>
                                    <a href="{{ route('service.details', $service->slug) }}"
                                       class="hover:underline text-sm sm:text-base">{{ $service->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Contact Section -->
                    <div class="mt-6 sm:mt-0">
                        <h6 class="font-semibold text-[#FFDA03] text-xl sm:text-2xl mb-4">Contact Us</h6>
                        <ul class="flex flex-col gap-2 sm:gap-4">
                            <li class="flex items-center">
                                <i class="fas fa-phone mr-2"></i>
                                <a href="tel:{{ $setting->phone }}"
                                   class="hover:underline text-sm sm:text-base">{{ $setting->phone }}</a>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-envelope mr-2"></i>
                                <a href="mailto:{{ $setting->email }}"
                                   class="hover:underline text-sm sm:text-base">{{ $setting->email }}</a>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-map-marker-alt mr-2 mt-1"></i>
                                <a href="https://maps.app.goo.gl/mZJqe1n5QfJJ8WQk9" class="hover:underline text-sm sm:text-base">
                                    {{ $setting->address }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <div class="bg-[#161F32] text-white">
            <!-- Copyright and Privacy -->
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col sm:flex-row justify-between py-4 sm:py-8 text-gray-400 gap-2 sm:gap-0">
                    <p class="text-sm sm:text-base">© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                    <div class="flex flex-col sm:flex-row sm:space-x-6 gap-2 sm:gap-0">
                        <a href="#" class="text-xs sm:text-sm text-gray-400 hover:text-primary transition">
                            Privacy Policy
                        </a>
                        <a href="#" class="text-xs sm:text-sm text-gray-400 hover:text-primary transition">
                            Terms of Service
                        </a>
                        <span class="text-xs sm:text-sm text-gray-400">Created by <a href="https://recodex.id" target="_blank" class="text-[#86c332]">Recodex ID</a></span>
                    </div>
                </div>
            </div>
        </div>

        @fluxScripts
    </body>
</html>
