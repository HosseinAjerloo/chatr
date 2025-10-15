<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChargeCode extends Model
{
    use SoftDeletes;

    protected $fillable=['copen','used','phone_used','operator_id'];

    public function operator()
    {
        return $this->belongsTo(Operator::class,'operator_id');
    }
}
