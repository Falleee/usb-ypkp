<div class="site-section" data-aos="fade">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="row mb-5">
                    <div class="col-12 ">
                        <h2 class="site-section-heading text-center"><?= $doku->judul ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-7">
                <img src="<?php echo base_url() . $doku->nama_file; ?>" alt="Image" class="img-fluid">
                Tema:<button type="button" class="btn btn-light m-2"><?= $doku->nama_kategori; ?></button>
            </div>
            <div class="col-md-4 ml-auto">
                <h3 class="text-dark"></h3>
                <p><?php echo $doku->deskripsi; ?></p>
            </div>
        </div>
        <!-- Foto Banyak -->
        <div class="site-section" data-aos="fade">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <div class="row mb-5">
                            <div class="col-12 ">
                                <h2 class="site-section-heading text-center">Berkas Lainya</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="lightgallery">
                    <?php $no = 0;
                    foreach ($file as $brks) : $no++ ?>
                        <?php if ($brks->extension == 'jpg' || $brks->extension == 'png' || $brks->extension == 'gif' || $brks->extension == 'jpeg') : ?>
                            <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="<?php echo base_url('/upload/') . $brks->foto; ?>" data-sub-html="<h4><?php echo $doku->judul; ?></h4><p><?php echo $doku->deskripsi; ?></p>">
                                <a href="#"><img src="<?php echo base_url('/upload/') . $brks->foto; ?>" alt="IMage" class="img-fluid"></a>
                            </div>
                        <?php endif ?>
                    <?php endforeach; ?>
                </div>
                <?php if (isset($file)) : ?>
                    <div class="col-12">
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
                                    foreach ($file as $brks) :
                                        $no++ ?>
                                        <?php if ($brks->extension == 'pdf'  || $brks->extension == 'xlsx' || $brks->extension == 'doc' || $brks->extension == 'zip' || $brks->extension == 'rar') : ?>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <?= $no ?>
                                                    </td>
                                                    <td>
                                                        <?= $brks->foto ?>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td class="project-actions text-right">
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
                <?php endif; ?>
            </div>
            <!-- Akhir Foto Banyak -->

            <div class="section">
                <h2 class="site-section-heading text-center">Dari Kita Untuk Kampus</h2>
                <div class="row site-section">
                    <div class="col-md-6 col-lg-6 col-xl-4 text-center mb-5">
                        <img src="<?php echo base_url() . 'assets/empunya/opal1.jpg' ?>" alt="Image" class="img-fluid w-50 rounded-circle mb-4">
                        <h2 class="text-white font-weight-light mb-4">Rizki & Ridho</h2>
                        <p class="mb-4">Ikan Hiu Makan Tahu, Gehu</p>
                        <p>
                            <a href="#" class="pl-0 pr-3"><span class="icon-twitter"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-facebook"></span></a>
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-4 text-center mb-5">
                        <img src="<?php echo base_url() . 'assets/empunya/profill.jpg' ?>" alt="Image" class="img-fluid w-50 rounded-circle mb-4">
                        <h2 class="text-white font-weight-light mb-4">Nicholas Saputra</h2>
                        <p class="mb-4">Seni Adalah Ledakan</p>
                        <p>
                            <a href="#" class="pl-0 pr-3"><span class="icon-twitter"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-facebook"></span></a>
                        </p>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-4 text-center mb-5">
                        <img src="<?php echo base_url() . 'assets/empunya/ican.jpeg' ?>" alt="Image" class="img-fluid w-50 rounded-circle mb-4">
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
</div>