<?php

namespace App\Imports;

use App\Models\Sample;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SampleImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Sample([
            'name'     => $row['name'],
            'type'     => $row['type'],
            'location' => $row['location'],
        ]);
    }
}

