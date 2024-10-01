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
        <nav id="navbar"
            class="border-gray-200 bg-transparent fixed top-0 left-0 w-full z-10 transition duration-300 ease-in-out">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img id="navbar-logo" src="{{ asset('images/logo.png') }}" class="w-[100px]"
                        alt="Logo Sagala Pro" />
                </a>
                <button id="menu-toggle" data-collapse-toggle="navbar-default" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul
                        class="font-normal flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
                        <li>
                            <a href="{{ route('home') }}"
                                class="block py-2 px-3 text-white text-lg font-semibold rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#1A2D73] md:p-0"
                                aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}"
                                class="block py-2 px-3 text-white text-lg font-semibold hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#1A2D73] md:p-0">About
                                Us</a>
                        </li>
                        <li class="relative group">
                            <a href="{{ route('service') }}"
                                class="flex items-center py-2 px-3 text-lg font-semibold text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#1A2D73] md:p-0">
                                Services
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </a>
                            <div
                                class="hidden group-hover:block absolute bg-white text-gray-900 rounded-lg shadow-lg mt-2 min-w-[150px] z-10">
                                <ul class="py-2 text-sm text-gray-700">
                                    <li>
                                        <a href="" class="block px-4 py-2 hover:bg-gray-100">Aircraft &
                                            Helicopter
                                            Acquisition</a>
                                    </li>
                                    <li>
                                        <a href="" class="block px-4 py-2 hover:bg-gray-100">Aerial Fire-Fighting
                                            Consultant &
                                            Operation</a>
                                    </li>
                                    <li>
                                        <a href="" class="block px-4 py-2 hover:bg-gray-100">Heavy
                                            &
                                            Outsized Cargo Service</a>
                                    </li>
                                    <li>
                                        <a href="" class="block px-4 py-2 hover:bg-gray-100">Private Jet Charters
                                            & Flights</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="relative group">
                            <a href="{{ route('fleet') }}"
                                class="flex items-center py-2 px-3 text-lg font-semibold text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#1A2D73] md:p-0">
                                Fleets
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </a>
                            <div
                                class="hidden group-hover:block absolute bg-white text-gray-900 rounded-lg shadow-lg mt-2 min-w-[150px] z-10">
                                <ul class="py-2 text-sm text-gray-700">
                                    <li>
                                        <a href="" class="block px-4 py-2 hover:bg-gray-100">Aircraft &
                                            Helicopter
                                            Acquisition</a>
                                    </li>
                                    <li>
                                        <a href="" class="block px-4 py-2 hover:bg-gray-100">Aerial Fire-Fighting
                                            Consultant &
                                            Operation</a>
                                    </li>
                                    <li>
                                        <a href="" class="block px-4 py-2 hover:bg-gray-100">Heavy
                                            &
                                            Outsized Cargo Service</a>
                                    </li>
                                    <li>
                                        <a href="" class="block px-4 py-2 hover:bg-gray-100">Private Jet
                                            Charters
                                            & Flights</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Contact Button -->
                <div class="flex items-center gap-6">
                    <a href="{{ route('login') }}" class="text-white hover:text-[#1A2D73]">
                        <i class="fa-solid fa-user"></i>
                    </a>

                    <a href="{{ route('contact') }}"
                        class="bg-[#1A2D73] text-white font-semibold py-2 px-6 rounded-full hover:bg-blue-900 transition">
                        Contact Us
                    </a>
                </div>
            </div>
        </nav>
    </header>

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
    <script src="./node_modules/flowbite/dist/flowbite.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const navbar = document.getElementById('navbar-default');
            const dropdownButton = document.getElementById('dropdownHoverButton');
            const dropdownMenu = document.getElementById('dropdownHover');

            menuToggle.addEventListener('click', function() {
                navbar.classList.toggle('hidden');
            });

            dropdownButton.addEventListener('click', function() {
                dropdownMenu.classList.toggle('hidden');
            });

            document.addEventListener('click', function(event) {
                if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        });
    </script>

    <script>
        const navbar = document.getElementById('navbar');
        const logo = document.getElementById('navbar-logo');
        const originalLogoSrc = '{{ asset('images/logo.png') }}';
        const scrolledLogoSrc = '{{ asset('images/logo.png') }}'; // logo kedua

        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('bg-white', 'shadow-lg');
                navbar.classList.remove('bg-transparent');
                logo.src = scrolledLogoSrc;
                // Change text color of the navbar items
                document.querySelectorAll('nav a').forEach(link => {
                    link.classList.remove('text-white');
                    link.classList.add('text-black');
                });
            } else {
                navbar.classList.add('bg-transparent');
                navbar.classList.remove('bg-white', 'shadow-lg');
                logo.src = originalLogoSrc;
                // Revert text color of the navbar items
                document.querySelectorAll('nav a').forEach(link => {
                    link.classList.remove('text-black');
                    link.classList.add('text-white');
                });
            }
        });
    </script>

    @stack('after-scripts')

</body>

</html>
