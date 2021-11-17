  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">ITDA ALUMNI</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="<?=site_url('user/Dashboard')?>">Home <span class="sr-only">(current)</span></a>
        </li>
      
      
        
      </ul>
      <!-- <form class="form-inline my-2 my-lg-0"> -->
        <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search"> -->
        <ul class="navbar-nav ml-auto">
          
      <li class="nav-item dropdown user-menu show">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
            <span class="d-none d-md-inline"><?=$this->fungsi->alumni_login()->alumniNama?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right hide">
            <!-- User image -->
            <li class="user-header bg-primary">
              <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

              <p>
              <?=$this->fungsi->alumni_login()->alumniNama?> - Web Developer
                <small>Member since Nov. 2012</small>
              </p>
            </li>
            <!-- Menu Body -->
            
            <!-- Menu Footer-->
            <li class="user-footer">
              <a href="<?=site_url('user/BiodataAlumni')?>" class="btn btn-default btn-flat">Profile</a>
              <a href="<?=site_url('AuthUser/logout')?>" class="btn btn-default btn-flat float-right">Sign out</a>
            </li>
          </ul>
        </li>

      </ul>
      <!-- </form> -->
    </div>
  </nav>