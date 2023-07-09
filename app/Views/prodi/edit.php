<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

<form class="row g-3" method="post" action="/prodi/update/<?= $prodi['id_prodi']; ?>" id="form">

    <div class="col-12">
        <label for="prodi" class="form-label">Program Studi <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= validation_show_error('prodi') ? 'is-invalid' : ''; ?>" id="prodi" name="prodi" required value="<?= $prodi['prodi']; ?>">
        <div class="invalid-feedback">
            <?= validation_show_error('prodi'); ?>
        </div>
    </div>

    <div class="col-md-3">
        <label for="akreditasi" class="form-label">Akreditasi <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= validation_show_error('akreditasi') ? 'is-invalid' : ''; ?>" id="akreditasi" name="akreditasi" required value="<?= $prodi['akreditasi']; ?>">
        <div class="invalid-feedback">
            <?= validation_show_error('akreditasi'); ?>
        </div>
    </div>

    <div class="col-md-3">
        <label for="icon" class="form-label">Icon <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= validation_show_error('icon') ? 'is-invalid' : ''; ?>" id="icon" name="icon" required value="<?= $prodi['icon']; ?>">
        <div class="invalid-feedback">
            <?= validation_show_error('icon'); ?>
        </div>
    </div>

    <div class="col-md-3">
        <label for="color" class="form-label">Color <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= validation_show_error('color') ? 'is-invalid' : ''; ?>" id="color" name="color" required value="<?= $prodi['color']; ?>">
        <div class="invalid-feedback">
            <?= validation_show_error('color'); ?>
        </div>
    </div>

    <div class="col-md-3">
        <label for="urutan" class="form-label">Urutan <span class="text-danger">*</span></label>
        <input type="number" class="form-control <?= validation_show_error('urutan') ? 'is-invalid' : ''; ?>" id="urutan" name="urutan" required value="<?= $prodi['urutan']; ?>">
        <div class="invalid-feedback">
            <?= validation_show_error('urutan'); ?>
        </div>
    </div>

    <div class="col-12">
        <label for="keterangan" class="form-label">Keterangan <span class="text-danger">*</span></label>
        <textarea class="form-control <?= validation_show_error('keterangan') ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" required cols="30" rows="2"><?= $prodi['keterangan']; ?></textarea>
        <div class="invalid-feedback">
            <?= validation_show_error('keterangan'); ?>
        </div>
    </div>

    <div class="text-end">
        <a href="/prodi" class="btn btn-danger me-1">Cancel</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>

<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>