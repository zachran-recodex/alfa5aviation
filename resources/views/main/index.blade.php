@section('meta_tag')
    <meta name="description" content="{{ optional($pageSetups['home'])->meta_description ?? '' }}">
    <meta name="keywords" content="{{ optional($pageSetups['home'])->meta_keywords ?? '' }}">
    <meta name="author" content="RECODEX ID">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="{{ optional($pageSetups['home'])->title ?? 'Home' }}">
    <meta property="og:description" content="{{ optional($pageSetups['home'])->meta_description ?? '' }}">
    <meta property="og:image" content="{{ isset($heroSection) && $heroSection->image ? asset('storage/' . $heroSection->image) : asset('default-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ optional($pageSetups['home'])->title ?? 'Home' }}">
    <meta name="twitter:description" content="{{ optional($pageSetups['home'])->meta_description ?? '' }}">
    <meta name="twitter:image" content="{{ isset($heroSection) && $heroSection->image ? asset('storage/' . $heroSection->image) : asset('default-image.jpg') }}">

    <link rel="canonical" href="{{ url()->current() }}">

    <title>{{ optional($pageSetups['home'])->title ?? 'Home' }}</title>
@endsection

<x-layouts.main>
    <!-- Hero Section -->
    <section class="relative bg-cover bg-center bg-no-repeat min-h-[60vh] md:h-screen flex justify-center items-center"
        style="background-image: url({{ asset('storage/' . $heroSection->image) }})">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 flex flex-col mt-20 md:mt-32 lg:mt-48">
            <!-- Title -->
            <h1 class="text-white text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold mb-4 sm:mb-8">{{ $heroSection->title }}</h1>

            <!-- Buttons -->
            <div class="flex">
                <!-- Request a Quote Button -->
                <a href="{{ route('contact') }}"
                    class="border border-gray-400 text-white font-semibold py-2 px-4 sm:py-3 sm:px-6 rounded-full hover:border-white transition text-sm sm:text-base">
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
            <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800 mb-6 sm:mb-8 text-center">
                We collaborate with leading Private Jet Charters and companies
            </h2>

            <!-- Partner Logos Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
                @foreach ($partners as $partner)
                    <a href="{{ $partner->link }}" target="_blank"
                        class="block p-4 sm:p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 flex items-center justify-center h-24 sm:h-32">
                        <img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->title }}"
                            class="mx-auto max-h-12 sm:max-h-16 object-contain">
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-8 sm:py-12 lg:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8">
                <!-- Image Section -->
                <img src="{{ asset('storage/' . $about->image) }}" alt="Private Jet Charter"
                    class="w-full h-[300px] sm:h-[400px] lg:h-[500px] object-cover rounded-lg">

                <!-- Text Section -->
                <div class="flex flex-col justify-center mt-4 lg:mt-0">
                    <!-- Section Subtitle -->
                    <h3 class="text-[#FFDA03] text-base sm:text-lg font-semibold mb-2">WHAT WILL YOU GET</h3>

                    <!-- Section Title -->
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-800 mb-3 sm:mb-4">
                        {{ $about->title }}
                    </h2>

                    <!-- Section Description -->
                    <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-6">
                        {{ $about->description }}
                    </p>

                    <!-- Key Benefits List -->
                    <ul class="list-disc list-inside text-sm sm:text-base text-gray-700 mb-4 sm:mb-6">
                        <li>Experience and Expertise</li>
                        <li>Safety and Reliability</li>
                    </ul>

                    <!-- Button and Call to Action Section -->
                    <div class="flex flex-col sm:flex-row items-start sm:items-center sm:space-x-6">
                        <!-- Discover More Button -->
                        <a href="{{ route('about') }}"
                            class="bg-[#1A2D73] text-white font-semibold py-2 px-6 sm:py-3 sm:px-8 rounded-full hover:bg-blue-900 transition text-sm sm:text-base mb-4 sm:mb-0">
                            Discover More
                            <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>

                        <!-- Call Info Section -->
                        <div class="flex items-center space-x-3">
                            <div class="border border-gray-400 rounded-full p-2">
                                <i class="fa-solid fa-phone p-1 sm:p-2 text-[#FFDA03]"></i>
                            </div>
                            <div class="text-left">
                                <p class="text-xs sm:text-sm font-medium text-gray-600">CALL ANYTIME</p>
                                <a href="tel:{{ $setting->phone }}"
                                    class="text-base sm:text-lg font-bold text-gray-800">{{ $setting->phone }}</a>
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
                <h3 class="text-base sm:text-lg font-semibold text-[#FFDA03] mb-1 sm:mb-2">OUR BEST SERVICES</h3>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-800 mb-6 sm:mb-12">Explore Our Premier Aviation Services</h2>
            </div>

            <!-- Service Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
                @foreach ($services as $service)
                    <div class="bg-white border border-gray-200 rounded-lg shadow">
                        <a href="{{ route('service.details', $service->slug) }}">
                            <img class="rounded-t-lg w-full h-[180px] sm:h-[220px] lg:h-[250px] object-cover"
                                src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" />
                        </a>
                        <div class="p-4 sm:p-5 mb-3 sm:mb-5 text-center">
                            <a href="{{ route('service.details', $service->slug) }}">
                                <h5 class="mb-3 sm:mb-5 text-xl sm:text-2xl font-bold tracking-tight text-gray-900">{{ $service->title }}
                                </h5>
                            </a>
                            <a href="{{ route('service.details', $service->slug) }}"
                                class="border border-[#1A2D73] text-[#1A2D73] font-semibold py-2 px-4 sm:py-3 sm:px-8 rounded-full hover:border-blue-900 hover:text-blue-900 transition text-sm sm:text-base">
                                Discover More
                            </a>
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

    <!-- Fleet Section -->
    @if ($fleets->isNotEmpty())
    <section class="py-8 sm:py-12 lg:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Title -->
            <div class="text-center">
                <h3 class="text-base sm:text-lg font-semibold text-[#FFDA03] mb-1 sm:mb-2">OUR FLEETS</h3>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-800 mb-6 sm:mb-12">Checkout the Popular Private Jet</h2>
            </div>

            <!-- Fleet Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8">
                @foreach ($fleets as $fleet)
                    <div class="bg-white border border-gray-200 rounded-lg shadow">
                        <a href="{{ route('fleet.details', $fleet->slug) }}">
                            <img class="rounded-t-lg w-full h-[180px] sm:h-[220px] lg:h-[250px] object-cover"
                                src="{{ asset('storage/' . $fleet->image) }}" alt="{{ $fleet->title }}" />
                        </a>
                        <div class="p-4 sm:p-5 mb-3 sm:mb-5 text-center">
                            <a href="{{ route('fleet.details', $fleet->slug) }}">
                                <h5 class="mb-3 sm:mb-5 text-xl sm:text-2xl font-bold tracking-tight text-gray-900">{{ $fleet->title }}
                                </h5>
                            </a>
                            <a href="{{ route('fleet.details', $fleet->slug) }}"
                                class="border border-[#1A2D73] text-[#1A2D73] font-semibold py-2 px-4 sm:py-3 sm:px-8 rounded-full hover:border-blue-900 hover:text-blue-900 transition text-sm sm:text-base">
                                Discover More
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

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
                        <a href="{{ route('blog.details', $blog->slug) }}">
                            <img class="rounded-t-lg w-full h-[180px] sm:h-[220px] lg:h-[250px] object-cover"
                                src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" />
                        </a>
                        <div class="p-4 sm:p-5 mb-3 sm:mb-5">
                            <div class="mb-3 sm:mb-5 flex justify-between text-xs sm:text-sm">
                                <p>Admin</p>
                                <p>{{ $blog->created_at->format('M d, Y') }}</p>
                            </div>
                            <a href="{{ route('blog.details', $blog->slug) }}">
                                <h5 class="mb-3 sm:mb-5 text-xl sm:text-2xl font-bold tracking-tight text-gray-900">
                                    {{ $blog->title }}
                                </h5>
                            </a>
                            <a href="{{ route('blog.details', $blog->slug) }}"
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
