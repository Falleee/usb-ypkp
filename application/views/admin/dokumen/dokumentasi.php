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
        <a class="btn btn-primary btn-sm" href="<?= base_url('dokumentasi/add/') ?>">Tambah Acara &nbsp;<i class="fas fa-plus"></i>
        </a>
      </div>
      <div class="card-body">
        <table id="example1" class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">
                #
              </th>
              <th style="width: 40%">
                Nama Acara
              </th>
              <th style="width: 20%">
                Penanggung Jawab
              </th>
              <th style="width: 20%">
                Tanggal
              </th>
              <th style="width: 2%" class="text-center">
                Kategori
              </th>
              <th style="width: 10%">
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 0;
            foreach ($dokumen->result_array() as $doku) :
              $no++; ?>
              <tr>
                <td>
                  <?= $no ?>
                </td>
                <td>
                  <a>
                    <?//php echo $doku['judul']; ?>
                    <?php echo substr($doku['judul'], 0, 20); ?>
                  </a>
                </td>
                <td>
                  <ul class="list-inline">
                    <li class="list-inline-item">
                      <p><?= $doku['ketua']?></p>
                    </li>
                  </ul>
                </td>
                <td>
                  <!-- <p><?php echo substr($doku['deskripsi'], 0, 40); ?></p> -->
                  <p><?= $doku['tanggal']?></p>
                </td>
                <td>
                  <span class="badge badge-success"><?= $doku['nama_kategori']; ?></span>
                </td>
                <td class="project-actions text-right">
                  <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                    <span>Menu</span>
                  </button>
                  <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" href="<?= base_url('dokumentasi/detail/') ?><?= $doku['id_dokumen']; ?>"><i class="fas fa-folder"></i> Detail</a>
                    <a class="dropdown-item" href="<?= base_url('dokumentasi/edit/') ?><?= $doku['id_dokumen']; ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-delete<?= $doku['id_dokumen']; ?>"><i class="fas fa-trash"></i> Delete</button>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

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
              <a href="<?php echo base_url('dokumentasi/delete/') ?><?php echo $doku['id_dokumen']; ?>" type="button" class="btn btn-danger">Iya</a>
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