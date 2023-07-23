<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <table cellpadding="2" cellspacing="0" style="width: 100%; margin-bottom: 5px">
        <tr>
            <td>
                <img src="./assets/img/<?= $config['logo']; ?>" width="15%">
            </td>
            <td style="text-align: center;">
                <h2>UNITAMA</h2>
                <h3>UNIVERSITAS TEKNOLOGI AKBA MAKASSAR</h3>
                <h6><?= $informasi['alamat']; ?></h6>
            </td>
        </tr>
    </table>
    <hr>

    <table cellpadding="2" cellspacing="0" style="width: 100%;">
        <tr>
            <td>
                <img src="./assets/img/<?= $formulir['foto']; ?>" width="20%">
            </td>
            <td>
                <table cellpadding="10" cellspacing="0" style="width: 100%">
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
                </table>
            </td>
        </tr>
    </table>

</body>

</html>