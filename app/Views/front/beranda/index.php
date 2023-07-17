<?= $this->extend('front/template/index'); ?>

<?= $this->section('content'); ?>
<!-- ======= Program Studi ======= -->
<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Program Studi</h2>
        </div>

        <div class="row gy-4 justify-content-center">
            <?php $delayProdi = 100  ?>
            <?php foreach ($prodi as $row) : ?>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="<?= $delayProdi += 200; ?>">
                    <div class="icon-box iconbox-<?= $row['color']; ?>">
                        <div class="icon">
                            <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                            </svg>
                            <i class="<?= $row['icon']; ?>"></i>
                        </div>
                        <h4><?= $row['prodi']; ?></h4>
                        <p><?= $row['keterangan']; ?></p>

                        <span class="badge text-bg-primary mt-3"><?= $row['akreditasi']; ?></span>

                    </div>
                </div>
            <?php endforeach ?>

        </div>

    </div>
</section>
<!-- End Program Studi -->

<!-- ======= Periode Pendaftaran ======= -->
<section id="features" class="features">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Periode Pendaftaran</h2>
        </div>

        <div class="row">
            <div class="col-lg-6 ">
                <?php $delayPeriode = 100  ?>
                <?php foreach ($periode as $row) : ?>
                    <div class="icon-box mt-5 mt-lg-0 mb-4" data-aos="fade-right" data-aos-delay="<?= $delayPeriode += 200; ?>">
                        <i class="bx bx-receipt"></i>
                        <h4><?= $row['periode']; ?></h4>
                        <p>Tanggal Pendaftaran : <?= tanggalIndo($row['tanggal_mulai_pendaftaran']); ?> - <?= tanggalIndo($row['tanggal_selesai_pendaftaran']); ?></p>
                        <p>Tanggal Ujian : <?= tanggalIndo($row['tanggal_ujian']); ?> <?= $row['jam_ujian']; ?></p>
                        <p>Tanggal Wawancara : <?= tanggalIndo($row['tanggal_wawancara']); ?> <?= $row['jam_wawancara']; ?></p>
                        <p><?= $row['keterangan']; ?></p>
                    </div>
                <?php endforeach ?>

            </div>
            <div class="image col-lg-6 " data-aos="zoom-in" data-aos-delay="100">
                <img src="/front/img/features.svg" alt="" class="img-fluid">
            </div>
        </div>

    </div>
</section>
<!-- End Periode Pendaftaran -->

<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Pricing</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="box">
                    <h3>Free</h3>
                    <h4><sup>$</sup>0<span> / month</span></h4>
                    <ul>
                        <li>Aida dere</li>
                        <li>Nec feugiat nisl</li>
                        <li>Nulla at volutpat dola</li>
                        <li class="na">Pharetra massa</li>
                        <li class="na">Massa ultricies mi</li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="#" class="btn-buy">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                <div class="box featured">
                    <h3>Business</h3>
                    <h4><sup>$</sup>19<span> / month</span></h4>
                    <ul>
                        <li>Aida dere</li>
                        <li>Nec feugiat nisl</li>
                        <li>Nulla at volutpat dola</li>
                        <li>Pharetra massa</li>
                        <li class="na">Massa ultricies mi</li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="#" class="btn-buy">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                <div class="box">
                    <h3>Developer</h3>
                    <h4><sup>$</sup>29<span> / month</span></h4>
                    <ul>
                        <li>Aida dere</li>
                        <li>Nec feugiat nisl</li>
                        <li>Nulla at volutpat dola</li>
                        <li>Pharetra massa</li>
                        <li>Massa ultricies mi</li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="#" class="btn-buy">Buy Now</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                <div class="box">
                    <span class="advanced">Advanced</span>
                    <h3>Ultimate</h3>
                    <h4><sup>$</sup>49<span> / month</span></h4>
                    <ul>
                        <li>Aida dere</li>
                        <li>Nec feugiat nisl</li>
                        <li>Nulla at volutpat dola</li>
                        <li>Pharetra massa</li>
                        <li>Massa ultricies mi</li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="#" class="btn-buy">Buy Now</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Pricing Section -->
<?= $this->endSection(); ?>