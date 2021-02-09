<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= base_url('admin') ?>" class="d-block">Administrator</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url('admin/beranda') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shuttle-van"></i>
                        <p>
                            Travel
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/rental/sopir') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sopir</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/rental/kendaraan') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kendaraan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/travel/rental') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rental</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/travel/paket') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Paket</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-envelope-open-text"></i>
                        <p>
                            Pesanan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/pesanan/rental') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rental</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/pesanan/paket') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Paket</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Jadwal
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/jadwal/list_jadwal') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jadwal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../layout/boxed.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Proses</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../layout/fixed-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Selesai</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('logout') ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>