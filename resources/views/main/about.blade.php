@section('meta_tag')
    <meta name="description" content="{{ optional($pageSetups['about'])->meta_description ?? '' }}">
    <meta name="keywords" content="{{ optional($pageSetups['about'])->meta_keywords ?? '' }}">
    <meta name="author" content="RECODEX ID">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">

    <link rel="canonical" href="{{ url()->current() }}">

    <title>{{ optional($pageSetups['about'])->title ?? 'About Us' }}</title>
@endsection

<x-layouts.main>
    <!-- Hero Section -->
    <section class="relative bg-cover bg-center bg-no-repeat h-[50vh] flex justify-center items-center"
        style="background-image: url({{ asset('images/hero-section.png') }})">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 flex flex-col text-center">
            <!-- Title -->
            <h2 class="text-white text-4xl font-bold mb-4">About Us</h2>

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
                                <span class="ms-1 text-sm font-medium text-white md:ms-2">About Us</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

    </section>

    <!-- About Section -->
    <section class="py-8 sm:py-12 lg:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Image Section -->
                <img src="{{ asset('storage/' . $about->image) }}" alt="Private Jet Experience"
                        class="h-full object-cover rounded-lg shadow-md mb-8">

                <!-- Text Section -->
                <div class="flex flex-col justify-center">
                    <!-- Section Subtitle -->
                    <h3 class="text-[#FFDA03] text-lg font-semibold mb-2">ABOUT OUR COMPANY</h3>

                    <!-- Section Title -->
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                        Alfa5 Aviation
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
                        <!-- Contact Button -->
                        <a href="{{ route('contact') }}"
                            class="bg-[#1A2D73] text-white font-semibold py-3 px-8 rounded-full hover:bg-blue-900 transition">
                            Contact Us
                        </a>

                        <!-- Call Info Section -->
                        <div class="flex items-center space-x-3">
                            <div class="border border-gray-400 rounded-full p-2">
                                <i class="fa-solid fa-phone p-2 text-[#FFDA03]"></i>
                            </div>
                            <div class="text-left">
                                <p class="text-sm font-medium text-gray-600">CALL ANYTIME</p>
                                <a href="tel:{{ $setting->phone }}"
                                    class="text-lg font-bold text-gray-800">{{ $setting->phone }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission Section -->
    <section class="py-8 sm:py-12 lg:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Vision Section -->
                <div class="flex flex-col">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Vision</h2>
                    <p class="text-gray-600 text-justify">
                        {{ $about->vision }}
                    </p>
                </div>

                <!-- Mission Section -->
                <div class="flex flex-col">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">Mission</h2>
                    <p class="text-gray-600 text-justify">
                        {{ $about->mission }}
                    </p>
                </div>
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
                        <img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->title }}"
                            class="mx-auto max-h-16 object-contain">
                    </a>
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

    <!-- Blog Section -->
    @if ($blogs->isNotEmpty())
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
                                    src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" />
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
    @endif

    @stack('before-scripts')

    @stack('after-scripts')
</x-layouts.main>
