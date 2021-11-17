<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this ->load->view('admin/_partials/head.php');?>
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
        <!-- Top Navar -->
        <?php $this->load->view('admin/_partials/navbar.php');?>
        <!-- /Top Navbar -->

        <!-- Left Sidebar -->
        <?php $this->load->view('admin/_partials/sidebar.php');?>
        <!-- /Left Sidebar -->

        <!-- Main Content -->
        <div class="content-wrapper">

        <!-- Breadcrumb -->
        <?php $this->load->view('admin/_partials/breadcrumb.php');?>
        <!-- /Breadcrumb -->

            <section class="content">
                <div class="card">
                    <!-- Navbar Content -->
                    <div class="card-header">
                        <h3 class="card-title">Hasil Pertanyaan</h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <!-- /Navbar Content -->
                    <!-- Page Content -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Nim</th>
                                    <th>Nama Alumni</th>
                                    <th>Tahun Lulus</th>
                                    <th>Karir/Lanjutan S2</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                    foreach($dataHasilPertanyaan as $rowHasilPertanyaan){
                                    
                                ?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$rowHasilPertanyaan->alumniNim?></td>
                                    <td><?=$rowHasilPertanyaan->alumniNama?></td>
                                    <td><?=$rowHasilPertanyaan->alumniTahunLulus?></td>
                                    <td><?=$dataKategori->pertanyaanKDesk?></td>
                                    <td class="">
                                        <a href="<?=base_url('admin/HasilPertanyaan/viewDetailHasilPertanyaan/'.$rowHasilPertanyaan->jawabanAlumni_alumniID)?>">
                                            <button class="btn btn-sm btn-success" id="btn-edit">Detail</button>
                                        </a>
                                        <button class="btn btn-sm btn-danger" id="btn-delete">Hapus</button>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
        <!-- /Main Content -->

        <!-- Footer -->
        <?php $this->load->view('admin/_partials/footer.php');?>
        <!-- /Footer -->
    </div>

    <!-- JS -->
    <?php $this->load->view('admin/_partials/js.php');?>
    <!-- /Js -->
</body>
</html>