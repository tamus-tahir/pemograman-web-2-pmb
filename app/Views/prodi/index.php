<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

<div class="mb-3">
    <a href="/prodi/new" class="btn btn-primary">Tambah</a>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered w-100" id="data-table">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Prodi</th>
                <th scope="col">Akreditasi</th>
                <th scope="col">Icon</th>
                <th scope="col">Color</th>
                <th scope="col">Urutan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($prodi as $row) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $row['prodi']; ?></td>
                    <td><?= $row['akreditasi']; ?></td>
                    <td><i class="<?= $row['icon']; ?>"></i></td>
                    <td><?= $row['color']; ?></td>
                    <td><?= $row['urutan']; ?></td>
                    <td class="text-nowrap">
                        <button type="button" class="btn btn-info me-1 btn-detail" data-bs-toggle="modal" data-bs-target="#detailModal" data-prodi="<?= $row['prodi']; ?>" data-keterangan="<?= $row['keterangan']; ?>">
                            <i class='bx bxs-show'></i>
                        </button>
                        <a href="/prodi/edit/<?= $row['id_prodi']; ?>" class="btn btn-warning me-1">
                            <i class='bx bx-edit-alt'></i>
                        </a>
                        <a href="/prodi/delete/<?= $row['id_prodi']; ?>" class="btn btn-danger btn-delete">
                            <i class='bx bx-trash'></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>
<!-- modal detail -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-- end modal detail -->
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $('#data-table').on('click', '.btn-detail', function() {
        $('.modal-title').html($(this).data('prodi'))
        $('.modal-body').html($(this).data('keterangan'))
    })
</script>
<?= $this->endSection(); ?>