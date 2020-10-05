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

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <!-- <a class="btn btn-primary btn-sm" href="#">Tambah Acara &nbsp;<i class="fas fa-plus"></i>
          </a> -->
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
              <th style="width: 20%">
                Project Name
              </th>
              <th style="width: 30%">
                Team Members
              </th>
              <th style="width: 20%">
                Deskripsi
              </th>
              <th style="width: 2%" class="text-center">
                Kategori
              </th>
              <th style="width: 30%">
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($dokumen->result_array() as $doku) : ?>
              <tr>
                <td>
                  #
                </td>
                <td>
                  <a>
                    <?php echo $doku['judul']; ?>
                  </a>
                  <br />
                  <small>
                    Created 01.01.2019
                  </small>
                </td>
                <td>
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <img alt="Avatar" class="table-avatar" src="<?php echo base_url(), $doku['nama_file']; ?>">
                    </li>
                    <li class="list-inline-item">
                      <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar2.png">
                    </li>
                    <li class="list-inline-item">
                      <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar3.png">
                    </li>
                    <li class="list-inline-item">
                      <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar4.png">
                    </li>
                  </ul>
                </td>
                <td>
                  <p><?= $doku['deskripsi']; ?></p>
                </td>
                <td>
                  <span class="badge badge-success"><?= $doku['nama_kategori'];?></span>
                </td>
                <td class="project-actions text-right">
                  <a class="btn btn-primary btn-sm" href="#">
                    <i class="fas fa-folder">
                    </i>
                    View
                  </a>
                  <a class="btn btn-info btn-sm" href="<?= base_url('admin/edit_dokumentasi') ?>">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                  </a>
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete<?= $doku['id_dokumen']; ?>">
                    <i class="fas fa-trash"></i>
                    Delete
                  </button>
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
            <h4 class="modal-title">Tambah Acara</h4>
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
                  <h3 class="card-title">Acara Baru</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?php echo base_url('admin/create') ?>" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <label class="text-dark">Judul Acara</label>
                      <input type="text" class="form-control" name="judul" placeholder="Masukan Judul Acara" required>
                    </div>
                    <div class="form-group">
                      <label class="text-dark">Kategori</label>
                      <select class="form-control" name="kategori" >
                      <?php
                      foreach ($kategori->result_array() as $ktgr) : ?>
                        <option value="<?= $ktgr['id_kategori'];?>"><?= $ktgr['kategori'];?></option>
                        <?php endforeach;?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile" class="text-dark">Thumbnails</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="nama_file" class="custom-file-input" id="exampleInputFile" required>
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Tambahkan Banyak Foto</label>
                      <input type="file" name="foto[]" class="form-control" multiple="">
                    </div>
                    <div class="form-group">
                      <label class="text-dark">Deskripsi Acara</label>
                      <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10" placeholder="Deskripsi" required></textarea>
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

    <!-- Modal Verifikasi Hapus Foto -->
    <?php
    foreach ($dokumen->result_array() as $doku) : ?>
      <div class="modal fade" id="modal-delete<?= $doku['id_dokumen']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Dokumen</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Anda Yakin Menghapus Data <span><?= $doku['judul']; ?></span>?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
              <a href="<?php echo base_url('admin/delete/') ?><?php echo $doku['id_dokumen']; ?>" type="button" class="btn btn-danger">Iya</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    <?php endforeach; ?>
    <!-- /.modal -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->