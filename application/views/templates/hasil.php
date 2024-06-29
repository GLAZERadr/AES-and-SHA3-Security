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

            <table class="table table-border">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Latitude (Enkripsi)</td>
                        <td>Longitude (Enkripsi)</td>
                        <td>Latitude (Hash)</td>
                        <td>Longitude (Hash)</td>
                        <td>Latitude (Dekrip)</td>
                        <td>Longitude (Dekrip)</td>
                        <td>Tanggal</td>
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