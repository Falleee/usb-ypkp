<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1><?= $title; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><?= $title; ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php
            foreach ($user->result_array() as $usr) : ?>
            <form action="<?php echo base_url('admin/updateusers/') ?><?php echo $usr['no_induk']; ?>" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label>No Induk</label>
                  <input type="text" name="no_induk" value="<?= $usr['no_induk'];?>" class="form-control">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" value="<?= $usr['nama'];?>" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Role</label>
                  <input type="text" name="role" value="<?= $usr['role'];?>" class="form-control" required>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <?php endforeach;?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.card -->
</div>
<!-- /.content-wrapper -->