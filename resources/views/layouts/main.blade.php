<!DOCTYPE html>
<html lang="en">

<head>

    @yield('meta_tag')

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="512x512"
        href="{{ asset('images/favicon/android-chrome-512x512.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('images/favicon/android-chrome-192x192.png') }}">
    <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}">

    <script src="https://kit.fontawesome.com/ddb90eabf1.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <header>
    </header>

    <nav class="bg-white fixed w-full z-20 top-0 start-0 border-b border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('images/logo.png') }}" class="h-12" alt="Flowbite Logo">
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-6 items-center">
                <a href="{{ route('login') }}" class="text-[#1A2D73]">
                    <i class="fa-solid fa-user"></i>
                </a>
                <button type="button"
                    class="text-white bg-[#1A2D73] font-medium rounded-full text-sm px-4 py-2 text-center">
                    Contact Us
                </button>
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 md:flex-row md:mt-0 md:border-0 md:bg-white">
                    <li>
                        <a href="{{ route('home') }}"
                            class="block py-2 px-3 text-white bg-[#1A2D73] rounded md:bg-transparent md:text-[#1A2D73] md:p-0"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#1A2D73] md:p-0">About</a>
                    </li>
                    <li>
                        <div id="dropdown-service" data-dropdown-toggle="dropdown-servicenav"
                            class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">
                            Services
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </div>
                        <!-- Dropdown menu -->
                        <div id="dropdown-servicenav"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="/service/private-jet-charter"
                                        class="block px-4 py-2 hover:bg-gray-100">Private Jet Charter</a>
                                </li>
                                <li>
                                    <a href="/service/private-jet-management-service"
                                        class="block px-4 py-2 hover:bg-gray-100">Private Jet Management
                                        Service</a>
                                </li>
                                <li>
                                    <a href="/service/aviation-consulting"
                                        class="block px-4 py-2 hover:bg-gray-100">Aviation Consulting</a>
                                </li>
                                <li>
                                    <a href="/service/medical-air-ambulance"
                                        class="block px-4 py-2 hover:bg-gray-100">Medical Air Ambulance /
                                        Medevac</a>
                                </li>
                                <li>
                                    <a href="/service/gsa-representative" class="block px-4 py-2 hover:bg-gray-100">GSA
                                        Representative</a>
                                </li>
                                <li>
                                    <a href="/service/operation"
                                        class="block px-4 py-2 hover:bg-gray-100">Operations</a>
                                </li>
                                <li>
                                    <a href="/service/engineering"
                                        class="block px-4 py-2 hover:bg-gray-100">Engineering</a>
                                </li>
                                <li>
                                    <a href="/service/comfort" class="block px-4 py-2 hover:bg-gray-100">Comfort</a>
                                </li>
                                <li>
                                    <a href="/service/aircraft-brokerage"
                                        class="block px-4 py-2 hover:bg-gray-100">Aircraft Brokerage</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('fleet') }}" id="dropdown-fleet" data-dropdown-toggle="dropdown-fleetnav"
                            class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">
                            Fleets
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </a>
                        <!-- Dropdown menu -->
                        <div id="dropdown-fleetnav"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                            <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Aw</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Footer Section -->
    <footer class="bg-[#111827] pyy-8 sm:py-12 lg:py-16 text-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-5 gap-8">
                <!-- About Section -->
                <div class="col-span-2 flex flex-col gap-4">
                    <img src="{{ asset('images/secondary-logo.png') }}" alt="Alfa5 Aviation Logo" class="w-[100px]">
                    <p class="text-justify">
                        Alfa5 Aviation specializes in providing exclusive private jet charter services around the
                        world,
                        especially within the Asia Pacific region.
                    </p>
                    <!-- Social Media Icons -->
                    <div class="flex gap-4">
                        <a href="#">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                        <a href="#">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                        <a href="#">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                        <a href="#">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </div>
                </div>

                <!-- Explore Section -->
                <div>
                    <h6 class="font-semibold text-[#FFDA03] text-2xl mb-4">Explore</h6>
                    <ul class="flex flex-col gap-4">
                        <li><a href="#" class="hover:underline">Home</a></li>
                        <li><a href="#" class="hover:underline">About Us</a></li>
                        <li><a href="#" class="hover:underline">Services</a></li>
                        <li><a href="#" class="hover:underline">News</a></li>
                        <li><a href="#" class="hover:underline">Fleets</a></li>
                        <li><a href="#" class="hover:underline">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Services Section -->
                <div>
                    <h6 class="font-semibold text-[#FFDA03] text-2xl mb-4">Our Services</h6>
                    <ul class="flex flex-col gap-4">
                        <li><a href="#" class="hover:underline">Private Jet Charter</a></li>
                        <li><a href="#" class="hover:underline">Private Jet Management Services</a>
                        </li>
                        <li><a href="#" class="hover:underline">Aviation Consulting</a></li>
                        <li><a href="#" class="hover:underline">Medical Air Ambulance / Medevac</a>
                        </li>
                        <li><a href="#" class="hover:underline">GSA Representative</a></li>
                    </ul>
                </div>

                <!-- Contact Section -->
                <div>
                    <h6 class="font-semibold text-[#FFDA03] text-2xl mb-4">Contact Us</h6>
                    <ul class="flex flex-col gap-4">
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-2"></i>
                            <a href="tel:+6281818779955" class="hover:underline">+62 818 1877 9955</a>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2"></i>
                            <a href="mailto:sales@alfa5aviation.com"
                                class="hover:underline">sales@alfa5aviation.com</a>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            <a href="#" class="hover:underline text-justify">
                                Graha Dirgantara 2nd floor unit H, Jl. Protokol Halim Perdanakusuma no.8, Jakarta
                                Timur
                                13610
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
            <div class="flex justify-between py-8 text-gray-400">
                <p>© Copyright 2024 by <a href="#" class="text-white hover:underline">Alfa5 Aviation</a></p>
                <a href="#" class="hover:underline">Privacy & Policy</a>
            </div>
        </div>
    </div>

    @stack('before-scripts')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

    @stack('after-scripts')

</body>

</html>
