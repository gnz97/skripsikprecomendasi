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
                    <form  id="formAdd" >
                        <?php if($dataPertanyaan != null){ ?>
                          
                        <input type="hidden" name="pertanyaanKategoriID" value="<?=$dataPertanyaanKategoriID?>">
                    
                    <section class="pb-4">
                        <div class="container">

                            <div class="row text-center mb-12 pt-4 text-dark">
                                <div class="col">
                                    <h5>Masukan Jawaban</h5>  
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center">
                        <?php  foreach($dataPertanyaan as $rowPertanyaan){?>
                                <?php if($rowPertanyaan->pertanyaanKategoriJawaban == 'esay'){?>

                                    <div class="card w-100">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1" style="font-weight: normal;"><?=$rowPertanyaan->pertanyaanDesk?></label>
                                                    <textarea class="form-control" name="essay<?=$rowPertanyaan->pertanyaanID?>" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                    <div class="essay<?=$rowPertanyaan->pertanyaanID?> text-danger" ></div>
                                                </div>
                                                
                                            </div>
                                        </div>

                                <?php }else if($rowPertanyaan->pertanyaanKategoriJawaban == 'pilihan'){?>

                                    <?php  if($rowPertanyaan->pertanyaanKriteriaJawaban == 'kriteria_pilih_single_m_aktif'){ ?>
                                        <div class="card w-100">
                                                <!-- <div class="card-header">Pertanyaan</div> -->
                                                
                                                <div class="card-body">
                                                    <!-- <h5 class="card-title">Special title treatment</h5> -->
                                                    <p class="card-text"><?=$rowPertanyaan->pertanyaanDesk?></p>
                                                    <?php foreach($dataJawabanPilihSingle as $rowJawabanPilihSingle){
                                                        if($rowJawabanPilihSingle->jawabanPS_pertanyaanID == $rowPertanyaan->pertanyaanID){
                                                        
                                                            ?>
                                                            
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="pilihSingle<?=$rowPertanyaan->pertanyaanID?>" id="kriteria_pilih_single_m_aktif" value="<?=$rowJawabanPilihSingle->jawabanPSID?>" data-id="<?=$rowJawabanPilihSingle->jawabanPSLanjutan?>" data-pertanyaanid="<?=$rowPertanyaan->pertanyaanID?>">
                                                                <label class="form-check-label" for="exampleRadios1">
                                                                    <?=$rowJawabanPilihSingle->jawabanPSDesk?>
                                                                </label>
                                                                <div id="inputLanjutanx_<?=$rowJawabanPilihSingle->jawabanPSID?>"></div>
                                                                <div class="lanjut<?=$rowJawabanPilihSingle->jawabanPSID?> text-danger"></div>
                                                            </div>
                                                            
                                                    <?php }} ?>
                                                    <div class="pilihSingle<?=$rowPertanyaan->pertanyaanID?> text-danger"></div>
                                                    <div id="lanjutAktifxx"></div>
                                                </div>
                                            </div>

                                            
                                        <?php  }else if($rowPertanyaan->pertanyaanKriteriaJawaban == 'kriteria_pilih_single_m_tidak_aktif'){?>
                                            
                                            <div class="card w-100">
                                                <!-- <div class="card-header">Pertanyaan</div> -->
                                                
                                                <div class="card-body">
                                                    <!-- <h5 class="card-title">Special title treatment</h5> -->
                                                    <p class="card-text"><?=$rowPertanyaan->pertanyaanDesk?></p>
                                                    <?php foreach($dataJawabanPilihSingle as $rowJawabanPilihSingle){
                                                        if($rowJawabanPilihSingle->jawabanPS_pertanyaanID == $rowPertanyaan->pertanyaanID){
                                                        
                                                            ?>
                                                            
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="pilihSingle<?=$rowPertanyaan->pertanyaanID?>" id="kriteria_pilih_single_m_tidak_aktif" value="<?=$rowJawabanPilihSingle->jawabanPSID?>" data-id="<?=$rowJawabanPilihSingle->jawabanPSLanjutan?>" data-pertanyaanid="<?=$rowPertanyaan->pertanyaanID?>">
                                                                <label class="form-check-label" for="exampleRadios1">
                                                                    <?=$rowJawabanPilihSingle->jawabanPSDesk?>
                                                                </label>
                                                                <div id="inputLanjutanx2_<?=$rowJawabanPilihSingle->jawabanPSID?>" ></div>
                                                                <div class="lanjut<?=$rowJawabanPilihSingle->jawabanPSID?> text-danger"></div>
                                                            </div>
                                                            
                                                    <?php }} ?>
                                                    <div class="pilihSingle<?=$rowPertanyaan->pertanyaanID?> text-danger"></div>
                                                </div>
                                            </div>
                                        <?php  }else if($rowPertanyaan->pertanyaanKriteriaJawaban == 'kriteria_pilih_multiple'){?>
                                            <div class="card w-100">
                                                <!-- <div class="card-header">Pertanyaan</div> -->
                                                <div class="card-body">
                                                    <p class="card-text"><?=$rowPertanyaan->pertanyaanDesk?></p>
                                                            <!-- <h5 class="card-title">Special title treatment</h5> -->
                                                        <?php foreach($dataJawabanPilihMultiple as $rowJawabanPilihMultiple){ 
                                                            if($rowJawabanPilihMultiple->jawabanPM_pertanyaanID == $rowPertanyaan->pertanyaanID){ 
                                                                
                                                            $i = 0;
                                                            ?>
                                                            <div class="pilihMultiple<?=$rowPertanyaan->pertanyaanID .''.$rowJawabanPilihMultiple->jawabanPMID?> text-danger"></div>
                                                            <div class="form-group row " >
                                                                
                                                                <label for="inputPassword" style="font-weight: normal;" class="col-sm-2 col-form-label"><?=$rowJawabanPilihMultiple->jawabanPMDesk?></label>
                                                                <!-- <div class=""> -->

                                                                <?php foreach($dataJawabanPilihMultipleDetail as $rowJawabanPilihMultipleDetail){
                                                                $z = $i++;  
                                                                    if($rowJawabanPilihMultipleDetail->djawabanPM_jawabanPMID == $rowJawabanPilihMultiple->jawabanPMID){     
                                                                        
                                                                ?>

                                                                <div class="custom-control custom-radio pt-1" >
                                                                    <?php
                                                                        echo '<input type="radio" id="pilihMultiple" name="pilihMultiple'.$rowPertanyaan->pertanyaanID.''.$rowJawabanPilihMultiple->jawabanPMID.'" class="form-check-input" value="'.$rowJawabanPilihMultipleDetail->djawabanPMID.'" data-id="'.$rowJawabanPilihMultiple->jawabanPMID.'" data-nilai="'.$rowPertanyaan->pertanyaanID.'" data-hasil="'.$rowJawabanPilihMultipleDetail->djawabanPMID.'">
                                                                        <label class="form-check-label" for="pilihMultiple" style="font-weight: normal;"> '.$rowJawabanPilihMultipleDetail->djawabanPMDesk.'</label>';
                                                                    ?>
                                                                
                                                                </div>
                                                            
                                                            
                                                            <?php }} ?>
                                                            <!-- </div> -->
                                                        
                                                            </div>
                                                        

                                                        <?php } } ?>
                                                </div>     
                                            </div>    
                                            
                                <?php }   ?>
                                <?php }else if($rowPertanyaan->pertanyaanKategoriJawaban == 'alamat'){ ?>
                                        <div class="card w-100">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1" style="font-weight: normal;"><?=$rowPertanyaan->pertanyaanDesk?></label>
                                                    <div id="provinsi"></div>
                                                    <div id="Kabupaten"></div>
                                                </div>
                                            </div>
                                        </div>
                                
                                <?php } ?>

                            <?php } ?>
                            </div>
                        <!-- <button type="submit" class="btn btn-primary" id="add">Submit</button> -->
                        <?php } ?>
                                                
                        </div>
                    </section>



                    </form>
                        







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

    <script>

