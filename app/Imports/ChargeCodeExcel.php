<?php

namespace App\Imports;

use App\Models\ChargeCode;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithSkipDuplicates;

class ChargeCodeExcel implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading, WithSkipDuplicates, ShouldQueue
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    protected $operator = null;

    public function __construct($operator)
    {
        $this->operator = $operator;
    }

    public function uniqueBy()
    {
        return 'copen';
    }

    public function model(array $row)
    {
        $serial =trim((string) $row['serial']);
        $chargeCode=ChargeCode::where('copen',$serial)->first();
        if (!$chargeCode)
        return ChargeCode::create(['copen' => $serial,'operator_id' => $this->operator]);
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
