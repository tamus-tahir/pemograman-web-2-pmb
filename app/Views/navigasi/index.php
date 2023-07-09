<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

<div class="mb-3">
    <a href="/navigasi/new" class="btn btn-primary">Tambah</a>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered w-100" id="data-table">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Menu</th>
                <th scope="col">URL</th>
                <th scope="col">Icon</th>
                <th scope="col">Dropdown</th>
                <th scope="col">Urutan</th>
                <th scope="col">Aktif</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($navigasi as $row) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $row['menu']; ?></td>
                    <td><?= $row['url']; ?></td>
                    <td>
                        <i class="<?= $row['icon']; ?>"></i>
                    </td>
                    <td><?= $row['dropdown'] == 0 ? 'root' : getMenu($row['dropdown']); ?></td>
                    <td><?= $row['urutan']; ?></td>
                    <td><?= $row['aktif'] == 1 ? 'Yes' : 'No'; ?></td>
                    <td class="text-nowrap">
                        <a href="/navigasi/edit/<?= $row['id_navigasi']; ?>" class="btn btn-warning me-1">
                            <i class='bx bx-edit-alt'></i>
                        </a>

                        <?php $cek = model('NavigasiModel')->getSubmenu($row['id_navigasi']) ?>
                        <?php if (!$cek) : ?>
                            <a href="/navigasi/delete/<?= $row['id_navigasi']; ?>" class="btn btn-danger btn-delete">
                                <i class='bx bx-trash'></i>
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