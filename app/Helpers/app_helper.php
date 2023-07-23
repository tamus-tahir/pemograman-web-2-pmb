<?php

function upload($file, $oldFile, $temp)
{
    if ($file->getError() == 4) {
        $fileName = $oldFile;
    } else {
        $fileName   = $file->getRandomName();
        $file->move($temp, $fileName);

        if ($oldFile) {
            unlink($temp . '/' . $oldFile);
        }
    }

    return $fileName;
}

function getMenu($param)
{
    $navigasi = model('NavigasiModel')->getId($param);
    if ($navigasi) {
        return $navigasi['menu'];
    }

    return '';
}

function tanggalIndo($date)
{
    $tanggal = explode("-", $date);

    switch ($tanggal[1]) {
        case "1":
            $tanggal[1] = "Januari";
            break;
        case "2":
            $tanggal[1] = "Februari";
            break;
        case "3":
            $tanggal[1] = "Maret";
            break;
        case "4":
            $tanggal[1] = "April";
            break;
        case "5":
            $tanggal[1] = "Mei";
            break;
        case "6":
            $tanggal[1] = "Juni";
            break;
        case "7":
            $tanggal[1] = "Juli";
            break;
        case "8":
            $tanggal[1] = "Agustus";
            break;
        case "9":
            $tanggal[1] = "September";
            break;
        case "10":
            $tanggal[1] = "Oktober";
            break;
        case "11":
            $tanggal[1] = "November";
            break;
        case "12":
            $tanggal[1] = "Desember";
            break;
        default:
            $tanggal[1] = "No Date";
    }

    $tanggalBaru = $tanggal[2] . ' ' . $tanggal[1] . ' ' . $tanggal[0];
    return $tanggalBaru;
}

function nomorFormulir()
{
    $formulir = model('FormulirModel')->getMaxNomor();
    $nomor = $formulir['nomor'];

    if ($nomor) {
        $prefix = 'NPU-';
        if (substr($nomor, 0, strlen($prefix)) === $prefix) {
            $nomor = substr($nomor, strlen($prefix));
        }
        $nomor++;
        // 2
    } else {
        $nomor = 1;
    }

    $nomorBaru = 'NPU-' . sprintf("%06s", $nomor);
    return $nomorBaru;
}

function getStatus($param)
{
    switch ($param) {
        case "0":
            $param = "Belum Diverifikasi";
            break;
        case "1":
            $param = "Pembayaran Ditolak";
            break;
        case "2":
            $param = "Pembayaran Formulir Diterima";
            break;
        case "3":
            $param = "Tidak Lulus Ujian";
            break;
        case "4":
            $param = "Lulus Ujian";
            break;
        case "5":
            $param = "Pembayaran Ditolak";
            break;
        case "6":
            $param = "Pembayaran SPP & BPP Diterima";
            break;
        default:
            $param = "Error";
    }

    return $param;
}
