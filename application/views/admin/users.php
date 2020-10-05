<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <?= $this->session->flashdata('message'); ?>
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

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-lg">
          Tambah Data <i class="fas fa-plus"></i>
        </button>
      </div>
      <div class="card-body p-0">
        <table id="example1" class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">
                #
              </th>
              <th style="width: 30%">
                Nama
              </th>
              <th>
              </th>
              <th style="width: 40%">
                Nomer Induk
              </th>
              <th style="width: 2%" class="text-center">
                Status
              </th>
              <th style="width: 30%">
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($user->result_array() as $usr) : ?>
              <tr>
                <td>
                  #
                </td>
                <td>
                  <a>
                    <?php echo $usr['nama']; ?>
                  </a>
                  <br />
                  <small>
                    Active
                  </small>
                </td>
                <td>
                  <ul class="list-inline">
                    <!-- Biar Rapih Aja Ini Hehe -->
                  </ul>
                </td>
                <td>
                  <p><?= $usr['no_induk']; ?></p>
                </td>
                <td>
                  <span class="badge badge-success"><?= $usr['role']; ?></span>
                </td>
                <td class="project-actions text-right fa-fw">
                  <a href="<?= base_url('admin/editusers/') ?><?= $usr['no_induk']; ?>" class="btn btn-info btn-sm">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                  </a>
                  <a href="<?php echo base_url('admin/deleteusers/') ?><?php echo $usr['no_induk']; ?>" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash">
                    </i>
                    Delete
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- modal -->
    <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Users</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Default box -->
            <div class="card">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Users Baru</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?php echo base_url('admin/createusers') ?>" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label class="text-dark">Nama</label>
                      <input type="text" class="form-control" name="nama" placeholder="Masukan Nama" value="<?= set_value('nama'); ?>">
                      <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                      <label class="text-dark">No Induk</label>
                      <input type="text" class="form-control" name="no_induk" placeholder="Masukan Nomer Induk" value="<?= set_value('no_induk'); ?>">
                      <?= form_error('no_induk', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                      <label class="text-dark">Role</label>
                      <input type="text" class="form-control" name="role" placeholder="Masukan Role" value="<?= set_value('role'); ?>">
                      <?= form_error('role', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                      <label class="text-dark">Password</label>
                      <input name="password1" class="form-control" id="password1" type="password" placeholder="Passwords">
                      <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                      <label class="text-dark">Konfirmasi Password</label>
                      <input name="password2" class="form-control" type="password" id="password2" placeholder="Passwords">
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </div>

    <!-- modal -->
    <?php
    foreach ($user->result_array() as $usr) : ?>
      <div class="modal fade" id="modal-edit<?= $usr['no_induk']; ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Default box -->
              <div class="card">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Users Baru</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form action="<?php echo base_url('admin/updateusers/') ?><?php echo $usr['no_induk']; ?>" method="post">
                    <div class="card-body">
                      <div class="form-group">
                        <label class="text-dark">Nama</label>
                        <input type="text" class="form-control" name="nama" value="<?= $usr['nama']; ?>" placeholder="Masukan Nama" required>
                      </div>
                      <div class="form-group">
                        <label class="text-dark">No Induk</label>
                        <input type="text" class="form-control" name="no_induk" value="<?= $usr['no_induk']; ?>" placeholder="Masukan Nomer Induk" readonly>
                      </div>
                      <div class="form-group">
                        <label class="text-dark">Role</label>
                        <input type="text" class="form-control" name="role" placeholder="Masukan Role" value="<?= $usr['role']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label class="text-dark">Password</label>
                        <input name="password" class="form-control" type="password" placeholder="Passwords" required>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>
    <?php endforeach; ?>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->