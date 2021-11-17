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
                <?php
                    foreach($dataPertanyaanKategori as $rowPertanyaanKategori){

                    
                ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?=$rowPertanyaanKategori->pertanyaanKDesk?></h3>
                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <a href="<?=base_url('user/Pertanyaan/viewPertanyaanKategori/'.$rowPertanyaanKategori->pertanyaanKID)?>" class="small-box-footer">Pilih</a>
                    </div>
                </div>
                <?php } ?>
                <!-- ./col -->
            
                <!-- ./col -->
                
                <!-- ./col -->
                
            <!-- ./col -->
            </div>

        </div>
    </section>



<!-- JS -->
<?php $this->load->view('admin/_partials/js.php');?>
<!-- /Js -->
</body>
</html>