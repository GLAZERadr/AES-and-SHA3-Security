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
            <div class="col">
                <button class="btn mb-1" onclick="window.location.href='<?php echo site_url('Dataloc/tambah_data'); ?>'" style="background-color: #282b75; border-color: #282b75; color: #ffff;" onmouseover="this.style.backgroundColor='#1d161e'; this.style.color='#ffffff';" onmouseout="this.style.backgroundColor='#282b75'; this.style.color='#ffff';">
                    <i class="bx bx-plus"></i> + Tambah Data
                </button>
            </div><br><br>

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
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        foreach ($data_lokasi as $dataloc) {
                                            $id = $dataloc['id'];
                                            $lat_en = $dataloc['lat_en'];
                                            $long_en = $dataloc['long_en'];
                                            $lat_hs = $dataloc['lat_hs'];
                                            $long_hs = $dataloc['long_hs'];

                                            if ((!empty($lat_en) && !empty($long_en) && !empty($lat_hs) && !empty($long_hs))) {
                                                $amankan_data = '<button class="btn btn-secondary mb-1" disabled>Data Diamankan</button>';
                                            } else {
                                                $amankan_data = '<a href="' . site_url("Dataloc/enkripsi/" . $id) . '" class="btn btn-primary mb-1" style="background-color: #282b75; border-color: #282b75; color: #ffff;" onmouseover="this.style.backgroundColor=\'#1d161e\'; this.style.color=\'#ffffff\';" onmouseout="this.style.backgroundColor=\'#282b75\'; this.style.color=\'#ffff\';">Amankan Data</a>';
                                            }

                                            echo "<tr>";
                                            echo "<td>" . $no++ . "</td>";
                                            echo "<td>" . $dataloc['lat'] . "</td>";
                                            echo "<td>" . $dataloc['long'] . "</td>";
                                            echo "<td>" . $dataloc['tgl'] . "</td>";
                                            echo "<td class='text-center'>" . $amankan_data . "</td>";
                                            echo "</tr>";
                                        }
                                        ?>
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