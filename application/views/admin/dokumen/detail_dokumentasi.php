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
                        <form action="<?php echo base_url('dokumentasi') ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Acara</label>
                                    <input type="text" name="judul" value="<?= $doku->judul; ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Penanggung Jawab</label>
                                    <input type="text" name="penanggungjawab" value="<?= $doku->ketua; ?>" class="form-control" readonly>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tema</label>
                                            <input type="text" name="tema" value="<?= $doku->tema; ?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <input type="text" value="<?= $doku->nama_kategori; ?>" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" name="tanggal" value="<?= $doku->tanggal; ?>" class="form-control" readonly>
                                </div>


                                <div class="form-group">
                                    <label for="row">Thumbnail</label>
                                </div>
                                <div class="row" id="lightgallery1">
                                    <div class="form-group col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="<?php echo base_url() . $doku->nama_file; ?>">
                                        <img class="form-group" src="<?php echo base_url(), $doku->nama_file; ?>" alt="" width="50%">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    
                                    <textarea name="xdesk" id="ckeditor" disabled><?= isset($doku->deskripsi) ? $doku->deskripsi : set_value('deskripsi') ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="row"> Berkas Lainya</label>
                                    <!-- batas -->
                                </div>
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
                                                                <td><?= $no ?></td>
                                                                <td><?= $brks->foto ?></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td>
                                                                    <a href="<?= base_url('upload/') . $brks->foto ?>" target="_blank" src="<?= base_url('upload/') . $brks->foto ?>" class="btn btn-info btn-sm">
                                                                        <i class="fas fa-download">
                                                                        </i>
                                                                        Download
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                        </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="lightgallery">
                                    <?php
                                    foreach ($berkas as $brks) : ?>
                                        <?php if ($brks->extension == 'jpg' || $brks->extension == 'png' || $brks->extension == 'gif' || $brks->extension == 'jpeg') : ?>
                                            <div class="form-group col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="<?php echo base_url('/upload/') . $brks->foto; ?>">
                                                <img src="<?php echo base_url('/upload/') . $brks->foto; ?>" alt="Image" class="img-fluid">
                                            </div>
                                        <?php endif ?>
                                    <?php endforeach; ?>
                                </div>

                                <!-- /.card-body -->
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