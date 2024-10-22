@extends('layouts.main')

@section('meta_tag')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="{{ $pageSetups['home']->meta_description }}">
    <meta name="keywords" content="{{ $pageSetups['home']->meta_keywords }}">
    <meta name="author" content="Zachran Razendra">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#2A6F97">

    <link rel="canonical" href="{{ url()->current() }}">

    <title>{{ $pageSetups['home']->title }}</title>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-cover bg-center bg-no-repeat h-screen flex justify-center items-center"
        style="background-image: url({{ Storage::url($hero_section->image) }})">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 flex flex-col">
            <!-- Title -->
            <h1 class="text-white text-6xl font-bold mb-8">{{ $hero_section->title }}</h1>

            <!-- Buttons -->
            <div class="flex space-x-4">
                <!-- Request a Quote Button -->
                <a href="{{ route('contact') }}"
                    class="border border-gray-400 text-white font-semibold py-3 px-6 rounded-full hover:border-white transition">
                    Request a Quote
                    <i class="fa-solid fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Partner Section -->
    <section class="bg-[#f3f4f6] py-8 sm:py-12 lg:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Title -->
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-8 text-center">
                We collaborate with leading Private Jet Charters and companies
            </h2>

            <!-- Partner Logos Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($partners as $partner)
                    <a href="{{ $partner->url }}" target="_blank"
                        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                        <img src="{{ Storage::url($partner->image) }}" alt="{{ $partner->title }}"
                            class="mx-auto max-h-16 object-contain">
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-8 sm:py-12 lg:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Image Section -->
                <img src="{{ Storage::url($about->image) }}" alt="Private Jet Charter"
                    class="w-full h-[500px] object-cover rounded-lg">

                <!-- Text Section -->
                <div class="flex flex-col justify-center">
                    <!-- Section Subtitle -->
                    <h3 class="text-[#FFDA03] text-lg font-semibold mb-2">WHAT WILL YOU GET</h3>

                    <!-- Section Title -->
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4 text-justify">
                        {{ $about->title }}
                    </h2>

                    <!-- Section Description -->
                    <p class="text-gray-600 mb-6 text-justify">
                        {{ $about->description }}
                    </p>

                    <!-- Key Benefits List -->
                    <ul class="list-disc list-inside text-gray-700 mb-6">
                        <li>Experience and Expertise</li>
                        <li>Safety and Reliability</li>
                    </ul>

                    <!-- Button and Call to Action Section -->
                    <div class="flex items-center space-x-6">
                        <!-- Discover More Button -->
                        <a href="{{ route('about') }}"
                            class="bg-[#1A2D73] text-white font-semibold py-3 px-8 rounded-full hover:bg-blue-900 transition">
                            Discover More
                            <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>

                        <!-- Call Info Section -->
                        <div class="flex items-center space-x-3">
                            <div class="border border-gray-400 rounded-full p-2">
                                <i class="fa-solid fa-phone p-2 text-[#FFDA03]"></i>
                            </div>
                            <div class="text-left">
                                <p class="text-sm font-medium text-gray-600">CALL ANYTIME</p>
                                <a href="tel:{{ $setting->phone_one }}"
                                    class="text-lg font-bold text-gray-800">{{ $setting->phone_one }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Section -->
    <section class="bg-[#f3f4f6] py-8 sm:py-12 lg:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Title -->
            <div class="text-center">
                <h3 class="text-lg font-semibold text-[#FFDA03] mb-2">OUR BEST SERVICES</h3>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-12">Explore Our Premier Aviation Services</h2>
            </div>

            <!-- Service Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($services as $service)
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <a href="{{ route('service.details', $service->slug) }}">
                            <img class="rounded-t-lg w-full h-[250px] object-cover"
                                src="{{ Storage::url($service->image) }}" alt="{{ $service->title }}" />
                        </a>
                        <div class="p-5 mb-5 text-center">
                            <a href="{{ route('service.details', $service->slug) }}">
                                <h5 class="mb-5 text-2xl font-bold tracking-tight text-gray-900">{{ $service->title }}
                                </h5>
                            </a>
                            <a href="{{ route('service.details', $service->slug) }}"
                                class="border border-[#1A2D73] text-[#1A2D73] font-semibold py-3 px-8 rounded-full hover:border-blue-900 hover:text-blue-900 transition">
                                Discover More
                            </a>
                        </div>
                    </div>
                @endforeach
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
            <a href="{{ route('contact') }}"
                class="bg-[#1A2D73] text-white font-semibold py-3 px-8 rounded-full hover:bg-blue-900 transition">
                Request Quote
            </a>
        </div>
    </section>

    <!-- Fleet Section -->
    <section class="py-8 sm:py-12 lg:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Title -->
            <div class="text-center">
                <h3 class="text-lg font-semibold text-[#FFDA03] mb-2">OUR FLEETS</h3>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-12">Checkout the Popular Private Jet</h2>
            </div>

            <!-- Fleet Cards -->
            <div class="flex flex-wrap justify-center gap-8">
                @foreach ($fleets as $fleet)
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                        <a href="{{ route('fleet.details', $fleet->slug) }}">
                            <img class="rounded-t-lg w-full h-[250px] object-cover" src="{{ Storage::url($fleet->image) }}"
                                alt="{{ $fleet->title }}" />
                        </a>
                        <div class="p-5 mb-5 text-center">
                            <a href="{{ route('fleet.details', $fleet->slug) }}">
                                <h5 class="mb-5 text-2xl font-bold tracking-tight text-gray-900">{{ $fleet->title }}
                                </h5>
                            </a>
                            <a href="{{ route('fleet.details', $fleet->slug) }}"
                                class="border border-[#1A2D73] text-[#1A2D73] font-semibold py-3 px-8 rounded-full hover:border-blue-900 hover:text-blue-900 transition">
                                Discover More
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Booking Section -->
    <section class="bg-[#f3f4f6] py-8 sm:py-12 lg:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Image Section -->
                <img src="{{ asset('images/about.jpg') }}" alt="Private Jet Charter"
                    class="w-full h-full object-cover rounded-lg">

                <div class="flex flex-col justify-center">
                    <!-- Section Subtitle -->
                    <h3 class="text-[#FFDA03] text-lg font-semibold mb-2">GET YOUR FLIGHT</h3>

                    <!-- Section Title -->
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4 text-justify">
                        Online Request for Private Flight
                    </h2>

                    <!-- Booking Form -->
                    <div class="">
                        <form action="{{ route('booking.submit') }}" method="POST">
                            @csrf
                            <div class="grid gap-4 mb-4">
                                <!-- From Field -->
                                <div class="mb-4">
                                    <label for="from" class="block mb-2 text-sm font-medium text-gray-900">
                                        From:
                                    </label>
                                    <input type="text" id="from" name="from"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Enter departure location" required />
                                </div>

                                <!-- To Field -->
                                <div class="mb-4">
                                    <label for="to" class="block mb-2 text-sm font-medium text-gray-900">
                                        To:
                                    </label>
                                    <input type="text" id="to" name="to"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Enter destination location" required />
                                </div>

                                <!-- Dates and Passengers/Baggage Fields -->
                                <div class="grid md:grid-cols-2 md:gap-4">
                                    <div class="mb-4">
                                        <label for="departure-date" class="block mb-2 text-sm font-medium text-gray-900">
                                            Departure Date:
                                        </label>
                                        <input type="date" id="departure-date" name="departure_date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            required />
                                    </div>
                                    <div class="mb-5">
                                        <label for="return-date" class="block mb-2 text-sm font-medium text-gray-900">
                                            Return Date:
                                        </label>
                                        <input type="date" id="return-date" name="return_date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            required />
                                    </div>
                                </div>

                                <div class="grid md:grid-cols-2 md:gap-4">
                                    <div class="mb-4">
                                        <label for="passengers" class="block mb-2 text-sm font-medium text-gray-900">
                                            Passengers:
                                        </label>
                                        <input type="number" id="passengers" name="passengers"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            placeholder="Enter number of passengers" required />
                                    </div>
                                    <div class="mb-4">
                                        <label for="baggage" class="block mb-2 text-sm font-medium text-gray-900">
                                            Baggage:
                                        </label>
                                        <input type="text" id="baggage" name="baggage"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                            placeholder="Enter baggage details" required />
                                    </div>
                                </div>
                            </div>

                            <!-- Next Button -->
                            <button type="button" data-modal-target="booking-modal" data-modal-toggle="booking-modal"
                                class="bg-[#1A2D73] text-white font-semibold py-3 px-8 rounded-full hover:bg-blue-900 transition">
                                Next
                                <i class="fa-solid fa-arrow-right ms-2"></i>
                            </button>

                            <!-- Booking Modal -->
                            <div id="booking-modal" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <!-- Modal content -->
                                <div class="relative p-4 w-full max-w-2xl max-h-full">
                                    <div class="relative bg-white rounded-lg shadow">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                                            <h3 class="text-2xl font-semibold mb-4 text-gray-800">Your Contact Information
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                                data-modal-hide="booking-modal">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-4 md:p-5 space-y-4">
                                            <!-- Form inside the modal -->
                                            <form action="">
                                                <div class="grid gap-4 mb-4">
                                                    <div class="mb-4">
                                                        <label for="name"
                                                            class="block mb-2 text-sm font-medium text-gray-900">Name:</label>
                                                        <input type="text" id="name" name="name"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                            placeholder="Enter your full name" required />
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="email"
                                                            class="block mb-2 text-sm font-medium text-gray-900">Email:</label>
                                                        <input type="email" id="email" name="email"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                            placeholder="Enter your email" required />
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="phone"
                                                            class="block mb-2 text-sm font-medium text-gray-900">Phone:</label>
                                                        <input type="tel" id="phone" name="phone"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                            placeholder="Enter your phone number" required />
                                                    </div>
                                                </div>
                                                <!-- Submit Button -->
                                                <button type="submit"
                                                    class="bg-[#1A2D73] text-white font-semibold py-3 px-8 rounded-full hover:bg-blue-900 transition">
                                                    Submit
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>

                        <p class="mt-4 text-gray-600 text-sm text-justify">
                            * After sending the request, our manager will contact you for more details about the
                            charter.
                        </p>
                    </div>

                </div>
            </div>
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
                    @foreach ($blogs as $blog)
                        <div class="min-w-[350px] bg-white border border-gray-200 rounded-lg shadow">
                            <a href="{{ route('blog.details', $blog->slug) }}">
                                <img class="rounded-t-lg w-full h-[250px] object-cover"
                                    src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}" />
                            </a>
                            <div class="p-5 mb-5">
                                <div class="mb-5 flex justify-between">
                                    <p>BY {{ $blog->author }}</p>
                                    <p>{{ $blog->created_at->format('M d, Y') }}</p>
                                </div>
                                <a href="{{ $blog['url'] }}">
                                    <h5 class="mb-5 text-2xl font-bold tracking-tight text-gray-900">
                                        {{ $blog->title }}
                                    </h5>
                                </a>
                                <a href="{{ route('blog.details', $blog->slug) }}"
                                    class="border border-[#1A2D73] text-[#1A2D73] font-semibold py-3 px-8 rounded-full hover:border-blue-900 hover:text-blue-900 transition">
                                    Read More
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @stack('before-scripts')
    <script>
        // Get the modal and button elements
        const modal = document.getElementById('booking-modal');
        const openModalBtn = document.querySelector('[data-modal-toggle="booking-modal"]');
        const closeModalBtn = document.querySelector('[data-modal-hide="booking-modal"]');

        // Function to open the modal
        openModalBtn.addEventListener('click', () => {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });

        // Function to close the modal
        closeModalBtn.addEventListener('click', () => {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        });
    </script>

    @stack('after-scripts')
@endsection
