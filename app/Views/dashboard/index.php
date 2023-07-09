<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<section class="section dashboard">
    <div class="row justify-content-center">

        <div class="col-md-3">
            <div class="card info-card sales-card">

                <div class="card-body">
                    <h5 class="card-title">Profil </h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class='bx bx-user-pin text-danger'></i>
                        </div>
                        <div class="ps-3">
                            <h6><?= $profil; ?></h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-3">
            <div class="card info-card sales-card">

                <div class="card-body">
                    <h5 class="card-title">User</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bx bx-user"></i>
                        </div>
                        <div class="ps-3">
                            <h6><?= $user; ?></h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>