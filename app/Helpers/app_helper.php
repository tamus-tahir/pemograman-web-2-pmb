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
