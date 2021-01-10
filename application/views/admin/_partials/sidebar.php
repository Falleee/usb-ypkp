  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('admin') ?>" class="brand-link">
      <img src="<?php echo base_url() . 'assets/images/logo.png' ?>" alt="AdminLTE Logo" class="brand-image">
      <span class="brand-text font-weight-light">USB-YPKP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->

        <div class="info">
          <a href="#" class="d-block">
            <i class="fas fa-fw fa-user" style="width: auto;"></i>
            <?= $login['nama']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url('admin') ?>" class="nav-link <?= $this->uri->segment(1) == 'admin' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('dokumentasi') ?>" class="nav-link <?= $this->uri->segment(1) == 'dokumentasi' || $this->uri->segment(2) == 'edit_dokumentasi' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Dokumentasi
              </p>
            </a>
          </li>
          <?php if ($login['role'] == 1) : ?>
            <li class="nav-item">
              <a href="<?php echo base_url('user') ?>" class="nav-link <?= $this->uri->segment(1) == 'user' || $this->uri->segment(2) == 'editusers'  ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Anggota
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url('setting') ?>" class="nav-link <?= $this->uri->segment(1) == 'setting' ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-bars"></i>
                <p>
                  Pengaturan
                </p>
              </a>
            </li>
          <?php endif ?>
          <li class="nav-item">
            <a href="<?php echo base_url('login/logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>