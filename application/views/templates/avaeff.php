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
                    <h3 class="h1 mb-4 text-gray-800 text-center">Pengujian Avalanche Effect</h3><br>
                    <form class="login-form" action="<?php echo base_url('Pengujian/avaeff'); ?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="koordinat" id="koordinat" class="form-control form-control-user" required placeholder="Masukkan Koordinat (lat/long) Sebelum Diubah.." value="<?= set_value('koordinat'); ?>"></input>
                        </div>
                        <div class="form-group">
                            <input type="text" name="koordinat-modif" id="koordinat-modif" class="form-control form-control-user" required placeholder="Masukkan Koordinat (lat/long) Setelah Diubah.." value="<?= set_value('koordinat-modif'); ?>"></input>
                        </div>
                        <div class="form-group">
                            <input type="text" name="key-enkripsi" id="key-enkripsi" class="form-control form-control-user" required placeholder="Masukkan Secret Key.." value="<?= set_value('key-enkripsi'); ?>"></input>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn w-100" style="background-color: #282b75; border-color: #282b75; color: #ffff;" onmouseover="this.style.backgroundColor='#1d161e'; this.style.color='#ffffff';" onmouseout="this.style.backgroundColor='#282b75'; this.style.color='#ffff';" id="hitung-koordinat">Hitung</button><br><br>
                        </div>
                    </form>
                </div>
            </div>


            <h3 class="h1 mb-4 text-gray-800 text-center">Hasil Pengujian Avalanche Effect</h3><br>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text">Data Hasil Pengujian</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTableAvalanche" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Input Awal</th>
                                    <th>Ciphertext Awal</th>
                                    <th>Input yang Diubah</th>
                                    <th>Ciphertext yang Diubah</th>
                                    <th>Perbedaan Ciphertext (bit)</th>
                                    <th>Persentase Perbedaan (%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no=1;
                                foreach ($data_avaeff as $hasil) : ?>
                                    <tr>
                                        <td><?php echo $no++; ?>.</td>
                                        <td><?php echo $hasil['input_koordinat']; ?></td>
                                        <td><?php echo $hasil['ciphertext_input']; ?></td>
                                        <td><?php echo $hasil['input_modifikasi']; ?></td>
                                        <td><?php echo $hasil['ciphertext_input_modif']; ?></td>
                                        <td><?php echo $hasil['perbedaan_cipher']; ?> bit</td>
                                        <td><?php echo $hasil['perbedaan_persentase']; ?>%</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <?php $rata_rata = $this->M_dataloc->hitungRataRata(); ?>
                            <thead>
                                <tr>
                                    <th>Rata-rata</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th><?php echo isset($rata_rata['rata_perbedaan_cipher']) ? round($rata_rata['rata_perbedaan_cipher'], 2) : ''; ?> bit</th>
                                    <th><?php echo isset($rata_rata['rata_perbedaan_persentase']) ? round($rata_rata['rata_perbedaan_persentase'], 2) : ''; ?>%</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Main Content -->