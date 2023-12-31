<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<section class="section error-404 min-vh-80 d-flex flex-column align-items-center justify-content-center">
    <h1>404</h1>
    <h2>The page you are looking for doesn't exist.</h2>
    <img src="assets/img/not-found.svg" class="img-fluid py-5" alt="Page Not Found">
</section>
<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>