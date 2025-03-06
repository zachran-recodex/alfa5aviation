@section('meta_tag')
    <meta name="description" content="{{ optional($pageSetups['fleet'])->meta_description ?? '' }}">
    <meta name="keywords" content="{{ optional($pageSetups['fleet'])->meta_keywords ?? '' }}">
    <meta name="author" content="RECODEX ID">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="{{ optional($pageSetups['fleet'])->title ?? 'Fleet' }} | {{ $fleet->title }}">
    <meta property="og:description" content="{{ optional($pageSetups['fleet'])->meta_description ?? '' }}">
    <meta property="og:image" content="{{ isset($fleet) && $fleet->image ? asset('storage/' . $fleet->image) : asset('default-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ optional($pageSetups['fleet'])->title ?? 'Fleet' }} | {{ $fleet->title }}">
    <meta name="twitter:description" content="{{ optional($pageSetups['fleet'])->meta_description ?? '' }}">
    <meta name="twitter:image" content="{{ isset($fleet) && $fleet->image ? asset('storage/' . $fleet->image) : asset('default-image.jpg') }}">

    <link rel="canonical" href="{{ url()->current() }}">

    <title>{{ optional($pageSetups['fleet'])->title ?? 'Fleet' }} | {{ $fleet->title }}</title>
@endsection

