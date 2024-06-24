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
                    <span class="mr-2 d-none d-lg-inline text-gray-500 large">Pengamanan</span>
                </a>
            </li>

        </nav>
        <!-- End of Topbar -->

        <div class="container-fluid">
            <br>
            <div class="col-lg-12 mx-auto justify-content-center" data-aos="zoom-in">
                <div class="login-container">
                    <h3 class="h1 mb-4 text-gray-800 text-center">Hashing Data Lokasi</h3><br>
                    <form class="login-form" action="<?php echo base_url('Dataloc/hash/' . $data->id); ?>" method="POST" id="hashing-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p>Hasil Enkripsi (lat)</p>
                                    <input type="text" name="lat_en" id="lat_en" class="form-control form-control-user" required placeholder="Masukkan Latitude Enkripsi dari Database.." value="<?= isset($data->lat_en) ? $data->lat_en : ''; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p>Hasil Enkripsi (lat db)</p>
                                    <input type="text" name="lat_en_db" id="lat_en_db" class="form-control form-control-user" required placeholder="Masukkan Latitude Enkripsi dari Database.." value="<?= set_value('lat_en_db'); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p>Hasil Enkripsi (lang)</p>
                                    <input type="text" name="long_en" id="long_en" class="form-control form-control-user" required placeholder="Masukkan Longitude Enkripsi dari Database.." value="<?= isset($data->long_en) ? $data->long_en : ''; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p>Hasil Enkripsi (lang db)</p>
                                    <input type="text" name="long_en_db" id="long_en_db" class="form-control form-control-user" required placeholder="Masukkan Longitude Enkripsi dari Database.." value="<?= set_value('long_en_db'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <button type="button" class="btn btn-primary w-100" id="hasil-enkripsi">Hashing</button>
                            </div>
                            <div class="col-md-6 text-center">
                                <button type="button" class="btn btn-primary w-100" id="hasil-enkripsi-db">Hashing DB</button>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <p>Digest Text (lat) 1</p>
                            <input type="text" name="digest_text_lat_1" id="digest_text_lat_1" class="form-control form-control-user" required placeholder="Masukkan Digest Text Latitude Enkripsi.." readonly>
                        </div>
                        <div class="form-group">
                            <p>Digest Text (lat) 2</p>
                            <input type="text" name="digest_text_lat_2" id="digest_text_lat_2" class="form-control form-control-user" required placeholder="Masukkan Digest Text Latitude Enkripsi.." readonly>
                        </div>
                        <div class="form-group">
                            <p>Digest Text (lang) 1</p>
                            <input type="text" name="digest_text_long_1" id="digest_text_long_1" class="form-control form-control-user" required placeholder="Masukkan Digest Text Longitude Enkripsi.." readonly>
                        </div>
                        <div class="form-group">
                            <p>Digest Text (lang) 2</p>
                            <input type="text" name="digest_text_long_2" id="digest_text_long_2" class="form-control form-control-user" required placeholder="Masukkan Digest Text Longitude Enkripsi.." readonly>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-primary w-100" id="bandingkan-hashing">Bandingkan Hashing</button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p id="hasil-banding-hash">Hasil Digest 1 dan Digest 2:</p>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-primary w-100" id="lanjutkan-dekrip" onclick="window.location.href='<?php echo site_url('Dataloc/dekripsi/' . $data->id); ?>'" disabled>
                                    <i class="bx bx-plus"></i>Lanjutkan Dekripsi
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>