<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
<div class="row g-3">

    <div class="col-md-3">
        <img src="/assets/img/<?= $user['foto'] ? $user['foto'] : 'noprofil.png'; ?>" alt="" class="detail-foto rounded w-100">
    </div>

    <div class="col-md-9">
        <table class="table">
            <tr>
                <td width="100px">Username</td>
                <td width="10px">:</td>
                <td class="detail-username"><?= $user['username']; ?></td>
            </tr>
            <tr>
                <td>Profil</td>
                <td>:</td>
                <td class="detail-profil"><?= $user['profil']; ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td class="detail-nama"><?= $user['nama']; ?></td>
            </tr>
            <tr>
                <td>Telpon</td>
                <td>:</td>
                <td class="detail-telpon"><?= $user['telpon']; ?></td>
            </tr>
            <tr>
                <td>Dibuat</td>
                <td>:</td>
                <td class="detail-dibuat"><?= $user['user_created_at']; ?></td>
            </tr>
            <tr>
                <td>Diupdate</td>
                <td>:</td>
                <td class="detail-diupdate"><?= $user['user_updated_at']; ?></td>
            </tr>
        </table>

        <a href="/dashboard/editprofil" class="btn btn-primary me-1">Change Profil</a>
        <a href="/dashboard/editpassword" class="btn btn-success">Change Password</a>
    </div>

</div>
<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>