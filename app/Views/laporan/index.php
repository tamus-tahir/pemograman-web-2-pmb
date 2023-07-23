<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

<div>
    <form action="/laporan/filter" class="row g-2 mb-3">

        <div class="col-md-6">
            <select class="form-select " id="status" name="status" required>
                <option value="">- Pilih Status -</option>
                <option value="All">Semua Data</option>
                <option value="5">Tidak Lulus</option>
                <option value="6">Lulus</option>
            </select>
        </div>

        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>

    </form>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered w-100" id="export-table">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nomor</th>
                <th scope="col">Nama</th>
                <th scope="col">Telpon</th>
                <th scope="col">Status</th>
                <th scope="col">Prodi Lulus</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($formulir as $row) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $row['nomor']; ?></td>
                    <td><?= $row['nama_pendaftar']; ?></td>
                    <td><?= $row['telpon_pendaftar']; ?></td>
                    <td><?= getStatus($row['status']); ?></td>
                    <td><?= getProdi($row['prodi_lulus']); ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>


<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>