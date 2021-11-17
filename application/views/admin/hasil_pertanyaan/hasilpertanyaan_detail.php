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
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="<?= base_url()?>assets/images/admin.jpg" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?=$dataAlumni->alumniNama?></h3>

                        <p class="text-muted text-center"><?=$dataAlumni->alumniNama?></p>

                        <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>NIM</b> <a class="float-right"><?=$dataAlumni->alumniNim?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Angkatan Lulus</b> <a class="float-right"><?=$dataAlumni->alumniTahunLulus?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Jurusan</b> <a class="float-right"><?=$dataAlumni->alumniJurusan?></a>
                        </li>
                        </ul>

                      
                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    
                    <div class="card">
                    <!-- <div class="card-header p-2">
                        <ul class="nav nav-pills">
                        <li class="nav-item">DATA PERTANYAAN</li>
                            
                        </ul>
                    </div> -->
                    <!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="activity">
                                    <!-- Post -->
                                    <div class="post">
                                        <p>Kategori Pertanyaan</p>
                                        <input class="form-control form-control-sm" type="text" value="<?=$dataPertanyaanKategori->pertanyaanKDesk?>" readonly placeholder="Jawaban">
                                    </div>


                                    </div>
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                            
                    </div>
                    
                                <?php foreach($dataJawabanAlumni as $rowJawabanAlumni){
                                            if($rowJawabanAlumni->pertanyaanKategoriJawaban == 'esay'){?>
                                                <?php foreach($dataJawabanAlumniEssay as $rowJawabanAlumniEssay){
                                                    if($rowJawabanAlumniEssay->jawabanAlumniEsay_jawabanAlumniID == $rowJawabanAlumni->jawabanAlumniID){?>
                                                
                            <div class="card">
                                <!-- <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                    <li class="nav-item">DATA PERTANYAAN</li>
                                        
                                    </ul>
                                </div> -->
                                <!-- /.card-header -->
                                <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="activity">
                                                <!-- Post -->
                                                <div class="post">
                                                    <p><?=$rowJawabanAlumni->pertanyaanDesk?></p>
                                                    <input class="form-control form-control-sm" type="text" value="<?=$rowJawabanAlumniEssay->jawabanAlumniEsayDesk?>" readonly placeholder="Jawaban">
                                                </div>


                                                </div>
                                            </div>
                                            <!-- /.tab-content -->
                                        </div><!-- /.card-body -->
                                        
                                    </div>
                                                <?php }} ?>
                                      <?php }else if($rowJawabanAlumni->pertanyaanKategoriJawaban == 'pilihan'){ ?>
                                                    
                                            <?php  if($rowJawabanAlumni->pertanyaanKriteriaJawaban == 'kriteria_pilih_single'){ ?>
                                                
                                                <div class="card">
                                <!-- <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                    <li class="nav-item">DATA PERTANYAAN</li>
                                        
                                    </ul>
                                </div> -->
                                <!-- /.card-header -->
                                <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="activity">
                                                
                                                <div class="post">
                                                    <p><?=$rowJawabanAlumni->pertanyaanDesk?></p>
                                                    <?php foreach($dataJawabanAlumniPS as $rowJawabanAlumniPS){
                                                        if($rowJawabanAlumniPS->jawabanAlumniPS_jawabanAlumniID == $rowJawabanAlumni->jawabanAlumniID){
                                                            if($rowJawabanAlumniPS->jawabanPSLanjutan == 'aktif'){
                                                                foreach($dataJawabanAlumniPSLanjut as $rowJawabanAlumniPSLanjut){
                                                                    if($rowJawabanAlumniPSLanjut->jawabanAlumniPSL_jawabanAlumniPSID == $rowJawabanAlumniPS->jawabanAlumniPSID){
                                                        ?>
                                                                <input class="form-control form-control-sm" type="text" value="<?=$rowJawabanAlumniPSLanjut->jawabanAlumniPSLDesk?>" readonly placeholder="Jawaban">
                                                                <?php }} ?>
                                                        <?php }else{?>
                                                            <input class="form-control form-control-sm" type="text" value="<?=$rowJawabanAlumniPS->jawabanPSDesk?>" readonly placeholder="Jawaban">
                                                    <?php }}} ?>
                                                </div>
                                                
                                                
                                                </div>
                                            </div>
                                            <!-- /.tab-content -->
                                        </div><!-- /.card-body -->
                                        
                                    </div>

                                            <?php }else if($rowJawabanAlumni->pertanyaanKriteriaJawaban == 'kriteria_pilih_multiple'){ ?>
                                                <div class="card">
                                <!-- <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                    <li class="nav-item">DATA PERTANYAAN</li>
                                        
                                    </ul>
                                </div> -->
                                <!-- /.card-header -->
                                <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="activity">
                                                
                                                <div class="post">
                                                    <p><?=$rowJawabanAlumni->pertanyaanDesk?></p>
                                                    <?php foreach($dataJawabanAlumniPM as $rowJawabanAlumniPM){?>
                                                        <?php if($rowJawabanAlumniPM->jawabanAlumniPM_jawabanAlumniID == $rowJawabanAlumni->jawabanAlumniID){?>
                                                            <p><?=$rowJawabanAlumniPM->jawabanPMDesk?></p>
                                                            <input class="form-control form-control-sm" type="text" value="<?=$rowJawabanAlumniPM->djawabanPMDesk?>" readonly placeholder="Jawaban">
                                                        <?php } ?>
                                                    <?php } ?>
                                                </div>

                                                </div>
                                            </div>
                                            <!-- /.tab-content -->
                                        </div><!-- /.card-body -->
                                        
                                    </div>

                                            <?php } ?>
                                      <?php } ?>
                                <?php } ?>
                                    
                                    
                               
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
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