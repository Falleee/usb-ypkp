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
            <li class="breadcrumb-item"><a href="<?= base_url('') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">User</a></li>
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
              <a href="<?php echo base_url('user/') ?>" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

            <form action="<?php echo base_url('user/update/') ?><?php echo $user->no_induk; ?>" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label>No Induk</label>
                  <input type="text" name="no_induk" value="<?= $user->no_induk; ?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" value="<?= $user->nama; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select name="role" id="inputStatus" class="form-control custom-select">
                  <?php if (isset($user)): ?>
                    <option value="1" <?php if($user->role=='1') echo "selected"?>>Admin</option>
                    <option value="0" <?php if($user->role=='0') echo "selected"?>>Member</option>
                    <?php else: ?>
                    <option>Admin</option>
                    <option>Member</option>
                    <?php endif ?>
                  </select>
                </div>
                <div class="form-group">
                <label for="">Kata Sandi</label></div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.card -->
</div>
<!-- /.content-wrapper -->