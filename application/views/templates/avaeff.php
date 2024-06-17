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
                            <input type="text" name="lat" id="lat" class="form-control form-control-user" required placeholder="Masukkan Latitude Terenkripsi Sebelum Data Diubah.." value="<?= set_value('lat'); ?>"></input>
                        </div>
                        <div class="form-group">
                            <input type="text" name="long" id="long" class="form-control form-control-user" required placeholder="Masukkan Longitude Terenkripsi Sebelum Data Diubah.." value="<?= set_value('long'); ?>"></input>
                        </div>
                        <button type="submit">Hitung</button><br><br>
                    </form>
                    <form class="login-form" action="<?php echo base_url('Pengujian/avaeff'); ?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="lat" id="lat" class="form-control form-control-user" required placeholder="Masukkan Latitude Terenkripsi Setelah Data Diubah.." value="<?= set_value('lat'); ?>"></input>
                        </div>
                        <div class="form-group">
                            <input type="text" name="long" id="long" class="form-control form-control-user" required placeholder="Masukkan Longitude Terenkripsi Setelah Data Diubah.." value="<?= set_value('long'); ?>"></input>
                        </div>
                        <button type="submit">Hitung</button><br><br><br><br>
                    </form>
                </div>
            </div>


            <h3 class="h1 mb-4 text-gray-800 text-center">Hasil Pengujian Avalanche Effect</h3><br>
            <table class="table table-border">
                <thead>
                    <tr>
                        <td></td>
                        <td>Data Terenkripsi Sebelum Data Diubah</td>
                        <td>Data Terenkripsi Setelah Data Diubah</td>
                        <td>Rata-rata Perubahan Bit (%)</td>
                    </tr>
                    <tr>
                        <td>Latitude</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Longitude</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <!-- <tbody>
                    <?php foreach ($data_lokasi as $hasil) : ?>
                        <tr>
                            <td><?php echo $hasil['id']; ?></td>
                            <td><?php echo $hasil['lat']; ?></td>
                            <td><?php echo $hasil['long']; ?></td>
                            <td><?php echo $hasil['lat_en']; ?></td>
                            <td><?php echo $hasil['long_en']; ?></td>
                            <td><?php echo $hasil['lat_hs']; ?></td>
                            <td><?php echo $hasil['long_hs']; ?></td>
                            <td><?php echo $hasil['tgl']; ?></td>
                        </tr>

                    <?php endforeach; ?> -->
                </tbody>
            </table>
        </div>

    </div>