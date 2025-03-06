@section('meta_tag')
    <meta name="description" content="{{ optional($pageSetups['service'])->meta_description ?? '' }}">
    <meta name="keywords" content="{{ optional($pageSetups['service'])->meta_keywords ?? '' }}">
    <meta name="author" content="RECODEX ID">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">

    <link rel="canonical" href="{{ url()->current() }}">

    <title>{{ optional($pageSetups['service'])->title ?? 'Service' }} | {{ $service->title }}</title>
@endsection

<x-layouts.main>
    <!-- Hero Section -->
    <section class="relative bg-cover bg-center bg-no-repeat h-[50vh] flex justify-center items-center"
        style="background-image: url({{ asset('storage/' . $service->image) }})">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 flex flex-col text-center">
            <!-- Title -->
            <h2 class="text-white text-4xl font-bold mb-4">{{ $service->title }}</h2>

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
                                <span class="ms-1 text-sm font-medium text-white md:ms-2">{{ $service->title }}</span>
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
                    <img class="w-full h-[500px] object-cover rounded-lg" src="{{ asset('storage/' . $service->image) }}"
                        alt="{{ $service->title }}">
                    <div>
                        <h3 class="text-2xl font-bold mb-4">{{ $service->title }}</h3>
                        <div class="text-justify space-y-4 text-gray-700">
                            <p>
                                {{ $service->description }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Sidebar with Other Services -->
                <div class="bg-gray-100 shadow rounded-lg lg:w-1/4 h-fit space-y-6 p-8">
                    <h3 class="text-xl font-bold mb-4">Other Services</h3>
                    <div class="flex flex-col space-y-4">
                        @foreach ($services as $service)
                            <a href="{{ route('service.details', $service->slug) }}"
                                class="bg-gray-200 shadow p-2 rounded flex flex-row items-center space-x-4">
                                <img class="w-16 h-16 object-cover rounded" src="{{ asset('storage/' . $service->image) }}"
                                    alt="{{ $service->title }}">
                                <h6 class="text-md">{{ $service->title }}</h6>
                            </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

    @stack('before-scripts')

    @stack('after-scripts')
</x-layouts.main>
