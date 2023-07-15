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
                <th scope="col">Biaya Pendaftaran</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($pendaftaran as $row) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $row['tahun']; ?></td>
                    <td><?= number_format($row['pendaftaran']); ?></td>
                    <td class="text-nowrap">
                        <button type="button" class="btn btn-warning me-1 btn-update" data-bs-toggle="modal" data-bs-target="#exampleModal" data-pendaftaran="<?= $row['pendaftaran']; ?>" data-tahun="<?= $row['id_tahun']; ?>" data-id="<?= $row['id_pendaftaran']; ?>">
                            <i class='bx bx-edit-alt'></i>
                        </button>

                        <a href="/pendaftaran/delete/<?= $row['id_pendaftaran']; ?>" class="btn btn-danger btn-delete">
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

                <form class="row g-3" method="post" action="/pendaftaran/create" id="form">

                    <div class="col-12">
                        <label for="id_tahun" class="form-label">Tahun Ajaran<span class="text-danger">*</span></label>
                        <select class="form-select " id="id_tahun" name="id_tahun" required>
                            <option value="">- Pilih Tahun Ajaran -</option>
                            <?php foreach ($tahun as $row) : ?>
                                <option value="<?= $row['id_tahun']; ?>"><?= $row['tahun']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="col-12">
                        <label for="pendaftaran" class="form-label">Biaya Pendaftaran <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="pendaftaran" name="pendaftaran" required>
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
        $('#pendaftaran').val($(this).data('pendaftaran'))
        $('#id_tahun').val($(this).data('tahun'))
        $('#form').attr('action', '/pendaftaran/update/' + $(this).data('id'))
    })

    $('.btn-create').on('click', function() {
        $('#pendaftaran').val('')
        $('#id_tahun').val('')
        $('#form').attr('action', '/pendaftaran/create')
    })
</script>
<?= $this->endSection(); ?>