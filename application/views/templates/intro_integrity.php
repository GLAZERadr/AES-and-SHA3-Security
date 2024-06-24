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
                    <span class="mr-2 d-none d-lg-inline text-gray-500 large">Uji Pengamanan</span>
                </a>
            </li>

        </nav>
        <!-- End of Topbar -->
            <table class="table table-border">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Latitude Terenkripsi</td>
                        <td>Longitude Terenkripsi</td>
                        <td>Tanggal</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_lokasi as $dataloc) : ?>
                        <tr>
                            <td><?php echo $dataloc['id']; ?></td>
                            <td><?php echo $dataloc['lat_en']; ?></td>
                            <td><?php echo $dataloc['long_en']; ?></td>
                            <td><?php echo $dataloc['tgl']; ?></td>
                            <td>
                                <button onclick="window.location.href='<?php echo site_url('Pengujian/integrity/' . $dataloc['id']); ?>'">
                                    <i class="bx bx-plus"></i> Uji Integritas
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>