<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\About;
use App\Models\Contact;
use App\Models\Fleet;
use App\Models\Partner;
use App\Models\Service;
use App\Models\HeroSection;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::first();
        $blogs = Blog::where('is_active', true)
            ->orderBy('id', 'desc')
            ->paginate(10);
        $fleets = Fleet::where('is_active', true)
            ->orderBy('id', 'desc')
            ->paginate(10);
        $heroSection = HeroSection::first(); // Ambil satu entri, misalnya yang pertama
        $partners = Partner::where('is_active', true)
            ->orderBy('id', 'desc')
            ->paginate(10);
        $services = Service::where('is_active', true)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('main.index', compact('about', 'blogs', 'fleets', 'heroSection', 'partners', 'services'));
    }

    public function about()
    {
        $heroSection = HeroSection::first(); // Ambil satu entri, misalnya yang pertama
        $about = About::first();
        $blogs = Blog::where('is_active', true)
            ->orderBy('id', 'desc')
            ->paginate(10);
        $partners = Partner::where('is_active', true)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('main.about', compact('heroSection', 'about', 'blogs', 'partners'));
    }

    public function service()
    {
        $heroSection = HeroSection::first(); // Ambil satu entri, misalnya yang pertama
        $blogs = Blog::where('is_active', true)
            ->orderBy('id', 'desc')
            ->paginate(10);
        $services = Service::where('is_active', true)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('main.service', compact('heroSection', 'blogs', 'services'));
    }

    public function detailService($slug)
    {
        $services = Service::where('is_active', true)
            ->orderBy('id', 'desc')
            ->paginate(10);
        $blogs = Blog::where('is_active', true)
            ->orderBy('id', 'desc')
            ->paginate(10);
        $service = Service::where('slug', $slug)->firstOrFail();

        return view('main.service-detail', compact('service', 'services', 'blogs'));
    }

    public function fleet()
    {
        $heroSection = HeroSection::first(); // Ambil satu entri, misalnya yang pertama
        $fleets = Fleet::where('is_active', true)
            ->orderBy('id', 'desc')
            ->paginate(10);
        $blogs = Blog::where('is_active', true)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view ('main.fleet', compact('heroSection', 'fleets', 'blogs'));
    }

    public function detailFleet($slug)
    {
        $fleets = Fleet::where('is_active', true)
            ->orderBy('id', 'desc')
            ->paginate(10);
        $fleet = Fleet::where('slug', $slug)->firstOrFail();

        return view ('main.fleet-detail', compact('fleets', 'fleet'));
    }

    public function blog($slug)
    {
        $heroSection = HeroSection::first(); // Ambil satu entri, misalnya yang pertama
        $blogs = Blog::where('is_active', true)
            ->orderBy('id', 'desc')
            ->paginate(10);
        $blog = Blog::where('slug', $slug)->firstOrFail();

        return view('main.blog', compact('heroSection', 'blog', 'blogs'));
    }

    public function contact()
    {
        $heroSection = HeroSection::first(); // Ambil satu entri, misalnya yang pertama
        $blogs = Blog::where('is_active', true)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view ('main.contact', compact('heroSection', 'blogs'));
    }

    public function storeContact(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Create a new contact record in the database
        Contact::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'is_read' => false, // Default value for is_read
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
