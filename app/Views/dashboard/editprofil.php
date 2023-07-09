<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<form class="row g-3" method="post" action="/dashboard/updateprofil" id="form" enctype="multipart/form-data">

    <div class="col-md-3">
        <label for="foto" class="form-label">Upload Foto </label>
        <label for="foto" class="form-label"><span class="text-danger">(Type PNG/JPG/JPEG, Max Size 500Kb)</span></label>
        <input class="form-control <?= validation_show_error('foto') ? 'is-invalid' : ''; ?>" type="file" id="upload" name="foto">
        <div class="invalid-feedback">
            <?= validation_show_error('foto'); ?>
        </div>
        <img src="/assets/img/<?= $user['foto'] ? $user['foto'] : 'noprofil.png'; ?>" alt="" width="100%" class="mt-3 rounded" id="preview">
    </div>

    <input type="hidden" name="foto_lama" value="<?= $user['foto']; ?>">

    <div class="col-md-9">

        <div class="mb-3">
            <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
            <input type="text" class="form-control <?= validation_show_error('username') ? 'is-invalid' : ''; ?>" id="username" name="username" required value="<?= $user['username']; ?>">
            <div class="invalid-feedback">
                <?= validation_show_error('username'); ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
            <input type="text" class="form-control <?= validation_show_error('nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" required value="<?= $user['nama']; ?>">
            <div class="invalid-feedback">
                <?= validation_show_error('nama'); ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="telpon" class="form-label">Telpon </label>
            <input type="text" class="form-control <?= validation_show_error('telpon') ? 'is-invalid' : ''; ?>" id="telpon" name="telpon" value="<?= $user['telpon']; ?>">
            <div class="invalid-feedback">
                <?= validation_show_error('telpon'); ?>
            </div>
        </div>

    </div>

    <div class="text-end">
        <a href="/dashboard" class="btn btn-danger me-1">Cancel</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>
<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>