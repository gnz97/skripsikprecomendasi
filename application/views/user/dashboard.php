<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this ->load->view('user/_partials/head.php');?>
</head>

<body class="hold-transition sidebar-mini">
<?php $this ->load->view('user/_partials/navbar.php');?>

<div class="jumbotron jumbotron-fluid bg1">
  <div class="container text-center">

  <!-- <img src="img/profile1.png" width="300"> -->

    <h1 class="display-4 text-light mt-5">Welcome</h1>
    <p class="lead text-light">Isi Pertanyaan Di Bawah ini</p>
    <br>
    <a class="btn btn-primary" href="<?= base_url('user/Pertanyaan')?>">Isi Pertanyaan</a>
  </div>

  <!-- <div class="container">
    <h1 class="display-4 text-light">Welcome</h1>
    <p class="lead text-light">Selamat Datang.</p>
    
  </div> -->
</div>

<!-- JS -->
<?php $this->load->view('admin/_partials/js.php');?>
<!-- /Js -->
</body>
</html>