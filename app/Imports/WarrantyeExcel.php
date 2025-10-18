<?php

namespace App\Imports;

use App\Models\Warrantye;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithSkipDuplicates;
use Illuminate\Contracts\Queue\ShouldQueue;

class WarrantyeExcel implements ToModel, WithHeadingRow, WithBatchInserts, WithSkipDuplicates, ShouldQueue, WithChunkReading
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $serial = trim((string)$row['serial']);
        $Warrantye = Warrantye::where('code',$serial)->first();
        if (!$Warrantye)
            return Warrantye::create(['code' => $serial]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function batchSize(): int
    {
        return 1000;
    }

}
