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
            <div class="col-lg-7 mx-auto justify-content-center" data-aos="zoom-in">
                <div class="login-container">
                    <h3 class="h1 mb-4 text-gray-800 text-center">Dekripsi Data Lokasi</h3><br>
                    <form class="login-form" action="<?php echo base_url('Dataloc/decrypt/' . $data->id);?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="lat" id="lat" class="form-control form-control-user" required placeholder="Latitude terisi otomatis sesuai yg di klik" value="<?= isset($data->lat) ? $data->lat : ''; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="text" name="long" id="long" class="form-control form-control-user" required placeholder="Longitude terisi otomatis sesuai yang diklik" value="<?= isset($data->long) ? $data->long : ''; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <input type="password" name="key" id="key" class="form-control form-control-user" required placeholder="Masukkan Secret Key" value="<?= isset($data->secret_key) ? $data->secret_key : ''; ?>" readonly>
                        </div>
                        <button onclick="window.location.href='<?php echo site_url('Pengamanan/hasil/'); ?>'">
                            <i class="bx bx-plus"></i> Dekripsi
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
