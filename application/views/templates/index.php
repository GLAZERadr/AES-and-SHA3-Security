<div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- Title -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-500 large">Beranda</span>
                    </a>
                </li>
            </nav>
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?php echo base_url('files/img/beranda-img.png'); ?>" alt="beranda-image"
                                    class="card-img img-fluid">
                            </div>
                            <div class="col-md-8">
                                <h1 class="page-heading text-gray-800 mb-5 mt-5" style="font-size: 90px; font-weight: bold">Sistem Pengamanan Data Lokasi</h1>

                                <p class="card-text mb-4 mr-4 text-gray-800" style="font-size: 20px">Sistem pengamanan ini menggunakan algoritma
                                    Advanced Encryption Standard-128 untuk mengenkripsi data lokasi asli dan Secure
                                    Hash Algorithm-3 (Keccak) untuk melakukan hashing data lokasi terenkripsi AES. Data
                                    Lokasi yang digunakan berupa latitude dan longitude yang diambil dari sistem
                                    Location Based Services
                                </p>
                                <div class="container-fluid">
                                    <div class="row justify-content-center">
                                        <div class="text-center">
                                            <button class="btn btn-lg mb-3" style="background-color: #282b75; border-color: #282b75; color: #ffffff;"
                                                onmouseover="this.style.backgroundColor='#1d161e'; this.style.color='#ffffff';"
                                                onmouseout="this.style.backgroundColor='#282b75'; this.style.color='#ffffff';"
                                                onclick="window.location.href='<?php echo base_url('Dataloc/dataloc'); ?>'">
                                                <i class="bx bx-plus"></i> Mulai!
                                            </button>
                                        </div>
                                        <div class="col-md-1 text-center">
                                            <button class="btn btn-lg mb-3" style="background-color: #ffff; border-color: #282b75; color: #282b75;"
                                                onmouseover="this.style.backgroundColor='#1d161e'; this.style.color='#ffffff';"
                                                onmouseout="this.style.backgroundColor='#ffff'; this.style.color='#282b75';"
                                                onclick="window.location.href='<?php echo base_url('Dataloc/dataloc'); ?>'">
                                                <i class="bx bx-plus"></i> Hasil!
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->