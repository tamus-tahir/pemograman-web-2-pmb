<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

<form class="row g-3" method="post" action="/formulir/create" id="form" enctype="multipart/form-data">

    <div class="col-md-6">
        <label for="nama_pendaftar" class="form-label">Nama Sesuai Ijazah <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= validation_show_error('nama_pendaftar') ? 'is-invalid' : ''; ?>" id="nama_pendaftar" name="nama_pendaftar" required>
        <div class="invalid-feedback">
            <?= validation_show_error('nama_pendaftar'); ?>
        </div>
    </div>
    <div class="col-md-6">
        <label for="telpon_pendaftar" class="form-label">Telpon <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= validation_show_error('telpon_pendaftar') ? 'is-invalid' : ''; ?>" id="telpon_pendaftar" name="telpon_pendaftar" required>
        <div class="invalid-feedback">
            <?= validation_show_error('telpon_pendaftar'); ?>
        </div>
    </div>

    <div class="col-md-6">
        <label for="pilihan_pertama" class="form-label">Pilihan Pertama <span class="text-danger">*</span></label>
        <select class="form-select <?= validation_show_error('pilihan_pertama') ? 'is-invalid' : ''; ?>" id="pilihan_pertama" name="pilihan_pertama" required>
            <option value="">- Pilih Prodi -</option>
            <?php foreach ($prodi as $row) : ?>
                <option value="<?= $row['id_prodi']; ?>"><?= $row['prodi']; ?></option>
            <?php endforeach ?>
        </select>
        <div class="invalid-feedback">
            <?= validation_show_error('pilihan_pertama'); ?>
        </div>
    </div>
    <div class="col-md-6">
        <label for="pilihan_kedua" class="form-label">Pilihan Kedua <span class="text-danger">*</span></label>
        <select class="form-select <?= validation_show_error('pilihan_kedua') ? 'is-invalid' : ''; ?>" id="pilihan_kedua" name="pilihan_kedua" required>
            <option value="">- Pilih Prodi -</option>
            <?php foreach ($prodi as $row) : ?>
                <option value="<?= $row['id_prodi']; ?>"><?= $row['prodi']; ?></option>
            <?php endforeach ?>
        </select>
        <div class="invalid-feedback">
            <?= validation_show_error('pilihan_kedua'); ?>
        </div>
    </div>


    <div class="col-md-4">
        <label for="foto" class="form-label">Upload Foto <span class="text-danger">*</span></label>
        <label for="foto" class="form-label"><span class="text-danger">(Type PNG/JPG/JPEG, Max Size 500Kb)</span></label>
        <input class="form-control <?= validation_show_error('foto') ? 'is-invalid' : ''; ?>" type="file" id="upload" name="foto">
        <div class="invalid-feedback">
            <?= validation_show_error('foto'); ?>
        </div>
        <div class="text-center">
            <img src="/assets/img/noprofil.png" alt="" width="60%" class="mt-3 rounded" id="preview">
        </div>
    </div>

    <div class="col-md-4">
        <label for="ijazah" class="form-label">Upload Ijazah <span class="text-danger">*</span></label>
        <label for="ijazah" class="form-label"><span class="text-danger">(Type PNG/JPG/JPEG, Max Size 500Kb)</span></label>
        <input class="form-control <?= validation_show_error('ijazah') ? 'is-invalid' : ''; ?>" type="file" id="upload-2" name="ijazah">
        <div class="invalid-feedback">
            <?= validation_show_error('ijazah'); ?>
        </div>
        <div class="text-center">
            <img src="/assets/img/no-image.png" alt="" width="60%" class="mt-3 rounded" id="preview-2">
        </div>
    </div>

    <div class="col-md-4">
        <label for="pembayaran_pendaftaran" class="form-label">Upload Bukti Pembayaran <span class="text-danger">*</span></label>
        <label for="pembayaran_pendaftaran" class="form-label"><span class="text-danger">(Type PNG/JPG/JPEG, Max Size 500Kb)</span></label>
        <input class="form-control <?= validation_show_error('pembayaran_pendaftaran') ? 'is-invalid' : ''; ?>" type="file" id="upload-3" name="pembayaran_pendaftaran">
        <div class="invalid-feedback">
            <?= validation_show_error('pembayaran_pendaftaran'); ?>
        </div>
        <div class="text-center">
            <img src="/assets/img/no-image.png" alt="" width="60%" class="mt-3 rounded" id="preview-3">
        </div>
    </div>


    <div class="text-end">
        <a href="/formulir" class="btn btn-danger me-1">Cancel</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>

<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>