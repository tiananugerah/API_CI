<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-university"></i>
                </div>
                <div class="sidebar-brand-text mx-1">orangpinter</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-university"></i>
                    <span>Akademik</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sub Menu Akademik:</h6>
                        <a class="collapse-item" href="<?php echo base_url('admin/sekolah_menengah_pertama/data_siswa') ?>">Siswa/Siswi</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/sekolah_menengah_pertama/data_pengajar') ?>">Pengajar</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/sekolah_menengah_pertama/mata_pelajaran') ?>">Mata Pelajaran</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/sekolah_menengah_pertama/tahun_akademik') ?>">Tahun Akademik</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/sekolah_menengah_pertama/jadwal_belajar') ?>"> Jadwal Belajar</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/sekolah_menengah_pertama/input_nilai') ?>">Input Nilai</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/sekolah_menengah_pertama/cetak_nilai') ?>">Cetak Nilai</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/sekolah_menengah_pertama/cetak_rapot') ?>">Cetak Rapot</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/data_absensi') ?>">
                    <i class="fas fa-users"></i>
                    <span>Data Absensi Pengajar</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/data_absensi/absen_mahasiswa') ?>">
                    <i class="fas fa-user-graduate"></i>
                    <span>Data Absensi Siswa</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/minat_bakat/pertanyaan') ?>">
                    <i class="fas fa-question"></i>
                    <span>Pertanyaan Minat dan Bakat</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/minat_bakat') ?>">
                    <i class="fas fa-book-open"></i>
                    <span>Minat dan Bakat</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/sekolah_menengah_pertama/spp') ?>">
                    <i class="fas fa-dollar-sign"></i>
                    <span>Pembayaran SPP</span></a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Pengaturan</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sub Menu Pengaturan:</h6>
                        <a class="collapse-item" href="utilities-color.html">User</a>
                        <a class="collapse-item" href="utilities-border.html">Menu</a>
                        <a class="collapse-item" href="<?php echo base_url('admin/kelas') ?>">Kelas</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-danger" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                            </a>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>