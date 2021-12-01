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
                <form  id="formAdd">
                    <input type="hidden" name="alumniID" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nim" value="<?=$rowAlumni->alumniID?>">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nim</label>
                                <input type="text" name="alumniNim" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nim" value="<?=$rowAlumni->alumniNim?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">NIK</label>
                                <input type="text" name="alumniNik" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nik" value="<?=$rowAlumni->alumniNik?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">NPWP</label>
                                <input type="text" name="alumniNpwp" class="form-control" id="exampleInputEmail1" placeholder="Masukan Npwp" value="<?=$rowAlumni->alumniNpwp?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" name="alumniNama" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama" value="<?=$rowAlumni->alumniNama?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Prodi</label>
                                <input type="text" name="alumniProdi" class="form-control" id="exampleInputEmail1" placeholder="Masukan Prodi" value="<?=$rowAlumni->alumniProdi?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fakultas</label>
                                <input type="text" name="alumniFakultas" class="form-control" id="exampleInputEmail1" placeholder="Masukan alumniFakultas" value="<?=$rowAlumni->alumniFakultas?>">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tahun Lulus</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <!-- <input type="text" class="form-control float-right" id="reservation"> -->
                                    <input type="text" name="alumniThnLulus" id="datepicker" class="form-control"  placeholder="Masukan Tahun Lulus">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">No Wa</label>
                                <input type="text" name="alumniNoWa" class="form-control" id="exampleInputEmail1" placeholder="Masukan No Wa" value="<?=$rowAlumni->alumniNoWA?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" name="alumniEmail" class="form-control" id="exampleInputEmail1" placeholder="Masukan Email" value="<?=$rowAlumni->alumniEmail?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" name="alumniUsername" class="form-control" id="exampleInputEmail1" placeholder="Masukan Username" value="<?=$rowAlumni->alumniUsername?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="text" name="alumniPassword" class="form-control" id="exampleInputEmail1" placeholder="Masukan Password" value="<?=$rowAlumni->alumniPassword?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <input type="text" name="alumniAlamat" class="form-control" id="exampleInputEmail1" placeholder="Masukan Alamat" value="<?=$rowAlumni->alumniAlamat?>">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="add">Submit</button>
                        </div>
                    </form>            
            </div>
             
            </div>

        </div>
    </section>



<!-- JS -->
<?php $this->load->view('admin/_partials/js.php');?>
<!-- /Js -->

<script>
      

     

      $(document).ready(function(){
          $("form :input").attr("autocomplete", "off");
          $('#datepicker').datepicker({
              format: "yyyy",
              weekStart: 1,
              orientation: "bottom",
              language: "{{ app.request.locale }}",
              keyboardNavigation: false,
              viewMode: "years",
              minViewMode: "years"
          });
          console.log("Hello");
      $('#add').on('click', function(){
          $.ajax({
              type : "POST",
              url  :"<?php echo base_url('user/BiodataAlumni/editAlumni')?>",
              dataType : "JSON",
              data : $('#formAdd').serialize(),
              success: function(data){
                  console.log(data);
                  // if(data.status == 'success'){
                  //     console.log("sukses");
                  
                  //     Swal.fire({
                  //         icon: 'success',
                  //         title: 'Berhasil',
                  //         text: 'Data Berhasil Di Tambahkan!',
                      
                  //     }).then(function() {
                  //         window.location.assign("<?php echo base_url();?>admin/ChatKategori");
                  //     });
                  
                  // }else{
                  //     $('.gejalaCode_error').html(data.gejalaCode);
                  //     $('.gejalaNama_error').html(data.gejalaNama);
                  // } 
              }
          });
          return false;
      });
      }); 
  </script>
</body>
</html>