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
                <th scope="col">Program Studi</th>
                <th scope="col">Biaya BPP</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($bpp as $row) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $row['tahun']; ?></td>
                    <td><?= $row['prodi']; ?></td>
                    <td><?= number_format($row['bpp']); ?></td>
                    <td class="text-nowrap">
                        <button type="button" class="btn btn-warning me-1 btn-update" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bpp="<?= $row['bpp']; ?>" data-tahun="<?= $row['id_tahun']; ?>" data-prodi="<?= $row['id_prodi']; ?>" data-id="<?= $row['id_bpp']; ?>">
                            <i class='bx bx-edit-alt'></i>
                        </button>

                        <a href="/bpp/delete/<?= $row['id_bpp']; ?>" class="btn btn-danger btn-delete">
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

                <form class="row g-3" method="post" action="/bpp/create" id="form">

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
                        <label for="id_prodi" class="form-label">Program Studi<span class="text-danger">*</span></label>
                        <select class="form-select " id="id_prodi" name="id_prodi" required>
                            <option value="">- Pilih Program Studi -</option>
                            <?php foreach ($prodi as $row) : ?>
                                <option value="<?= $row['id_prodi']; ?>"><?= $row['prodi']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="col-12">
                        <label for="bpp" class="form-label">Biaya BPP <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="bpp" name="bpp" required>
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
        $('#bpp').val($(this).data('bpp'))
        $('#id_tahun').val($(this).data('tahun'))
        $('#id_prodi').val($(this).data('prodi'))
        $('#form').attr('action', '/bpp/update/' + $(this).data('id'))
    })

    $('.btn-create').on('click', function() {
        $('#bpp').val('')
        $('#id_tahun').val('')
        $('#id_prodi').val('')
        $('#form').attr('action', '/bpp/create')
    })
</script>
<?= $this->endSection(); ?>