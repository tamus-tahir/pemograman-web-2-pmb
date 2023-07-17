<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <?php $config = model('ConfigModel')->getId(1) ?>
    <?php $informasi = model('InformasiModel')->getId(1) ?>
    <title><?= $config['appname']; ?> || <?= $title; ?></title>

    <meta content="<?= $config['description']; ?>" name="description">
    <meta content="<?= $config['keywords']; ?>" name="keywords">
    <meta content="<?= $config['author']; ?>" name="author">

    <!-- Favicons -->
    <link href="/assets/img/<?= $config['logo']; ?>" rel="icon">
    <link href="/assets/img/<?= $config['logo']; ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/front/vendor/aos/aos.css" rel="stylesheet">
    <link href="/front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/front/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/front/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/front/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/front/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/front/css/style.css" rel="stylesheet">

    <style>
        .maps iframe {
            width: 100%;
        }
    </style>

    <!-- =======================================================
  * Template Name: Techie
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/techie-free-skin-bootstrap-3/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center justify-content-between">
            <h1 class="logo"><a href="index.html"><?= $config['appname']; ?></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="/front/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="/">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="/informasi-pendaftaran">Informasi</a></li>
                    <li><a class="nav-link scrollto" href="/registrasi-camaba">Registrasi</a></li>
                    <li><a class="nav-link scrollto " href="/auth">Login</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container-fluid" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>UNITAMA</h1>
                    <h2>Universitas Teknologi Akba Makassar</h2>
                    <div><a href="/registrasi-camaba" class="btn-get-started scrollto">Daftar</a></div>
                </div>
                <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
                    <img src="/assets/img/<?= $config['logo']; ?>" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <?= $this->renderSection('content'); ?>

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Kontak Kami</h2>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="info-box mb-4">
                            <i class="bx bx-map"></i>
                            <h3>Alamat</h3>
                            <p><?= $informasi['alamat']; ?></p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-envelope"></i>
                            <h3>Email </h3>
                            <p><?= $informasi['email']; ?></p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-phone-call"></i>
                            <h3>Telpon</h3>
                            <p><?= $informasi['telpon']; ?></p>
                        </div>
                    </div>

                </div>

                <div class="row">

                    <div class="col-12 maps">
                        <?= $informasi['maps']; ?>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="container">

            <div class="copyright-wrap d-md-flex py-4">
                <div class="me-md-auto text-center text-md-start">
                    <div class="copyright">
                        <?= $config['copyright']; ?>
                    </div>
                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/techie-free-skin-bootstrap-3/ -->
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                </div>
            </div>

        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="/front/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/front/vendor/aos/aos.js"></script>
    <script src="/front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/front/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/front/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/front/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/front/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/front/js/main.js"></script>

</body>

</html>