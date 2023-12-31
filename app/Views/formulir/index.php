<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

<div class="mb-3">
    <a href="/formulir/new" class="btn btn-primary">Tambah</a>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered w-100" id="data-table">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nomor</th>
                <th scope="col">Status</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Prodi Lulus</th>
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
                    <td><?= getProdi($row['prodi_lulus']); ?></td>
                    <td class="text-nowrap">

                        <a href="/formulir/detail/<?= $row['id_formulir']; ?>" class="btn btn-info me-1">
                            <i class='bx bxs-show'></i>
                        </a>
                        <?php if ($row['status'] <= 2) : ?>
                            <a href="/formulir/edit/<?= $row['id_formulir']; ?>" class="btn btn-warning me-1">
                                <i class='bx bx-edit-alt'></i>
                            </a>
                            <a href="/formulir/delete/<?= $row['id_formulir']; ?>" class="btn btn-danger btn-delete">
                                <i class='bx bx-trash'></i>
                            </a>
                        <?php else : ?>
                            <a href="/formulir/pdf/<?= $row['id_formulir']; ?>" class="btn btn-success me-1">
                                <i class='bx bxs-file-pdf'></i>
                            </a>
                        <?php endif ?>
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