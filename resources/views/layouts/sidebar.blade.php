<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="index.html" class="sidebar-logo">
            <img src="{{ asset('assets/images/Logo Bapenda Light.png') }}" alt="site logo" class="light-logo">
            <img src="{{ asset('assets/images/Logo Bapenda Dark.png') }}" class="dark-logo">
            <img src="{{ asset('assets/images/Logo Kabupaten.png') }}" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li>
                <a href="/" class="active">
                    <iconify-icon icon="solar:home-2-broken" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:chart-2-linear" class="menu-icon"></iconify-icon>
                    <span>Laporan</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('laporan.pendapatan-daerah') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Pendapatan
                            Daerah</a>
                    </li>
                    <li>
                        <a href="{{ route('laporan.pajak-daerah') }}"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Pajak Daerah</a>
                    </li>
                    <li>
                        <a href="{{ route("laporan.retribusi-daerah") }}"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                            Retribusi Daerah</a>
                    </li>
                    <li>
                        <a href="{{ route('laporan.pbb') }}"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            PBB</a>
                    </li>
                    <li>
                        <a href="{{ route('laporan.bphtb') }}"><i class="ri-circle-fill circle-icon text-success-main w-auto"></i>
                            BPHTB</a>
                    </li>
                    <li>
                        <a href="{{ route('laporan.penerimaan-opd') }}"><i class="ri-circle-fill circle-icon text-purple w-auto"></i> Penerimaan
                            OPD</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('document.index_public') }}">
                    <iconify-icon icon="solar:document-add-broken" class="menu-icon"></iconify-icon>
                    <span>Dokumen</span>
                </a>
            </li>
            @hasrole(['admin', 'superadmin'])
                <li class="dropdown">
                    <a href="javascript:void(0)">
                        <iconify-icon icon="solar:settings-broken" class="menu-icon"></iconify-icon>
                        <span>Pengaturan</span>
                    </a>
                    <ul class="sidebar-submenu">
                        <li>
                            <a href="{{ route('logs.index') }}">
                                <i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                                App Log
                            </a>
                        </li>
                        <li>
                            <a href="{{ route("document.index") }}">
                                <i class="ri-circle-fill circle-icon text-info-main w-auto"></i>
                                Input Dokumen
                            </a>
                        </li>
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>
            @endhasrole
        </ul>
    </div>
</aside>
