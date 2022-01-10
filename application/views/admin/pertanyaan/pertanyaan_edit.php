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
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Tambah Alumni</h3>
                            </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                            <form id="formAdd" >
                                
                                <input type="hidden" name="pertanyaanID" class="form-control" id="pertanyaanDeskripsi" value="<?=$rowPertanyaan->pertanyaanID?>">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Pertanyaan Kategori</label>
                                        <select class="custom-select" name="pertanyaanKategori">
                                            <option>pilih</option>
                                            <?php foreach($dataPertanyaanKategori as $rowpertanyaanKategori){?>
                                            <option value="<?=$rowpertanyaanKategori->pertanyaanKID?>" <?=$rowpertanyaanKategori->pertanyaanKID == $rowPertanyaan->pertanyaan_pertanyaanKID ? 'selected' : ''?>><?=$rowpertanyaanKategori->pertanyaanKDesk?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Pertanyaan Deskripsi</label>
                                        <input type="text" name="pertanyaanDeskripsi" class="form-control" id="pertanyaanDeskripsi" value="<?=$rowPertanyaan->pertanyaanDesk?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Pertanyaan Urutan</label>
                                        <input type="text" name="pertanyaanUrutan" class="form-control" id="pertanyaanUrutan" value="<?=$rowPertanyaan->pertanyaanUrutan?>">
                                    </div>
                                    <div id="kjawaban"><?=$rowPertanyaan->pertanyaanKriteriaJawaban?></div>
                                    <div class="form-group">
                                        <label>Kategori Jawaban</label>
                                        <select class="custom-select" id="jawabanKategori" name="jawabanKategori">
                                            <option>pilih</option>
                                            <option value="esay" <?=$rowPertanyaan->pertanyaanKategoriJawaban == 'esay' ? 'selected' : ''?> jkategori="esay">Jawaban Esay</option>
                                            <option value="pilihan" <?=$rowPertanyaan->pertanyaanKategoriJawaban == 'pilihan' ? 'selected' : ''?> jkategori="pilihan">Jawaban pilihan</option>
                                            <option value="alamat"  <?=$rowPertanyaan->pertanyaanKategoriJawaban == 'alamat' ? 'selected' : ''?> jkategori="alamat">Jawaban Alamat</option>
                                        </select>
                                    </div>

                                    
                                    <hr>
                                    <div id="pilihanJawaban"></div>
                                    <div id="esayJawaban"></div>
                                    
                                    <div id="pilihanSingle"></div>
                                    <!-- <div id="pilihanSingle"></div> -->
                                    <input type="text" hidden id="hasil">
                                    <div id="pilihanMultiple"></div>
                                    <!-- <div id="pilihanEsay"></div> -->
                                   





                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" id="add">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                        </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
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
$(document).ready(function(){

    $('#jawabanKategori').on('change', function(){
        var html = '';
        var a = $(this).val();
        if(a == 'esay'){
            $('#esayJawaban').removeClass('d-none');
            $('#pilihanJawaban').addClass('d-none');
            $('#pilihanSingle').addClass('d-none');
            $('#pilihanMultiple').addClass('d-none');
        }else if(a == 'pilihan'){
            $('#pilihanJawaban').removeClass('d-none');
            $('#esayJawaban').addClass('d-none');
            html = '<div class="form-group">'
                    +'<label>Jenis Jawaban Pilihan</label>'
                    +'<select class="custom-select" id="pilihanKriteriaJawaban" name="pilihanKriteriaJawaban">'
                    +'<option>Pilih</option>'
                    +'<option value="single">Jawaban Pilihan Single</option>'
                    +'<option value="multiple">Jawaban Pilihan Multiple</option>'
                    +'</select>'
                    +'</div>'
            $('#pilihanJawaban').html(html);
        }
    });

    $(document).on('change', '#pilihanKriteriaJawaban',function(){
        var html = '';
        var b = $(this).val();
        console.log(b);
        if(b == 'single'){
            // var hasil = $('#hasil').val();
           
            var hasil2 = 1;
            $('#hasil').val(hasil2);
            // console.log(hasil1);
            $('#pilihanSingle').removeClass('d-none');
            $('#pilihanMultiple').addClass('d-none');
           console.log("single");
           html = '<div class="form-group">'
                    +'<label for="exampleInputEmail1">Jawaban</label>'
                    +'<input type="text" name="JawabanPilihanSingle['+hasil2+']" class="form-control" id="exampleInputEmail1" placeholder="Masukan Jawaban">'
                    +'<input type="radio" name="lanjutanJawaban['+hasil2+']" value="aktif">'
                    +'<label for="vehicle1">Lanjut Aktif</label>'
                    +'<br>'
                    +'<input type="radio" name="lanjutanJawaban['+hasil2+']" value="tidak_aktif">'
                    +'<label for="vehicle1">Lanjut Tidak Aktif</label>'
                    +'</div>'
                    +'<div id="tambahJawabanSinglex"></div>'
                    +'<div class="form-group">'
                    +'<button  id="tambahJawabanSingle" class="btn btn-primary" >Tambah Jawaban</button>'
                    +'</div>'
                    
                    +'<div class="form-group">'
                    +'<label>Pilihan Jawaban Lebih dari satu</label>'
                    +'<select class="custom-select" id="singleJawabanMultiple" name="singleJawabanMultiple">'
                    +'<option>Pilih</option>'
                    +'<option value="aktif">Aktif</option>'
                    +'<option value="tidak_aktif">Tidak Aktif</option>'
                    +'</select>'
                    +'</div>';
                    // +'<div id="lanjutanJawabanx"></div>';
                    
                    $('#pilihanSingle').html(html);

        }else if(b == 'multiple'){
            $('#pilihanMultiple').removeClass('d-none');
            $('#pilihanSingle').addClass('d-none');
            console.log("multiple");
            html = '<div class="form-group">'
                    +'<label for="exampleInputEmail1">Keterangan Desk</label>'
                    +'<input type="text" name="JawabanPilihanMultipleDeskripsi0" class="form-control" id="exampleInputEmail1" placeholder="Masukan Deskripsi">'
                    +'</div>'
                    +'<div class="form-group">'
                    +'<label for="exampleInputEmail1">Jawaban</label>'
                    +'<input type="text" name="JawabanPilihanMultiple0[]" class="form-control" id="exampleInputEmail1" placeholder="Kurang">'
                    +'</div>'
                    +'<div class="form-group">'
                    +'<input type="text" name="JawabanPilihanMultiple0[]" class="form-control" id="exampleInputEmail1" placeholder="Cukup">'
                    +'</div>'
                    +'<div class="form-group">'
                    +'<input type="text" name="JawabanPilihanMultiple0[]" class="form-control" id="exampleInputEmail1" placeholder="Baik">'
                    +'</div>'
                    +'<div class="form-group">'
                    +'<input type="text" name="JawabanPilihanMultiple0[]" class="form-control" id="exampleInputEmail1" placeholder="Sangat Baik">'
                    +'</div>'
                    +'<input type="hidden" id="tambahJawabanMultipleVal" value="0">'
                    +'<input type="hidden" name="dataMultiple[]" value="0">'
                    +'<div id="tambahJawabanMultiplex"></div>'
                    +'<div class="form-group">'
                    +'<button id="tambahJawabanMultiple" class="btn btn-primary" value="1">Tambah Jawaban</button>'
                   
                    +'</div>';

                    $('#pilihanMultiple').html(html);
        }
        
    });

    



    $(document).on('click','#tambahJawabanSingle', function(e){
        e.preventDefault();
        var hasil = $('#hasil').val();
        var hasil1 = Number(hasil);
        var z = hasil1 + 1;
        $('#hasil').val(z);
       
        var html = '';
        html += '<div class="form-group">'
                    +'<label for="exampleInputEmail1">Jawaban</label>'
                    +'<input type="text" name="JawabanPilihanSingle['+z+']" class="form-control" id="exampleInputEmail1" placeholder="Masukan Jawaban">'
                    +'<input type="radio" name="lanjutanJawaban['+z+']" value="aktif">'
                    +'<label for="vehicle1">Lanjut Aktif</label>'
                    +'<br>'
                    +'<input type="radio" name="lanjutanJawaban['+z+']" value="tidak_aktif">'
                    +'<label for="vehicle1">Lanjut Tidak Aktif</label>'
                    +'</div>';
            $('#tambahJawabanSinglex').append(html);
        console.log("hello");
    });

 




    $(document).on('click','#tambahJawabanMultiple', function(e){
        var valbtn = parseInt($('#tambahJawabanMultipleVal').val());
        var zx = valbtn + 1;
        $('#tambahJawabanMultipleVal').val(zx)
        console.log(zx);
    e.preventDefault();
    var html = '';
    html += '<div class="form-group">'
                    +'<label for="exampleInputEmail1">Keterangan Desk</label>'
                    +'<input type="text"  name="JawabanPilihanMultipleDeskripsi'+zx+'" class="form-control" id="exampleInputEmail1" placeholder="Masukan Deskripsi">'
                    +'</div>'
                    +'<div class="form-group">'
                    +'<label for="exampleInputEmail1">Jawaban</label>'
                    +'<input type="text" name="JawabanPilihanMultiple'+zx+'[]" class="form-control" id="exampleInputEmail1" placeholder="Kurang">'
                    +'</div>'
                    +'<div class="form-group">'
                    +'<input type="text" name="JawabanPilihanMultiple'+zx+'[]" class="form-control" id="exampleInputEmail1" placeholder="Cukup">'
                    +'</div>'
                    +'<div class="form-group">'
                    +'<input type="text" name="JawabanPilihanMultiple'+zx+'[]" class="form-control" id="exampleInputEmail1" placeholder="Baik">'
                    +'</div>'
                    +'<div class="form-group">'
                    +'<input type="text" name="JawabanPilihanMultiple'+zx+'[]" class="form-control" id="exampleInputEmail1" placeholder="Sangat Baik">'
                    +'<input type="hidden" name="dataMultiple[]" value="'+zx+'">'
                    +'</div>'
            $('#tambahJawabanMultiplex').append(html);
        console.log("hello");
    });



    


    $('#add').on('click', function(){
            $.ajax({
                type : "POST",
                url  :"<?php echo base_url('admin/Pertanyaan/editPertanyaan')?>",
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
                            window.location.assign("<?php echo base_url();?>admin/Pertanyaan");
                        });
                    
                    }else{
                        $('.gejalaCode_error').html(data.gejalaCode);
                        $('.gejalaNama_error').html(data.gejalaNama);
                    } 
                }
            });
            return false;
        });
});
    </script>
</body>
</html>