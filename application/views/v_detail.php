<?php 
$this->load->view('v_header');
?>

    <div class="site-section" data-aos="fade">
            <div class="container-fluid">
            <?php 
            foreach ($dokumen->result_array() as $doku) : ?>

                <div class="row justify-content-center">

                    <div class="col-md-7">
                        <div class="row mb-5">
                            <div class="col-12 ">
                                <h2 class="site-section-heading text-center">Acara</h2>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row mb-5">
                    <div class="col-md-7">
                        <img src="<?php echo base_url(), $doku['nama_file']; ?>" alt="Image" class="img-fluid"> 
                    </div>
                    <div class="col-md-4 ml-auto">
                        <h3 class="text-dark"><?php echo $doku['judul'];?></h3>
                        <p><?php echo $doku['deskripsi'];?></p>
                    </div>
                </div>
                <?php endforeach;?>
                <!-- Foto Banyak -->
                <div class="site-section" data-aos="fade">
                    <div class="container-fluid">

                        <div class="row justify-content-center">

                            <div class="col-md-7">
                                <div class="row mb-5">
                                    <div class="col-12 ">
                                        <h2 class="site-section-heading text-center">Foto Lainya</h2>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row" id="lightgallery">
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="<?php echo base_url().'assets/images/big-images/nature_big_1.jpg'?>" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor doloremque hic excepturi fugit, sunt impedit fuga tempora, ad amet aliquid?</p>">
                                <a href="#"><img src="<?php echo base_url().'assets/images/nature_small_1.jpg'?>" alt="IMage" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="<?php echo base_url().'assets/images/big-images/nature_big_2.jpg'?>" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam omnis quaerat molestiae, praesentium. Ipsam, reiciendis. Aut molestiae animi earum laudantium.</p>">
                                <a href="#"><img src="<?php echo base_url().'assets/images/nature_small_2.jpg'?>" alt="IMage" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="<?php echo base_url().'assets/images/big-images/nature_big_3.jpg'?>" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem reiciendis, dolorum illo temporibus culpa eaque dolore rerum quod voluptate doloribus.</p>">
                                <a href="#"><img src="<?php echo base_url().'assets/images/nature_small_3.jpg'?>" alt="IMage" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="<?php echo base_url().'assets/images/big-images/nature_big_4.jpg'?>" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim perferendis quae iusto omnis praesentium labore tempore eligendi quo corporis sapiente.</p>">
                                <a href="#"><img src="<?php echo base_url().'assets/images/nature_small_4.jpg'?>" alt="IMage" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="<?php echo base_url().'assets/images/big-images/nature_big_5.jpg'?>" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, voluptatum voluptate tempore aliquam, dolorem distinctio. In quas maiores tenetur sequi.</p>">
                                <a href="#"><img src="<?php echo base_url().'assets/images/nature_small_5.jpg'?>" alt="IMage" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="<?php echo base_url().'assets/images/big-images/nature_big_6.jpg'?>" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum cum culpa blanditiis illum, voluptatum iusto quisquam mollitia debitis quaerat maiores?</p>">
                                <a href="#"><img src="<?php echo base_url().'assets/images/nature_small_6.jpg'?>" alt="IMage" class="img-fluid"></a>
                            </div>

                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="<?php echo base_url().'assets/images/big-images/nature_big_7.jpg'?>" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores similique impedit possimus, laboriosam enim at placeat nihil voluptatibus voluptate hic!</p>">
                                <a href="#"><img src="<?php echo base_url().'assets/images/nature_small_7.jpg'?>" alt="IMage" class="img-fluid"></a>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="<?php echo base_url().'assets/images/big-images/nature_big_8.jpg'?>" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam vitae sed cum mollitia itaque soluta laboriosam eaque sit ratione, aliquid.</p>">
                                <a href="#"><img src="<?php echo base_url().'assets/images/nature_small_8.jpg'?>" alt="IMage" class="img-fluid"></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Akhir Foto Banyak -->

                <div class="section">
                <h2 class="site-section-heading text-center">Dari Kita Untuk Kampus</h2>
                <div class="row site-section">
                    <div class="col-md-6 col-lg-6 col-xl-4 text-center mb-5">
                        <img src="<?php echo base_url().'assets/empunya/opal1.jpg'?>" alt="Image" class="img-fluid w-50 rounded-circle mb-4">
                        <h2 class="text-white font-weight-light mb-4">Rizki & Ridho</h2>
                        <p class="mb-4">Ikan Hiu Makan Tahu, Gehu</p>
                        <p>
                            <a href="#" class="pl-0 pr-3"><span class="icon-twitter"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-facebook"></span></a>
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-4 text-center mb-5">
                        <img src="<?php echo base_url().'assets/empunya/profill.jpg'?>" alt="Image" class="img-fluid w-50 rounded-circle mb-4">
                        <h2 class="text-white font-weight-light mb-4">Nicholas Saputra</h2>
                        <p class="mb-4">Seni Adalah Ledakan</p>
                        <p>
                            <a href="#" class="pl-0 pr-3"><span class="icon-twitter"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-facebook"></span></a>
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-4 text-center mb-5">
                        <img src="<?php echo base_url().'assets/empunya/ican.jpeg'?>" alt="Image" class="img-fluid w-50 rounded-circle mb-4">
                        <h2 class="text-white font-weight-light mb-4">Ade Londok</h2>
                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur ab quas facilis obcaecati non ea, est odit repellat distinctio incidunt, quia aliquam eveniet quod deleniti impedit sapiente atque tenetur porro?</p>
                        <p>
                            <a href="#" class="pl-0 pr-3"><span class="icon-twitter"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-facebook"></span></a>
                        </p>
                    </div>
                </div>
                </div>
            </div>

        </div>
   
<?php
$this->load->view('v_footer');
