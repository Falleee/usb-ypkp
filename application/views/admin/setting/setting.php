<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <!-- <?= $this->session->flashdata('message'); ?> -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1><?= $title; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">Home</a></li>
            <li class="breadcrumb-item active"><?= $title; ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-slider">
          Tambah Slider
        </button>
      </div>
      <div class="card-body p-0">
        <table id="example1" class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">
                No
              </th>
              <th>
                Judul
              </th>
              <th style="width:30%">
                Deskripsi
              </th>
              <th>
                Foto
              </th>
              <th style="width: 30%">
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 0;
            foreach ($slide as $data) : $no++; ?>
              <tr>
                <td>
                  <?= $no ?>
                </td>
                <td><?= $data->judul?></td>
                <td><p><?php echo substr($data->deskripsi,0, 40); ?></p></td>
                <td><a href="<?= base_url(). $data->file; ?>" target="_blank"><img class="form-group" src="<?php echo base_url(). $data->file; ?>" alt="" width="50%"></a></td>
                <td class="project-actions text-right fa-fw">
                  <a type="button" href="<?= base_url(). 'setting/edit/'.$data->id?>" class="btn btn-success btn-sm">
                    <i class="fas fa-cog">
                    </i>
                    Edit
                  </a>
                  <a type="button" href="<?= base_url(). 'setting/delete/'.$data->id?>" class="btn btn-danger btn-sm">
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
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-lg">
          Tambah Kategori <i class="fas fa-plus"></i>
        </button>
      </div>
      <div class="card-body p-0">
        <table id="example1" class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">
                No
              </th>
              <th style="width: 30%">
              </th>
              <th>
              </th>
              <th style="width: 40%">
                Nama Kategori
              </th>
              <th style="width: 2%" class="text-center">
              </th>
              <th style="width: 30%">
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 0;
            foreach ($kategori->result_array() as $ktgr) : $no++; ?>
              <tr>
                <td>
                  <?= $no ?>
                </td>
                <td>
                  <a>
                  </a>
                  <br />
                </td>
                <td>

                </td>
                <td>
                  <p><?php echo $ktgr['kategori']; ?></p>
                </td>
                <td>
                  <span class="badge badge-success"></span>
                </td>
                <td class="project-actions text-right fa-fw">
                  <button type="button" data-target="#modal-delete<?= $ktgr['id_kategori']; ?>" data-toggle="modal" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash">
                    </i>
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

    <!-- modal -->
    <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Kategori</h4>
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
                  <h3 class="card-title">Kategori Baru</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?php echo base_url('setting/add_kategori') ?>" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label class="text-dark">Kategori</label>
                      <input type="text" class="form-control" name="kategori" placeholder="Masukan Kategori">
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
    <!-- akhir modal -->
    <!-- modal -->
    <div class="modal fade" id="modal-slider">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Slider</h4>
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
                  <h3 class="card-title">Slider</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?php echo base_url('setting/add_slider') ?>" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <label class="text-dark">Judul</label>
                      <input type="text" class="form-control" name="judul" placeholder="Masukan Kategori">
                    </div>
                    <div class="form-group">
                      <label class="text-dark">Deskripsi</label>
                      <input type="text" class="form-control" name="deskripsi" placeholder="Masukan Kategori">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile" class="text-dark">Slider</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="file" class="custom-file-input" id="exampleInputFile" required>
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
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
    <!-- akhir modal -->
    <?php
    foreach ($kategori->result_array() as $ktgr) : ?>
      <div class="modal fade" id="modal-delete<?= $ktgr['id_kategori']; ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Dokumen</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Anda Yakin Menghapus Kategori <span><?= $ktgr['kategori']; ?></span>?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
              <a type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</a>
              <a href="<?php echo base_url('setting/delete_kategori/') ?><?php echo $ktgr['id_kategori']; ?>" class="btn btn-danger btn-sm">Iya</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    <?php endforeach; ?>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->