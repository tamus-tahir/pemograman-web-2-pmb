<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

<div class="mb-3">
    <button type="button" class="btn btn-primary btn-create" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah
    </button>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered w-100" id="data-table">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tahun Ajaran</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($tahun as $row) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $row['tahun']; ?></td>
                    <td class="text-nowrap">
                        <button type="button" class="btn btn-warning me-1 btn-update" data-bs-toggle="modal" data-bs-target="#exampleModal" data-tahun="<?= $row['tahun']; ?>" data-id="<?= $row['id_tahun']; ?>">
                            <i class='bx bx-edit-alt'></i>
                        </button>

                        <a href="/tahun/delete/<?= $row['id_tahun']; ?>" class="btn btn-danger btn-delete">
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form <?= $title; ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="row g-3" method="post" action="/tahun/create" id="form">

                    <div class="col-12">
                        <label for="tahun" class="form-label">Tahun Ajaran <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="tahun" name="tahun" required>
                        <div class="invalid-feedback"></div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            </form>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $('#data-table').on('click', '.btn-update', function() {
        $('#tahun').val($(this).data('tahun'))
        $('#form').attr('action', '/tahun/update/' + $(this).data('id'))
    })

    $('.btn-create').on('click', function() {
        $('#tahun').val('')
        $('#form').attr('action', '/tahun/create')
    })
</script>
<?= $this->endSection(); ?>