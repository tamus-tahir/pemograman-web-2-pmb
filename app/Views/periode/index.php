<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

<div class="mb-3">
    <a href="/periode/new" class="btn btn-primary">Tambah</a>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered w-100" id="data-table">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tahun Ajaran</th>
                <th scope="col">Periode</th>
                <th scope="col">Pendaftaran</th>
                <th scope="col">Ujian</th>
                <th scope="col">Wawancara</th>
                <th scope="col">Urutan</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($periode as $row) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $row['tahun']; ?></td>
                    <td><?= $row['periode']; ?></td>
                    <td><?= tanggalIndo($row['tanggal_mulai_pendaftaran']); ?> - <?= tanggalIndo($row['tanggal_selesai_pendaftaran']); ?></td>
                    <td><?= tanggalIndo($row['tanggal_ujian']); ?> <?= $row['jam_ujian']; ?></td>
                    <td><?= tanggalIndo($row['tanggal_wawancara']); ?> <?= $row['jam_wawancara']; ?></td>
                    <td><?= $row['urutan']; ?></td>
                    <td class="text-nowrap">
                        <button type="button" class="btn btn-info me-1 btn-detail" data-bs-toggle="modal" data-bs-target="#detailModal" data-periode="<?= $row['periode']; ?>" data-keterangan="<?= $row['keterangan']; ?>">
                            <i class='bx bxs-show'></i>
                        </button>
                        <a href="/periode/edit/<?= $row['id_periode']; ?>" class="btn btn-warning me-1">
                            <i class='bx bx-edit-alt'></i>
                        </a>
                        <a href="/periode/delete/<?= $row['id_periode']; ?>" class="btn btn-danger btn-delete">
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
        $('.modal-title').html($(this).data('periode'))
        $('.modal-body').html($(this).data('keterangan'))
    })
</script>
<?= $this->endSection(); ?>