$(document).ready(function(){

    $(document).on('change', '#kriteria_pilih_single_m_aktif',function(){

        var a = $(this).data('id');
        var b = $(this).data('pertanyaanid');
        var c = $(this).val();
        if(a == 'aktif'){
            console.log("check");
            var html = '';
            var z = '#inputLanjutanx_'+c;
            var z1 = '#lanjutAktif'+c;
            if($(this).is(':checked') == true){
                console.log(a);
                html += '<div class="form-group" id="lanjutAktif'+c+'">'
                        +'<input type="text"  name="lanjut'+b+'" class="form-control"/>'
                        +'</div>';
                $(z).html(html);
            }else{
                $(z1).remove();
                console.log("tidak aktif");
            }
        }else{
            console.log("beda data");
        }
        
        
        // console.log(a);
        // console.log(b);
        // console.log(c);

        // var html = '';
        // var z = '#inputLanjutanx_'+b;
        // var z1 = '#lanjutAktif'+c;
        // if($(this).is(':checked')){
        //     if(a == 'aktif'){
        //         console.log("aktif");
        //         html = '<div class="form-group" id="lanjutAktif'+c+'">'
        //                 +'<input type="text"  name="lanjut'+b+'" class="form-control"/>'
        //                 +'</div>';
        //         $(z).html(html);
        //     }else if(a == 'tidak_aktif'){
        //         console.log("taktif");
        //         console.log(z1);
        //         $(z1).remove();
        //     }
        // }else{
        //     console.log("taktif");
        //         console.log(z1);
        //         $(z1).remove();
        // }  
    });



    $(document).on('change', '#kriteria_pilih_single_m_tidak_aktif',function(){
        var a = $(this).data('id');
        var b = $(this).val();
        var c = $(this).data('pertanyaanid');
        var z1 = '#lanjutAktif2'+c;
        if(a == 'aktif'){
            console.log("check");
            var html = '';
            var z = '#inputLanjutanx2_'+b;
           
            if($(this).is(':checked') == true){
                console.log(a);
                html += '<div class="form-group" id="lanjutAktif2'+c+'">'
                        +'<input type="text"  name="lanjutx'+b+'" class="form-control"/>'
                        +'</div>';
                $(z).html(html);
            }else{
                $(z1).remove();
                console.log("tidak aktif");
            }
        }else{
            $(z1).remove();
            console.log("beda data");
        }



        // var a = $(this).data('id');
        // var c = $(this).data('pertanyaanid');
        // var b = $(this).val();
        // var html = '';
        // var z = '#inputLanjutanx2_'+c;
        // var z1 = '#lanjutAktif2'+c;
 
        // if(a == 'aktif'){
        //     console.log("aktif");
        //     html = '<div class="form-group" id="lanjutAktif2'+c+'">'
        //             +'<input type="text"  name="lanjut'+b+'" class="form-control"/>'
        //             +'</div>';
        //     $(z).html(html);
            
        // }else if(a == 'tidak_aktif'){
        //     console.log("taktif");
        //     console.log(z1);
        //     $(z1).remove();
        // }  
    });

    dataIndodaxAPI();
    function dataIndodaxAPI(){
        $.ajax({
            type: 'GET',
            url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi',
            dataType: 'json',
            success: function (data) {
                html = '';
               html +='<div class="form-group">'
                    +'<label>Provinsi</label>'
                    +'<select class="custom-select" id="pilihanAlamatProvinsi" name="pilihanAlamatProvinsi">'
                    +'<option id="">pilih</option>';
               $.each(data, function(index, element) { 
                    $.each(element, function(index1, element1) { 
                        html += '<option id="'+element1.id+'" value="'+element1.id+'">'+element1.nama+'</option>';
                    });
                }); 
                html +='</select>'
                    +'</div>';
                 $('#provinsi').html(html);

            }
        });

    }


    $(document).on('change', '#pilihanAlamatProvinsi',function(){
        var html = '';
        var id = $(this).val();
        console.log(id);
        $.ajax({
            type: 'GET',
            url: 'https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi='+id,
            dataType: 'json',
            success: function (data) {
                html = '';
               html +='<div class="form-group">'
                    +'<label>Kabupaten</label>'
                    +'<select class="custom-select" id="pilihanAlamatKabupaten" name="pilihanAlamatKabupaten">'
                    +'<option id="">pilih</option>';
               $.each(data, function(index, element) { 
                    $.each(element, function(index1, element1) { 
                        html += '<option id="'+element1.id+'" value="'+element1.id+'">'+element1.nama+'</option>';
                    });
                }); 
                html +='</select>'
                    +'</div>';
                 $('#Kabupaten').html(html);

            }
        });
    });

 

});

</script>

</body>
</html>