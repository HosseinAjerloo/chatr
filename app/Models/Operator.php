<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operator extends Model
{
    use SoftDeletes;
    protected $fillable=['status','name'];

    public function prefix()
    {
        return $this->hasMany(Prefix::class,'operator_id');
    }
}
