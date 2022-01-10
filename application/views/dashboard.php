<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>
  <?php $this ->load->view('user/_partials/head.php');?>
  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>APLIKASI</b>SMART</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login Admin/User</p>

      

      <div class="social-auth-links text-center mb-3">
        
        <a href="<?=site_url('admin/AuthAdmin/login')?>" class="btn btn-block btn-primary btn-lg">
          Login Admin
        </a>
        <a href="<?=site_url('user/AuthUser/login')?>" class="btn btn-block btn-success btn-lg">
         Login User
        </a>
      </div>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->

<?php $this->load->view('user/_partials/js.php');?>
</body>
</html>
