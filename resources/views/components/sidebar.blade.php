<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/" class="brand-link text-center">
        <span class="brand-text font-weight-bold">Lara News</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Menu</li>
                <li class="nav-item">
                    <a href="/dashboard"
                        class="nav-link {{ (Request::is('/*') || Request::is('dashboard*'))  ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-house"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/news" class="nav-link {{ Request::is('news*') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-pen-to-square"></i>
                        <p>
                            News
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/profile"
                        class="nav-link {{ Request::is('profile') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
