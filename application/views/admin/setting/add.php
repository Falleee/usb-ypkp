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
                            <a href="<?php echo base_url('setting/') ?>" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="<?php echo base_url('setting/update') ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" name="judul" value="<?= $data->judul ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text" name="deskripsi" value="<?= $data->deskripsi ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Slide</label><br>
                                    <img src="<?= base_url(). $data->file?>" width="50%">
                                </div>
                                <!-- /.card-body -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <input type="text" name="id" value="<?=$data->id?>" hidden>
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