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
                        <h3 class="card-title">Data Alumni</h3>
                        <div class="card-tools">
                            <a href="<?= base_url('admin/Alumni/viewAddAlumni')?>">
                                <button type="button" class="btn btn-block btn-primary"><i class="fa fa-user-plus"></i>
                                    Tambah Data
                                </button>
                            </a>
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
                                    <th>Nama</th>
                                    <th>Jurusan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i = 1;
                                    foreach($dataAlumni as $rowAlumni){?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$rowAlumni->alumniNim?></td>
                                    <td><?=$rowAlumni->alumniNama?></td>
                                    <td><?=$rowAlumni->alumniNim?></td>
                                    <td>
                                        <a href="<?=base_url('admin/Alumni/viewEditAlumni/'.$rowAlumni->alumniID)?>">
                                            <button class="btn btn-sm btn-warning" id="btn-edit">Edit</button>
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