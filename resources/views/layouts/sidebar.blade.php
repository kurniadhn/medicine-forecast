<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/dashboard">Medicine Forecast</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/dashboard">MF</a>
        </div>
        @if (Auth()->user()->is_admin === 1)
            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a class="nav-link" href="/dashboard"><i
                            class="fas fa-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="menu-header">User Management</li>
                {{-- <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i> <span>Users</span></a>
                    <ul class="dropdown-menu">
                        <li class=""><a href="/users">All Users</a></li>
                        <li class=""><a class="beep beep-sidebar" href="/pending">Pending Users</a></li>
                    </ul>
                </li> --}}
                <li class="{{ Request::is('users*') ? 'active' : '' }}"><a class="nav-link" href="/users"><i
                            class="fas fa-user"></i> <span>Users</span></a>
                <li class="{{ Request::is('pending') ? 'active' : '' }}"><a class="nav-link" href="/pending"><i
                            class="fas fa-spinner"></i>
                        <span>Pending
                            Users</span></a>
                <li class="menu-header">Activites</li>
                <li class="{{ Request::is('activities') ? 'active' : '' }}"><a class="nav-link" href="/activities"><i
                            class="fas fa-male"></i> <span>Recent Activities</span></a>
                </li>
                <li class="menu-header">Changelog</li>
                <li class="{{ Request::is('changelog') ? 'active' : '' }}"><a class="nav-link" href="/changelog"><i
                            class="fas fa-cogs"></i> <span>Changelog</span></a>
                </li>
            </ul>
        @else
            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a class="nav-link" href="/dashboard"><i
                            class="fas fa-home"></i>
                        <span>Dashboard</span></a>
                </li>
                <li class="menu-header">Medicine</li>
                <li class="nav-item dropdown {{ Request::is('medicine*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i>
                        <span>Obat</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('medicine/create') ? 'active' : '' }}"><a
                                href="/medicine/create">Tambah
                                Obat</a></li>
                        <li class="{{ Request::is('medicine') ? 'active' : '' }}"><a href="/medicine">Daftar Obat</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ Request::is('history') ? 'active' : '' }}"><a class="nav-link" href="/history"><i
                            class="fas fa-shopping-cart"></i> <span>Riwayat
                            Penjualan</span></a>
                <li class="menu-header">Forecast</li>
                <li class="{{ Request::is('forecast') ? 'active' : '' }}"><a class="nav-link" href="/forecast"><i
                            class="fas fa-signal"></i>
                        <span>Peramalan</span></a>
                </li>
            </ul>
        @endif
    </aside>
</div>
