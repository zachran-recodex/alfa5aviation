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
                'alt' => 'Private Jet Charter',
                'url' => '#',
            ],
            [
                'image' => 'images/management.jpg',
                'title' => 'Private Jet Management Service',
                'alt' => 'Private Jet Management Service',
                'url' => '#',
            ],
            [
                'image' => 'images/consulting.jpg',
                'title' => 'Aviation Consulting',
                'alt' => 'Aviation Consulting',
                'url' => '#',
            ],
            [
                'image' => 'images/medevac.jpg',
                'title' => 'Medical Air Ambulance / Medevac',
                'alt' => 'Medical Air Ambulance / Medevac',
                'url' => '#',
            ],
            [
                'image' => 'images/gsa.jpg',
                'title' => 'GSA Representative',
                'alt' => 'GSA Representative',
                'url' => '#',
            ],
            [
                'image' => 'images/operation.jpg',
                'title' => 'Operations',
                'alt' => 'Operations',
                'url' => '#',
            ],
            [
                'image' => 'images/engineering.jpg',
                'title' => 'Engineering',
                'alt' => 'Engineering',
                'url' => '#',
            ],
            [
                'image' => 'images/comfort.jpg',
                'title' => 'Comfort',
                'alt' => 'Comfort',
                'url' => '#',
            ],
            [
                'image' => 'images/broker.jpg',
                'title' => 'Aircraft Brokerage',
                'alt' => 'Aircraft Brokerage',
                'url' => '#',
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
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nulla',
                'alt' => 'Private Jet Charter',
                'url' => '#',
            ],
            [
                'image' => 'images/management.jpg',
                'title' => 'Private Jet Management Service',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nulla',
                'alt' => 'Private Jet Management Service',
                'url' => '#',
            ],
            [
                'image' => 'images/consulting.jpg',
                'title' => 'Aviation Consulting',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nulla',
                'alt' => 'Aviation Consulting',
                'url' => '#',
            ],
            [
                'image' => 'images/medevac.jpg',
                'title' => 'Medical Air Ambulance / Medevac',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nulla',
                'alt' => 'Medical Air Ambulance / Medevac',
                'url' => '#',
            ],
            [
                'image' => 'images/gsa.jpg',
                'title' => 'GSA Representative',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nulla',
                'alt' => 'GSA Representative',
                'url' => '#',
            ],
            [
                'image' => 'images/operation.jpg',
                'title' => 'Operations',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nulla',
                'alt' => 'Operations',
                'url' => '#',
            ],
            [
                'image' => 'images/engineering.jpg',
                'title' => 'Engineering',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nulla',
                'alt' => 'Engineering',
                'url' => '#',
            ],
            [
                'image' => 'images/comfort.jpg',
                'title' => 'Comfort',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nulla',
                'alt' => 'Comfort',
                'url' => '#',
            ],
            [
                'image' => 'images/broker.jpg',
                'title' => 'Aircraft Brokerage',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet nulla',
                'alt' => 'Aircraft Brokerage',
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

        return view ('main.service', [
            'services' => $services,
            'blogs' => $blogs,
        ]);
    }

    public function fleet()
    {
        return view ('main.fleet');
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
