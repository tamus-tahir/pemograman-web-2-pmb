<?= $this->extend('front/template/index'); ?>

<?= $this->section('content'); ?>
<section id="services" class="services section-bg mt-5">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2><?= $title; ?></h2>
        </div>

        <div class="card p-3 shadow">
            <?= $informasi['informasi']; ?>
        </div>

    </div>
</section>
<?= $this->endSection(); ?>