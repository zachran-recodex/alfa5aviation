<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\About;
use App\Models\Fleet;
use App\Models\Partner;
use App\Models\Service;
use App\Models\HeroSection;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::first();
        $blogs = Blog::all();
        $fleets = Fleet::all();
        $hero_section = HeroSection::first(); // Ambil satu entri, misalnya yang pertama
        $partners = Partner::all();
        $services = Service::all();

        return view('index', compact('about', 'blogs', 'fleets', 'hero_section', 'partners', 'services'));
    }

    public function about()
    {
        $about = About::first();
        $blogs = Blog::all();
        $partners = Partner::all();

        return view('main.about', compact('about', 'blogs', 'partners'));
    }

    public function service()
    {
        $blogs = Blog::all();
        $services = Service::all();

        return view('main.service', compact('blogs', 'services'));
    }

    public function detailService($slug)
    {
        $services = Service::all();
        $blogs = Blog::all();
        $service = Service::where('slug', $slug)->firstOrFail();

        return view('main.service-detail', compact('service', 'services', 'blogs'));
    }

    public function fleet()
    {
        $fleets = Fleet::all();
        $blogs = Blog::all();

        return view ('main.fleet', compact('fleets', 'blogs'));
    }

    public function detailFleet($slug)
    {
        $fleets = Fleet::all();
        $fleet = Fleet::where('slug', $slug)->firstOrFail();

        return view ('main.fleet-detail', compact('fleets', 'fleet'));
    }

    public function blog($slug)
    {
        $blogs = Blog::all();
        $blog = Blog::where('slug', $slug)->firstOrFail();

        return view('main.blog', compact('blog', 'blogs'));
    }

    public function contact()
    {
        return view ('main.contact');
    }
}
