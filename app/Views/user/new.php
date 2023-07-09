<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

<form class="row g-3" method="post" action="/user/create" id="form" enctype="multipart/form-data">

    <div class="col-md-3">
        <label for="foto" class="form-label">Upload Foto </label>
        <label for="foto" class="form-label"><span class="text-danger">(Type PNG/JPG/JPEG, Max Size 500Kb)</span></label>
        <input class="form-control <?= validation_show_error('foto') ? 'is-invalid' : ''; ?>" type="file" id="upload" name="foto">
        <div class="invalid-feedback">
            <?= validation_show_error('foto'); ?>
        </div>
        <img src="/assets/img/noprofil.png" alt="" width="100%" class="mt-3 rounded" id="preview">
    </div>

    <div class="col-md-9">

        <div class="mb-3">
            <label for="id_profil" class="form-label">Profil <span class="text-danger">*</span></label>
            <select class="form-select <?= validation_show_error('id_profil') ? 'is-invalid' : ''; ?>" id="id_profil" name="id_profil" required>
                <option value="">- Pilih Profil -</option>
                <?php foreach ($profil as $row) : ?>
                    <option value="<?= $row['id_profil']; ?>"><?= $row['profil']; ?></option>
                <?php endforeach ?>
            </select>
            <div class="invalid-feedback">
                <?= validation_show_error('id_profil'); ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
            <input type="text" class="form-control <?= validation_show_error('username') ? 'is-invalid' : ''; ?>" id="username" name="username" required>
            <div class="invalid-feedback">
                <?= validation_show_error('username'); ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password <span class="text-danger">* (Min 8 Karakter)</span></label>
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

        <div class="mb-3">
            <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
            <input type="text" class="form-control <?= validation_show_error('nama') ? 'is-invalid' : ''; ?>" id="nama" name="nama" required>
            <div class="invalid-feedback">
                <?= validation_show_error('nama'); ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="telpon" class="form-label">Telpon </label>
            <input type="text" class="form-control <?= validation_show_error('telpon') ? 'is-invalid' : ''; ?>" id="telpon" name="telpon">
            <div class="invalid-feedback">
                <?= validation_show_error('telpon'); ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="aktif" class="form-label">Aktif <span class="text-danger">*</span></label>
            <select class="form-select <?= validation_show_error('aktif') ? 'is-invalid' : ''; ?>" id="aktif" name="aktif" required>
                <option value="1">Yes</option>
                <option value="0">NO</option>
            </select>
            <div class="invalid-feedback">
                <?= validation_show_error('aktif'); ?>
            </div>
        </div>
    </div>



    <div class="text-end">
        <a href="/user" class="btn btn-danger me-1">Cancel</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>

<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>