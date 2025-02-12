<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <iconify-icon icon="material-symbols:dashboard" class="icon"></iconify-icon>
                    <span class="flex-1 ms-3 whitespace-nowrap">Dashboard</span>
                </a>
            </li>
        </ul>
        <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200">
            <li>Content Management</li>
            <li>
                <a href="{{ route('dashboard.about.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <iconify-icon icon="mdi:about" class="icon"></iconify-icon>
                    <span class="flex-1 ms-3 whitespace-nowrap">About</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.hero-section.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <iconify-icon icon="material-symbols:art-track" class="icon"></iconify-icon>
                    <span class="flex-1 ms-3 whitespace-nowrap">Hero Section</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.service.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <iconify-icon icon="material-symbols:home-repair-service" class="icon"></iconify-icon>
                    <span class="flex-1 ms-3 whitespace-nowrap">Service</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.fleet.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <iconify-icon icon="ri:plane-fill" class="icon"></iconify-icon>
                    <span class="flex-1 ms-3 whitespace-nowrap">Fleet</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.partner.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <iconify-icon icon="material-symbols:partner-exchange-outline-rounded" class="icon"></iconify-icon>
                    <span class="flex-1 ms-3 whitespace-nowrap">Partner</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.blog.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <iconify-icon icon="material-symbols:breaking-news" class="icon"></iconify-icon>
                    <span class="flex-1 ms-3 whitespace-nowrap">Blog</span>
                </a>
            </li>
        </ul>
        <ul class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200">
            <li>Other</li>
            <li>
                <a href="{{ route('dashboard.contact.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <iconify-icon icon="material-symbols:contact-mail-rounded" class="icon"></iconify-icon>
                    <span class="flex-1 ms-3 whitespace-nowrap">Contact</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.seo.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <iconify-icon icon="ri:seo-fill" class="icon"></iconify-icon>
                    <span class="flex-1 ms-3 whitespace-nowrap">SEO</span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard.setting.index') }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <iconify-icon icon="material-symbols:settings" class="icon"></iconify-icon>
                    <span class="flex-1 ms-3 whitespace-nowrap">Setting</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
