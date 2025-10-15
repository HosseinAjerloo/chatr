<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Config extends Model
{
    use SoftDeletes;
    protected $fillable=['status'];

    public function photo(){
        return $this->morphOne(Fileable::class,'fileable','fileable_type','fileable_id');
    }
}
