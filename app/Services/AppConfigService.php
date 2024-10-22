<?php

namespace App\Services;

use App\Models\Fleet;
use App\Models\Service;
use App\Models\Setting;
use App\Models\PageSetup;

class AppConfigService
{
    protected $setting;
    protected $navFleets;
    protected $navServices;
    protected $pageSetups;

    public function __construct()
    {
        $this->setting = Setting::first(); // Ambil setting pertama
        $this->navFleets = Fleet::orderBy('id')->take(5)->get(); // Ambil 5 fleet pertama berdasarkan id
        $this->navServices = Service::orderBy('id')->take(10)->get(); // Ambil 5 service pertama berdasarkan id
        $this->pageSetups = PageSetup::all()->keyBy('slug'); // Ambil semua page setups dan index berdasarkan slug
    }

    public function getSetting()
    {
        return $this->setting;
    }

    public function getFleets()
    {
        return $this->navFleets;
    }

    public function getServices()
    {
        return $this->navServices;
    }

    public function getPageSetups()
    {
        return $this->pageSetups;
    }
}
