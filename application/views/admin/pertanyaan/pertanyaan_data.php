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
                        <h3 class="card-title">Data Pertanyaan</h3>
                        <div class="card-tools">
                            <a href="<?= base_url('admin/Pertanyaan/viewAddPertanyaan')?>">
                                <button type="button" class="btn btn-block btn-primary"><i class="fa fa-user-plus"></i>
                                    Tambah Data
                                </button>
                            </a>
                        </div>
                    </div>
                    <!-- /Navbar Content -->
                    <!-- Page Content -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="pertanyaanTable">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Pertanyaan</th>
                                    <th>kategori Pertanyaan</th>
                                    <th>kategori Jawaban</th>
                                    <th>kategori Urutan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $i = 1;
                                    foreach($dataPertanyaan as $rowPertanyaan){?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$rowPertanyaan->pertanyaanDesk?></td>
                                    <td><?=$rowPertanyaan->pertanyaanKDesk?></td>
                                    <td><?=$rowPertanyaan->pertanyaanKategoriJawaban?></td>
                                    <td><?=$rowPertanyaan->pertanyaanUrutan?></td>
                                    
                                    <td>
                                        <a href="<?=base_url('admin/Pertanyaan/viewEditPertanyaan/'.$rowPertanyaan->pertanyaanID)?>">
                                            <button class="btn btn-sm btn-warning" id="btn-edit">Edit</button>
                                        </a>
                                        <button class="btn btn-sm btn-danger" id="btn-delete" value="<?=$rowPertanyaan->pertanyaanID?>">Hapus</button>
                                    </td>
                                </tr>
                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /Page Content -->
                    <!-- Footer Content -->
                    <!-- <div class="card-footer">
                        Footer
                    </div> -->
                    <!-- /Footer Content -->
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

    <script>
$(document).ready(function(){
    $('#pertanyaanTable').DataTable();

    $('#pertanyaanTable').on('click','#btn-delete',function(){
        var id=$(this).attr('value');
        console.log(id);
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
            },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            
        if (result.isConfirmed) {
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('admin/Pertanyaan/deletePertanyaan')?>",
                dataType : "JSON",
                data : {id: id},
                success: function(data){
                    console.log('success');
                    if(data.status == 'success'){
                        swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        ).then(function(){
                            location.reload();
                        });  
                    } 
                    else if(data.status == 'gagal'){
                        swalWithBootstrapButtons.fire(
                        'Warning!',
                        'Data Tidak Bisa Di Hapus, Ada Relasi.',
                        'Warning'
                        ).then(function(){
                            location.reload();
                        });  
                    }         
                }    
            });
        return false;
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
            )
        }
        })
    });
} );
    </script>
</body>
</html>