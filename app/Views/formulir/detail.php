<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

<div class="mb-3">
    <a href="/formulir" class="btn btn-warning">Kembali</a>
</div>

<div class="row g-3">

    <div class="col-md-3">
        <img src="/assets/img/<?= $formulir['foto']; ?>" alt="" class="rounded w-100">
    </div>

    <div class="col-md-9">
        <table class="table">
            <tr>
                <td width="200px">Nomor Pendaftaran</td>
                <td width="10px">:</td>
                <td><?= $formulir['nomor']; ?></td>
            </tr>
            <tr>
                <td>Tanggal Pendaftaran</td>
                <td>:</td>
                <td><?= tanggalIndoTime($formulir['formulir_created_at']); ?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?= $formulir['nama_pendaftar']; ?></td>
            </tr>
            <tr>
                <td>Telpon</td>
                <td>:</td>
                <td><?= $formulir['telpon_pendaftar']; ?></td>
            </tr>
            <tr>
                <td>Pilihan Pertama</td>
                <td>:</td>
                <td><?= getProdi($formulir['pilihan_pertama']); ?></td>
            </tr>
            <tr>
                <td>Pilihan Kedua</td>
                <td>:</td>
                <td><?= getProdi($formulir['pilihan_kedua']); ?></td>
            </tr>
            <tr>
                <td>Prodi Lulus</td>
                <td>:</td>
                <td><?= getProdi($formulir['prodi_lulus']); ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td><?= getStatus($formulir['status']); ?></td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td><?= $formulir['keterangan']; ?></td>
            </tr>
        </table>
    </div>

    <div class="col-md-4">
        <p>Ijazah</p>
        <img src="/assets/img/<?= $formulir['ijazah']; ?>" alt="" class="rounded w-100">
    </div>
    <div class="col-md-4">
        <p>Bukti Pembayaran Pendaftaran</p>
        <img src="/assets/img/<?= $formulir['pembayaran_pendaftaran']; ?>" alt="" class="rounded w-100">
    </div>
    <div class="col-md-4">
        <p>Bukti Pembayaran SPP BPP</p>
        <img src="/assets/img/<?= $formulir['pembayaran_spp_bpp']; ?>" alt="" class="rounded w-100">
    </div>

</div>
<?= $this->endSection(); ?>

<?= $this->section('modal'); ?>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>

<?= $this->endSection(); ?>