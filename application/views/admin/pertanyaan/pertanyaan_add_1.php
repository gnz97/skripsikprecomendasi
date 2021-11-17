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
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Pertanyaan Kategori</label>
                                        <select class="custom-select" name="pertanyaanKategori">
                                            <option>pilih</option>
                                            <?php foreach($datapertanyaanUtama as $rowpertanyaanUtama){?>
                                            <option value="<?=$rowpertanyaanUtama->pertanyaanUID?>"><?=$rowpertanyaanUtama->pertanyaanUDesk?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Pertanyaan Deskripsi</label>
                                        <input type="text" name="pertanyaanDeskripsi" class="form-control" id="exampleInputEmail1" placeholder="Masukan Pertanyaan">
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori Jawaban</label>
                                        <select class="custom-select" id="kategoriJawaban" name="KategoriJawaban">
                                            <option>pilih</option>
                                            <option value="esay">Jawaban Esay</option>
                                            <option value="pilihan">Jawaban Pilihan</option>
                                        </select>
                                    </div>
                                    <div id="pilihanJawaban"></div>
                                    <div id="esayJawaban"></div>
                                    
                                    <div id="pilihanSingle"></div>
                                    <!-- <div id="pilihanSingle"></div> -->
                                    <input type="text"  id="dataUrut">
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
   
    $('#kategoriJawaban').on('change', function(){
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
                    +'<label>Kategori Jawaban Pilihan</label>'
                    +'<select class="custom-select" id="pilihanKategori" name="KategoriJawabanPilihan">'
                    +'<option>Pilih</option>'
                    +'<option value="single">Jawaban Pilihan Single</option>'
                    +'<option value="multiple">Jawaban Pilihan Multiple</option>'
                    +'</select>'
                    +'</div>'
            $('#pilihanJawaban').html(html);
        }
    });

    $(document).on('change', '#pilihanKategori',function(){
        var html = '';
        var b = $(this).val();
        console.log(b);
        if(b == 'single'){
            $('#pilihanSingle').removeClass('d-none');
            $('#pilihanMultiple').addClass('d-none');
           console.log("single");
           html = '<div class="form-group">'
                    +'<label for="exampleInputEmail1">Jawaban</label>'
                    +'<input type="text" name="JawabanPilihanSingle[]" class="form-control" id="exampleInputEmail1" placeholder="Masukan Jawaban">'
                    +'</div>'
                    +'<div id="tambahJawabanSinglex"></div>'
                    +'<div class="form-group">'
                    // +'<input type="submit" id="tambahJawabanSingle" class="btn btn-primary" value="Tambah Jawaban">'
                    +'<button  id="tambahJawabanSingle" class="btn btn-primary" >Tambah Jawaban</button>'
                    +'</div>'
                    
                   
                    +'<div class="form-group">'
                    +'<label>Pilihan Lanjutkan</label>'
                    +'<select class="custom-select" id="lanjutanJawaban">'
                    +'<option>Pilih</option>'
                    +'<option value="aktif">Aktif</option>'
                    +'<option value="tidak_aktif">Tidak Aktif</option>'
                    +'</select>'
                    +'</div>'
                    +'<div id="lanjutanJawabanx"></div>';
                    
                    $('#pilihanSingle').html(html);

        }else if(b == 'multiple'){
            $('#pilihanMultiple').removeClass('d-none');
            $('#pilihanSingle').addClass('d-none');
            console.log("multiple");
            html = '<div class="form-group">'
                    +'<label for="exampleInputEmail1">Keterangan Desk</label>'
                    +'<input type="text" name="JawabanPilihanMultipleDeskripsi1[]" class="form-control" id="exampleInputEmail1" placeholder="Masukan Deskripsi">'
                    +'</div>'
                    +'<div class="form-group">'
                    +'<label for="exampleInputEmail1">Jawaban</label>'
                    +'<input type="text" name="JawabanPilihanMultiple1[]" class="form-control" id="exampleInputEmail1" placeholder="Kurang">'
                    +'</div>'
                    +'<div class="form-group">'
                    +'<input type="text" name="JawabanPilihanMultiple1[]" class="form-control" id="exampleInputEmail1" placeholder="Cukup">'
                    +'</div>'
                    +'<div class="form-group">'
                    +'<input type="text" name="JawabanPilihanMultiple1[]" class="form-control" id="exampleInputEmail1" placeholder="Baik">'
                    +'</div>'
                    +'<div class="form-group">'
                    +'<input type="text" name="JawabanPilihanMultiple1[]" class="form-control" id="exampleInputEmail1" placeholder="Sangat Baik">'
                    +'</div>'
                    +'<input type="hidden" id="tambahJawabanMultipleVal" value="1">'
                    +'<input type="hidden" name="dataMultiple[]" value="1">'
                    +'<div id="tambahJawabanMultiplex"></div>'
                    +'<div class="form-group">'
                    +'<button id="tambahJawabanMultiple" class="btn btn-primary" value="1">Tambah Jawaban</button>'
                   
                    +'</div>';

                    $('#pilihanMultiple').html(html);
        }
        
    });

    



$(document).on('click','#tambahJawabanSingle', function(e){
    e.preventDefault();
    var html = '';
    html += '<div class="form-group">'
                    +'<label for="exampleInputEmail1">Jawaban</label>'
                    +'<input type="text" name="JawabanPilihanSingle[]" class="form-control" id="exampleInputEmail1" placeholder="Masukan Jawaban">'
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
                    +'<input type="text"  name="JawabanPilihanMultipleDeskripsi'+zx+'[]" class="form-control" id="exampleInputEmail1" placeholder="Masukan Deskripsi">'
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


    $(document).on('click', '#lanjutanJawaban', function(){
        var xx = $(this).val();
        var html = '';
        if(xx == 'aktif'){
            $('#lanjutanJawabanx').removeClass('d-none');
            
            html = '<div class="form-group">'
                    +'<label for="exampleInputEmail1">Jawaban Lanjutkan</label>'
                    +'<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Pertanyaan">'
                    +'</div>';
            $('#lanjutanJawabanx').html(html);
        }else{
          
            $('#lanjutanJawabanx').addClass('d-none');
        }
    }); 


    $('#add').on('click', function(){
            $.ajax({
                type : "POST",
                url  :"<?php echo base_url('admin/Pertanyaan/addPertanyaan')?>",
                dataType : "JSON",
                data : $('#formAdd').serialize(),
                success: function(data){
                    console.log(data);
                    if(data.status == 'success'){
                        console.log("sukses");
                    
                        // Swal.fire({
                        //     icon: 'success',
                        //     title: 'Berhasil',
                        //     text: 'Data Berhasil Di Tambahkan!',
                        
                        // }).then(function() {
                        //     window.location.assign("<?php echo base_url();?>admin/ChatKategori");
                        // });
                    
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