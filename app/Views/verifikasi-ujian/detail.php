<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

<div class="mb-3">
    <a href="/formulir" class="btn btn-warning">Kembali</a>
</div>

<div class="row g-3">

    <div class="col-md-3">
        <img src="/assets/img/<?= $formulir['foto']; ?>" alt="" class="rounded w-100" height="300">
    </div>

    <div class="col-md-9">
        <table class="table">
            <tr>
                <td width="200px">Nomor Pendaftaran</td>
                <td width="10px">:</td>
                <td><?= $formulir['nomor']; ?></td>
            </tr>
            <tr>
                <td>Tanggal Pendaftaran</td>
                <td>:</td>
                <td><?= tanggalIndoTime($formulir['formulir_created_at']); ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $formulir['nama_pendaftar']; ?></td>
            </tr>
            <tr>
                <td>Telpon</td>
                <td>:</td>
                <td><?= $formulir['telpon_pendaftar']; ?></td>
            </tr>
            <tr>
                <td>Pilihan Pertama</td>
                <td>:</td>
                <td><?= getProdi($formulir['pilihan_pertama']); ?></td>
            </tr>
            <tr>
                <td>Pilihan Kedua</td>
                <td>:</td>
                <td><?= getProdi($formulir['pilihan_kedua']); ?></td>
            </tr>
        </table>
    </div>

    <div class="col-md-8">
        <form class="row g-3" method="post" action="/verifikasiujian/update/<?= $formulir['id_formulir']; ?>" id="form" enctype="multipart/form-data">

            <div class="col-md-6">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <select class="form-select <?= validation_show_error('status') ? 'is-invalid' : ''; ?>" id="status" name="status" required>
                    <option value="">- Pilih Status -</option>
                    <option value="4" <?= $formulir['status'] == 4 ? 'selected' : ''; ?>>Berkas Formulir Diterima</option>
                    <option value="5" <?= $formulir['status'] == 5 ? 'selected' : ''; ?>>Tidak Lulus Ujian</option>
                    <option value="6" <?= $formulir['status'] == 6 ? 'selected' : ''; ?>>Lulus Ujian</option>
                </select>
                <div class="invalid-feedback">
                    <?= validation_show_error('status'); ?>
                </div>
            </div>

            <div class="col-md-6">
                <label for="prodi_lulus" class="form-label">Lulus Pada Prodi </label>
                <select class="form-select <?= validation_show_error('prodi_lulus') ? 'is-invalid' : ''; ?>" id="prodi_lulus" name="prodi_lulus">
                    <option value="">- Pilih Prodi -</option>

                    <option value="<?= $formulir['pilihan_pertama']; ?>" <?= $formulir['pilihan_pertama'] == $formulir['prodi_lulus'] ? 'selected' : ''; ?>><?= getProdi($formulir['pilihan_pertama']); ?></option>

                    <option value="<?= $formulir['pilihan_kedua']; ?>" <?= $formulir['pilihan_kedua'] == $formulir['prodi_lulus'] ? 'selected' : ''; ?>><?= getProdi($formulir['pilihan_kedua']); ?></option>
                </select>
                <div class="invalid-feedback">
                    <?= validation_show_error('prodi_lulus'); ?>
                </div>
            </div>

            <div class="col-12">
                <label for="keterangan" class="form-label">Keterangan </label>
                <textarea class="form-control <?= validation_show_error('keterangan') ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" cols="30" rows="2"><?= $formulir['keterangan']; ?></textarea>
                <div class="invalid-feedback">
                    <?= validation_show_error('keterangan'); ?>
                </div>
            </div>

            <div class="text-end">
                <a href="/formulir" class="btn btn-danger me-1">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>


</div>
<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>