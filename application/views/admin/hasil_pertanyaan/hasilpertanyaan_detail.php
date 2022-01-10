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
                        <img class="profile-user-img img-fluid " src="<?= base_url()?>assets/images/logo.png" alt="User profile picture">
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
                            <b>Jurusan</b> <a class="float-right"><?=$dataAlumni->alumniProdi?></a>
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
                                        <hr>
                                            <li><?=$dataPertanyaanKategori->pertanyaanKDesk?></li>
                                            <!-- <input class="form-control form-control-sm" type="text" value="" readonly placeholder="Jawaban"> -->
                                            
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
                                                    <hr>
                                                    
                                                    <li><?=$rowJawabanAlumniEssay->jawabanAlumniEsayDesk?></li>
                                                        <!-- <input class="form-control form-control-sm" type="text" value="<?=$rowJawabanAlumniEssay->jawabanAlumniEsayDesk?>" readonly placeholder="Jawaban"> -->
                                                    
                                                </div>


                                                </div>
                                            </div>
                                            <!-- /.tab-content -->
                                        </div><!-- /.card-body -->
                                        
                                    </div>
                                                <?php }} ?>
                                      <?php }else if($rowJawabanAlumni->pertanyaanKategoriJawaban == 'pilihan'){ ?>
                                                    
                                            <?php  if($rowJawabanAlumni->pertanyaanKriteriaJawaban == 'kriteria_pilih_single_m_aktif'){ ?>
                                                
                                                <div class="card">
                                                    <div class="card-body">
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="activity">
                                                                    
                                                                    <div class="post">
                                                                        <p><?=$rowJawabanAlumni->pertanyaanDesk?></p>
                                                                        <hr>
                                                                        
                                                                        <?php foreach($dataJawabanAlumniPS as $rowJawabanAlumniPS){?>
                                                                            
                                                                            <?php if($rowJawabanAlumniPS->jawabanAlumniPS_jawabanAlumniID == $rowJawabanAlumni->jawabanAlumniID){?>

                                                                                <!-- <input class="form-control form-control-sm" type="text" value="<?=$rowJawabanAlumniPS->jawabanPSDesk?>" readonly> -->
                                                                                <li><?=$rowJawabanAlumniPS->jawabanPSDesk?></li>
                                                                                <?php if($rowJawabanAlumniPS->jawabanPSLanjutan == 'aktif'){?>
                                                                                    <?php foreach($dataJawabanAlumniPSLanjut as $rowJawabanAlumniPSLanjut){?>
                                                                                        <?php if($rowJawabanAlumniPSLanjut->jawabanAlumniPSL_jawabanAlumniPSID == $rowJawabanAlumniPS->jawabanAlumniPSID){?>
                                                                                            <div class="ml-3">
                                                                                            <input class="form-control form-control-sm" type="text" value="<?=$rowJawabanAlumniPSLanjut->jawabanAlumniPSLDesk?>" readonly>
                                                                                            </div>
                                                                                        <?php } ?>
                                                                                    <?php } ?>
                                                                                <?php } ?>
                                                                                
                                                                            <?php } ?>
                                                                         <?php } ?> 
                                                                        
                                                                    </div>
                                                                    
                                                                    
                                                                    </div>
                                                                </div>
                                                                <!-- /.tab-content -->
                                                            </div><!-- /.card-body -->
                                                            
                                                    </div>

                                                    <?php  }else if($rowJawabanAlumni->pertanyaanKriteriaJawaban == 'kriteria_pilih_single_m_tidak_aktif'){ ?>
                                                
                                                <div class="card">
                                                    <div class="card-body">
                                                            <div class="tab-content">
                                                                <div class="tab-pane active" id="activity">
                                                                    
                                                                    <div class="post">
                                                                        <p><?=$rowJawabanAlumni->pertanyaanDesk?></p>
                                                                        <hr>
                                                                           
                                                                        <?php foreach($dataJawabanAlumniPS as $rowJawabanAlumniPS){
                                                                            if($rowJawabanAlumniPS->jawabanAlumniPS_jawabanAlumniID == $rowJawabanAlumni->jawabanAlumniID){
                                                                                if($rowJawabanAlumniPS->jawabanPSLanjutan == 'aktif'){
                                                                                    foreach($dataJawabanAlumniPSLanjut as $rowJawabanAlumniPSLanjut){
                                                                                        if($rowJawabanAlumniPSLanjut->jawabanAlumniPSL_jawabanAlumniPSID == $rowJawabanAlumniPS->jawabanAlumniPSID){
                                                                            ?>
                                                                            <li><?=$rowJawabanAlumniPSLanjut->jawabanAlumniPSLDesk?></li>
                                                                                    <!-- <input class="form-control form-control-sm" type="text" value="" readonly placeholder="Jawaban"> -->
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
                                                    <hr>
                                                      
                                                    <?php foreach($dataJawabanAlumniPM as $rowJawabanAlumniPM){?>
                                                        <?php if($rowJawabanAlumniPM->jawabanAlumniPM_jawabanAlumniID == $rowJawabanAlumni->jawabanAlumniID){?>
                                                            <p><?=$rowJawabanAlumniPM->jawabanPMDesk?></p>
                                                            <li><?=$rowJawabanAlumniPM->djawabanPMDesk?></li>
                                                            <!-- <input class="form-control form-control-sm" type="text" value="" readonly placeholder="Jawaban"> -->
                                                        <?php } ?>
                                                    <?php } ?>
                                                   
                                                </div>

                                                </div>
                                            </div>
                                            <!-- /.tab-content -->
                                        </div><!-- /.card-body -->
                                        
                                    </div>

                                            <?php } ?>
                                      <?php }else if($rowJawabanAlumni->pertanyaanKategoriJawaban == 'alamat'){ ?>
                                        <?php foreach($dataJawabanAlumniAlamat as $rowJawabanAlumniAlamat){
                                                    if($rowJawabanAlumniAlamat->jawabanAlumniAlamat_jawabanAlumniID == $rowJawabanAlumni->jawabanAlumniID){?>
                                                
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
                                                                            <hr>
                                                                                
                                                                            <p>Provinsi</p>
                                                                            <div class="ml-3">
                                                                                <input class="form-control form-control-sm" id="provinsix" type="hidden" value="<?=$rowJawabanAlumniAlamat->jawabanAluminAlamatProvinsi?>" readonly placeholder="Jawaban">
                                                                                <input class="form-control form-control-sm" id="provinsi" type="text"  readonly placeholder="Jawaban">
                                                                            </div>
                                                                           
                                                                                <p>Kabupaten</p>
                                                                                <div class="ml-3">
                                                                            <input class="form-control form-control-sm" id="kabupatenx" type="hidden" value="<?=$rowJawabanAlumniAlamat->jawabanAluminAlamatKabupaten?>" readonly placeholder="Jawaban">
                                                                            <input class="form-control form-control-sm" id="kabupaten" type="text"  readonly placeholder="Jawaban">
                                                                            </div>    
                                                                        </div>
                                                                       


                                                                        </div>
                                                                    </div>
                                                                    <!-- /.tab-content -->
                                                                </div><!-- /.card-body -->
                                                                
                                                            </div>
                                                <?php }} ?>
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

    <script>

dataIndodaxAPI();
    function dataIndodaxAPI(){
        var provinsizx = $('#provinsix').val();
        var kabupatenzx = $('#kabupatenx').val();
        $.ajax({
            type: 'GET',
            url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi',
            dataType: 'json',
            success: function (data) {
            //     html = '';
            //    html +='<div class="form-group">'
            //         +'<label>Provinsi</label>'
            //         +'<select class="custom-select" id="pilihanAlamatProvinsi" name="pilihanAlamatProvinsi">'
            //         +'<option id="">pilih</option>';
               $.each(data, function(index, element) { 
                    $.each(element, function(index1, element1) { 
                        if(provinsizx == element1.id){
                        // html += '<option id="'+element1.id+'" value="'+element1.id+'">'+element1.nama+'</option>';
                        $('#provinsi').val(element1.nama);
                        }
                    });
                }); 
                // html +='</select>'
                //     +'</div>';
                 

            }
        });

        $.ajax({
            type: 'GET',
            url: 'https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi='+provinsizx,
            dataType: 'json',
            success: function (data) {
               
               $.each(data, function(index, element) { 
                    $.each(element, function(index1, element1) { 
                        if(kabupatenzx == element1.id){
                        // html += '<option id="'+element1.id+'" value="'+element1.id+'">'+element1.nama+'</option>';
                        $('#kabupaten').val(element1.nama);
                        // console.log();
                        }
                    });
                }); 
               

            }
        });

    }


   

    
///////////////////////////////////////////
  
    </script>
</body>
</html>