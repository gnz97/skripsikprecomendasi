<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this ->load->view('user/_partials/head.php');?>
</head>

<body class="hold-transition sidebar-mini">
<?php $this ->load->view('user/_partials/navbar.php');?>

<div class="jumbotron jumbotron-fluid bg1">
  <div class="container">
    <h1 class="display-4 text-light">Welcome</h1>
    <p class="lead text-light">Selamat Datang.</p>
    <a class="btn btn-primary" href="<?= base_url('user/Pertanyaan')?>">Isi Pertanyaan</a>
  </div>
</div>

<!-- JS -->
<?php $this->load->view('admin/_partials/js.php');?>
<!-- /Js -->
</body>
</html>