<x-layouts.main>
    <!-- Hero Section -->
    <section class="relative bg-cover bg-center bg-no-repeat min-h-[40vh] sm:h-[50vh] flex justify-center items-center"
        style="background-image: url({{ asset('storage/' . $fleet->image) }})">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <div class="relative z-10 container mx-auto px-4 sm:px-6 lg:px-8 flex flex-col text-center">
            <!-- Title -->
            <h2 class="text-white text-2xl sm:text-3xl lg:text-4xl font-bold mb-2 sm:mb-4">{{ $fleet->title }}</h2>

            <!-- Breadcrumbs -->
            <div class="flex justify-center">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href="{{ route('home') }}"
                                class="inline-flex items-center text-xs sm:text-sm font-medium text-white hover:text-[#FFDA03]">
                                <svg class="w-2.5 h-2.5 sm:w-3 sm:h-3 me-1.5 sm:me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                </svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('fleet') }}" class="flex items-center">
                                <svg class="rtl:rotate-180 w-2.5 h-2.5 sm:w-3 sm:h-3 text-white mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="ms-1 text-xs sm:text-sm font-medium text-white md:ms-2">Fleets</span>
                            </a>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-2.5 h-2.5 sm:w-3 sm:h-3 text-white mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="ms-1 text-xs sm:text-sm font-medium text-white md:ms-2 truncate max-w-[150px] sm:max-w-none">{{ $fleet->title }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!-- Fleet Detail Section -->
    <section class="py-8 sm:py-12 lg:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-6 sm:gap-8">

                <!-- Main Fleet Content -->
                <div class="w-full lg:w-3/4 space-y-4 sm:space-y-6">
                    <!-- Aircraft Image -->
                    <img class="w-full h-[250px] sm:h-[350px] lg:h-[500px] object-cover rounded-lg" src="{{ asset('storage/' . $fleet->image) }}"
                        alt="{{ $fleet->title }}">

                    <!-- Aircraft Overview -->
                    <div>
                        <h3 class="text-xl sm:text-2xl font-bold mb-3 sm:mb-4">{{ $fleet->title }}</h3>
                        <div class="text-sm sm:text-base space-y-3 sm:space-y-4 text-gray-700">
                            <p>{{ $fleet->description }}</p>
                        </div>
                    </div>

                    <!-- Aircraft Specifications -->
                    <div class="mt-6">
                        <h3 class="text-xl sm:text-2xl font-bold mb-4 text-[#1A2D73]">Aircraft Specifications</h3>

                        <!-- Specs Cards -->
                        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                            <!-- Model Year -->
                            @if($fleet->start_model_year)
                            <div class="bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200">
                                <h4 class="text-sm text-gray-500 mb-1">Model Year</h4>
                                <p class="text-base sm:text-lg font-semibold">
                                    {{ $fleet->start_model_year }}{{ $fleet->end_model_year ? ' - '.$fleet->end_model_year : '' }}
                                </p>
                            </div>
                            @endif

                            <!-- Fleet Size -->
                            @if($fleet->fleet_size)
                            <div class="bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200">
                                <h4 class="text-sm text-gray-500 mb-1">Fleet Size</h4>
                                <p class="text-base sm:text-lg font-semibold">{{ $fleet->fleet_size }} Aircraft</p>
                            </div>
                            @endif

                            <!-- Engine Count -->
                            @if($fleet->engine_count)
                            <div class="bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200">
                                <h4 class="text-sm text-gray-500 mb-1">Engines</h4>
                                <p class="text-base sm:text-lg font-semibold">{{ $fleet->engine_count }}</p>
                            </div>
                            @endif

                            <!-- Passenger Capacity -->
                            @if($fleet->passenger)
                            <div class="bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200">
                                <h4 class="text-sm text-gray-500 mb-1">Passenger Capacity</h4>
                                <p class="text-base sm:text-lg font-semibold">{{ $fleet->passenger }} Seats</p>
                            </div>
                            @endif

                            <!-- Aircraft Class -->
                            @if($fleet->model_class)
                            <div class="bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200">
                                <h4 class="text-sm text-gray-500 mb-1">Aircraft Class</h4>
                                <p class="text-base sm:text-lg font-semibold">{{ $fleet->model_class }}</p>
                            </div>
                            @endif

                            <!-- Range -->
                            @if($fleet->range)
                            <div class="bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200">
                                <h4 class="text-sm text-gray-500 mb-1">Range</h4>
                                <p class="text-base sm:text-lg font-semibold">{{ number_format($fleet->range) }} km</p>
                            </div>
                            @endif

                            <!-- Max Cruising Speed -->
                            @if($fleet->max_cruising_speed)
                            <div class="bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200">
                                <h4 class="text-sm text-gray-500 mb-1">Max Speed</h4>
                                <p class="text-base sm:text-lg font-semibold">{{ number_format($fleet->max_cruising_speed) }} km/h</p>
                            </div>
                            @endif

                            <!-- Ceiling -->
                            @if($fleet->ceiling)
                            <div class="bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200">
                                <h4 class="text-sm text-gray-500 mb-1">Ceiling</h4>
                                <p class="text-base sm:text-lg font-semibold">{{ number_format($fleet->ceiling) }} ft</p>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Performance Section -->
                    @if($fleet->take_off_distance || $fleet->landing_distance)
                    <div class="mt-6">
                        <h3 class="text-xl sm:text-2xl font-bold mb-4 text-[#1A2D73]">Performance</h3>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- Take-off Distance -->
                            @if($fleet->take_off_distance)
                            <div class="bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200">
                                <h4 class="text-sm text-gray-500 mb-1">Take-off Distance</h4>
                                <p class="text-base sm:text-lg font-semibold">{{ number_format($fleet->take_off_distance) }} ft</p>
                            </div>
                            @endif

                            <!-- Landing Distance -->
                            @if($fleet->landing_distance)
                            <div class="bg-gray-50 p-4 rounded-lg shadow-sm border border-gray-200">
                                <h4 class="text-sm text-gray-500 mb-1">Landing Distance</h4>
                                <p class="text-base sm:text-lg font-semibold">{{ number_format($fleet->landing_distance) }} ft</p>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif

                    <!-- Charter Request Button -->
                    <div class="mt-8">
                        <a href="{{ route('contact') }}" class="inline-block bg-[#1A2D73] text-white font-semibold py-3 px-8 rounded-full hover:bg-blue-900 transition text-sm sm:text-base">
                            Request a Charter Quote
                        </a>
                    </div>
                </div>

                <!-- Sidebar with Other Fleets -->
                <div class="bg-gray-100 shadow rounded-lg w-full lg:w-1/4 h-fit space-y-4 sm:space-y-6 p-4 sm:p-6 lg:p-8 mt-6 lg:mt-0">
                    <h3 class="text-lg sm:text-xl font-bold mb-3 sm:mb-4 text-[#1A2D73]">Other Fleets</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-1 gap-3 sm:gap-4">
                        @foreach ($fleets as $otherFleet)
                            @if($otherFleet->id != $fleet->id)
                            <a href="{{ route('fleet.details', $otherFleet->slug) }}"
                                class="bg-white shadow hover:shadow-md transition-shadow p-2 rounded flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-3">
                                <img class="w-full sm:w-12 h-20 sm:h-12 object-cover rounded" src="{{ asset('storage/' . $otherFleet->image) }}"
                                    alt="{{ $otherFleet->title }}">
                                <div class="w-full sm:w-auto">
                                    <h6 class="text-xs sm:text-sm text-center sm:text-left font-medium">{{ $otherFleet->title }}</h6>
                                    @if($otherFleet->passenger)
                                    <p class="text-xs text-gray-500 text-center sm:text-left">{{ $otherFleet->passenger }} Passengers</p>
                                    @endif
                                </div>
                            </a>
                            @endif
                        @endforeach
                    </div>

                    <!-- Contact Us Box -->
                    <div class="bg-[#1A2D73] text-white rounded-lg p-4 sm:p-6 mt-6">
                        <h3 class="text-lg font-bold mb-3">Need Assistance?</h3>
                        <p class="text-sm mb-4">Contact our team for more information about our fleet or to schedule a charter.</p>
                        <a href="tel:{{ $setting->phone ?? '+628xxxxxxxxxx' }}" class="flex items-center text-sm mb-2">
                            <i class="fas fa-phone mr-2"></i>
                            <span>{{ $setting->phone ?? '+628xxxxxxxxxx' }}</span>
                        </a>
                        <a href="mailto:{{ $setting->email ?? 'info@example.com' }}" class="flex items-center text-sm">
                            <i class="fas fa-envelope mr-2"></i>
                            <span>{{ $setting->email ?? 'info@example.com' }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.main>
