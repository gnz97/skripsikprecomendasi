<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this ->load->view('user/_partials/head.php');?>
</head>

<body class="hold-transition sidebar-mini">
<?php $this ->load->view('user/_partials/navbar.php');?>


    <section class="pb-4">
        <div class="container">

            <div class="row text-center mb-4 pt-4 text-dark">
                <div class="col">
                    <h5>Masukan Jawaban</h5>  
                </div>
            </div>
            <div class="row d-flex justify-content-center">
            <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Nim</th>
                                    <th>Nama</th>
                                    <th>Prodi</th>
                                    <th>Fakultas</th>
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
                                    <td><?=$rowAlumni->alumniProdi?></td>
                                    <td><?=$rowAlumni->alumniFakultas?></td>
                                    <td>
                                        <a href="<?=base_url('user/BiodataAlumni/viewEditAlumni/'.$rowAlumni->alumniID)?>">
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

        </div>
    </section>



<!-- JS -->
<?php $this->load->view('admin/_partials/js.php');?>
<!-- /Js -->
</body>
</html>