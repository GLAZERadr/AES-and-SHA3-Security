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

        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text">Data Uji Pengamanan</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Latitude Terenkripsi</th>
                                    <th>Longitude Terenkripsi</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no=1;
                                foreach ($data_lokasi as $dataloc) : ?>
                                    <?php if (!empty($dataloc['lat_en']) && !empty($dataloc['long_en']) && !empty($dataloc['lat_hs']) && !empty($dataloc['long_hs'])) : ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $dataloc['lat_en']; ?></td>
                                            <td><?php echo $dataloc['long_en']; ?></td>
                                            <td><?php echo $dataloc['tgl']; ?></td>
                                            <td>
                                                <button class="btn mb-1" style="background-color: #282b75; border-color: #282b75; color: #ffff;" onmouseover="this.style.backgroundColor='#1d161e'; this.style.color='#ffffff';" onmouseout="this.style.backgroundColor='#282b75'; this.style.color='#ffff';" onclick="window.location.href='<?php echo site_url('Pengujian/integrity/' . $dataloc['id']); ?>'">
                                                    <i class="bx bx-plus"></i> Uji Integritas
                                                </button>
                                            </td>
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