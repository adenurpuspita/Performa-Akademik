<?php

namespace App\Imports;

use App\Models\ProsesKlaster;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProsesKlasterImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new ProsesKlaster([
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


