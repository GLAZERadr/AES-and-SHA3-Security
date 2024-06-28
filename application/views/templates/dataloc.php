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
                <button class="btn btn-info mb-1" onclick="window.location.href='<?php echo site_url('Dataloc/tambah_data'); ?>'">
                    <i class="bx bx-plus"></i> + Tambah Data
                </button>
            </div><br><br>

            <table class="table table-border">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Latitude</td>
                        <td>Longitude</td>
                        <td>Tanggal</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($data_lokasi as $dataloc) {
                        $id = $dataloc['id'];
                        $lat_en = $dataloc['lat_en'];
                        $long_en = $dataloc['long_en'];
                        $lat_hs = $dataloc['lat_hs'];
                        $long_hs = $dataloc['long_hs'];

                        if ((!empty($lat_en) && !empty($long_en) && !empty($lat_hs) && !empty($long_hs))) {
                            $amankan_data = '<button class="btn btn-secondary mb-1" disabled>Data Diamankan</button>';
                        } else {
                            $amankan_data = '<a href="' . site_url("Dataloc/enkripsi/" . $id) . '" class="btn btn-info mb-1">Amankan Data</a>';
                        }

                        echo "<tr>";
                        echo "<td>" . $dataloc['id'] . "</td>";
                        echo "<td>" . $dataloc['lat'] . "</td>";
                        echo "<td>" . $dataloc['long'] . "</td>";
                        echo "<td>" . $dataloc['tgl']. "</td>";
                        echo "<td>" . $amankan_data . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
