@section('meta_tag')
    <meta name="description" content="{{ optional($pageSetups['contact'])->meta_description ?? '' }}">
    <meta name="keywords" content="{{ optional($pageSetups['contact'])->meta_keywords ?? '' }}">
    <meta name="author" content="RECODEX ID">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="{{ optional($pageSetups['contact'])->title ?? 'Contact Us' }}">
    <meta property="og:description" content="{{ optional($pageSetups['contact'])->meta_description ?? '' }}">
    <meta property="og:image" content="{{ isset($heroSection) && $heroSection->image ? asset('storage/' . $heroSection->image) : asset('default-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ optional($pageSetups['contact'])->title ?? 'Contact Us' }}">
    <meta name="twitter:description" content="{{ optional($pageSetups['contact'])->meta_description ?? '' }}">
    <meta name="twitter:image" content="{{ isset($heroSection) && $heroSection->image ? asset('storage/' . $heroSection->image) : asset('default-image.jpg') }}">

    <link rel="canonical" href="{{ url()->current() }}">

    <title>{{ optional($pageSetups['contact'])->title ?? 'Contact Us' }}</title>
@endsection

<x-layouts.main>
    <!-- Hero Section -->
    <section class="relative bg-cover bg-center bg-no-repeat min-h-[40vh] sm:h-[50vh] flex justify-center items-center"
        style="background-image: url({{ asset('storage/' . $heroSection->image) }})">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 flex flex-col text-center">
            <!-- Title -->
            <h2 class="text-white text-2xl sm:text-3xl lg:text-4xl font-bold mb-2 sm:mb-4">Contact Us</h2>

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
                                <span class="ms-1 text-xs sm:text-sm font-medium text-white md:ms-2">Contact Us</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

    </section>

    <!-- Contact Section -->
    <section class="py-8 sm:py-12 lg:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16">
                <!-- Contact Information -->
                <div class="space-y-4 sm:space-y-6">
                    <!-- Google Maps -->
                    <div class="w-full overflow-hidden rounded-lg shadow-md">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15864.23597842892!2d106.8827063!3d-6.2559588!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3290136fb5d%3A0xc6d173a765e87b23!2sAlfa5%20Aviation!5e0!3m2!1sid!2sid!4v1717753377062!5m2!1sid!2sid"
                            class="w-full h-[250px] sm:h-[300px] lg:h-[400px]" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>

                    <!-- Office Information -->
                    <div class="border-b-2 pb-4">
                        <span class="text-xs sm:text-sm text-gray-500">Alfa5 Aviation</span>
                        <h2 class="text-xl sm:text-2xl font-semibold text-gray-800 mt-2">
                            {{ $setting->address }}
                        </h2>
                    </div>

                    <!-- Contact Details -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                        <!-- Email Support -->
                        <div>
                            <span class="text-xs sm:text-sm text-gray-500">Email Support</span>
                            <ul class="mt-2 space-y-2">
                                <li>
                                    <a href="mailto:{{ $setting->email }}" class="text-base sm:text-lg text-[#1A2D73] hover:underline">
                                        {{ $setting->email }}
                                    </a>
                                </li>
                                <li>
                                    <a href="mailto:{{ $setting->email_two }}" class="text-base sm:text-lg text-[#1A2D73] hover:underline">
                                        {{ $setting->email_two }}
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Phone Support -->
                        <div>
                            <span class="text-xs sm:text-sm text-gray-500">Let's Talk</span>
                            <ul class="mt-2 space-y-2">
                                <li>
                                    <a href="tel:{{ $setting->phone }}" class="text-base sm:text-lg text-[#1A2D73] hover:underline">
                                        {{ $setting->phone }}
                                    </a>
                                </li>
                                <li>
                                    <a href="tel:{{ $setting->phone_two }}" class="text-base sm:text-lg text-[#1A2D73] hover:underline">
                                        {{ $setting->phone_two }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="bg-gray-100 p-4 sm:p-6 rounded-lg shadow-md mt-6 lg:mt-0">
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf <!-- CSRF Token for Security -->

                        <!-- Form Header -->
                        <div class="mb-4">
                            <h3 class="text-2xl sm:text-3xl lg:text-4xl font-semibold text-gray-800 mb-3 sm:mb-4">Send Us a Message</h3>
                            <p class="text-sm sm:text-base text-gray-600 mb-4">
                                Reach out to Alfa 5 Aviation for inquiries, bookings, or collaborations. We're here to
                                assist you in all your aviation needs. Contact us today.
                            </p>
                            <!-- Display Success Message -->
                            @if(session('success'))
                                <div class="mt-3 sm:mt-4 p-3 sm:p-4 bg-green-100 border border-green-400 text-green-700 text-sm sm:text-base rounded">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>

                        <!-- Form Fields -->
                        <div class="grid grid-cols-1 gap-3 sm:gap-4">
                            <!-- Name Input -->
                            <div>
                                <label for="name" class="block text-xs sm:text-sm font-medium text-gray-700">Your Name</label>
                                <input type="text" id="name" name="name"
                                       class="mt-1 p-2 sm:p-3 block w-full shadow-sm text-sm border-gray-300 rounded-md"
                                       placeholder="Enter your name" value="{{ old('name') }}">
                                @error('name')
                                <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email Input -->
                            <div>
                                <label for="email" class="block text-xs sm:text-sm font-medium text-gray-700">Your Email</label>
                                <input type="email" id="email" name="email"
                                       class="mt-1 p-2 sm:p-3 block w-full shadow-sm text-sm border-gray-300 rounded-md"
                                       placeholder="Enter your email" value="{{ old('email') }}">
                                @error('email')
                                <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Phone Input -->
                            <div>
                                <label for="phone" class="block text-xs sm:text-sm font-medium text-gray-700">Your Phone</label>
                                <input type="tel" id="phone" name="phone"
                                       class="mt-1 p-2 sm:p-3 block w-full shadow-sm text-sm border-gray-300 rounded-md"
                                       placeholder="Enter your phone number" value="{{ old('phone') }}">
                                @error('phone')
                                <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Subject Input -->
                            <div>
                                <label for="subject" class="block text-xs sm:text-sm font-medium text-gray-700">Subject</label>
                                <input type="text" id="subject" name="subject"
                                       class="mt-1 p-2 sm:p-3 block w-full shadow-sm text-sm border-gray-300 rounded-md"
                                       placeholder="Enter the subject of your message" value="{{ old('subject') }}">
                                @error('subject')
                                <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Message Input -->
                            <div>
                                <label for="message" class="block text-xs sm:text-sm font-medium text-gray-700">Message</label>
                                <textarea id="message" name="message" rows="4"
                                          class="mt-1 p-2 sm:p-3 block w-full shadow-sm text-sm border-gray-300 rounded-md"
                                          placeholder="Write your message">{{ old('message') }}</textarea>
                                @error('message')
                                <p class="text-red-500 text-xs sm:text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-2">
                                <button type="submit"
                                        class="w-full bg-[#1A2D73] text-white font-semibold py-2 px-4 sm:py-3 sm:px-6 rounded-full hover:bg-blue-900 transition text-sm sm:text-base">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

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
