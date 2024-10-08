@extends('layouts.main')

@section('meta_tag')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Alfa5 Aviation">
    <meta name="keywords" content="Aircraft Brokerage">
    <meta name="author" content="Zachran Razendra">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#2A6F97">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Alfa5 Aviation">
    <meta property="og:description" content="Aircraft Brokerage">
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
            <h2 class="text-white text-4xl font-bold mb-4">Fleets</h2>

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
                                <span class="ms-1 text-sm font-medium text-white md:ms-2">Fleets</span>
                            </a>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-white mx-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="ms-1 text-sm font-medium text-white md:ms-2">Legacy 600</span>
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
                    <img class="w-full h-[500px] object-cover rounded-lg" src="{{ asset('images/about.jpg') }}"
                        alt="Aircraft Brokerage">
                    <div>
                        <h3 class="text-2xl font-bold mb-4">Legacy 600</h3>
                        <div class="text-justify space-y-4 text-gray-700">
                            <p>
                                Alfa5 Aviation's Private Jet Charter for Business redefines the concept of corporate travel,
                                offering busy professionals a bespoke and seamless journey that perfectly aligns with their
                                demanding schedules. In today’s fast-paced business environment, time is of the essence, and
                                traditional travel methods can often lead to delays and inefficiencies. Recognizing these
                                challenges, Alfa5 Aviation has designed its services to cater specifically to the needs of
                                corporate clients, ensuring that each flight is tailored to maximize productivity. The
                                Legacy 600 aircraft serves as a prime example of this commitment, combining advanced
                                technology with luxurious amenities to create an ideal flying environment for business
                                executives.
                                <br><br>
                                With a reputation built on excellence and customer satisfaction, Alfa5 Aviation prioritizes
                                the unique requirements of business executives. The company understands that each client has
                                specific preferences, from in-flight catering to scheduling flexibility. As a result, the
                                team works diligently to provide a personalized experience, allowing passengers to focus on
                                their work or unwind as needed. This high level of customization is what sets Alfa5 Aviation
                                apart from traditional charter services, where a one-size-fits-all approach often falls
                                short of expectations.
                                <br><br>
                                The Legacy 600 features spacious cabins designed for both comfort and functionality,
                                allowing travelers to conduct meetings or collaborate with colleagues while in the air.
                                Equipped with state-of-the-art communication systems, the aircraft ensures that passengers
                                remain connected to their work and can respond to urgent matters without interruption. The
                                design of the cabin promotes a productive atmosphere, whether through comfortable seating
                                arrangements or areas specifically designed for business discussions. By choosing Alfa5
                                Aviation, clients are assured that they can maintain their workflow even while traveling to
                                their next destination.
                                <br><br>
                                Moreover, Alfa5 Aviation places a strong emphasis on safety and reliability, which are
                                paramount in the corporate travel sector. Each aircraft undergoes rigorous maintenance and
                                inspection processes, ensuring that every flight is secure and dependable. The experienced
                                flight crew is trained to handle a variety of situations, providing an added layer of
                                confidence for business travelers. This commitment to safety enhances the overall travel
                                experience, allowing clients to focus on their objectives without unnecessary worry.
                                <br><br>
                                In conclusion, Alfa5 Aviation's Private Jet Charter for Business, particularly through the
                                Legacy 600, offers a transformative travel experience that aligns seamlessly with the needs
                                of busy professionals. By delivering unparalleled service, comfort, and customization, Alfa5
                                Aviation stands as a leader in the corporate travel industry. Clients can expect not just a
                                flight, but a dedicated partner in their journey, allowing them to travel with ease and
                                efficiency while staying focused on their business goals.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Sidebar with Other Fleets -->
                <div class="bg-gray-100 shadow rounded-lg lg:w-1/4 h-fit space-y-6 p-8">
                    <h3 class="text-xl font-bold mb-4">Other Fleets</h3>
                    <div class="flex flex-col space-y-4">
                        @foreach ($fleets as $fleet)
                            <a href="{{ $fleet['url'] }}"
                                class="bg-gray-200 shadow p-2 rounded flex flex-row items-center space-x-4">
                                <img class="w-16 h-16 object-cover rounded" src="{{ asset($fleet['image']) }}"
                                    alt="{{ $fleet['alt'] }}">
                                <h6 class="text-md">{{ $fleet['title'] }}</h6>
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
