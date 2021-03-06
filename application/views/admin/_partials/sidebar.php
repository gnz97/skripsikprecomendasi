<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <!-- Brand Logo -->
    <a href="<?=base_url('admin/Dashboard/')?>" class="brand-link">
      <img src="<?= base_url()?>assets/images/LogoITDA.png" alt="AdminLTE Logo" class="brand-image  elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AlumniITDA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url()?>assets/images/logo.png" class=" elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$this->fungsi->petugas_login()->petugasNama?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              
                <!-- Menu Dashboard -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/Dashboard')?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Menu Hasil Pertanyaan -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/HasilPertanyaan')?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Hasil Pertanyaan</p>
                    </a>
                </li>

                <!-- Menu Data Pertanyaan -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/Pertanyaan')?>" class="nav-link">
                        <i class="nav-icon fa fa-comments"></i>
                        <p>Data Pertanyaan</p>
                    </a>
                </li>

                 <!-- Menu Data Karir -->
                 <li class="nav-item">
                    <a href="<?= base_url('admin/Alumni')?>" class="nav-link">
                        <i class="nav-icon fa fa-graduation-cap "></i>
                        <p>Data Alumni</p>
                    </a>
                </li>
                 <!-- Menu Data Karir -->
                 <li class="nav-item">
                    <a href="<?= base_url('admin/Petugas')?>" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Data Petugas</p>
                    </a>
                </li>



                <!-- Lihat Form -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/FormPertanyaan')?>" class="nav-link">
                        <i class="nav-icon fa fa-eye"></i>
                        <p>Lihat Form</p>
                    </a>
                </li>
            
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>