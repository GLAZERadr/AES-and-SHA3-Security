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
                            <button type="submit" class="btn btn-primary w-100" id="hitung-koordinat">Hitung</button><br><br>
                        </div>
                    </form>
                </div>
            </div>


            <h3 class="h1 mb-4 text-gray-800 text-center">Hasil Pengujian Avalanche Effect</h3><br>
            <table class="table table-border">
                <thead>
                    <tr>
                        <td>No.</td>
                        <td>Input Awal</td>
                        <td>Ciphertext Awal</td>
                        <td>Input yang Diubah</td>
                        <td>Ciphertext yang Diubah</td>
                        <td>Perbedaan Ciphertext (bit)</td>
                        <td>Persentase Perbedaan (%)</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_avaeff as $hasil) : ?>
                        <tr>
                            <td><?php echo $hasil['id_avalanche']; ?>.</td>
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
                        <td>Rata-rata</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo isset($rata_rata['rata_perbedaan_cipher']) ? round($rata_rata['rata_perbedaan_cipher'], 2) : ''; ?> bit</td>
                        <td><?php echo isset($rata_rata['rata_perbedaan_persentase']) ? round($rata_rata['rata_perbedaan_persentase'], 2) : ''; ?>%</td>
                    </tr>
                </thead>
            </table>
        </div>

    </div>