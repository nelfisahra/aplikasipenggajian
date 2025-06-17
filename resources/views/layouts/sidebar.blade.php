<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">AdminLTE</span>
    </a>

    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ auth()->user()->role == 'admin' ? route('admin.dashboard') : route('petugas.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>Manajemen Admin</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pegawai.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>peggawai</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('jabatan.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>jabatan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('penggajian.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>penggajian01</p>
                    </a>
                </li>
            </ul>

        </nav>
    </div>
</aside>