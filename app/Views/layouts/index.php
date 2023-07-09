<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title; ?></title>
    <?php $config = model('ConfigModel')->getId(1) ?>

    <meta content="<?= $config['description']; ?>" name="description">
    <meta content="<?= $config['keywords']; ?>" name="keywords">
    <meta content="<?= $config['author']; ?>" name="author">

    <!-- Favicons -->
    <link href="/assets/img/<?= $config['logo']; ?>" rel="icon">
    <link href="/assets/img/<?= $config['logo']; ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- plugins CSS Files -->
    <link href="/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/plugins/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/plugins/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/plugins/dataTables/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="/assets/plugins/dataTables/buttons.dataTables.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <div class="flash-success" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
    <div class="flash-error" data-flashdata="<?= session()->getFlashdata('error'); ?>"></div>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="/dashboard" class="logo d-flex align-items-center">
                <img src="/assets/img/<?= $config['logo']; ?>" alt="">
                <span class="d-none d-lg-block"><?= $config['appname']; ?></span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown pe-3">
                    <?php $user = model('UserModel')->getId(session('id_user')) ?>
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="/assets/img/<?= $user['foto'] ? $user['foto'] : 'noprofil.png'; ?>" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?= $user['nama']; ?></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?= $user['nama']; ?></h6>
                            <span><?= $user['profil']; ?></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/dashboard/profil">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/dashboard/editprofil">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/dashboard/editpassword">
                                <i class="bi bi-question-circle"></i>
                                <span>Change Password</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <!-- ambil menu berdaarkan profil yang login -->
            <?php $navigasi = model('AksesModel')->getNavigasiProfil(session('id_profil')) ?>

            <?php foreach ($navigasi as $row) : ?>

                <!-- periksa apakah menu utama -->
                <?php if ($row['dropdown'] == 0) : ?>

                    <!-- periksas jika submenu ada -->
                    <?php $submenu = model('AksesModel')->getSubmenuProfil($row['id_navigasi'], session('id_profil')) ?>

                    <!-- jika tidak ada submenu -->
                    <?php if (!$submenu) : ?>
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="/<?= $row['url']; ?>">
                                <i class="<?= $row['icon']; ?>"></i>
                                <span><?= $row['menu']; ?></span>
                            </a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link collapsed" data-bs-target="#components-nav-<?= $row['id_navigasi']; ?>" data-bs-toggle="collapse" href="<?= $row['url']; ?>">
                                <i class='<?= $row['icon']; ?>'></i><span><?= $row['menu']; ?></span><i class="bi bi-chevron-down ms-auto"></i>
                            </a>
                            <ul id="components-nav-<?= $row['id_navigasi']; ?>" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                                <?php foreach ($submenu as $submenu) : ?>
                                    <li>
                                        <a href="/<?= $submenu['url']; ?>">
                                            <i class="<?= $submenu['icon']; ?>"></i><span><?= $submenu['menu']; ?></span>
                                        </a>
                                    </li>
                                <?php endforeach ?>

                            </ul>
                        </li>
                    <?php endif ?>

                <?php endif ?>

            <?php endforeach ?>

            <!-- End Components Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main mb-5">

        <div class="pagetitle card p-3">
            <h1><?= $title; ?></h1>
        </div>

        <div class="<?= $title != 'Dashboard' ? 'card p-3' : ''; ?> mb-5">
            <?= $this->renderSection('content'); ?>
        </div>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span><?= $config['copyright']; ?></span></strong>
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- logout modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Anda Yakin ingin Logout?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <a href="/auth/logout" class="btn btn-primary">Yes</a>
                </div>
            </div>
        </div>
    </div>

    <!-- end logout modal -->

    <?= $this->renderSection('modal'); ?>

    <!-- plugins JS Files -->
    <script src="/assets/plugins/jquery/jquery-3.7.0.min.js"></script>
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/plugins/parsley/parsley.min.js"></script>
    <script src="/assets/plugins/sweetalert2/sweetalert2@11"></script>

    <script src="/assets/plugins/dataTables/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/dataTables/dataTables.bootstrap5.min.js"></script>
    <script src="/assets/plugins/dataTables/dataTables.buttons.min.js"></script>
    <script src="/assets/plugins/dataTables/jszip.min.js"></script>
    <script src="/assets/plugins/dataTables/pdfmake.min.js"></script>
    <script src="/assets/plugins/dataTables/vfs_fonts.js"></script>
    <script src="/assets/plugins/dataTables/buttons.html5.min.js"></script>
    <script src="/assets/plugins/dataTables/buttons.print.min.js"></script>

    <script src="/assets/plugins/highcharts/highcharts.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/script.js"></script>

    <?= $this->renderSection('script'); ?>

</body>

</html>
