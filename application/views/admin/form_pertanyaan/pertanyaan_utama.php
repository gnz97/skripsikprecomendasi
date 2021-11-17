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
                                            <a href="<?=base_url('admin/FormPertanyaan/viewFormPertanyaanKategori/'.$rowPertanyaanKategori->pertanyaanKID)?>" class="small-box-footer">Pilih</a>
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