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
              <h3 class="card-title">Edit Dokumentasi</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?php echo base_url('admin/updatedoku') ?>" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label>Kategori</label>
                  <select name="kategori" class="form-control">
                    <option value="aw">Pilih Kategori</option>
                    <option value="aw">Aw</option>
                    <option value="we">We</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Thumbnail</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="nama_file" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" class="form-control" name="foto[]">
                </div>
                <div class="form-group">
                  <label>Judul</label>
                  <input type="text" name="judul" class="form-control">
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea id="summernote" name="deskripsi" class="form-control">
                    Place <em>some</em> <u>text</u> <strong>here</strong>
                  </textarea>
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