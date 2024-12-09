<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Services\AppConfigService;

class SettingComposer
{
    protected $appConfigService;

    public function __construct(AppConfigService $appConfigService)
    {
        $this->appConfigService = $appConfigService;
    }

    public function compose(View $view)
    {
        $view->with([
            'setting' => $this->appConfigService->getSetting(),
            'navFleets' => $this->appConfigService->getFleets(),
            'navServices' => $this->appConfigService->getServices(),
            'pageSetups' => $this->appConfigService->getPageSetups(),
        ]);
    }
}
