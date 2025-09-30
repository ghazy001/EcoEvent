<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ url('/') }}" class="text-nowrap logo-img">
                <img src="{{ asset('assets/images/logos/logo.svg') }}" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-6"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('/') }}" aria-expanded="false">
                        <i class="ti ti-atom"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="#" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex"><i class="ti ti-aperture"></i></span>
                            <span class="hide-menu">Analytical</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="#" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex"><i class="ti ti-shopping-cart"></i></span>
                            <span class="hide-menu">eCommerce</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex"><i class="ti ti-layout-grid"></i></span>
                            <span class="hide-menu">Front Pages</span>
                        </div>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        @foreach(['Homepage', 'About Us', 'Blog', 'Blog Details', 'Contact Us', 'Portfolio', 'Pricing'] as $page)
                            <li class="sidebar-item">
                                <a class="sidebar-link justify-content-between" href="#">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">{{ $page }}</span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li><span class="sidebar-divider lg"></span></li>
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">Apps</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex"><i class="ti ti-basket"></i></span>
                            <span class="hide-menu">Ecommerce</span>
                        </div>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        @foreach(['Shop', 'Details', 'List', 'Checkout', 'Add Product', 'Edit Product'] as $item)
                            <li class="sidebar-item">
                                <a class="sidebar-link justify-content-between" href="#">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">{{ $item }}</span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
