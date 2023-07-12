<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

<form class="row g-3" method="post" action="/periode/create" id="form">

    <div class="col-12">
        <label for="periode" class="form-label">Periode <span class="text-danger">*</span></label>
        <input type="text" class="form-control <?= validation_show_error('periode') ? 'is-invalid' : ''; ?>" id="periode" name="periode" required>
        <div class="invalid-feedback">
            <?= validation_show_error('periode'); ?>
        </div>
    </div>

    <div class="col-md-3">
        <label for="id_tahun" class="form-label">Tahun Ajaran<span class="text-danger">*</span></label>
        <select class="form-select <?= validation_show_error('id_tahun') ? 'is-invalid' : ''; ?>" id="id_tahun" name="id_tahun" required>
            <option value="">- Pilih Tahun Ajaran -</option>
            <?php foreach ($tahun as $row) : ?>
                <option value="<?= $row['id_tahun']; ?>"><?= $row['tahun']; ?></option>
            <?php endforeach ?>
        </select>
        <div class="invalid-feedback">
            <?= validation_show_error('id_tahun'); ?>
        </div>
    </div>

    <div class="col-md-3">
        <label for="urutan" class="form-label">Urutan <span class="text-danger">*</span></label>
        <input type="number" class="form-control <?= validation_show_error('urutan') ? 'is-invalid' : ''; ?>" id="urutan" name="urutan" required>
        <div class="invalid-feedback">
            <?= validation_show_error('urutan'); ?>
        </div>
    </div>

    <div class="col-md-3">
        <label for="tanggal_mulai_pendaftaran" class="form-label">Tanggal Mulai Pendaftaran <span class="text-danger">*</span></label>
        <input type="date" class="form-control <?= validation_show_error('tanggal_mulai_pendaftaran') ? 'is-invalid' : ''; ?>" id="tanggal_mulai_pendaftaran" name="tanggal_mulai_pendaftaran" required>
        <div class="invalid-feedback">
            <?= validation_show_error('tanggal_mulai_pendaftaran'); ?>
        </div>
    </div>

    <div class="col-md-3">
        <label for="tanggal_selesai_pendaftaran" class="form-label">Tanggal Selesai Pendaftaran <span class="text-danger">*</span></label>
        <input type="date" class="form-control <?= validation_show_error('tanggal_selesai_pendaftaran') ? 'is-invalid' : ''; ?>" id="tanggal_selesai_pendaftaran" name="tanggal_selesai_pendaftaran" required>
        <div class="invalid-feedback">
            <?= validation_show_error('tanggal_selesai_pendaftaran'); ?>
        </div>
    </div>

    <div class="col-md-3">
        <label for="tanggal_ujian" class="form-label">Tanggal Ujian <span class="text-danger">*</span></label>
        <input type="date" class="form-control <?= validation_show_error('tanggal_ujian') ? 'is-invalid' : ''; ?>" id="tanggal_ujian" name="tanggal_ujian" required>
        <div class="invalid-feedback">
            <?= validation_show_error('tanggal_ujian'); ?>
        </div>
    </div>

    <div class="col-md-3">
        <label for="jam_ujian" class="form-label">Jam Ujian <span class="text-danger">*</span></label>
        <input type="time" class="form-control <?= validation_show_error('jam_ujian') ? 'is-invalid' : ''; ?>" id="jam_ujian" name="jam_ujian" required>
        <div class="invalid-feedback">
            <?= validation_show_error('jam_ujian'); ?>
        </div>
    </div>

    <div class="col-md-3">
        <label for="tanggal_wawancara" class="form-label">Tanggal Wawancara <span class="text-danger">*</span></label>
        <input type="date" class="form-control <?= validation_show_error('tanggal_wawancara') ? 'is-invalid' : ''; ?>" id="tanggal_wawancara" name="tanggal_wawancara" required>
        <div class="invalid-feedback">
            <?= validation_show_error('tanggal_wawancara'); ?>
        </div>
    </div>

    <div class="col-md-3">
        <label for="jam_wawancara" class="form-label">Jam Wawancara <span class="text-danger">*</span></label>
        <input type="time" class="form-control <?= validation_show_error('jam_wawancara') ? 'is-invalid' : ''; ?>" id="jam_wawancara" name="jam_wawancara" required>
        <div class="invalid-feedback">
            <?= validation_show_error('jam_wawancara'); ?>
        </div>
    </div>

    <div class="col-12">
        <label for="keterangan" class="form-label">Keterangan </label>
        <textarea class="form-control <?= validation_show_error('keterangan') ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" cols="30" rows="2"></textarea>
        <div class="invalid-feedback">
            <?= validation_show_error('keterangan'); ?>
        </div>
    </div>

    <div class="text-end">
        <a href="/periode" class="btn btn-danger me-1">Cancel</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>

<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>