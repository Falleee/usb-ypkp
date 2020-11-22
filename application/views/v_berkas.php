<!-- Main Content -->

<section class="acara" id="acara">
  <div class="container-fluid" data-aos="fade" data-aos-delay="500">
    <div class="row">
      <div class="col-lg-12 text-center text-dark">
        <h2>Berkas</h2>
      </div>
      <?php
      foreach ($dokumen->result_array() as $doku) : ?>
        <div class="col-lg-4">
          <div class="image-wrap-2">
            <div class="image-info">
              <h2 class="mb-3"><?php  echo substr($doku['judul'] ,0,40); ?></h2>
              <a href="<?php echo base_url('home/detail/')?><?php echo $doku['id_dokumen'] ;?>" class="btn btn-outline-white py-2 px-4">More Photos</a>
            </div>
              <img src="<?php echo $doku['nama_file']; ?>" alt="Image" class="img-fluid">
          </div>
        </div>
      <?php endforeach; ?>
      
    </div>
  </div>
</section>

