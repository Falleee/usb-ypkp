<?php
$this->load->view('v_header');
?>

<!-- caraosel -->
<div id="carouselExampleCaptions" class="carousel slide mb-4" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url() . 'assets/images/img1.jpg' ?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url() . 'assets/images/img1.jpg' ?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url() . 'assets/images/img1.jpg' ?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- caraosel -->



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
              <h2 class="mb-3"><?php echo $doku['judul']; ?></h2>
              <a href="<?php echo base_url('home/detail/')?><?php echo $doku['id'] ;?>" class="btn btn-outline-white py-2 px-4">More Photos</a>
            </div>
              <img src="<?php echo $doku['nama_file']; ?>" alt="Image" class="img-fluid">
          </div>
        </div>
      <?php endforeach; ?>
      <div class="col-lg-4">
        <div class="image-wrap-2">
          <div class="image-info">
            <h2 class="mb-3">Portrait</h2>
            <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>
          </div>
          <img src="<?php echo base_url() . 'assets/images/img_2.jpg' ?>" alt="Image" class="img-fluid">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="image-wrap-2">
          <div class="image-info">
            <h2 class="mb-3">People</h2>
            <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>
          </div>
          <img src="<?php echo base_url() . 'assets/images/img_3.jpg' ?>" alt="Image" class="img-fluid">
        </div>
      </div>

      <div class="col-lg-4">
        <div class="image-wrap-2">
          <div class="image-info">
            <h2 class="mb-3">Architecture</h2>
            <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>
          </div>
          <img src="<?php echo base_url() . 'assets/images/img_4.jpg' ?>" alt="Image" class="img-fluid">
        </div>
      </div>

      <div class="col-lg-4">
        <div class="image-wrap-2">
          <div class="image-info">
            <h2 class="mb-3">Animals</h2>
            <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>
          </div>
          <img src="<?php echo base_url() . 'assets/images/img_5.jpg' ?>" alt="Image" class="img-fluid">
        </div>
      </div>

      <div class="col-lg-4">
        <div class="image-wrap-2">
          <div class="image-info">
            <h2 class="mb-3">Sports</h2>
            <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>
          </div>
          <img src="<?php echo base_url() . 'assets/images/img_6.jpg' ?>" alt="Image" class="img-fluid">
        </div>
      </div>

      <div class="col-lg-4">
        <div class="image-wrap-2">
          <div class="image-info">
            <h2 class="mb-3">Travel</h2>
            <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>
          </div>
          <img src="<?php echo base_url() . 'assets/images/img_7.jpg' ?>" alt="Image" class="img-fluid">
        </div>
      </div>

      <div class="col-lg-4">
        <div class="image-wrap-2">
          <div class="image-info">
            <h2 class="mb-3">People</h2>
            <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>
          </div>
          <img src="<?php echo base_url() . 'assets/images/img_3.jpg' ?>" alt="Image" class="img-fluid">
        </div>
      </div>

      <div class="col-lg-4">
        <div class="image-wrap-2">
          <div class="image-info">
            <h2 class="mb-3">Architecture</h2>
            <a href="single.html" class="btn btn-outline-white py-2 px-4">More Photos</a>
          </div>
          <img src="<?php echo base_url() . 'assets/images/img_4.jpg' ?>" alt="Image" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</section>

<?php
$this->load->view('v_footer');
