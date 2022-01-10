<!DOCTYPE html>
<html lang="en">
<head>
<meta charset = "UTF-8" />
    <?php $this ->load->view('user/_partials/head.php');?>
</head>

<body class="hold-transition sidebar-mini">
<?php $this ->load->view('user/_partials/navbar.php');?>

    <form  id="formAdd" >
        <?php if($dataPertanyaan != null){ ?>
            <input type="hidden" name="alumniID" value="<?=$this->fungsi->alumni_login()->alumniID?>">
        <input type="hidden" name="pertanyaanKategoriID" value="<?=$dataPertanyaanKategoriID?>">
    
    <section class="pb-4">
        <div class="container">

            <div class="row text-center mb-12 pt-4 text-dark">
                <div class="col">
                    <h5>Masukan Jawaban</h5>  
                </div>
            </div>
             <div class="row d-flex justify-content-center">
            <?php 
            
           
            foreach($dataPertanyaan as $rowPertanyaan){?>
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

                <?php  if($rowPertanyaan->pertanyaanKriteriaJawaban == 'kriteria_pilih_single_m_tidak_aktif'){ ?>
                                       
                                       <div class="card w-100">
                                           <!-- <div class="card-header">Pertanyaan</div> -->
                                           
                                           <div class="card-body">
                                               <!-- <h5 class="card-title">Special title treatment</h5> -->
                                               <p class="card-text"><?=$rowPertanyaan->pertanyaanDesk?></p>
                                               <?php foreach($dataJawabanPilihSingle as $rowJawabanPilihSingle){
                                                   if($rowJawabanPilihSingle->jawabanPS_pertanyaanID == $rowPertanyaan->pertanyaanID){
                                                   
                                                       ?>
                                                       
                                                       <div class="form-check">
                                                           <input class="form-check-input" type="radio" name="pilihSingle<?=$rowPertanyaan->pertanyaanID?>" id="exampleRadios2" value="<?=$rowJawabanPilihSingle->jawabanPSID?>" data-id="<?=$rowJawabanPilihSingle->jawabanPSLanjutan?>" data-pertanyaanid="<?=$rowPertanyaan->pertanyaanID?>">
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
                                   <?php  }else if($rowPertanyaan->pertanyaanKriteriaJawaban == 'kriteria_pilih_single_m_aktif'){?>
                                       <div class="card w-100">
                                           <!-- <div class="card-header">Pertanyaan</div> -->
                                           
                                           <div class="card-body">
                                               <!-- <h5 class="card-title">Special title treatment</h5> -->
                                               <p class="card-text"><?=$rowPertanyaan->pertanyaanDesk?></p>
                                               <?php foreach($dataJawabanPilihSingle as $rowJawabanPilihSingle){
                                                   if($rowJawabanPilihSingle->jawabanPS_pertanyaanID == $rowPertanyaan->pertanyaanID){
                                                   
                                                       ?>
                                                       
                                                       <div class="form-check">
                                                           <input class="form-check-input" type="checkbox" name="pilihSingle<?=$rowPertanyaan->pertanyaanID?>" id="exampleRadios1" value="<?=$rowJawabanPilihSingle->jawabanPSID?>" data-id="<?=$rowJawabanPilihSingle->jawabanPSLanjutan?>" data-pertanyaanid="<?=$rowPertanyaan->pertanyaanID?>">
                                                           <label class="form-check-label" for="exampleRadios1">
                                                               <?=$rowJawabanPilihSingle->jawabanPSDesk?>
                                                           </label>
                                                           <div id="inputLanjutanx_<?=$rowJawabanPilihSingle->jawabanPSID?>" ></div>
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
        <button type="submit" class="btn btn-primary" id="add">Submit</button>
        <?php } ?>
                                
        </div>
    </section>



    </form>
<!-- JS -->
<?php $this->load->view('admin/_partials/js.php');?>
<!-- /Js -->
<script>

$(document).ready(function(){
    $(document).on('change', '#exampleRadios1',function(){
        
        
        var a = $(this).data('id');
        var c = $(this).data('pertanyaanid');
        var b = $(this).val();
        console.log(a);
        console.log(b);
        $('#inputLanjutan_aktif_'+b).addClass('d-none');
            // console.log("hell");
            
            var html = '';
            // console.log(a);
            var z = '#inputLanjutanx_'+b;
            var z1 = '#lanjutAktif'+c;
        if($(this).is(':checked')){
            


            if(a == 'aktif'){
                console.log("aktif");
                html = '<div class="form-group" id="lanjutAktif'+c+'">'
                        +'<input type="text"  name="lanjut'+b+'" class="form-control"/>'
                        +'</div>';
                $(z).html(html);
                
            }else if(a == 'tidak_aktif'){
                console.log("taktif");
                console.log(z1);
                $(z1).remove();
               
            }
        }else{
            console.log("taktif");
                console.log(z1);
                $(z1).remove();
        }
       
           
       
        
    });

    $(document).on('change', '#exampleRadios2',function(){
        
        
        var a = $(this).data('id');
        var c = $(this).data('pertanyaanid');
        var b = $(this).val();
        console.log(a);
        console.log(b);
        
      
       
            // $('#inputLanjutan_aktif_'+b).addClass('d-none');
            console.log("hell");
            
            var html = '';
            // console.log(a);
            var z = '#inputLanjutanx2_'+b;
            var z1 = '#lanjutAktif2'+c;
            if(!$(z).val()){
                $(z1).remove();
            }
            if(a == 'aktif'){
                console.log("aktif");
                html = '<div class="form-group" id="lanjutAktif2'+c+'">'
                        +'<input type="text"  name="lanjut'+b+'" class="form-control"/>'
                        +'</div>';
                $(z).html(html);
                
            }else if(a == 'tidak_aktif'){
                console.log("taktif");
                console.log(z1);
                $(z1).remove();
                // a.removeChild();
                // html = '<div class="form-group">'
                //         +'<label>Jenis Jawaban Pilihan</label>'
                //         +'<select class="custom-select" id="pilihanKriteriaJawaban" name="pilihanKriteriaJawaban">'
                //         +'<option>Pilih</option>'
                //         +'<option value="single">Jawaban Pilihan Single</option>'
                //         +'<option value="multiple">Jawaban Pilihan Multiple</option>'
                //         +'</select>'
                //         +'</div>'
                // $('#pilihanJawaban').html(html);
            }
       
       
           
       
        
    });

///////////////////////////////////////

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

    
///////////////////////////////////////////
  

  


    $('#add').on('click', function(){
            $.ajax({
                type : "POST",
                url  :"<?php echo base_url('user/Pertanyaan/addPertanyaanAlumni')?>",
                dataType : "JSON",
                data : $('#formAdd').serialize(),
                success: function(data){
                    console.log(data);
                    if(data.status == 'success'){
                        console.log("sukses");
                    
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data Berhasil Di Tambahkan!',
                        
                        }).then(function() {
                            window.location.assign("<?php echo base_url();?>user/Pertanyaan/");
                        });
                    
                    }else{
                        // console.log(data);
                        $.each(data, function(index, element) {
                            // console.log(index);
                            if(index == 'essay'){
                                $.each(element, function(index1, element1) {
                                    $.each(element1, function(index2, element2) {
                                        // console.log(index2);
                                        var datax = '.'+index2;
                                        $(datax).html(element2);
                                    });
                                });
                            }
                            if(index == 'pilihSingle'){
                                $.each(element, function(index1, element1) {
                                    $.each(element1, function(index2, element2) {
                                        // console.log(index2);
                                        var datax = '.'+index2;
                                        $(datax).html(element2);
                                    });
                                });
                            }
                            var pl;
                            // if(index == 'pilihanLanjut'){
                            //     pl = true;
                            // }else{
                            //     pl = false;
                            // }

                            // console.log(pl);
                           
                            if(index == 'pilihanLanjut'){
                                $.each(element, function(index1, element1) {
                                    $.each(element1, function(index2, element2) {
                                        console.log("Lanjutx = "+index2);
                                        var datax = '.'+index2;
                                        $(datax).html(element2);
                                    });
                                    
                                });
                            }
                            

                            if(index == 'pilihMultiple'){
                                $.each(element, function(index1, element1) {
                                    $.each(element1, function(index2, element2) {
                                        console.log(index2);
                                        var datax = '.'+index2;
                                        $(datax).html(element2);
                                    });
                                    
                                });
                            }
                           
                        });
                        // console.log(data.essay48);
                        // $('.essay48').html(data.essay48);
                        // $('.gejalaNama_error').html(data.gejalaNama);
                    } 
                }
            });
            return false;
        });
});

</script>
</body>
</html>