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
                            <form  id="formAdd">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nim</label>
                                        <input type="text" name="alumniNim" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nim">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">NIK</label>
                                        <input type="text" name="alumniNik" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nik">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">NPWP</label>
                                        <input type="text" name="alumniNpwp" class="form-control" id="exampleInputEmail1" placeholder="Masukan Npwp">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama</label>
                                        <input type="text" name="alumniNama" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Jurusan</label>
                                        <input type="text" name="alumniJurusan" class="form-control" id="exampleInputEmail1" placeholder="Masukan Jurusan">
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
                                        <input type="text" name="alumniNoWa" class="form-control" id="exampleInputEmail1" placeholder="Masukan No Wa">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="text" name="alumniEmail" class="form-control" id="exampleInputEmail1" placeholder="Masukan Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Username</label>
                                        <input type="text" name="alumniUsername" class="form-control" id="exampleInputEmail1" placeholder="Masukan Username">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Password</label>
                                        <input type="text" name="alumniPassword" class="form-control" id="exampleInputEmail1" placeholder="Masukan Password">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Alamat</label>
                                        <textarea name="alumniAlamat" class="form-control" id="" cols="30" rows="10" placeholder="Masukan Alamat"></textarea>
                                        <!-- <input type="text" name="alumniAlamat" class="form-control" id="exampleInputEmail1" placeholder="Masukan Alamat"> -->
                                    </div>
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
            console.log("Hello");
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

        $('#add').on('click', function(){
            $.ajax({
                type : "POST",
                url  :"<?php echo base_url('admin/Alumni/AddAlumni')?>",
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