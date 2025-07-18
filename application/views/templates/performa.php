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

            <!-- Title -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-500 large">Pengujian</span>
                </a>
            </li>

        </nav>
        <!-- End of Topbar -->

        <div class="container-fluid">


            <div class="col-lg-7 mx-auto justify-content-center" data-aos="zoom-in">
                <div class="login-container">
                    <h3 class="h1 mb-4 text-gray-800 text-center">Pengujian Performa Sistem</h3><br>
                    <form class="login-form" action="<?php echo base_url('Pengujian/performa'); ?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="banyak-data" id="banyak-data" class="form-control form-control-user" required placeholder="Masukkan Banyak Data Dalam Database.." value="<?= set_value('banyak-data'); ?>"></input>
                        </div>
                        <div class="form-group">
                            <input type="text" name="waktu-no-algo" id="waktu-no-algo" class="form-control form-control-user" required placeholder="Masukkan Waktu Sistem tanpa Algoritma (s).." value="<?= set_value('waktu-no-algo'); ?>"></input>
                        </div>
                        <div class="form-group">
                            <input type="text" name="waktu-with-algo" id="waktu-with-algo" class="form-control form-control-user" required placeholder="Masukkan Waktu Sistem dengan Algoritma (s).." value="<?= set_value('waktu-with-algo'); ?>"></input>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit"  class="btn w-100 " style="background-color: #282b75; border-color: #282b75; color: #ffff;" onmouseover="this.style.backgroundColor='#1d161e'; this.style.color='#ffffff';" onmouseout="this.style.backgroundColor='#282b75'; this.style.color='#ffff';" id="hitung-performa">Hitung</button><br><br><br><br>
                        </div>
                    </form>
                </div>
            </div>

            <h3 class="h1 mb-4 text-gray-800 text-center">Hasil Pengujian Performa Sistem</h3><br>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text">Data Hasil Pengujian</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTablePerformance" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Banyak Data</th>
                                    <th>Tanpa Algoritma (s)</th>
                                    <th>Dengan Algoritma (s)</th>
                                    <th>Peningkatan Waktu (s)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no=1;
                                foreach ($data_lokasi as $hasil) : ?>
                                    <tr>
                                        <td><?php echo $no++; ?>.</td>
                                        <td><?php echo $hasil['banyak_data']; ?></td>
                                        <td><?php echo $hasil['waktu_tanpa_algo']; ?> s</td>
                                        <td><?php echo $hasil['waktu_dengan_algo']; ?> s</td>
                                        <td><?php echo $hasil['peningkatan']; ?> s</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <?php $rata_rata = $this->M_dataloc->hitungRataRataPerforma(); ?>
                            <thead>
                                <tr>
                                    <th>Rata-rata</th>
                                    <th></th>
                                    <th><?php echo isset($rata_rata['rata_performa_waktu_tanpa_algo']) ? round($rata_rata['rata_performa_waktu_tanpa_algo'], 2) : ''; ?> s</th>
                                    <th><?php echo isset($rata_rata['rata_performa_waktu_dengan_algo']) ? round($rata_rata['rata_performa_waktu_dengan_algo'], 2) : ''; ?> s</th>
                                    <th><?php echo isset($rata_rata['rata_peningkatan_performaa']) ? round($rata_rata['rata_peningkatan_performaa'], 2) : ''; ?>s</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Main Content -->