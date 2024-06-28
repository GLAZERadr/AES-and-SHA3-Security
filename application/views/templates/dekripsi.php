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
                    <h3 class="h1 mb-4 text-gray-800 text-center">Dekripsi Data Lokasi</h3><br>
                    <form action="<?= site_url('Dataloc/generate_dekripsi/' . $data->id); ?>" method="post" class="login-form" id="dekripsi-form">
                        <div class="form-group">
                            <input type="text" name="lat_en_dec" id="lat_en_dec" class="form-control form-control-user" required placeholder="Latitude terisi otomatis sesuai yg di klik" value="<?= isset($data->lat_en) ? $data->lat_en : ''; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" name="long_en_dec" id="long_en_dec" class="form-control form-control-user" required placeholder="Longitude terisi otomatis sesuai yang diklik" value="<?= isset($data->long_en) ? $data->long_en : ''; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" name="key_dec" id="key_dec" class="form-control form-control-user" required placeholder="Masukkan Secret Key" value="<?= isset($data->secret_key) ? $data->secret_key : ''; ?>" readonly>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary w-100" id="dekripsi-data">Dekripsi Data</button>
                            </div>
                        </div>

                        <div class="row m-5">
                            <div class="col-md-12 text-center">
                                <p id="latitude"><?= isset($lat_dec) ? 'Latitude: ' . $lat_dec : 'Latitude: '; ?></p>
                            </div>
                            <div class="col-md-12 text-center">
                                <p id="longitude"><?= isset($long_dec) ? 'Longitude: ' . $long_dec : 'Longitude: '; ?></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
