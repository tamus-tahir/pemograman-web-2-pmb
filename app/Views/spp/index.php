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
                <th scope="col">Tahun </th>
                <th scope="col">Periode </th>
                <th scope="col">Program Studi</th>
                <th scope="col">Biaya SPP</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($spp as $row) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $row['tahun']; ?></td>
                    <td><?= $row['periode']; ?></td>
                    <td><?= $row['prodi']; ?></td>
                    <td><?= number_format($row['spp']); ?></td>
                    <td class="text-nowrap">
                        <button type="button" class="btn btn-warning me-1 btn-update" data-bs-toggle="modal" data-bs-target="#exampleModal" data-spp="<?= $row['spp']; ?>" data-periode="<?= $row['id_periode']; ?>" data-prodi="<?= $row['id_prodi']; ?>" data-id="<?= $row['id_spp']; ?>">
                            <i class='bx bx-edit-alt'></i>
                        </button>

                        <a href="/spp/delete/<?= $row['id_spp']; ?>" class="btn btn-danger btn-delete">
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

                <form class="row g-3" method="post" action="/spp/create" id="form">

                    <div class="col-12">
                        <label for="id_periode" class="form-label">Periode <span class="text-danger">*</span></label>
                        <select class="form-select " id="id_periode" name="id_periode" required>
                            <option value="">- Pilih Periode -</option>
                            <?php foreach ($periode as $row) : ?>
                                <option value="<?= $row['id_periode']; ?>"><?= $row['periode']; ?></option>
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
                        <label for="spp" class="form-label">Biaya SPP <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="spp" name="spp" required>
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
        $('#spp').val($(this).data('spp'))
        $('#id_periode').val($(this).data('periode'))
        $('#id_prodi').val($(this).data('prodi'))
        $('#form').attr('action', '/spp/update/' + $(this).data('id'))
    })

    $('.btn-create').on('click', function() {
        $('#spp').val('')
        $('#id_periode').val('')
        $('#id_prodi').val('')
        $('#form').attr('action', '/spp/create')
    })
</script>
<?= $this->endSection(); ?>