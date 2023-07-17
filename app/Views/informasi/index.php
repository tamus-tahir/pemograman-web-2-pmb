<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

<form class="row g-3" method="post" action="/informasi/update" id="form" enctype="multipart/form-data">

    <div class="col-md-6">
        <label for="id_tahun" class="form-label">Tahun Ajaran <span class="text-danger">*</span></label>
        <select class="form-select <?= validation_show_error('id_tahun') ? 'is-invalid' : ''; ?>" id="id_tahun" name="id_tahun" required>
            <option value="">- Pilih Tahun Ajaran -</option>
            <?php foreach ($tahun as $row) : ?>
                <option value="<?= $row['id_tahun']; ?>" <?= $informasi['id_tahun'] == $row['id_tahun'] ? 'selected' : ''; ?>><?= $row['tahun']; ?></option>
            <?php endforeach ?>
        </select>
        <div class="invalid-feedback">
            <?= validation_show_error('id_tahun'); ?>
        </div>
    </div>

    <div class="col-md-6">
        <label for="id_periode" class="form-label">Periode <span class="text-danger">*</span></label>
        <select class="form-select <?= validation_show_error('id_periode') ? 'is-invalid' : ''; ?>" id="id_periode" name="id_periode" required>
            <option value="">- Pilih Periode -</option>
            <?php foreach ($periode as $row) : ?>
                <option value="<?= $row['id_periode']; ?>" <?= $informasi['id_periode'] == $row['id_periode'] ? 'selected' : ''; ?>><?= $row['periode']; ?></option>
            <?php endforeach ?>
        </select>
        <div class="invalid-feedback">
            <?= validation_show_error('id_periode'); ?>
        </div>
    </div>

    <div class="col-12">
        <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= validation_show_error('alamat') ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" required value="<?= $informasi['alamat']; ?>">
        <div class="invalid-feedback">
            <?= validation_show_error('alamat'); ?>
        </div>
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
        <input type="email" class="form-control <?= validation_show_error('email') ? 'is-invalid' : ''; ?>" id="email" name="email" required value="<?= $informasi['email']; ?>">
        <div class="invalid-feedback">
            <?= validation_show_error('email'); ?>
        </div>
    </div>
    <div class="col-md-6">
        <label for="telpon" class="form-label">Telpon <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= validation_show_error('telpon') ? 'is-invalid' : ''; ?>" id="telpon" name="telpon" required value="<?= $informasi['telpon']; ?>">
        <div class="invalid-feedback">
            <?= validation_show_error('telpon'); ?>
        </div>
    </div>

    <div class="col-12">
        <label for="maps" class="form-label">Maps <span class="text-danger">*</span></label>
        <textarea class="form-control <?= validation_show_error('maps') ? 'is-invalid' : ''; ?>" id="maps" name="maps" required cols="30" rows="3"><?= $informasi['maps']; ?></textarea>
        <div class="invalid-feedback">
            <?= validation_show_error('maps'); ?>
        </div>
    </div>

    <div class="col-12">
        <label for="informasi" class="form-label">Informasi <span class="text-danger">*</span></label>
        <textarea class="form-control ckeditor <?= validation_show_error('informasi') ? 'is-invalid' : ''; ?>" id="informasi" name="informasi" required cols="30" rows="2"><?= $informasi['informasi']; ?></textarea>
        <div class="invalid-feedback">
            <?= validation_show_error('informasi'); ?>
        </div>
    </div>


    <div class="text-end">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>

<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>