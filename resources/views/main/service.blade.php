@section('meta_tag')
    <meta name="description" content="{{ optional($pageSetups['service'])->meta_description ?? '' }}">
    <meta name="keywords" content="{{ optional($pageSetups['service'])->meta_keywords ?? '' }}">
    <meta name="author" content="RECODEX ID">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="{{ optional($pageSetups['service'])->title ?? 'Service' }}">
    <meta property="og:description" content="{{ optional($pageSetups['service'])->meta_description ?? '' }}">
    <meta property="og:image" content="{{ isset($heroSection) && $heroSection->image ? asset('storage/' . $heroSection->image) : asset('default-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ optional($pageSetups['service'])->title ?? 'Service' }}">
    <meta name="twitter:description" content="{{ optional($pageSetups['service'])->meta_description ?? '' }}">
    <meta name="twitter:image" content="{{ isset($heroSection) && $heroSection->image ? asset('storage/' . $heroSection->image) : asset('default-image.jpg') }}">

    <link rel="canonical" href="{{ url()->current() }}">

    <title>{{ optional($pageSetups['service'])->title ?? 'Service' }}</title>
@endsection

<x-layouts.main>
    <!-- Hero Section -->
    <section class="relative bg-cover bg-center bg-no-repeat min-h-[40vh] sm:h-[50vh] flex justify-center items-center"
        style="background-image: url({{ asset('storage/' . $heroSection->image) }})">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 flex flex-col text-center">
            <!-- Title -->
            <h2 class="text-white text-2xl sm:text-3xl lg:text-4xl font-bold mb-2 sm:mb-4">Services</h2>

            <!-- Breadcrumbs -->
            <div class="flex justify-center">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href="{{ route('home') }}"
                                class="inline-flex items-center text-xs sm:text-sm font-medium text-white hover:text-[#1A2D73]">
                                <svg class="w-2.5 h-2.5 sm:w-3 sm:h-3 me-1.5 sm:me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                </svg>
                                Home
                            </a>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-2.5 h-2.5 sm:w-3 sm:h-3 text-white mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="ms-1 text-xs sm:text-sm font-medium text-white md:ms-2">Services</span>
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
            <!-- Text Section -->
            <div class="flex flex-col justify-center mb-6 sm:mb-8 text-center">
                <!-- Section Subtitle -->
                <h3 class="text-[#FFDA03] text-base sm:text-lg font-semibold mb-1 sm:mb-2">OUR BEST SERVICES</h3>

                <!-- Section Title -->
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                    Explore Our Premier Aviation Services
                </h2>
            </div>

            <!-- Service Cards -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 lg:gap-8 justify-center">
                @foreach ($services as $service)
                    <!-- Card -->
                    <div class="flex flex-col sm:flex-row items-center border border-gray-300 rounded-lg overflow-hidden shadow-md">
                        <!-- Image Section -->
                        <a href="{{ route('service.details', $service->slug) }}" class="w-full sm:w-1/3">
                            <img class="object-cover w-full h-[200px] sm:h-[250px]" src="{{ asset('storage/' . $service->image) }}"
                                alt="{{ $service->title }}" />
                        </a>

                        <!-- Description Section -->
                        <div class="w-full sm:w-2/3 p-4 sm:p-6">
                            <a href="{{ route('service.details', $service->slug) }}">
                                <h5 class="text-lg sm:text-xl font-bold text-gray-800 mb-2">{{ $service->title }}</h5>
                            </a>
                            <p class="text-sm sm:text-base text-gray-600 mb-3 sm:mb-4">
                                {{ $service->description }}
                            </p>
                            <a href="{{ route('service.details', $service->slug) }}"
                                class="text-[#1A2D73] text-sm sm:text-base font-semibold hover:underline">Discover
                                More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Request a Quote Section -->
    <section class="relative bg-cover bg-center bg-no-repeat h-[300px] sm:h-[400px] lg:h-[500px]"
        style="background-image: url({{ asset('storage/' . $heroSection->image) }})">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <div
            class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center justify-center h-full text-center">
            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white mb-3 sm:mb-4">
                We Fly You To Over 20,000 Destinations Worldwide
            </h2>
            <p class="text-sm sm:text-base lg:text-lg text-gray-300 mb-4 sm:mb-6 max-w-3xl">
                Alfa5 Aviation proudly raises the bar and exceeds the standard for luxury and corporate private jet charter
                services. We pride ourselves on offering a professional and personalized service.
            </p>
            <a href="{{ route('contact') }}"
                class="bg-[#1A2D73] text-white font-semibold py-2 px-4 sm:py-3 sm:px-8 rounded-full hover:bg-blue-900 transition text-sm sm:text-base">
                Request Quote
            </a>
        </div>
    </section>

    <!-- Blog Section -->
    @if ($blogs->isNotEmpty())
    <section class="py-8 sm:py-12 lg:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Title -->
            <div class="text-center">
                <h3 class="text-base sm:text-lg font-semibold text-[#FFDA03] mb-1 sm:mb-2">FROM THE NEWS POSTS</h3>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-800 mb-6 sm:mb-12">
                    Checkout Our Latest Aviation News and Articles
                </h2>
            </div>

            <!-- News Cards - Responsive Grid instead of overflow-x-auto -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
                @foreach ($blogs as $blog)
                    <div class="bg-white border border-gray-200 rounded-lg shadow">
                        <a href="{{ $blog['url'] }}">
                            <img class="rounded-t-lg w-full h-[180px] sm:h-[220px] lg:h-[250px] object-cover" src="{{ asset($blog['image']) }}"
                                alt="{{ $blog['title'] }}" />
                        </a>
                        <div class="p-4 sm:p-5 mb-3 sm:mb-5">
                            <div class="mb-3 sm:mb-5 flex justify-between text-xs sm:text-sm">
                                <p>BY {{ $blog['author'] }}</p>
                                <p>{{ $blog['date'] }}</p>
                            </div>
                            <a href="{{ $blog['url'] }}">
                                <h5 class="mb-3 sm:mb-5 text-xl sm:text-2xl font-bold tracking-tight text-gray-900">
                                    {{ $blog['title'] }}
                                </h5>
                            </a>
                            <a href="{{ $blog['url'] }}"
                                class="border border-[#1A2D73] text-[#1A2D73] font-semibold py-2 px-4 sm:py-3 sm:px-8 rounded-full hover:border-blue-900 hover:text-blue-900 transition text-sm sm:text-base inline-block">
                                Read More
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
</x-layouts.main>
