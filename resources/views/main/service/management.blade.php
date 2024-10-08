@extends('layouts.main')

@section('meta_tag')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Alfa5 Aviation">
    <meta name="keywords" content="Private Jet Management Service">
    <meta name="author" content="Zachran Razendra">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#2A6F97">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Alfa5 Aviation">
    <meta property="og:description" content="Private Jet Management Service">
    <meta property="og:image" content="{{ asset('images/logo-sagala.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Alfa5 Aviation">
    <meta property="og:locale" content="en_US">
    <meta property="og:logo" content="{{ asset('images/logo-sagala.png') }}" />
    <meta property="og:locale:alternate" content="id_ID">
    <meta property="og:updated_time" content="{{ now()->toIso8601String() }}">

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
            <h2 class="text-white text-4xl font-bold mb-4">Services</h2>

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
                        <li>
                            <a href="{{ route('service') }}" class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-white mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="ms-1 text-sm font-medium text-white md:ms-2">Services</span>
                            </a>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-white mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="ms-1 text-sm font-medium text-white md:ms-2">Private Jet Management
                                    Service</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

    </section>

    <!-- Service Section -->
    <section class="py-8 sm:py-12 lg:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">

                <!-- Main Service Content -->
                <div class="lg:w-3/4 space-y-6">
                    <img class="w-full h-[500px] object-cover rounded-lg" src="{{ asset('images/management.jpg') }}"
                        alt="Private Jet Management Service">
                    <div>
                        <h3 class="text-2xl font-bold mb-4">Private Jet Management Service</h3>
                        <div class="text-justify space-y-4 text-gray-700">
                            <p>
                                Since its founding in 2022, Alfa5 Aviation has built a reputation as a leader in private jet
                                management services, providing reliable and high-quality solutions for private jet owners.
                                Our services are designed to meet the needs of individual and corporate clients who demand
                                the highest service in their private jet management. We understand that every aircraft owner
                                wants an exclusive, safe, and comfortable flight experience, so we provide a tailored
                                Private Jet Management service to provide a perfect and worry-free private flight
                                experience.
                            </p>
                            <p>
                                Our private jet management services cover all aspects of aircraft management, from routine
                                maintenance to day-to-day operations. With a team of experienced professionals, Alfa5
                                Aviation ensures that your aircraft is always in optimal condition and ready to use whenever
                                needed. We handle all the technical, maintenance, and administrative details carefully, so
                                you can focus on enjoying your trip without worrying about aircraft operations. Our services
                                are designed to provide maximum comfort and efficiency for every client, both for business
                                and personal travel needs.
                            </p>
                            <p>
                                We operate following the regulations of the Directorate General of Civil Aviation Part 135
                                at Halim Perdanakusuma Airport, Jakarta, which ensures that every aspect of your aircraft
                                management meets the highest safety and quality standards. With an end-to-end management
                                approach, we ensure that your aircraft is managed with professionalism and attention to
                                detail. Alfa5 Aviation is dedicated to providing superior private jet management services,
                                making us a trusted partner for those seeking a safe, luxurious, well-managed private
                                aviation experience with our team's expertise in managing every detail, from routine
                                maintenance to crew management, we guarantee a smooth and luxurious flying experience. At
                                Alfa5 Aviation, we pride ourselves on offering services that not only meet but exceed your
                                expectations, providing the best peace of mind and flight experience.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Sidebar with Other Services -->
                <div class="bg-gray-100 shadow rounded-lg lg:w-1/4 h-fit space-y-6 p-8">
                    <h3 class="text-xl font-bold mb-4">Other Services</h3>
                    <div class="flex flex-col space-y-4">
                        @foreach ($services as $service)
                            <a href="{{ $service['url'] }}"
                                class="bg-gray-200 shadow p-2 rounded flex flex-row items-center space-x-4">
                                <img class="w-16 h-16 object-cover rounded" src="{{ asset($service['image']) }}"
                                    alt="{{ $service['alt'] }}">
                                <h6 class="text-md">{{ $service['title'] }}</h6>
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

    @stack('before-scripts')

    @stack('after-scripts')
@endsection
