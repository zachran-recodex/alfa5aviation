<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Data partner
        $partners = [
            [
                'image' => 'images/bgs.png',
                'alt' => 'Partner 1',
                'url' => 'https://partner1.com',
            ],
            [
                'image' => 'images/b5.png',
                'alt' => 'Partner 2',
                'url' => 'https://partner2.com',
            ],
            [
                'image' => 'images/alfalima1.png',
                'alt' => 'Partner 3',
                'url' => 'https://partner3.com',
            ],
        ];

        // Data services
        $services = [
            [
                'image' => 'images/pj.jpg',
                'title' => 'Private Jet Charter',
                'desc' => 'At Alfa5 Aviation, we bring innovation to business travel through our private jet charter services...',
                'alt' => 'Private Jet Charter',
                'url' => '/service/private-jet-charter',
            ],
            [
                'image' => 'images/management.jpg',
                'title' => 'Private Jet Management Service',
                'desc' => 'Since its founding in 2022, Alfa5 Aviation has built a reputation as a leader in private jet management services...',
                'alt' => 'Private Jet Management Service',
                'url' => '/service/private-jet-management-service',
            ],
            [
                'image' => 'images/consulting.jpg',
                'title' => 'Aviation Consulting',
                'desc' => 'Aviation Consulting Services provide access to professional guidance in addressing the complex challenges...',
                'alt' => 'Aviation Consulting',
                'url' => '/service/aviation-consulting',
            ],
            [
                'image' => 'images/medevac.jpg',
                'title' => 'Medical Air Ambulance / Medevac',
                'desc' => 'We proud to offer a leading Medical Air Ambulance or Medevac service that is specifically designed to provide...',
                'alt' => 'Medical Air Ambulance / Medevac',
                'url' => '/service/medical-air-ambulance',
            ],
            [
                'image' => 'images/gsa.jpg',
                'title' => 'GSA Representative',
                'desc' => 'As a trusted General Sales Agent (GSA) for various international airlines looking to expand their reach in Indonesia.',
                'alt' => 'GSA Representative',
                'url' => '/service/gsa-representative',
            ],
            [
                'image' => 'images/operation.jpg',
                'title' => 'Operations',
                'desc' => 'Private Jet Charter for Business, especially through the Legacy 600, offers a travel experience tailored to meet the...',
                'alt' => 'Operations',
                'url' => '/service/operation',
            ],
            [
                'image' => 'images/engineering.jpg',
                'title' => 'Engineering',
                'desc' => 'Alfa5 Aviation’s success in delivering exceptional private jet charter services is deeply rooted in its commitment to...',
                'alt' => 'Engineering',
                'url' => '/service/engineering',
            ],
            [
                'image' => 'images/comfort.jpg',
                'title' => 'Comfort',
                'desc' => 'Comfort is at the heart of Alfa5 Aviation’s Private Jet Charter for Business, providing an experience that goes beyond...',
                'alt' => 'Comfort',
                'url' => '/service/comfort',
            ],
            [
                'image' => 'images/broker.jpg',
                'title' => 'Aircraft Brokerage',
                'desc' => 'Alfa5 Aviation’s Aircraft Brokerage services provide clients with a comprehensive and personalized approach to buying, selling, or leasing...',
                'alt' => 'Aircraft Brokerage',
                'url' => '/service/aircraft-brokerage',
            ],
        ];

        // Data fleets
        $fleets = [
            [
                'image' => 'images/management.jpg',
                'title' => 'Embraer Legacy 600',
                'alt' => 'Embraer Legacy 600',
                'url' => '#',
            ],
        ];

        // Data blogs
        $blogs = [
            [
                'image' => 'images/pj.jpg',
                'title' => 'All You Need to Know About Ground Handling',
                'author' => 'Author Name',
                'date' => 'August 26, 2024',
                'url' => '#',
            ],
            [
                'image' => 'images/management.jpg',
                'title' => 'The Future of Aviation Technology',
                'author' => 'Author Name',
                'date' => 'September 1, 2024',
                'url' => '#',
            ],
            [
                'image' => 'images/medevac.jpg',
                'title' => 'Safety Protocols in Private Aviation',
                'author' => 'Author Name',
                'date' => 'September 10, 2024',
                'url' => '#',
            ],
            [
                'image' => 'images/consulting.jpg',
                'title' => 'Exploring Luxury in Private Jets',
                'author' => 'Author Name',
                'date' => 'September 15, 2024',
                'url' => '#',
            ],
        ];

        // Return view with partners, services, fleets, and blogs data
        return view('index', [
            'partners' => $partners,
            'services' => $services,
            'fleets' => $fleets,
            'blogs' => $blogs,
        ]);
    }

    public function bookFlight(Request $request)
    {
        // Validasi data yang diterima
        $validatedData = $request->validate([
            'from' => 'required|string|max:255',
            'to' => 'required|string|max:255',
            'departure_date' => 'required|date',
            'return_date' => 'required|date',
            'passengers' => 'required|integer|min:1',
            'baggage' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
        ]);

        // Proses data booking di sini, misalnya simpan ke database atau kirim email
        // ...

        // Kembali ke halaman index dengan pesan sukses
        return redirect('/')->with('success', 'Your booking request has been submitted successfully.');
    }

    public function about()
    {
        // Data partner
        $partners = [
            [
                'image' => 'images/bgs.png',
                'alt' => 'Partner 1',
                'url' => 'https://partner1.com',
            ],
            [
                'image' => 'images/b5.png',
                'alt' => 'Partner 2',
                'url' => 'https://partner2.com',
            ],
            [
                'image' => 'images/alfalima1.png',
                'alt' => 'Partner 3',
                'url' => 'https://partner3.com',
            ],
        ];

        // Data blogs
        $blogs = [
            [
                'image' => 'images/pj.jpg',
                'title' => 'All You Need to Know About Ground Handling',
                'author' => 'Author Name',
                'date' => 'August 26, 2024',
                'url' => '#',
            ],
            [
                'image' => 'images/management.jpg',
                'title' => 'The Future of Aviation Technology',
                'author' => 'Author Name',
                'date' => 'September 1, 2024',
                'url' => '#',
            ],
            [
                'image' => 'images/medevac.jpg',
                'title' => 'Safety Protocols in Private Aviation',
                'author' => 'Author Name',
                'date' => 'September 10, 2024',
                'url' => '#',
            ],
            [
                'image' => 'images/consulting.jpg',
                'title' => 'Exploring Luxury in Private Jets',
                'author' => 'Author Name',
                'date' => 'September 15, 2024',
                'url' => '#',
            ],
        ];

        return view ('main.about', [
            'partners' => $partners,
            'blogs' => $blogs,
        ]);
    }

    public function service()
    {
        // Data services
        $services = [
            [
                'image' => 'images/pj.jpg',
                'title' => 'Private Jet Charter',
                'desc' => 'At Alfa5 Aviation, we bring innovation to business travel through our private jet charter services...',
                'alt' => 'Private Jet Charter',
                'url' => '/service/private-jet-charter',
            ],
            [
                'image' => 'images/management.jpg',
                'title' => 'Private Jet Management Service',
                'desc' => 'Since its founding in 2022, Alfa5 Aviation has built a reputation as a leader in private jet management services...',
                'alt' => 'Private Jet Management Service',
                'url' => '/service/private-jet-management-service',
            ],
            [
                'image' => 'images/consulting.jpg',
                'title' => 'Aviation Consulting',
                'desc' => 'Aviation Consulting Services provide access to professional guidance in addressing the complex challenges...',
                'alt' => 'Aviation Consulting',
                'url' => '/service/aviation-consulting',
            ],
            [
                'image' => 'images/medevac.jpg',
                'title' => 'Medical Air Ambulance / Medevac',
                'desc' => 'We proud to offer a leading Medical Air Ambulance or Medevac service that is specifically designed to provide...',
                'alt' => 'Medical Air Ambulance / Medevac',
                'url' => '/service/medical-air-ambulance',
            ],
            [
                'image' => 'images/gsa.jpg',
                'title' => 'GSA Representative',
                'desc' => 'As a trusted General Sales Agent (GSA) for various international airlines looking to expand their reach in Indonesia.',
                'alt' => 'GSA Representative',
                'url' => '/service/gsa-representative',
            ],
            [
                'image' => 'images/operation.jpg',
                'title' => 'Operations',
                'desc' => 'Private Jet Charter for Business, especially through the Legacy 600, offers a travel experience tailored to meet the...',
                'alt' => 'Operations',
                'url' => '/service/operation',
            ],
            [
                'image' => 'images/engineering.jpg',
                'title' => 'Engineering',
                'desc' => 'Alfa5 Aviation’s success in delivering exceptional private jet charter services is deeply rooted in its commitment to...',
                'alt' => 'Engineering',
                'url' => '/service/engineering',
            ],
            [
                'image' => 'images/comfort.jpg',
                'title' => 'Comfort',
                'desc' => 'Comfort is at the heart of Alfa5 Aviation’s Private Jet Charter for Business, providing an experience that goes beyond...',
                'alt' => 'Comfort',
                'url' => '/service/comfort',
            ],
            [
                'image' => 'images/broker.jpg',
                'title' => 'Aircraft Brokerage',
                'desc' => 'Alfa5 Aviation’s Aircraft Brokerage services provide clients with a comprehensive and personalized approach to buying, selling, or leasing...',
                'alt' => 'Aircraft Brokerage',
                'url' => '/service/aircraft-brokerage',
            ],
        ];

        // Data blogs
        $blogs = [
            [
                'image' => 'images/pj.jpg',
                'title' => 'All You Need to Know About Ground Handling',
                'author' => 'Author Name',
                'date' => 'August 26, 2024',
                'url' => '#',
            ],
            [
                'image' => 'images/management.jpg',
                'title' => 'The Future of Aviation Technology',
                'author' => 'Author Name',
                'date' => 'September 1, 2024',
                'url' => '#',
            ],
            [
                'image' => 'images/medevac.jpg',
                'title' => 'Safety Protocols in Private Aviation',
                'author' => 'Author Name',
                'date' => 'September 10, 2024',
                'url' => '#',
            ],
            [
                'image' => 'images/consulting.jpg',
                'title' => 'Exploring Luxury in Private Jets',
                'author' => 'Author Name',
                'date' => 'September 15, 2024',
                'url' => '#',
            ],
        ];

        return view ('main.service', [
            'services' => $services,
            'blogs' => $blogs,
        ]);
    }

    public function private()
    {
        // Data services
        $services = [
            [
                'image' => 'images/pj.jpg',
                'title' => 'Private Jet Charter',
                'desc' => 'At Alfa5 Aviation, we bring innovation to business travel through our private jet charter services...',
                'alt' => 'Private Jet Charter',
                'url' => '/service/private-jet-charter',
            ],
            [
                'image' => 'images/management.jpg',
                'title' => 'Private Jet Management Service',
                'desc' => 'Since its founding in 2022, Alfa5 Aviation has built a reputation as a leader in private jet management services...',
                'alt' => 'Private Jet Management Service',
                'url' => '/service/private-jet-management-service',
            ],
            [
                'image' => 'images/consulting.jpg',
                'title' => 'Aviation Consulting',
                'desc' => 'Aviation Consulting Services provide access to professional guidance in addressing the complex challenges...',
                'alt' => 'Aviation Consulting',
                'url' => '/service/aviation-consulting',
            ],
            [
                'image' => 'images/medevac.jpg',
                'title' => 'Medical Air Ambulance / Medevac',
                'desc' => 'We proud to offer a leading Medical Air Ambulance or Medevac service that is specifically designed to provide...',
                'alt' => 'Medical Air Ambulance / Medevac',
                'url' => '/service/medical-air-ambulance',
            ],
            [
                'image' => 'images/gsa.jpg',
                'title' => 'GSA Representative',
                'desc' => 'As a trusted General Sales Agent (GSA) for various international airlines looking to expand their reach in Indonesia.',
                'alt' => 'GSA Representative',
                'url' => '/service/gsa-representative',
            ],
            [
                'image' => 'images/operation.jpg',
                'title' => 'Operations',
                'desc' => 'Private Jet Charter for Business, especially through the Legacy 600, offers a travel experience tailored to meet the...',
                'alt' => 'Operations',
                'url' => '/service/operation',
            ],
            [
                'image' => 'images/engineering.jpg',
                'title' => 'Engineering',
                'desc' => 'Alfa5 Aviation’s success in delivering exceptional private jet charter services is deeply rooted in its commitment to...',
                'alt' => 'Engineering',
                'url' => '/service/engineering',
            ],
            [
                'image' => 'images/comfort.jpg',
                'title' => 'Comfort',
                'desc' => 'Comfort is at the heart of Alfa5 Aviation’s Private Jet Charter for Business, providing an experience that goes beyond...',
                'alt' => 'Comfort',
                'url' => '/service/comfort',
            ],
            [
                'image' => 'images/broker.jpg',
                'title' => 'Aircraft Brokerage',
                'desc' => 'Alfa5 Aviation’s Aircraft Brokerage services provide clients with a comprehensive and personalized approach to buying, selling, or leasing...',
                'alt' => 'Aircraft Brokerage',
                'url' => '/service/aircraft-brokerage',
            ],
        ];

        return view ('main.service.private', [
            'services' => $services,
        ]);
    }

    public function management()
    {
        // Data services
        $services = [
            [
                'image' => 'images/pj.jpg',
                'title' => 'Private Jet Charter',
                'desc' => 'At Alfa5 Aviation, we bring innovation to business travel through our private jet charter services...',
                'alt' => 'Private Jet Charter',
                'url' => '/service/private-jet-charter',
            ],
            [
                'image' => 'images/management.jpg',
                'title' => 'Private Jet Management Service',
                'desc' => 'Since its founding in 2022, Alfa5 Aviation has built a reputation as a leader in private jet management services...',
                'alt' => 'Private Jet Management Service',
                'url' => '/service/private-jet-management-service',
            ],
            [
                'image' => 'images/consulting.jpg',
                'title' => 'Aviation Consulting',
                'desc' => 'Aviation Consulting Services provide access to professional guidance in addressing the complex challenges...',
                'alt' => 'Aviation Consulting',
                'url' => '/service/aviation-consulting',
            ],
            [
                'image' => 'images/medevac.jpg',
                'title' => 'Medical Air Ambulance / Medevac',
                'desc' => 'We proud to offer a leading Medical Air Ambulance or Medevac service that is specifically designed to provide...',
                'alt' => 'Medical Air Ambulance / Medevac',
                'url' => '/service/medical-air-ambulance',
            ],
            [
                'image' => 'images/gsa.jpg',
                'title' => 'GSA Representative',
                'desc' => 'As a trusted General Sales Agent (GSA) for various international airlines looking to expand their reach in Indonesia.',
                'alt' => 'GSA Representative',
                'url' => '/service/gsa-representative',
            ],
            [
                'image' => 'images/operation.jpg',
                'title' => 'Operations',
                'desc' => 'Private Jet Charter for Business, especially through the Legacy 600, offers a travel experience tailored to meet the...',
                'alt' => 'Operations',
                'url' => '/service/operation',
            ],
            [
                'image' => 'images/engineering.jpg',
                'title' => 'Engineering',
                'desc' => 'Alfa5 Aviation’s success in delivering exceptional private jet charter services is deeply rooted in its commitment to...',
                'alt' => 'Engineering',
                'url' => '/service/engineering',
            ],
            [
                'image' => 'images/comfort.jpg',
                'title' => 'Comfort',
                'desc' => 'Comfort is at the heart of Alfa5 Aviation’s Private Jet Charter for Business, providing an experience that goes beyond...',
                'alt' => 'Comfort',
                'url' => '/service/comfort',
            ],
            [
                'image' => 'images/broker.jpg',
                'title' => 'Aircraft Brokerage',
                'desc' => 'Alfa5 Aviation’s Aircraft Brokerage services provide clients with a comprehensive and personalized approach to buying, selling, or leasing...',
                'alt' => 'Aircraft Brokerage',
                'url' => '/service/aircraft-brokerage',
            ],
        ];

        return view ('main.service.management', [
            'services' => $services,
        ]);
    }

    public function consulting()
    {
        // Data services
        $services = [
            [
                'image' => 'images/pj.jpg',
                'title' => 'Private Jet Charter',
                'desc' => 'At Alfa5 Aviation, we bring innovation to business travel through our private jet charter services...',
                'alt' => 'Private Jet Charter',
                'url' => '/service/private-jet-charter',
            ],
            [
                'image' => 'images/management.jpg',
                'title' => 'Private Jet Management Service',
                'desc' => 'Since its founding in 2022, Alfa5 Aviation has built a reputation as a leader in private jet management services...',
                'alt' => 'Private Jet Management Service',
                'url' => '/service/private-jet-management-service',
            ],
            [
                'image' => 'images/consulting.jpg',
                'title' => 'Aviation Consulting',
                'desc' => 'Aviation Consulting Services provide access to professional guidance in addressing the complex challenges...',
                'alt' => 'Aviation Consulting',
                'url' => '/service/aviation-consulting',
            ],
            [
                'image' => 'images/medevac.jpg',
                'title' => 'Medical Air Ambulance / Medevac',
                'desc' => 'We proud to offer a leading Medical Air Ambulance or Medevac service that is specifically designed to provide...',
                'alt' => 'Medical Air Ambulance / Medevac',
                'url' => '/service/medical-air-ambulance',
            ],
            [
                'image' => 'images/gsa.jpg',
                'title' => 'GSA Representative',
                'desc' => 'As a trusted General Sales Agent (GSA) for various international airlines looking to expand their reach in Indonesia.',
                'alt' => 'GSA Representative',
                'url' => '/service/gsa-representative',
            ],
            [
                'image' => 'images/operation.jpg',
                'title' => 'Operations',
                'desc' => 'Private Jet Charter for Business, especially through the Legacy 600, offers a travel experience tailored to meet the...',
                'alt' => 'Operations',
                'url' => '/service/operation',
            ],
            [
                'image' => 'images/engineering.jpg',
                'title' => 'Engineering',
                'desc' => 'Alfa5 Aviation’s success in delivering exceptional private jet charter services is deeply rooted in its commitment to...',
                'alt' => 'Engineering',
                'url' => '/service/engineering',
            ],
            [
                'image' => 'images/comfort.jpg',
                'title' => 'Comfort',
                'desc' => 'Comfort is at the heart of Alfa5 Aviation’s Private Jet Charter for Business, providing an experience that goes beyond...',
                'alt' => 'Comfort',
                'url' => '/service/comfort',
            ],
            [
                'image' => 'images/broker.jpg',
                'title' => 'Aircraft Brokerage',
                'desc' => 'Alfa5 Aviation’s Aircraft Brokerage services provide clients with a comprehensive and personalized approach to buying, selling, or leasing...',
                'alt' => 'Aircraft Brokerage',
                'url' => '/service/aircraft-brokerage',
            ],
        ];

        return view ('main.service.consulting', [
            'services' => $services,
        ]);
    }

    public function medevac()
    {
        // Data services
        $services = [
            [
                'image' => 'images/pj.jpg',
                'title' => 'Private Jet Charter',
                'desc' => 'At Alfa5 Aviation, we bring innovation to business travel through our private jet charter services...',
                'alt' => 'Private Jet Charter',
                'url' => '/service/private-jet-charter',
            ],
            [
                'image' => 'images/management.jpg',
                'title' => 'Private Jet Management Service',
                'desc' => 'Since its founding in 2022, Alfa5 Aviation has built a reputation as a leader in private jet management services...',
                'alt' => 'Private Jet Management Service',
                'url' => '/service/private-jet-management-service',
            ],
            [
                'image' => 'images/consulting.jpg',
                'title' => 'Aviation Consulting',
                'desc' => 'Aviation Consulting Services provide access to professional guidance in addressing the complex challenges...',
                'alt' => 'Aviation Consulting',
                'url' => '/service/aviation-consulting',
            ],
            [
                'image' => 'images/medevac.jpg',
                'title' => 'Medical Air Ambulance / Medevac',
                'desc' => 'We proud to offer a leading Medical Air Ambulance or Medevac service that is specifically designed to provide...',
                'alt' => 'Medical Air Ambulance / Medevac',
                'url' => '/service/medical-air-ambulance',
            ],
            [
                'image' => 'images/gsa.jpg',
                'title' => 'GSA Representative',
                'desc' => 'As a trusted General Sales Agent (GSA) for various international airlines looking to expand their reach in Indonesia.',
                'alt' => 'GSA Representative',
                'url' => '/service/gsa-representative',
            ],
            [
                'image' => 'images/operation.jpg',
                'title' => 'Operations',
                'desc' => 'Private Jet Charter for Business, especially through the Legacy 600, offers a travel experience tailored to meet the...',
                'alt' => 'Operations',
                'url' => '/service/operation',
            ],
            [
                'image' => 'images/engineering.jpg',
                'title' => 'Engineering',
                'desc' => 'Alfa5 Aviation’s success in delivering exceptional private jet charter services is deeply rooted in its commitment to...',
                'alt' => 'Engineering',
                'url' => '/service/engineering',
            ],
            [
                'image' => 'images/comfort.jpg',
                'title' => 'Comfort',
                'desc' => 'Comfort is at the heart of Alfa5 Aviation’s Private Jet Charter for Business, providing an experience that goes beyond...',
                'alt' => 'Comfort',
                'url' => '/service/comfort',
            ],
            [
                'image' => 'images/broker.jpg',
                'title' => 'Aircraft Brokerage',
                'desc' => 'Alfa5 Aviation’s Aircraft Brokerage services provide clients with a comprehensive and personalized approach to buying, selling, or leasing...',
                'alt' => 'Aircraft Brokerage',
                'url' => '/service/aircraft-brokerage',
            ],
        ];

        return view ('main.service.medevac', [
            'services' => $services,
        ]);
    }

    public function gsa()
    {
        // Data services
        $services = [
            [
                'image' => 'images/pj.jpg',
                'title' => 'Private Jet Charter',
                'desc' => 'At Alfa5 Aviation, we bring innovation to business travel through our private jet charter services...',
                'alt' => 'Private Jet Charter',
                'url' => '/service/private-jet-charter',
            ],
            [
                'image' => 'images/management.jpg',
                'title' => 'Private Jet Management Service',
                'desc' => 'Since its founding in 2022, Alfa5 Aviation has built a reputation as a leader in private jet management services...',
                'alt' => 'Private Jet Management Service',
                'url' => '/service/private-jet-management-service',
            ],
            [
                'image' => 'images/consulting.jpg',
                'title' => 'Aviation Consulting',
                'desc' => 'Aviation Consulting Services provide access to professional guidance in addressing the complex challenges...',
                'alt' => 'Aviation Consulting',
                'url' => '/service/aviation-consulting',
            ],
            [
                'image' => 'images/medevac.jpg',
                'title' => 'Medical Air Ambulance / Medevac',
                'desc' => 'We proud to offer a leading Medical Air Ambulance or Medevac service that is specifically designed to provide...',
                'alt' => 'Medical Air Ambulance / Medevac',
                'url' => '/service/medical-air-ambulance',
            ],
            [
                'image' => 'images/gsa.jpg',
                'title' => 'GSA Representative',
                'desc' => 'As a trusted General Sales Agent (GSA) for various international airlines looking to expand their reach in Indonesia.',
                'alt' => 'GSA Representative',
                'url' => '/service/gsa-representative',
            ],
            [
                'image' => 'images/operation.jpg',
                'title' => 'Operations',
                'desc' => 'Private Jet Charter for Business, especially through the Legacy 600, offers a travel experience tailored to meet the...',
                'alt' => 'Operations',
                'url' => '/service/operation',
            ],
            [
                'image' => 'images/engineering.jpg',
                'title' => 'Engineering',
                'desc' => 'Alfa5 Aviation’s success in delivering exceptional private jet charter services is deeply rooted in its commitment to...',
                'alt' => 'Engineering',
                'url' => '/service/engineering',
            ],
            [
                'image' => 'images/comfort.jpg',
                'title' => 'Comfort',
                'desc' => 'Comfort is at the heart of Alfa5 Aviation’s Private Jet Charter for Business, providing an experience that goes beyond...',
                'alt' => 'Comfort',
                'url' => '/service/comfort',
            ],
            [
                'image' => 'images/broker.jpg',
                'title' => 'Aircraft Brokerage',
                'desc' => 'Alfa5 Aviation’s Aircraft Brokerage services provide clients with a comprehensive and personalized approach to buying, selling, or leasing...',
                'alt' => 'Aircraft Brokerage',
                'url' => '/service/aircraft-brokerage',
            ],
        ];

        return view ('main.service.gsa', [
            'services' => $services,
        ]);
    }

    public function operation()
    {
        // Data services
        $services = [
            [
                'image' => 'images/pj.jpg',
                'title' => 'Private Jet Charter',
                'desc' => 'At Alfa5 Aviation, we bring innovation to business travel through our private jet charter services...',
                'alt' => 'Private Jet Charter',
                'url' => '/service/private-jet-charter',
            ],
            [
                'image' => 'images/management.jpg',
                'title' => 'Private Jet Management Service',
                'desc' => 'Since its founding in 2022, Alfa5 Aviation has built a reputation as a leader in private jet management services...',
                'alt' => 'Private Jet Management Service',
                'url' => '/service/private-jet-management-service',
            ],
            [
                'image' => 'images/consulting.jpg',
                'title' => 'Aviation Consulting',
                'desc' => 'Aviation Consulting Services provide access to professional guidance in addressing the complex challenges...',
                'alt' => 'Aviation Consulting',
                'url' => '/service/aviation-consulting',
            ],
            [
                'image' => 'images/medevac.jpg',
                'title' => 'Medical Air Ambulance / Medevac',
                'desc' => 'We proud to offer a leading Medical Air Ambulance or Medevac service that is specifically designed to provide...',
                'alt' => 'Medical Air Ambulance / Medevac',
                'url' => '/service/medical-air-ambulance',
            ],
            [
                'image' => 'images/gsa.jpg',
                'title' => 'GSA Representative',
                'desc' => 'As a trusted General Sales Agent (GSA) for various international airlines looking to expand their reach in Indonesia.',
                'alt' => 'GSA Representative',
                'url' => '/service/gsa-representative',
            ],
            [
                'image' => 'images/operation.jpg',
                'title' => 'Operations',
                'desc' => 'Private Jet Charter for Business, especially through the Legacy 600, offers a travel experience tailored to meet the...',
                'alt' => 'Operations',
                'url' => '/service/operation',
            ],
            [
                'image' => 'images/engineering.jpg',
                'title' => 'Engineering',
                'desc' => 'Alfa5 Aviation’s success in delivering exceptional private jet charter services is deeply rooted in its commitment to...',
                'alt' => 'Engineering',
                'url' => '/service/engineering',
            ],
            [
                'image' => 'images/comfort.jpg',
                'title' => 'Comfort',
                'desc' => 'Comfort is at the heart of Alfa5 Aviation’s Private Jet Charter for Business, providing an experience that goes beyond...',
                'alt' => 'Comfort',
                'url' => '/service/comfort',
            ],
            [
                'image' => 'images/broker.jpg',
                'title' => 'Aircraft Brokerage',
                'desc' => 'Alfa5 Aviation’s Aircraft Brokerage services provide clients with a comprehensive and personalized approach to buying, selling, or leasing...',
                'alt' => 'Aircraft Brokerage',
                'url' => '/service/aircraft-brokerage',
            ],
        ];

        return view ('main.service.operation', [
            'services' => $services,
        ]);
    }

    public function engineering()
    {
        // Data services
        $services = [
            [
                'image' => 'images/pj.jpg',
                'title' => 'Private Jet Charter',
                'desc' => 'At Alfa5 Aviation, we bring innovation to business travel through our private jet charter services...',
                'alt' => 'Private Jet Charter',
                'url' => '/service/private-jet-charter',
            ],
            [
                'image' => 'images/management.jpg',
                'title' => 'Private Jet Management Service',
                'desc' => 'Since its founding in 2022, Alfa5 Aviation has built a reputation as a leader in private jet management services...',
                'alt' => 'Private Jet Management Service',
                'url' => '/service/private-jet-management-service',
            ],
            [
                'image' => 'images/consulting.jpg',
                'title' => 'Aviation Consulting',
                'desc' => 'Aviation Consulting Services provide access to professional guidance in addressing the complex challenges...',
                'alt' => 'Aviation Consulting',
                'url' => '/service/aviation-consulting',
            ],
            [
                'image' => 'images/medevac.jpg',
                'title' => 'Medical Air Ambulance / Medevac',
                'desc' => 'We proud to offer a leading Medical Air Ambulance or Medevac service that is specifically designed to provide...',
                'alt' => 'Medical Air Ambulance / Medevac',
                'url' => '/service/medical-air-ambulance',
            ],
            [
                'image' => 'images/gsa.jpg',
                'title' => 'GSA Representative',
                'desc' => 'As a trusted General Sales Agent (GSA) for various international airlines looking to expand their reach in Indonesia.',
                'alt' => 'GSA Representative',
                'url' => '/service/gsa-representative',
            ],
            [
                'image' => 'images/operation.jpg',
                'title' => 'Operations',
                'desc' => 'Private Jet Charter for Business, especially through the Legacy 600, offers a travel experience tailored to meet the...',
                'alt' => 'Operations',
                'url' => '/service/operation',
            ],
            [
                'image' => 'images/engineering.jpg',
                'title' => 'Engineering',
                'desc' => 'Alfa5 Aviation’s success in delivering exceptional private jet charter services is deeply rooted in its commitment to...',
                'alt' => 'Engineering',
                'url' => '/service/engineering',
            ],
            [
                'image' => 'images/comfort.jpg',
                'title' => 'Comfort',
                'desc' => 'Comfort is at the heart of Alfa5 Aviation’s Private Jet Charter for Business, providing an experience that goes beyond...',
                'alt' => 'Comfort',
                'url' => '/service/comfort',
            ],
            [
                'image' => 'images/broker.jpg',
                'title' => 'Aircraft Brokerage',
                'desc' => 'Alfa5 Aviation’s Aircraft Brokerage services provide clients with a comprehensive and personalized approach to buying, selling, or leasing...',
                'alt' => 'Aircraft Brokerage',
                'url' => '/service/aircraft-brokerage',
            ],
        ];

        return view ('main.service.engineering', [
            'services' => $services,
        ]);
    }

    public function comfort()
    {
        // Data services
        $services = [
            [
                'image' => 'images/pj.jpg',
                'title' => 'Private Jet Charter',
                'desc' => 'At Alfa5 Aviation, we bring innovation to business travel through our private jet charter services...',
                'alt' => 'Private Jet Charter',
                'url' => '/service/private-jet-charter',
            ],
            [
                'image' => 'images/management.jpg',
                'title' => 'Private Jet Management Service',
                'desc' => 'Since its founding in 2022, Alfa5 Aviation has built a reputation as a leader in private jet management services...',
                'alt' => 'Private Jet Management Service',
                'url' => '/service/private-jet-management-service',
            ],
            [
                'image' => 'images/consulting.jpg',
                'title' => 'Aviation Consulting',
                'desc' => 'Aviation Consulting Services provide access to professional guidance in addressing the complex challenges...',
                'alt' => 'Aviation Consulting',
                'url' => '/service/aviation-consulting',
            ],
            [
                'image' => 'images/medevac.jpg',
                'title' => 'Medical Air Ambulance / Medevac',
                'desc' => 'We proud to offer a leading Medical Air Ambulance or Medevac service that is specifically designed to provide...',
                'alt' => 'Medical Air Ambulance / Medevac',
                'url' => '/service/medical-air-ambulance',
            ],
            [
                'image' => 'images/gsa.jpg',
                'title' => 'GSA Representative',
                'desc' => 'As a trusted General Sales Agent (GSA) for various international airlines looking to expand their reach in Indonesia.',
                'alt' => 'GSA Representative',
                'url' => '/service/gsa-representative',
            ],
            [
                'image' => 'images/operation.jpg',
                'title' => 'Operations',
                'desc' => 'Private Jet Charter for Business, especially through the Legacy 600, offers a travel experience tailored to meet the...',
                'alt' => 'Operations',
                'url' => '/service/operation',
            ],
            [
                'image' => 'images/engineering.jpg',
                'title' => 'Engineering',
                'desc' => 'Alfa5 Aviation’s success in delivering exceptional private jet charter services is deeply rooted in its commitment to...',
                'alt' => 'Engineering',
                'url' => '/service/engineering',
            ],
            [
                'image' => 'images/comfort.jpg',
                'title' => 'Comfort',
                'desc' => 'Comfort is at the heart of Alfa5 Aviation’s Private Jet Charter for Business, providing an experience that goes beyond...',
                'alt' => 'Comfort',
                'url' => '/service/comfort',
            ],
            [
                'image' => 'images/broker.jpg',
                'title' => 'Aircraft Brokerage',
                'desc' => 'Alfa5 Aviation’s Aircraft Brokerage services provide clients with a comprehensive and personalized approach to buying, selling, or leasing...',
                'alt' => 'Aircraft Brokerage',
                'url' => '/service/aircraft-brokerage',
            ],
        ];

        return view ('main.service.comfort', [
            'services' => $services,
        ]);
    }

    public function broker()
    {
        // Data services
        $services = [
            [
                'image' => 'images/pj.jpg',
                'title' => 'Private Jet Charter',
                'desc' => 'At Alfa5 Aviation, we bring innovation to business travel through our private jet charter services...',
                'alt' => 'Private Jet Charter',
                'url' => '/service/private-jet-charter',
            ],
            [
                'image' => 'images/management.jpg',
                'title' => 'Private Jet Management Service',
                'desc' => 'Since its founding in 2022, Alfa5 Aviation has built a reputation as a leader in private jet management services...',
                'alt' => 'Private Jet Management Service',
                'url' => '/service/private-jet-management-service',
            ],
            [
                'image' => 'images/consulting.jpg',
                'title' => 'Aviation Consulting',
                'desc' => 'Aviation Consulting Services provide access to professional guidance in addressing the complex challenges...',
                'alt' => 'Aviation Consulting',
                'url' => '/service/aviation-consulting',
            ],
            [
                'image' => 'images/medevac.jpg',
                'title' => 'Medical Air Ambulance / Medevac',
                'desc' => 'We proud to offer a leading Medical Air Ambulance or Medevac service that is specifically designed to provide...',
                'alt' => 'Medical Air Ambulance / Medevac',
                'url' => '/service/medical-air-ambulance',
            ],
            [
                'image' => 'images/gsa.jpg',
                'title' => 'GSA Representative',
                'desc' => 'As a trusted General Sales Agent (GSA) for various international airlines looking to expand their reach in Indonesia.',
                'alt' => 'GSA Representative',
                'url' => '/service/gsa-representative',
            ],
            [
                'image' => 'images/operation.jpg',
                'title' => 'Operations',
                'desc' => 'Private Jet Charter for Business, especially through the Legacy 600, offers a travel experience tailored to meet the...',
                'alt' => 'Operations',
                'url' => '/service/operation',
            ],
            [
                'image' => 'images/engineering.jpg',
                'title' => 'Engineering',
                'desc' => 'Alfa5 Aviation’s success in delivering exceptional private jet charter services is deeply rooted in its commitment to...',
                'alt' => 'Engineering',
                'url' => '/service/engineering',
            ],
            [
                'image' => 'images/comfort.jpg',
                'title' => 'Comfort',
                'desc' => 'Comfort is at the heart of Alfa5 Aviation’s Private Jet Charter for Business, providing an experience that goes beyond...',
                'alt' => 'Comfort',
                'url' => '/service/comfort',
            ],
            [
                'image' => 'images/broker.jpg',
                'title' => 'Aircraft Brokerage',
                'desc' => 'Alfa5 Aviation’s Aircraft Brokerage services provide clients with a comprehensive and personalized approach to buying, selling, or leasing...',
                'alt' => 'Aircraft Brokerage',
                'url' => '/service/aircraft-brokerage',
            ],
        ];

        return view ('main.service.broker', [
            'services' => $services,
        ]);
    }

    public function fleet()
    {
        return view ('main.fleet');
    }

    public function legacy()
    {
        // Data fleets
        $fleets = [
            [
                'image' => 'images/about.jpg',
                'title' => 'Embraer Legacy 600',
                'alt' => 'Embraer Legacy 600',
                'url' => '#',
            ],
        ];

        return view ('main.fleet.legacy', [
            'fleets' => $fleets,
        ]);
    }

    public function contact()
    {
        return view ('main.contact');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
