<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    
<!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        
    <li class="nav-item dropdown user-menu show">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <img src="<?=base_url()?>assets/images/logo.png" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline"><?=$this->fungsi->petugas_login()->petugasNama?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="<?=base_url()?>assets/images/logo.png" class="elevation-2" alt="User Image">

            <p>
            <?=$this->fungsi->petugas_login()->petugasNama?> - Web Developer
              <small>Member since Nov. 2012</small>
            </p>
          </li>
          <!-- Menu Body -->
          
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="#" class="btn btn-default btn-flat">Profile</a>
            <a href="<?=site_url('admin/AuthAdmin/logout')?>" class="btn btn-default btn-flat float-right">Sign out</a>
          </li>
        </ul>
      </li>

    </ul>



    

  </nav>
  <!-- /.navbar -->


  
