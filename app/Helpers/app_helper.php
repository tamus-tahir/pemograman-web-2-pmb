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
