<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="{{ route('home') }}" class="sidebar-logo">
            <img src="{{ asset('/images/logo-sagala-second.png') }}" alt="site logo" class="light-logo">
            <img src="{{ asset('/images/logo-sagala.png') }}" alt="site logo" class="dark-logo">
            <img src="{{ asset('/dashboard/images/logo-icon.png') }}" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard.index') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-menu-group-title">Content Management</li>
            <li>
                <a href="{{ route('admin.abouts.index') }}">
                    <iconify-icon icon="mdi:about" class="menu-icon"></iconify-icon>
                    <span>Abouts</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.blogs.index') }}">
                    <iconify-icon icon="mdi:blog-outline" class="menu-icon"></iconify-icon>
                    <span>Blogs</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.fleets.index') }}">
                    <iconify-icon icon="bxs:plane" class="menu-icon"></iconify-icon>
                    <span>Fleets</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.hero-sections.index') }}">
                    <iconify-icon icon="tabler:carousel-horizontal" class="menu-icon"></iconify-icon>
                    <span>Hero Sections</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.partners.index') }}">
                    <iconify-icon icon="mdi:partnership-outline" class="menu-icon"></iconify-icon>
                    <span>Partners</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.services.index') }}">
                    <iconify-icon icon="material-symbols:home-repair-service-outline" class="menu-icon"></iconify-icon>
                    <span>Services</span>
                </a>
            </li>
            <li class="sidebar-menu-group-title">Other</li>
            <li>
                <a href="{{ route('admin.page-setups.index') }}">
                    <iconify-icon icon="hugeicons:seo" class="menu-icon"></iconify-icon>
                    <span>Page Setups</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.contacts.index') }}">
                    <iconify-icon icon="material-symbols:contact-mail-outline" class="menu-icon"></iconify-icon>
                    <span>Contacts</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.settings.index') }}">
                    <iconify-icon icon="icon-park-outline:setting-two" class="menu-icon"></iconify-icon>
                    <span>Settings</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
