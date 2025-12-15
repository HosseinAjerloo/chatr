<?php

namespace App\Imports;

use App\Models\GiftCode;
use App\Models\Warrantye;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithSkipDuplicates;

class CopenExcel implements ToModel, WithHeadingRow, WithBatchInserts, WithSkipDuplicates, ShouldQueue, WithChunkReading
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $serial = trim((string)$row['serial']);
        $giftCode = GiftCode::where('code',$serial)->first();
        if (!$giftCode)
            return GiftCode::create(['code' => $serial]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function uniqueBy()
    {
        return 'code';
    }
}
