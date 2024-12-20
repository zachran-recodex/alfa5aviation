<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $widgets = [
            [
                'route' => route('admin.abouts.index'),
                'icon' => 'mdi:about',
                'title' => 'Abouts',
            ],
            [
                'route' => route('admin.blogs.index'),
                'icon' => 'mdi:blog-outline',
                'title' => 'Blogs',
            ],
            [
                'route' => route('admin.fleets.index'),
                'icon' => 'bxs:plane',
                'title' => 'Fleets',
            ],
            [
                'route' => route('admin.hero-sections.index'),
                'icon' => 'tabler:carousel-horizontal',
                'title' => 'Hero Sections',
            ],
            [
                'route' => route('admin.partners.index'),
                'icon' => 'mdi:partnership-outline',
                'title' => 'Partners',
            ],
            [
                'route' => route('admin.services.index'),
                'icon' => 'material-symbols:home-repair-service-outline',
                'title' => 'Services',
            ],
            [
                'route' => route('admin.page-setups.index'),
                'icon' => 'hugeicons:seo',
                'title' => 'Page Setups',
            ],
            [
                'route' => route('admin.contacts.index'),
                'icon' => 'material-symbols:contact-mail-outline',
                'title' => 'Contacts',
            ],
            [
                'route' => route('admin.settings.index'),
                'icon' => 'icon-park-outline:setting-two',
                'title' => 'Settings',
            ],
        ];

        return view('admin.dashboard', compact('widgets'));
    }
}
