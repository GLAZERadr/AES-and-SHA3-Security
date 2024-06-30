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
            <h3 class="h1 mb-4 text-gray-800 text-center">Hasil Pengamanan Data Lokasi</h3><br>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text">Data Lokasi</h5>
                </div>
                <div class="card-body">
                    <div class="box">
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Latitude (Enkripsi)</th>
                                            <th>Longitude (Enkripsi)</th>
                                            <th>Latitude (Hash)</th>
                                            <th>Longitude (Hash)</th>
                                            <th>Latitude (Dekrip)</th>
                                            <th>Longitude (Dekrip)</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no=1;
                                        foreach ($data_lokasi as $hasil) : ?>
                                            <?php if (!empty($hasil['lat_en']) && !empty($hasil['long_en']) && !empty($hasil['lat_hs']) && !empty($hasil['long_hs'])) : ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $hasil['lat_en']; ?></td>
                                                    <td><?php echo $hasil['long_en']; ?></td>
                                                    <td><?php echo $hasil['lat_hs']; ?></td>
                                                    <td><?php echo $hasil['long_hs']; ?></td>
                                                    <td><?php echo $hasil['lat_dec']; ?></td>
                                                    <td><?php echo $hasil['long_dec']; ?></td>
                                                    <td><?php echo $hasil['tgl']; ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Main Content -->