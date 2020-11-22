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
            <?php if ($this->uri->segment(2) == "add" || $this->uri->segment(2) == "create") : ?>
              <form action="<?php echo base_url('dokumentasi/create') ?>" method="post" enctype="multipart/form-data">
              <?php else : ?>
                <form action="<?php echo base_url('dokumentasi/update/') ?><?= $doku->id_dokumen; ?>" method="post" enctype="multipart/form-data">
                <?php endif ?>
                <div class="card-body">
                  <div class="form-group">
                    <label class="text-dark">Judul Acara</label>
                    <input type="text" class="form-control" name="judul" value="<?= isset($doku->judul) ? $doku->judul : set_value('judul') ?>" placeholder="Masukan Judul Acara" required>
                  </div>
                  <div class="form-group">
                    <label class="text-dark">Penanggung Jawab / Ketua Acara</label>
                    <input type="text" class="form-control" value="<?= isset($doku->ketua) ? $doku->ketua : set_value('ketua') ?>" name="ketua" placeholder="Masukan Penanggung Jawab" required>
                  </div>
                  <div class="form-group">
                    <label for="inputStatus" class="text-dark">Kategori</label><br>
                    <select id="inputStatus" class="form-control col-8 custom-select" name="kategori">
                      <?php
                      foreach ($kategori->result_array() as $ktgr) : ?>
                        <option value="<?= $ktgr['id_kategori']; ?>"><?= $ktgr['kategori']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="text-dark">Tema</label>
                    <input type="text" class="form-control" name="tema" value="<?= isset($doku->tema) ? $doku->tema : set_value('tema') ?>" placeholder="Masukan Tema" required>
                  </div>
                  <div class="form-group">
                    <label>Date:</label>
                    <div class="input-group date col-8" id="reservationdate" data-target-input="nearest">
                      <input type="text" value="<?= isset($doku->tanggal) ? $doku->tanggal : set_value('tanggal') ?>" class="form-control datetimepicker-input" name="tanggal" data-target="#reservationdate" />
                      <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile" class="text-dark">Thumbnails</label>
                    <?php if ($this->uri->segment(2) == "add" || $this->uri->segment(2) == "create") : ?>
                      <div class="input-group col-8">
                        <div class="custom-file">
                          <input type="file" name="nama_file" class="custom-file-input" id="exampleInputFile" required>
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                    <?php else : ?>
                      <a href="<?php echo base_url(), $doku->nama_file; ?>" target="_blank"><img class="form-group" src="<?php echo base_url(), $doku->nama_file; ?>" alt="" width="20%"></a>
                    <?php endif ?>
                  </div>
                  <div class="form-group">
                    <label>Upload File</label>
                    <input type="file" name="foto[]" class="form-control col-8" multiple="">
                  </div>
                  <?php if ($this->uri->segment(2) == "edit") : ?>
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
                                <?php else : ?>
                                  <img src="<?php echo base_url('/upload/') . $brks->foto; ?>" width="10%">
                                  <a href="<?= base_url() . $this->uri->segment(1) . '/deletefoto/' . $this->uri->segment(3) . '/' . $brks->id; ?>" class="btn btn-danger btn-sm">Delete</a>
                                <?php endif ?>
                              <?php endforeach ?>
                                </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  <?php endif ?>
                  <div class="form-group">
                    <label class="text-dark">Deskripsi Acara</label>
                    <textarea name="deskripsi" class="form-control" cols="30" rows="10" placeholder="Deskripsi" required><?= isset($doku->deskripsi) ? $doku->deskripsi : set_value('deskripsi')?></textarea>
                  </div>
                </div>
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