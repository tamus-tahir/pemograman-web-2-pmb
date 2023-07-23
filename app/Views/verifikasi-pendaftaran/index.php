<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

<div class="table-responsive">
    <table class="table table-hover table-bordered w-100" id="data-table">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nomor</th>
                <th scope="col">Status</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($formulir as $row) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $row['nomor']; ?></td>
                    <td><?= getStatus($row['status']); ?></td>
                    <td><?= $row['keterangan']; ?></td>
                    <td class="text-nowrap">
                        <a href="/verifikasipendaftaran/detail/<?= $row['id_formulir']; ?>" class="btn btn-info me-1">
                            <i class='bx bx-check'></i>
                        </a>
                    </td>
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