<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fileable extends Model
{
    use SoftDeletes;

    protected $fillable = ['fileable_id', 'fileable_type', 'path'];

    public function photo()
    {
        return $this->morphTo();
    }
}
