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
                    <h3 class="h1 mb-4 text-gray-800 text-center">Pengujian Integrity</h3><br>
                    <form action="<?= site_url('Pengujian/generate_hash_integrity/' . $data->id); ?>" method="post" class="login-form">
                        <div class="form-group">
                            <input type="text" name="lat-en" id="lat-en" class="form-control form-control-user" required placeholder="Masukkan Latitude Terenkripsi .." value="<?= isset($data->lat_en) ? $data->lat_en : ''; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="long-en" id="long-en" class="form-control form-control-user" required placeholder="Masukkan Longitude Terenkripsi.." value="<?= isset($data->long_en) ? $data->long_en : ''; ?>">
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn w-100" style="background-color: #282b75; border-color: #282b75; color: #ffff;" onmouseover="this.style.backgroundColor='#1d161e'; this.style.color='#ffffff';" onmouseout="this.style.backgroundColor='#282b75'; this.style.color='#ffff';" id="hitung-hash-user">Hitung Nilai Hash</button><br><br>
                        </div>
                    </form>
                    <form class="login-form" action="<?= site_url('Pengujian/integrity_check/' . $data->id); ?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="lat-hs-1" id="lat-hs-1" class="form-control form-control-user" required placeholder="Nilai Hashing Latitude" value="<?= isset($data->lat_hs) ? $data->lat_hs : ''; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" name="long-hs-1" id="long-hs-1" class="form-control form-control-user" required placeholder="Nilai Hashing Longitude" value="<?= isset($data->long_hs) ? $data->long_hs : ''; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" name="lat-hs-2" id="lat-hs-2" class="form-control form-control-user" required placeholder="Nilai Hashing Latitude 2" value="<?= isset($hash_lat_integrity) ? $hash_lat_integrity : ''; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" name="long-hs-2" id="long-hs-2" class="form-control form-control-user" required placeholder="Nilai Hashing Longitude 2" value="<?= isset($hash_long_integrity) ? $hash_long_integrity : ''; ?>" readonly>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn w-100" style="background-color: #282b75; border-color: #282b75; color: #ffff;" onmouseover="this.style.backgroundColor='#1d161e'; this.style.color='#ffffff';" onmouseout="this.style.backgroundColor='#282b75'; this.style.color='#ffff';" id="bandingkan-dua-hash">Bandingkan Nilai Hash</button><br><br><br><br>
                        </div>
                    </form>
                </div>
            </div>
            <h3 class="h1 mb-4 text-gray-800 text-center">Hasil Pengujian Integrity</h3><br>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text">Data Hasil Pengujian</h5>
                </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Digest Latitude 1</th>
                                <th>Digest Longitude 1</th>
                                <th>Digest Latitude 2</th>
                                <th>Digest Longitude 2</th>
                                <th>Hasil Perbandingan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no=1;
                            foreach ($data_lokasi as $hasil) : ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $hasil['lat']; ?></td>
                                    <td><?php echo $hasil['lang']; ?></td>
                                    <td><?php echo $hasil['digest_lat_1']; ?></td>
                                    <td><?php echo $hasil['digest_lang_1']; ?></td>
                                    <td><?php echo $hasil['digest_lat_2']; ?></td>
                                    <td><?php echo $hasil['digest_lang_2']; ?></td>
                                    <td><?php echo $hasil['hasil_perbandingan']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>