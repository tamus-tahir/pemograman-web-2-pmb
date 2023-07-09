<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<div class="mb-3">
    <a href="/profil" class="btn btn-danger">Kembali</a>
    <button class="btn btn-success" disabled>Profil: <?= $profil['profil']; ?></button>
</div>

<div class="table-responsive">
    <table class="table table-hover table-bordered w-100">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">#</th>
                <th scope="col" colspan="2">Menu</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($navigasi as $row) : ?>

                <!-- menu utama -->
                <!-- cek akses -->
                <?php $akses = model('AksesModel')->cekAkses($row['id_navigasi'], $profil['id_profil']) ?>
                <tr>
                    <th scope="row" width="50px"><?= $i++; ?></th>
                    <td colspan="2"><?= $row['menu']; ?></td>
                    <td class="text-nowrap">
                        <div class="form-check">
                            <input class="form-check-input btn-akses" type="checkbox" value="" id="flexCheckDefault" data-profil="<?= $profil['id_profil']; ?>" data-navigasi="<?= $row['id_navigasi']; ?>" <?= $akses ? 'checked' : ''; ?>>
                        </div>
                    </td>
                </tr>

                <!-- submenu -->
                <?php $submenu = model('NavigasiModel')->getSubmenu($row['id_navigasi']) ?>
                <?php if ($submenu) : ?>
                    <?php $x = 'A' ?>
                    <?php foreach ($submenu as $submenu) : ?>
                        <!-- cek akses -->
                        <?php $akses = model('AksesModel')->cekAkses($submenu['id_navigasi'], $profil['id_profil']) ?>
                        <tr>
                            <th></th>
                            <th scope="row" width="50px"><?= $x++; ?></th>
                            <td><?= $submenu['menu']; ?></td>
                            <td class="text-nowrap">
                                <div class="form-check">
                                    <input class="form-check-input btn-akses" type="checkbox" value="" id="flexCheckDefault" data-profil="<?= $profil['id_profil']; ?>" data-navigasi="<?= $submenu['id_navigasi']; ?>" <?= $akses ? 'checked' : ''; ?>>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>

            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    $('.btn-akses').on('click', function() {
        let id_profil = $(this).data('profil')
        let id_navigasi = $(this).data('navigasi')

        $.ajax({
            url: '/profil/proses',
            type: 'post',
            data: {
                id_profil: id_profil,
                id_navigasi: id_navigasi,
            },
            success: function() {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Akses berhasil dikirim',
                    showConfirmButton: false,
                    timer: 1500
                })
                document.location.href = '/profil/akses/' + id_profil
            }
        })
    })
</script>
<?= $this->endSection(); ?>