<?php

namespace App\Imports;

use App\Models\NilaiSiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NilaiSiswaImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new NilaiSiswa([
            'nisn'             => $row['nisn'],
            'nama'             => $row['nama'],
            'mengingat'        => $row['mengingat'],
            'memahami'         => $row['memahami'],
            'mengaplikasikan'  => $row['mengaplikasikan'],
            'menerima'         => $row['menerima'],
            'menanggapi'       => $row['menanggapi'],
            'menghargai'       => $row['menghargai'],
            'meniru'           => $row['meniru'],
            'manipulasi'       => $row['manipulasi'],
            'presisi'          => $row['presisi'],

        ]);
    }
}

