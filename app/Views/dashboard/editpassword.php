<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<form class="row g-3" method="post" action="/dashboard/updatepassword" id="form">

    <div class="mb-3">
        <label for="passwordlama" class="form-label">Password Lama <span class="text-danger">* (Min 8 Karakter)</span></label>
        <input type="password" class="form-control <?= validation_show_error('passwordlama') ? 'is-invalid' : ''; ?>" id="passwordlama" name="passwordlama" required minlength="8">
        <div class="invalid-feedback">
            <?= validation_show_error('passwordlama'); ?>
        </div>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password Baru <span class="text-danger">* (Min 8 Karakter)</span></label>
        <input type="password" class="form-control <?= validation_show_error('password') ? 'is-invalid' : ''; ?>" id="password" name="password" required minlength="8">
        <div class="invalid-feedback">
            <?= validation_show_error('password'); ?>
        </div>
    </div>

    <div class="mb-3">
        <label for="passwordkonfirmasi" class="form-label">Konfirmasi Password <span class="text-danger">* (Min 8 Karakter)</span></label>
        <input type="password" class="form-control <?= validation_show_error('passwordkonfirmasi') ? 'is-invalid' : ''; ?>" id="passwordkonfirmasi" name="passwordkonfirmasi" required minlength="8" data-parsley-equalto="#password">
        <div class="invalid-feedback">
            <?= validation_show_error('passwordkonfirmasi'); ?>
        </div>
    </div>

    <div>
        <a href="/dashboard" class="btn btn-danger me-1">Cancel</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>
<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>