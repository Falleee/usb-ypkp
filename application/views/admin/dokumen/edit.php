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
            <li class="breadcrumb-item"><a href="<?= base_url('dokumentasi') ?>">Dokumentasi</a></li>
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
              <a href="<?php echo base_url('dokumentasi/') ?>" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?php echo base_url('dokumentasi/update/') ?><?= $doku->id_dokumen; ?>" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label>Nama Acara</label>
                  <input type="text" name="judul" value="<?= $doku->judul; ?>" class="form-control">
                </div>
                <div class="form-group">
                  <label>Kategori</label>
                  <select name="kategori" id="inputStatus" class="form-control custom-select">
                    <?php
                    foreach ($kategori->result_array() as $ktgr) : ?>
                      <option value="<?= $ktgr['id_kategori']; ?>"><?= $ktgr['kategori']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Thumbnails</label><br>
                  <a href="<?php echo base_url(), $doku->nama_file; ?>" target="_blank"><img class="form-group" src="<?php echo base_url(), $doku->nama_file; ?>" alt="" width="20%"></a>
                  <!-- <a href="<?= base_url() . $this->uri->segment(1) . '/deletethumbnails/' . $this->uri->segment(3); ?>" class="btn btn-danger btn-sm">Delete</a> -->
                </div>
                <div class="form-group">
                  <label>Berkas Lainya</label><br>
                  <input type="file" class="form-control" name="foto[]" multiple="">
                </div>
                <!-- Batas -->
                <div class="form-group">
                  <div class="card">
                    <div class="card-body p-0">
                      <table class="table table-striped projects">
                        <thead>
                          <tr>
                            <th style="width: 1%">
                              No
                            </th>
                            <th style="width: 20%">
                              Nama Berkas
                            </th>
                            <th style="width: 10%">
                            </th>
                            <th>
                            </th>
                            <th style="width: 8%">
                            </th>
                            <th style="width: 40%">
                            </th>
                          </tr>
                        </thead>
                        <?php $no = 0;
                        foreach ($berkas as $brks) : $no++ ?>
                          <?php if ($brks->extension == 'pdf' || $brks->extension == 'xlsx' || $brks->extension == 'doc' || $brks->extension == 'zip' || $brks->extension == 'rar') : ?>
                            <tbody>
                              <tr>
                                <td>
                                  <?= $no ?>
                                </td>
                                <td>
                                  <?= $brks->foto ?>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="project-actions text-right">
                                  <a href="<?= base_url('upload/') . $brks->foto ?>" target="_blank" src="<?= base_url('upload/') . $brks->foto ?>" class="btn btn-info btn-sm">
                                    <i class="fas fa-download">
                                    </i>
                                    Download
                                  </a>
                                  <a class="btn btn-danger btn-sm" href="<?= base_url() . $this->uri->segment(1) . '/deletefoto/' . $this->uri->segment(3) . '/' . $brks->id; ?>">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                  </a>
                                </td>
                              </tr>
                          <?php else: ?>
                            <img src="<?php echo base_url('/upload/') . $brks->foto; ?>" width="10%">
                            <a href="<?= base_url() . $this->uri->segment(1) . '/deletefoto/' . $this->uri->segment(3) . '/' . $brks->id; ?>" class="btn btn-danger btn-sm">Delete</a>
                            <?php endif ?>
                          <?php endforeach ?>
                            </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea name="deskripsi" class="form-control">
                  <?= $doku->deskripsi; ?>  
                </textarea>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
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