<!-- Main Content -->

<!-- caraosel -->
<div id="carousel-berita" class="carousel slide mb-4" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php
    foreach ($file as $data => $value) {
      $active = ($data == 0) ? 'active' : '';
      echo '<li data-target="#carousel-berita" data-slide-to="' . $data . '"class="' . $active . '"></li>';
    } ?>
  </ol>
  <div class="carousel-inner">
    <?php
    foreach ($file as $fl => $value) {
      $active = ($fl == 0) ? 'active' : '';
      echo '<div class="carousel-item ' . $active . '">
      <img class="img-fluid" src="' . base_url() . $value['file'] . '">
      <div class="carousel-caption d-none d-md-block">
      <h5>' . $value['judul'] . '</h5>
      <p>' . $value['deskripsi'] . '<p>
      </div>
      </div>';
    } ?>
  </div>
  <!-- control -->
  <a class="carousel-control-prev" href="#carousel-berita" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-berita" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- control -->

<section class="acara" id="acara">
  <div class="container-fluid" data-aos="fade" data-aos-delay="500">
    <div class="row">
      <div class="col-lg-12 text-center text-dark">
        <h2>Acara</h2>
      </div>
      <?php
      foreach ($dokumen->result_array() as $doku) : ?>
        <div class="col-lg-4">
          <div class="image-wrap-2">
            <div class="image-info">
              <h2 class="mb-3"><?php echo substr($doku['judul'], 0, 20); ?></h2>
              <a href="<?php echo base_url('home/detail/') ?><?php echo $doku['id_dokumen']; ?>" class="btn btn-outline-white py-2 px-4">Foto Lainya</a>
            </div>
            <img src="<?php echo $doku['nama_file']; ?>" alt="Image" class="img-fluid">
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>